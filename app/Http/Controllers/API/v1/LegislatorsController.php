<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;

use App\Legislator;
use App\Http\Resources\LegislatorCollection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use Illuminate\Http\Request;

class LegislatorsController extends Controller
{
    /**
     * Lista todos los legisladores
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = QueryBuilder::for(Legislator::class);

        // Filters
        $resources->allowedFilters([
            Filter::partial('name'),
            Filter::partial('last_name'),
            Filter::exact('type'),
            Filter::exact('party_id'),
            Filter::partial('profile_url'),
            Filter::partial('photo_url'),
            Filter::exact('original_id'),
        ]);

        // Relations
        $resources->allowedIncludes([
            'party',
            'region',
        ]);

        return new LegislatorCollection($resources->paginate());
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
     * Muestra el legislador con el ID especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = QueryBuilder::for(Legislator::class);

        // Relations
        $resource->allowedIncludes([
            'party',
            'region',
        ]);

        return $resource->findOrFail($request->legislator);
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
