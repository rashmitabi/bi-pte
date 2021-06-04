<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institue', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->comment('Foreign key of users_info table');
            $table->string('sub_domain',255);
            $table->string('domain',255);
            $table->tinyInteger('students_allowed');
            $table->string('logo',100)->comment('File url / path');
            $table->string('banner_image',100)->comment('File url / path');
            $table->enum('show_admin_videos',['Y','N'])->comment('Y=yes,N=no');
            $table->enum('show_admin_tests',['Y','N'])->comment('Y=yes,N=no');
            $table->enum('show_admin_files',['Y','N'])->comment('Y=yes,N=no');
            $table->enum('show_practice_questions',['Y','N'])->comment('Y=yes,N=no');
            $table->string('welcome_message',500);
            $table->string('country_phone_code',5);
            $table->string('phone_number',20);
            $table->string('institute_name',255);
            $table->enum('white_labelling',['Y','N'])->default("N")->comment('Y=yes,N=no');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        
        DB::statement("ALTER TABLE institue CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE institue MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institue');
    }
}
