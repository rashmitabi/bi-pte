<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_id');
            $table->string('razorpay_plan_id');
            $table->string('plan_name',200);
            $table->enum('plan_type',['M','Q','H','Y'])->comment('M - monthly|Q - Quarterly| H - Half yearly | Y - yearly');
            $table->integer('price');
            $table->text('razorpay_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
