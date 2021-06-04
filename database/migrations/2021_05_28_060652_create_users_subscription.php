<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_subscription', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('user_id')->comment('Foreign key of users_info table');
            $table->tinyInteger('subscription_id')->comment('Foreign key of subscription table');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('payment_id')->comment('Foreign key of payment table');
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE users_subscription CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE users_subscription MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_subscription');
    }
}
