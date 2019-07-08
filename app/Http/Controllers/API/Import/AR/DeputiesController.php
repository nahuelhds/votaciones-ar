<?php

namespace App\Http\Controllers\API\Import\AR;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

use App\Voting;
use App\VotingRecord;
use App\Region;
use App\Party;
use App\Legislator;
use App\VotingVote;

class DeputiesController extends Controller
{

    const VOTINGS_URI = 'https://votaciones.hcdn.gob.ar';

    /**
     * Import a voting, or edit it if already exists
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function voting(Request $request)
    {
        $voting = Voting::firstOrNew([
            'chamber' => Voting::CHAMBER_DEPUTIES,
            'original_id' => $request->id,
        ]);

        $voting->voted_at = Carbon::parse($request->date); // Y-m-d
        $voting->title = $request->title;

        // PRESIDENTE DE LA SESION
        $names = explode(", ", $request->president);
        $legislator = Legislator::firstOrNew([
            'name' => trim($names[1]),
            'last_name' => trim($names[0])
        ]);

        // Si es un nuevo legislador, lo registro
        if (!$legislator->id) {
            $legislator->type = Legislator::TYPE_DEPUTY;
            $legislator->save();
        }

        // Actualizo posibles fechas de primera y/o última actividad
        if (is_null($legislator->first_activity_at) || $legislator->first_activity_at > $voting->voted_at) {
            $legislator->first_activity_at = $voting->voted_at;
            $legislator->save();
        }

        if ($legislator->last_activity_at < $voting->voted_at) {
            $legislator->last_activity_at = $voting->voted_at;
            // En el caso de la ultima actividad, ademas actualizo
            // los datos de partido y provincia
            // ya que pudieron haber cambiado
            $legislator->type = Legislator::TYPE_DEPUTY;
            $legislator->save();
        }

        $voting->president_id = $legislator->id;

        // TIPO DE VOTO
        $voting->type = $request->type;
        $voting->result_raw = $request->result;
        switch ($voting->result_raw) {
            case "AFIRMATIVO":
                $voting->result = true;
                break;
            case "NEGATIVO":
                $voting->result = false;
                break;
            case "EMPATE":
                $voting->result = null;
                break;
            default:
                // Desconocido
                throw new \RuntimeException("Voting #$request->id - Uknown result type. Value: $request->result");
        }

        $voting->source_url = self::VOTINGS_URI . $request->detailsUrl;
        $voting->document_url = $request->recordUrl;
        $voting->video_url = $request->videoUrl;

        $voting->period = (int) $request->period;
        $voting->meeting = (int) $request->meeting;
        $voting->record = (int) $request->record;

        $voting->affirmative_count = (int) $request->affirmativeCount;
        $voting->negative_count = (int) $request->negativeCount;
        $voting->abstention_count = (int) $request->abstentionCount;
        $voting->absent_count = (int) $request->absentCount;

        $voting->save();

        return $voting;
    }

    /**
     * Import records to $voting, or edit them if they already exist
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function records(Request $request, Voting $voting)
    {
        $content = json_decode($request->getContent());
        $records = [];
        foreach ($content as $record) {
            $records[] = VotingRecord::firstOrCreate([
                'voting_id' => $voting->id,
                'title' => $record->title,
                'original_id' => $record->id
            ]);
        }

        return $records;
    }

    /**
     * Import all votes from a $voting
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function bulkVotes(Request $request, Voting $voting)
    {
        $votesData = json_decode($request->getContent());
        $data = [];
        foreach ($votesData as $voteData) {
            // Solo si esta definido el legislador, guardarlo
            // Si no se trata del legislador "A DESIGNAR"
            // if (isset($voteData->legislator)) {
                $data[] = $this->parseVote($voteData, $voting);
            // }
        }

        return $data;
    }

    /**
     * Import a vote from a $voting
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request, Voting $voting)
    {
        return $this->parseVote($request, $voting);
    }

    /**
     * Create/update a vote from the given data
     *
     * @param \stdClass $voteData
     * @param Voting $voting
     * @return VotingVote
     */
    private function parseVote($voteData, Voting $voting)
    {
        switch (strtoupper($voteData->region)) {
            case "CAPITAL FEDERAL":
            case "CIUDAD AUTÓNOMA de BUENOS AIRES":
                $regionName = "C.A.B.A.";
                break;
            case "TIERRA DEL FUEGO, ANTÁRTIDA E ISLAS DEL ATLÁNTICO SUR":
                $regionName = "Tierra del Fuego";
                break;
            default:
                $regionName = $voteData->region;
        }
        $region = Region::firstOrCreate([
            'name' => trim($regionName),
        ]);
        $party = Party::firstOrCreate([
            'name' => trim($voteData->party),
        ]);

        // Actualizo posibles fechas de primera y/o última actividad
        if (is_null($party->first_activity_at) || $party->first_activity_at > $voting->voted_at) {
            $party->first_activity_at = $voting->voted_at;
            $party->save();
        }
        if ($party->last_activity_at < $voting->voted_at) {
            $party->last_activity_at = $voting->voted_at;
            $party->save();
        }

        $names = explode(",", $voteData->legislator);
        $legislator = Legislator::firstOrNew([
            'name' => trim($names[1]),
            'last_name' => trim($names[0])
        ]);

        // @TODO: ante el cambio de partido o provincia
        // registrarlo en el historial del legislador

        // Si es un nuevo legislador, lo registro
        if (!$legislator->id) {
            $legislator->type = Legislator::TYPE_DEPUTY;
            // $legislator->original_id = $voteData->legislatorId;
            $legislator->party_id = $party->id;
            $legislator->region_id = $region->id;
            $legislator->photo_url = $voteData->photoUrl;
            $legislator->save();
        }

        // Actualizo posibles fechas de primera y/o última actividad
        if (is_null($legislator->first_activity_at) || $legislator->first_activity_at > $voting->voted_at) {
            $legislator->first_activity_at = $voting->voted_at;
            $legislator->save();
        }

        if ($legislator->last_activity_at < $voting->voted_at) {
            $legislator->last_activity_at = $voting->voted_at;
            // En el caso de la ultima actividad, ademas actualizo
            // los datos de partido y provincia
            // ya que pudieron haber cambiado
            $legislator->type = Legislator::TYPE_DEPUTY;
            $legislator->party_id = $party->id;
            $legislator->region_id = $region->id;
            $legislator->photo_url = $voteData->photoUrl;
            $legislator->save();
        }

        switch (strtoupper($voteData->vote)) {
            case 'AFIRMATIVO':
                $result = VotingVote::VOTE_AFFIRMATIVE;
                break;
            case 'NEGATIVO':
                $result = VotingVote::VOTE_NEGATIVE;
                break;
            case 'ABSTENCIÓN':
            case 'ABSTENCION':
                $result = VotingVote::VOTE_ABSTENTION;
                break;
            case 'AUSENTE':
            default:
                $result = VotingVote::VOTE_ABSENT;
        }

        $vote = VotingVote::firstOrNew([
            'voting_id' => $voting->id,
            'legislator_id' => $legislator->id
        ]);

        $vote->party_id = $party->id;
        $vote->region_id = $region->id;
        $vote->vote = $result;
        $vote->vote_raw = $voteData->vote;
        $vote->video_url = $voteData->videoUrl;

        $vote->save();

        return $vote;
    }

    /**
     * Import votes to $voting from a CSV string, or edit them if they already exist
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function bulkVotesCsv(Request $request, Voting $voting)
    {
        $content = json_decode($request->getContent());
        $rows = str_getcsv($content, "\n");
        array_shift($rows);

        $votes = [];
        foreach ($rows as $row) {
            $columns = str_getcsv($row);
            $region = Region::firstOrCreate([
                'name' => trim($columns[3]),
            ]);
            $party = Party::firstOrCreate([
                'name' => trim($columns[2]),
            ]);
            $legislator = Legislator::firstOrNew([
                'name' => trim($columns[1]),
                'last_name' => trim($columns[0])
            ]);

            $legislator->type = Legislator::TYPE_DEPUTY;
            $legislator->party_id = $party->id;
            $legislator->region_id = $region->id;
            $legislator->save();

            switch ($columns[4]) {
                case 'AFIRMATIVO':
                    $vote = VotingVote::VOTE_AFFIRMATIVE;
                    break;
                case 'NEGATIVO':
                    $vote = VotingVote::VOTE_NEGATIVE;
                    break;
                case 'ABSTENCION':
                    $vote = VotingVote::VOTE_ABSTENTION;
                    break;
                default:
                    $vote = VotingVote::VOTE_ABSENT;
            }

            $votes[] = VotingVote::firstOrCreate([
                'voting_id' => $voting->id,
                'legislator_id' => $legislator->id,
                'party_id' => $party->id,
                'region_id' => $region->id,
                'vote' => $vote,
            ]);
        }

        return $votes;
    }
}
