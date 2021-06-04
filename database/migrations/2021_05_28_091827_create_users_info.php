<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->integer('id');
            $table->tinyInteger('role_id')->comment('Foreign key of roles table');
            $table->integer('parent_user_id')->comment('Self join with parent id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100)->unique();
            $table->string('user_name',100)->unique();
            $table->string('password',50);
            $table->string('mobile_no',20);
            $table->date('date_of_birth');
            $table->string('profile_image',255);
            $table->string('ip_address',20);
            $table->string('latitude',20);
            $table->string('longitude',20);
            $table->enum('gender',['M','F','O'])->comment('M=male,F=female,O=other');
            $table->string('country_citizen',255);
            $table->string('country_residence',255);
            $table->dateTime('validity');
            $table->enum('status',['P','A','R'])->comment('P=pending,A=active,R=reject');
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        
        DB::statement("ALTER TABLE users_info CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE users_info MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_info');
    }
}
