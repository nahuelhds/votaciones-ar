<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;

use App\Voting;
use App\Http\Resources\VotingCollection;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use Illuminate\Http\Request;

class VotingsController extends Controller
{
    /**
     * Lista todas las votaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = QueryBuilder::for(Voting::class);

        // Filters
        $resources->allowedFilters([
            Filter::exact('chamber'),
            Filter::exact('original_id'),
            Filter::exact('period'),
            Filter::exact('meeting'),
            Filter::exact('record'),
            Filter::exact('president_id'),
            Filter::partial('title'),
            Filter::partial('type'),
            Filter::exact('result'),
            Filter::partial('result_raw'),
            Filter::partial('document_url'),
            Filter::partial('file_url'),
            Filter::partial('source_url'),
        ]);

        // Relations
        $resources->allowedIncludes([
            'records',
        ]);

        return new VotingCollection($resources->paginate());
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
     * Lista la votación con el ID especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = QueryBuilder::for(Voting::class);

        // Relations
        $resource->allowedIncludes([
            'records',
        ]);

        return $resource->findOrFail($request->voting);
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
