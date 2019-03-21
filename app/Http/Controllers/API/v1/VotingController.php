<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

use App\Voting;
use App\Http\Resources\VotingCollection;
use App\VotingRecord;
use App\Legislator;
use App\Region;
use App\Party;
use App\VotingVote;

class VotingController extends Controller
{
    const CHAMBER_DEPUTIES = 'deputies';
    const CHAMBER_SENATORS = 'senators';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VotingCollection(Voting::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        if ($request->has('records')) {
            foreach ($request->records as $record) {
                VotingRecord::firstOrCreate([
                    'voting_id' => $voting->id,
                    'title' => $record['title'],
                    'original_id' => $record['original_id'],
                ]);
            }
        }

        if ($request->has('detailsCsv')) {
            $detailsCsv = $request->detailsCsv;
            $rows = str_getcsv($detailsCsv, "\n");
            array_shift($rows);
            foreach ($rows as $row) {
                $columns = str_getcsv($row);
                $region = Region::firstOrCreate([
                    'name' => $columns[3],
                ]);
                $party = Party::firstOrCreate([
                    'name' => $columns[2],
                ]);
                $legislator = Legislator::firstOrNew([
                    'name' => $columns[1],
                    'last_name' => $columns[0]
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

        return $voting;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function show(Voting $voting)
    {
        return $voting;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voting $voting)
    {
        $voting->type = $request->type;
        $voting->voted_at = $request->voted_at;
        $voting->period = $request->period;
        $voting->meeting = $request->meeting;
        $voting->record = $request->record;
        $voting->title = $request->title;
        $voting->voting_type = $request->voting_type;
        $voting->president_id = $request->president_id;
        $voting->result = $request->result;
        $voting->source_url = $request->source_url;
        $voting->original_id = $request->original_id;

        $voting->save();

        return new VotingCollection($voting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voting $voting)
    {
        $voting->delete();
        return new VotingCollection($voting);
    }
}
