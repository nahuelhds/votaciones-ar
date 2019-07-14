<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Voting;
use App\VotingVote;
use App\Http\Resources\VotingVoteCollection;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;


class VotingsVotesController extends Controller
{
    /**
     * Listado de votos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = QueryBuilder::for(VotingVote::class);

        // Filters
        $resources->allowedFilters([
            Filter::exact('voting_id'),
            Filter::exact('legislator_id'),
            Filter::exact('party_id'),
            Filter::exact('region_id'),
            Filter::partial('vote'),
            Filter::partial('vote_raw'),
            Filter::partial('video_url'),
        ]);

        // Relations
        $resources->allowedIncludes([
            'voting',
            'legislator',
            'region',
            'party'
        ]);

        // When comes from votings/{id}/votes...
        if ((int) $request->voting > 0) {
            $resources->where('voting_id', $request->voting);
        }

        // When comes from legislators/{id}/votes...
        if ((int) $request->legislator > 0) {
            $resources->where('legislator_id', $request->legislator);
        }

        return new VotingVoteCollection($resources->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Voto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = QueryBuilder::for(VotingVote::class);

        // Relations
        $resource->allowedIncludes([
            'voting',
            'legislator',
            'region',
            'party'
        ]);

        // When comes from votings/{id}/votes...
        if ((int) $request->voting > 0) {
            $resource->where('voting_id', $request->voting);
        }

        // When comes from legislators/{id}/votes...
        if ((int) $request->legislator > 0) {
            $resource->where('legislator_id', $request->legislator);
        }

        return $resource->findOrFail($request->vote);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
