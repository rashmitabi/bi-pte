<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->string('address',255);
            $table->string('user_interests',255);
            $table->enum('show_admin_videos',['Y','N'])->comment('Y=yes,N=no');
            $table->enum('show_admin_tests',['Y','N'])->comment('Y=yes,N=no');
            $table->enum('show_admin_files',['Y','N'])->comment('Y=yes,N=no');
            $table->enum('show_practice_questions',['Y','N'])->comment('Y=yes,N=no');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        
        DB::statement("ALTER TABLE student_details CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE student_details MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
