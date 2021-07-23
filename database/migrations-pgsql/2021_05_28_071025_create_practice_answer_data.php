<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeAnswerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_answer_data', function (Blueprint $table) {
            //$table->integer('id');
            $table->increments('id');
            $table->integer('practice_question_id')->comment('Foreign key of practice questions table');
            $table->string('answer_type',255)->comment('correct Option,keywords,list of correct Order');
            $table->string('answer_value',3000);
            $table->tinyInteger('answer_time')->comment('time in seconds');
            $table->string('sample_answer',1000);
        });

        //DB::statement("ALTER TABLE practice_answer_data MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_answer_data');
    }
}
