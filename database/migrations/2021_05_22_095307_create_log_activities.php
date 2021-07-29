<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('log_activities', function (Blueprint $table) {
            $table->integer('id');
            $table->tinyInteger('role_id')->comment('Foreign key of roles table');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->string('subject',255);
            $table->string('message',1000);
            $table->string('ip_address',20);
            $table->string('latitude',20);
            $table->string('longitude',20);
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE log_activities CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE log_activities MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_activities');
    }
}
