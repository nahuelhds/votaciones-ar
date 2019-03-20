<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Entities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
        });

        Schema::create('legislators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('last_name');
            $table->string('full_name');
            $table->enum('type', ['deputy', 'senator']); // si es diputado o senador
            $table->unsignedBigInteger('party_id'); // bloque actual
            $table->unsignedBigInteger('region_id'); // provincia actual

            $table->foreign('party_id')->references('id')->on('parties')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legislators');
        Schema::dropIfExists('parties');
        Schema::dropIfExists('regions');
    }
}
