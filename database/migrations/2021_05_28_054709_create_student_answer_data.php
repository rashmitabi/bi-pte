<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAnswerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_answer_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->comment('Foreign key of questions table');
            $table->string('answer_type',255)->comment('correct Option,keywords,list of correct Order');
            $table->string('answer_value',3000);
            $table->tinyInteger('time_taken')->comment('time in seconds');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_answer_data');
    }
}
