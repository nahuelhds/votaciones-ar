<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SenatorsIntegration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votings', function (Blueprint $table) {
            $table->string('video_url')->nullable()->after('document_url');
            $table->string('file_url')->nullable()->after('document_url');
            $table->string('result_raw')->default('AFIRMATIVO')->after('result');
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
            $table->dropColumn('file_url');
            $table->dropColumn('video_url');
            $table->dropColumn('result_raw');
        });
    }
}
