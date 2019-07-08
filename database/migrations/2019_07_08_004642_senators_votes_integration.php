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
            $table->string('vote_raw')->default('AFIRMATIVO')->after('vote');
            $table->string('photo_url')->nullable()->after('video_url');
            $table->string('profile_url')->nullable()->after('video_url');
        });

        Schema::table('legislators', function (Blueprint $table) {
            $table->timestamp('last_activity_at')->nullable()->after('region_id');
        });

        Schema::table('parties', function (Blueprint $table) {
            $table->timestamp('last_activity_at')->nullable()->after('name');
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
            $table->dropColumn('photo_url');
            $table->dropColumn('profile_url');
        });

        Schema::table('legislators', function (Blueprint $table) {
            $table->dropColumn('last_activity_at');
        });

        Schema::table('parties', function (Blueprint $table) {
            $table->dropColumn('last_activity_at');
        });
    }
}
