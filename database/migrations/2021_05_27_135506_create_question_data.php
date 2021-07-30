<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->comment('Foreign key of questions table');
            $table->string('data_type',255)->comment('Option for dropdown,Audio,summery text,list for drag and drop,');
            $table->string('data_value',3000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_data');
    }
}
