<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class FillRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $names = [
            'Buenos Aires',
            'C.A.B.A.',
            'Córdoba',
            'Catamarca',
            'Chaco',
            'Chubut',
            'Corrientes',
            'Entre Ríos',
            'Formosa',
            'Jujuy',
            'La Pampa',
            'La Rioja',
            'Mendoza',
            'Misiones',
            'Neuquén',
            'Río Negro',
            'Salta',
            'San Juan',
            'San Luis',
            'Santa Cruz',
            'Santa Fe',
            'Santiago del Estero',
            'Tierra del Fuego',
            'Tucumán',
        ];

        foreach ($names as $name) {
            $region = new \App\Region();
            $region->name = $name;
            $region->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('regions')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
