<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_session', function (Blueprint $table) {
            $table->integer('id');
            $table->tinyInteger('role_id')->comment('Foreign key of roles table');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        DB::statement("ALTER TABLE user_session CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE user_session MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_session');
    }
}
