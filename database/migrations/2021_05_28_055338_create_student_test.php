<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_test', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->comment('Foreign key of users_info table');
            $table->integer('test_id')->comment('Foreign key of generat_test  table');
            $table->enum('status',['A','I','C'])->comment("A=assigned, I=Inprogress, C=completed");
            $table->dateTime('start_date');
            $table->dateTime('end_date');
        });
        DB::statement("ALTER TABLE student_test MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_test');
    }
}
