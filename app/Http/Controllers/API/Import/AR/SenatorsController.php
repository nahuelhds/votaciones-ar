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

class SenatorsController extends Controller
{

    const VOTINGS_URI = 'https://www.senado.gov.ar';

    /**
     * Import a voting, or edit it if already exists
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function voting(Request $request)
    {
        $voting = Voting::firstOrNew([
            'chamber' => Voting::CHAMBER_SENATORS,
            'original_id' => $request->id,
        ]);

        $voting->voted_at = Carbon::parse("$request->date 00:00:00"); // Y-m-d
        $voting->title = $request->title;

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
            case "AUSENTE":
            case "LEV. VOT.":
            case "CANCELADA LEV.VOT.":
                $voting->result = null;
                break;
            default:
                // Desconocido
                throw new \RuntimeException("Voting #$request->id - Uknown result type. Value: $request->result");
        }

        $voting->source_url = self::VOTINGS_URI . $request->detailsUrl;
        $voting->document_url = self::VOTINGS_URI . $request->recordUrl;
        $voting->file_url = self::VOTINGS_URI . $request->fileUrl;
        $voting->video_url = $request->videoUrl;

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
    // public function records(Request $request, Voting $voting)
    // {
    //     $content = json_decode($request->getContent());
    //     $records = [];
    //     foreach ($content as $record) {
    //         $records[] = VotingRecord::firstOrCreate([
    //             'voting_id' => $voting->id,
    //             'title' => $record->title,
    //             'original_id' => $record->id
    //         ]);
    //     }

    //     return $records;
    // }

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
            $data[] = $this->parseVote($voteData, $voting);
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
        switch ($voteData->region) {
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
            $legislator->type = Legislator::TYPE_SENATOR;
            $legislator->original_id = $voteData->legislatorId;
            $legislator->party_id = $party->id;
            $legislator->region_id = $region->id;
            $legislator->profile_url = self::VOTINGS_URI . $voteData->profileUrl;
            $legislator->photo_url = self::VOTINGS_URI . $voteData->photoUrl;
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
            $legislator->type = Legislator::TYPE_SENATOR;
            $legislator->party_id = $party->id;
            $legislator->region_id = $region->id;
            $legislator->profile_url = self::VOTINGS_URI . $voteData->profileUrl;
            $legislator->photo_url = self::VOTINGS_URI . $voteData->photoUrl;
            $legislator->save();
        }

        switch ($voteData->vote) {
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

        $vote->save();

        return $vote;
    }
}
