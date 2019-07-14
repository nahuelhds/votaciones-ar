<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;

use App\Party;
use App\Http\Resources\PartyCollection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use Illuminate\Http\Request;

class PartiesController extends Controller
{
    /**
     * Listado de bloques
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = QueryBuilder::for(Party::class);

        // Filters
        $resources->allowedFilters([
            Filter::partial('name'),
        ]);

        // Relations
        $resources->allowedIncludes([
            'legislators',
        ]);

        return new PartyCollection($resources->paginate());
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
     * Bloque
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = QueryBuilder::for(Party::class);

        // Relations
        $resource->allowedIncludes([
            'legislators',
        ]);

        return $resource->findOrFail($request->party);
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
