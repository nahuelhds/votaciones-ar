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
            'voted_at' => Carbon::parse((int)$request->date),
            'title' => $request->title
        ]);

        $president = explode(", ", $request->president);
        $legislator = Legislator::firstOrCreate([
            'name' => trim($president[1]),
            'last_name' => trim($president[0])
        ], [
            "type" => Legislator::TYPE_DEPUTY,
        ]);

        $voting->type = $request->type;
        $voting->result = $request->result === 'EMPATE' ? null : $request->result === "AFIRMATIVO";
        $voting->source_url = self::VOTINGS_URI . $request->url;
        $voting->original_id = $request->id;
        $voting->period = (int)$request->period;
        $voting->meeting = (int)$request->meeting;
        $voting->record = (int)$request->record;
        $voting->president_id = $legislator->id;
        $voting->affirmative_count = (int)$request->affirmativeCount;
        $voting->negative_count = (int)$request->negativeCount;
        $voting->abstention_count = (int)$request->abstentionCount;
        $voting->absent_count = (int)$request->absentCount;
        $voting->document_url = $request->documentUrl;

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
     * Import votes to $voting from a CSV string, or edit them if they already exist
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function votes(Request $request, Voting $voting)
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
