<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_data', function (Blueprint $table) {
            //$table->bigInteger('id');
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->comment('Foreign key of questions table');
            $table->string('answer_type',255)->comment('correct Option,keywords,list of correct Order');
            $table->string('answer_value',3000);
            $table->string('sample_answer',1000);
        });
        //DB::statement("ALTER TABLE answer_data MODIFY  id bigint(20)  AUTO_INCREMENT  PRIMARY KEY");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_data');
    }
}
