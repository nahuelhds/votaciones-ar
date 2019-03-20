<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Votings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->enum('type', ['deputies', 'senators']);
            $table->timestamp('voted_at')->nullable(); // date
            $table->integer('period');
            $table->integer('meeting');
            $table->integer('record');
            $table->string('title');
            $table->string('voting_type');
            $table->unsignedBigInteger('president_id'); // presidente de la sesion
            $table->boolean('result');
            $table->string('source_url'); // url
            $table->string('original_id'); // id

            $table->foreign('president_id')->references('id')->on('legislators')->onDelete('cascade');
        });

        Schema::create('votings_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('voting_id');
            $table->string('title');
            $table->string('original_id'); // id

            $table->foreign('voting_id')->references('id')->on('votings');
        });

        Schema::create('votings_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('legislator_id');
            $table->enum('type', ['deputy', 'senator']); // al momento en que voto
            $table->unsignedBigInteger('party_id'); // al momento en que voto
            $table->unsignedBigInteger('region_id'); // al momento en que voto
            $table->enum('vote', ['afirmative', 'negative', 'abstention'])->nullable(); // null => ausente
            $table->string('speech_url')->nullable();

            $table->foreign('legislator_id')->references('id')->on('legislators')->onDelete('cascade');
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
        Schema::dropIfExists('votings_records');
        Schema::dropIfExists('votings_details');
        Schema::dropIfExists('votings');
    }
}
