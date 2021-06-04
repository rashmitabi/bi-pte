<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_log', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->comment('Foreign key of users_info table');
            $table->string('browser_name',255);
            $table->string('device_name',255);
            $table->string('ip_address',20);
            $table->timestamp('login_time');
            $table->enum('status',['Y','N'])->comment("Y=yes , N=no");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE device_log CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE device_log MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_log');
    }
}
