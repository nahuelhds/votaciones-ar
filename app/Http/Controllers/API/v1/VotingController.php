<?php

namespace App\Http\Controllers\API\v1;

use App\Voting;
use App\VotingRecord;
use App\Http\Resources\VotingCollection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

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
        $voting = new Voting();

        $voting->chamber = $request->chamber;
        $voting->voted_at = Carbon::parse($request->voted_at);
        $voting->period = $request->period;
        $voting->meeting = $request->meeting;
        $voting->record = $request->record;
        $voting->title = $request->title;
        $voting->type = $request->type;
        $voting->president_id = $request->president_id;
        $voting->result = $request->result;
        $voting->source_url = $request->source_url;
        $voting->original_id = $request->original_id;

        $voting->save();

        if ($request->has('records')) {
            foreach ($request->records as $reqRecord) {
                $record = new VotingRecord();

                $record->voting_id = $voting->id;
                $record->title = $reqRecord['title'];
                $record->original_id = $reqRecord['original_id'];

                $record->save();
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
