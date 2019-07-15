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
     * Listado de votaciones
     *
     * @queryParam filter[chamber] Exacto. Cámara. Valores: deputies, senators. Example:
     * @queryParam filter[document_url] Parcial. URL del documento PDF relacionado. Example:
     * @queryParam filter[file_url] Parcial. URL del expediente relacionado. Example:
     * @queryParam filter[meeting] Exacto. Sesión/Reunión. Example:
     * @queryParam filter[original_id] Exacto. ID con el cual figura en la página oficial. Example:
     * @queryParam filter[period] Exacto. Período. Example:
     * @queryParam filter[president_id] Exacto. ID del legislador presidente de la sesión. Example:
     * @queryParam filter[record] Exacto. Acta. Example:
     * @queryParam filter[result] Exacto. Resultado de la votación. Valores: true, false, null. Example:
     * @queryParam filter[result_raw] Parcial. Resultado crudo tal como figura en el sitio oficial. Example:
     * @queryParam filter[source_url] Parcial. URL fuente del sitio oficial. Example:
     * @queryParam filter[title] Parcial. Título de la votación. Example:
     * @queryParam filter[type] Parcial. Tipo de votacion. Example:
     *
     * @queryParam include Entidades: president, records. Example:
     *
     * @queryParam sort Campo de ordenamiento. Por defecto ASC. Si se antepone "-" se ordena DESC. Example:
     * @queryParam page Número de página. Example:
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
            'president',
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
     * Votación
     *
     * @queryParam include Entidades: president, records. Example:
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resource = QueryBuilder::for(Voting::class);

        // Relations
        $resource->allowedIncludes([
            'president',
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
