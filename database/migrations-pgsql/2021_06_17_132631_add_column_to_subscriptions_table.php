<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->smallInteger('mock_tests')->comment('No of mock tests allowed')->change();
            $table->smallInteger('practice_tests')->comment('No of practice tests allowed')->change();
            $table->smallInteger('practice_questions')->comment('No of practice questions allowed')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {

        });
    }
}
