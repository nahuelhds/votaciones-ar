<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VotingsCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votings', function (Blueprint $table) {
            $table->integer('absent_count')->after('president_id');
            $table->integer('abstention_count')->after('president_id');
            $table->integer('negative_count')->after('president_id');
            $table->integer('affirmative_count')->after('president_id');
            $table->string('document_url')->after('result')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votings', function (Blueprint $table) {
            $table->dropColumn('affirmative_count');
            $table->dropColumn('negative_count');
            $table->dropColumn('abstention_count');
            $table->dropColumn('absent_count');
            $table->dropColumn('document_url');
        });
    }
}
