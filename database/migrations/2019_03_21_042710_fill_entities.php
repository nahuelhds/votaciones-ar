<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

use App\User;
use App\Party;
use App\Legislator;

class FillEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $user = new User();
        $user->name = "Admin";
        $user->email = 'admin@votaciones.test';
        $user->password = '$2y$10$R6HRjpyySfdNRSWyqRT11uZX1hJgd64IYK6d6LsmuTMWIjh8C3xqO';
        $user->api_token = 'Y07KH9uNEGrPafm808BTUy2hFKA2GN2s0wAo1XMb0clHoru32QyTAmmeoEdN';
        $user->save();

        $fpv = new Party();
        $fpv->name = "Frente para la Victoria - PJ";
        $fpv->save();

        $pj = new Party();
        $pj->name = "Justicialista";
        $pj->save();

        $nk = new Legislator();
        $nk->name = "Néstor Carlos";
        $nk->last_name = "KIRCHNER";
        $nk->full_name = "KIRCHNER, Néstor Carlos";
        $nk->party_id = $fpv->id;
        $nk->region_id = 1;
        $nk->save();

        $nk = new Legislator();
        $nk->name = "Cristina";
        $nk->last_name = "FERNANDEZ de KIRCHNER";
        $nk->full_name = "FERNANDEZ de KIRCHNER, Cristina";
        $nk->party_id = $pj->id;
        $nk->region_id = 20;
        $nk->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('parties')->truncate();
        DB::table('legislators')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
