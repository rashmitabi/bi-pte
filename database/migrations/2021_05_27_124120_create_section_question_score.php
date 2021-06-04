<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionQuestionScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_question_score', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->tinyInteger('question_type_id')->comment('Foreign key of question_type table');
            $table->tinyInteger('score_division');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE section_question_score CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE section_question_score MODIFY  id tinyint(4) AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_question_score');
    }
}
