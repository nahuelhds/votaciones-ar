<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SenatorsVotesIntegration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('votings_votes', function (Blueprint $table) {
            $table->string('vote_raw')->nullable()->after('vote');
        });

        Schema::table('legislators', function (Blueprint $table) {
            $table->bigInteger('original_id')->unsigned()->nullable()->after('region_id');
            $table->string('photo_url')->nullable()->after('region_id');
            $table->string('profile_url')->nullable()->after('region_id');
            $table->timestamp('last_activity_at')->nullable()->after('region_id');
            $table->timestamp('first_activity_at')->nullable()->after('region_id');
        });

        Schema::table('parties', function (Blueprint $table) {
            $table->timestamp('last_activity_at')->nullable()->after('name');
            $table->timestamp('first_activity_at')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votings_votes', function (Blueprint $table) {
            $table->dropColumn('vote_raw');
        });

        Schema::table('legislators', function (Blueprint $table) {
            $table->dropColumn('first_activity_at');
            $table->dropColumn('last_activity_at');
            $table->dropColumn('photo_url');
            $table->dropColumn('profile_url');
            $table->dropColumn('original_id');
        });

        Schema::table('parties', function (Blueprint $table) {
            $table->dropColumn('first_activity_at');
            $table->dropColumn('last_activity_at');
        });
    }
}
