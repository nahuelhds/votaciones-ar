<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use App\Http\Resources\RegionCollection;

class RegionsController extends Controller
{
    /**
     * Listado de regiones
     *
     * @queryParam filter[name] Parcial. Nombre de la región. Example:
     *
     * @queryParam include Entidades: legislators. Example:
     *
     * @queryParam sort Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC. Example:
     * @queryParam page Número de página. Example:
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = QueryBuilder::for(Region::class);

        // Filters
        $resources->allowedFilters([
            Filter::partial('name'),
        ]);

        // Relations
        $resources->allowedIncludes([
            'legislators',
        ]);

        return new RegionCollection($resources->paginate());
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
     * Región
     *
     * @queryParam include Entidades: legislators. Example:
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = QueryBuilder::for(Region::class);

        // Relations
        $resource->allowedIncludes([
            'legislators',
        ]);

        return $resource->findOrFail($request->region);
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
