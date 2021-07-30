<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullToInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institues', function (Blueprint $table) {
             $table->smallInteger('mock_tests_allowed')->nullable()->change();
            $table->smallInteger('practice_tests_allowed')->nullable()->change();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institues', function (Blueprint $table) {
            //
        });
    }
}
