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
            $table->enum('chamber', ['deputies', 'senators']);
            $table->string('original_id')->nullable(); // id
            $table->timestamp('voted_at')->nullable(); // date
            $table->integer('period')->nullable();
            $table->integer('meeting')->nullable();
            $table->integer('record')->nullable();
            $table->text('title')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('president_id')->nullable(); // presidente de la sesion
            $table->boolean('result')->nullable();
            $table->string('source_url')->nullable(); // url

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('president_id')->references('id')->on('legislators')->onDelete('cascade');
        });

        Schema::create('votings_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voting_id');
            $table->text('title');
            $table->string('original_id')->nullable(); // id

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voting_id')->references('id')->on('votings')->onDelete('cascade');
        });

        Schema::create('votings_votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voting_id');
            $table->enum('type', ['deputy', 'senator']); // al momento en que voto
            $table->unsignedBigInteger('legislator_id');
            $table->unsignedBigInteger('party_id'); // al momento en que voto
            $table->unsignedBigInteger('region_id'); // al momento en que voto
            $table->enum('vote', ['affirmative', 'negative', 'abstention'])->nullable(); // null => ausente
            $table->string('speech_url')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voting_id')->references('id')->on('votings')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('votings_records');
        Schema::dropIfExists('votings_votes');
        Schema::dropIfExists('votings');
        Schema::enableForeignKeyConstraints();
    }
}
