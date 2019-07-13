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
        Schema::enableForeignKeyConstraints();
    }
}
