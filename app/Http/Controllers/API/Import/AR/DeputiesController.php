<?php

namespace App\Http\Controllers\API\Import\AR;

use App\Voting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeputiesController extends Controller
{
    /**
     * Import a voting, or edit it if already exists
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function voting(Request $request)
    {
        $votedAt = Carbon::parse($request->voted_at);
        $voting = Voting::firstOrNew([
            'chamber' => $request->chamber,
            'voted_at' => $votedAt,
            'title' => $request->title
        ]);

        $voting->period = $request->period;
        $voting->meeting = $request->meeting;
        $voting->record = $request->record;
        $voting->type = $request->type;
        $voting->president_id = $request->president_id;
        $voting->result = $request->result;
        $voting->source_url = $request->source_url;
        $voting->original_id = $request->original_id;

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
        foreach ($request->records as $record) {
            VotingRecord::firstOrCreate([
                'voting_id' => $voting->id,
                'title' => $record['title'],
                'original_id' => $record['original_id'],
            ]);
        }
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
        $votesCsv = $request->votesCsv;
        $rows = str_getcsv($votesCsv, "\n");
        array_shift($rows);
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
                    $vote = null;
            }

            VotingVote::firstOrCreate([
                'voting_id' => $voting->id,
                'legislator_id' => $legislator->id,
                'party_id' => $party->id,
                'region_id' => $region->id,
                'vote' => $vote,
            ]);
        }
    }
}
