<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->tinyInteger('speaking');
            $table->tinyInteger('listening');
            $table->tinyInteger('reading');
            $table->tinyInteger('writing');
            $table->tinyInteger('mock');
            $table->float('total_amount',8,2);
            $table->integer('payment_id')->comment('Foreign key of users_payments table');
            $table->dateTime('created_at')->useCurrent();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_packages');
    }
}
