<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnAddNewColumnInQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
            $table->renameColumn('answer_time', 'recording_answer_time')->nullable();
            $table->renameColumn('waiting_time', 'befor_audio_waiting_time')->nullable();
            $table->integer('prepration_time')->after('waiting_time')->comment('prepration_time in seconds')->nullable();
            $table->smallInteger('max_time')->comment(' total time for question in seconds')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('prepration_time');
        });
    }
}
