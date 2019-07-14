<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

use App\Voting;
use App\Http\Resources\VotingCollection;

class VotingsController extends Controller
{
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
    // public function store(Request $request)
    // {
    //     $voting = new Voting();

    //     $voting->chamber = $request->chamber;
    //     $voting->voted_at = Carbon::parse($request->voted_at);
    //     $voting->title = $request->title;
    //     $voting->period = $request->period;
    //     $voting->meeting = $request->meeting;
    //     $voting->record = $request->record;
    //     $voting->type = $request->type;
    //     $voting->president_id = $request->president_id;
    //     $voting->result = $request->result;
    //     $voting->save();

    //     return $voting;
    // }

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
    // public function update(Request $request, Voting $voting)
    // {
    //     $voting->chamber = $request->chamber;
    //     $voting->type = $request->type;
    //     $voting->voted_at = $request->voted_at;
    //     $voting->period = $request->period;
    //     $voting->meeting = $request->meeting;
    //     $voting->record = $request->record;
    //     $voting->title = $request->title;
    //     $voting->voting_type = $request->voting_type;
    //     $voting->president_id = $request->president_id;
    //     $voting->result = $request->result;
    //     $voting->save();

    //     return $voting;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Voting $voting)
    // {
    //     $voting->delete();
    //     return $voting;
    // }
}
