<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_payments', function (Blueprint $table) {
            //$table->bigInteger('id');
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('Foreign key of users table');
            $table->float('amount',8, 2);
            $table->string('payment_method',255);
            $table->string('trancation_id',255);
            $table->enum('status',['P','C'])->comment("P=pending , C=complete");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        // DB::statement("ALTER TABLE users_payments CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        // DB::statement("ALTER TABLE users_payments MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
        DB::statement("CREATE TRIGGER update_timestamp
          BEFORE UPDATE
          ON users_payments
          FOR EACH ROW
          EXECUTE PROCEDURE upd_timestamp()");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_payments');
    }
}
