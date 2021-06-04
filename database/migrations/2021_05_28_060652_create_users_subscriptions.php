<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_subscriptions', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->tinyInteger('subscription_id')->comment('Foreign key of subscriptions table');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('payment_id')->comment('Foreign key of users payments table');
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE users_subscriptions CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE users_subscriptions MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_subscriptions');
    }
}
