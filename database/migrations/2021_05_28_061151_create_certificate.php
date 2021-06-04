<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('student_user_id')->comment('Foreign key of users_info table');
            $table->integer('test_id')->comment('Foreign key of generat_test  table');
            $table->integer('generate_by_user_id')->comment('Foreign key of users_info table');
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

        DB::statement("ALTER TABLE certificate CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE certificate MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate');
    }
}
