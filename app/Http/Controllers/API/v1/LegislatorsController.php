<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Legislator;
use App\Http\Resources\LegislatorCollection;

class LegislatorsController extends Controller
{
    /**
     * Listado de legisladores
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LegislatorCollection(Legislator::paginate());
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
     * Muestra el legislador con el $id especificado
     *
     * @param \App\Legislator  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Legislator $legislator)
    {
        return $legislator;
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
