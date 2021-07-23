<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tests', function (Blueprint $table) {
            //$table->integer('id');
            $table->increments('id');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->integer('test_id')->comment('Foreign key of generate_tests  table');
            $table->enum('status',['A','I','C'])->comment("A=assigned, I=Inprogress, C=completed");
            $table->dateTime('start_date');
            $table->dateTime('end_date');
        });
        //DB::statement("ALTER TABLE student_tests MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tests');
    }
}
