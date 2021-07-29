<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToInstituesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institues', function (Blueprint $table) {
            $table->smallInteger('mock_tests_allowed')->after('students_allowed');
            $table->smallInteger('practice_tests_allowed')->after('students_allowed');
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
            $table->dropColumn('mock_tests_allowed');
            $table->dropColumn('practice_tests_allowed');
        });
    }
}
