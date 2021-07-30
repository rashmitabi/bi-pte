<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->string('question_title',255)->comment('Read Aloud,Repeat Sentence etc...');
            $table->tinyInteger('min_question')->nullable();
            $table->tinyInteger('max_question')->nullable();
            $table->float('score',8, 2)->nullable();
            $table->string('instructions',500)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_types');
    }
}
