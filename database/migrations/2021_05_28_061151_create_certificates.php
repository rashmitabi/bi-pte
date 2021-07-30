<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_user_id')->comment('Foreign key of users table');
            $table->integer('test_id')->comment('Foreign key of generate_tests  table');
            $table->integer('generate_by_user_id')->comment('Foreign key of users table');
            $table->tinyInteger('score');
            $table->tinyInteger('speaking');
            $table->tinyInteger('listening');
            $table->tinyInteger('reading');
            $table->tinyInteger('writing');
            $table->tinyInteger('grammar');
            $table->tinyInteger('pronunciation');
            $table->tinyInteger('vocabulary');
            $table->tinyInteger('oral_fluency');
            $table->tinyInteger('spelling');
            $table->tinyInteger('written_discourse');
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
        Schema::dropIfExists('certificates');
    }
}
