<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeQuestionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_question_data', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('practice_question_id')->comment('Foreign key of practice questions table');
            $table->string('data_type',255)->comment('Option for dropdown,Audio,summery text,list for drag and drop,');
            $table->string('data_value',3000);
        });

        DB::statement("ALTER TABLE practice_question_data MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_question_data');
    }
}
