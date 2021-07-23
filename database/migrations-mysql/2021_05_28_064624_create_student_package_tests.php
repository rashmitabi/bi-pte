<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPackageTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_package_tests', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('test_id')->comment('Foreign key of generate_tests table');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->date('expire_date')->comment('calculate seting table in field name student package validitiy');
            $table->integer('student_package_id')->comment('Foreign key of student_packages table');
            $table->dateTime('created_at')->useCurrent();
        });

        DB::statement("ALTER TABLE student_package_tests MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_package_tests');
    }
}
