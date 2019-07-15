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
     * Listado de legisladores
     *
     * @queryParam filter[last_name] Parcial. Apellido del legislador. Example:
     * @queryParam filter[name] Parcial. Nombre del legislador. Example:
     * @queryParam filter[original_id] Exacto. ID con el cual figura en la página oficial. Example:
     * @queryParam filter[party_id] Exacto. ID del bloque al que pertenece actualmente. Example:
     * @queryParam filter[region_id] Exacto. ID de la región a la que pertenece actualmente. Example:
     * @queryParam filter[type] Exacto. Cargo actual. Valores: deputy, senator. Example:
     *
     * @queryParam include Entidades: party, region. Example:
     *
     * @queryParam sort Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC. Example:
     * @queryParam page Número de página. Example:
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
            Filter::exact('region_id'),
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
     * Legislador
     *
     * @queryParam include Entidades: party, region. Example:
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
