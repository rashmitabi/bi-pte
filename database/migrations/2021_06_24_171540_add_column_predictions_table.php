<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->integer('design_id')->after('section_id')->nullable();
        });
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropColumn('question_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropColumn('desgin_id');
        });
    }
}
