<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_questions', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('user_id')->comment('Foreign key of users_info table');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->tinyInteger('design_id')->comment('Foreign key of question_design table');
            $table->tinyInteger('question_type_id')->comment('Foreign key of question_type table');
            $table->string('name',500);
            $table->string('short_desc',1000);
            $table->string('desc',2000);
            $table->Integer('unique_number');
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->tinyInteger('marks');
            $table->tinyInteger('waiting_time');
            $table->tinyInteger('max_time');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE practice_questions CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE practice_questions MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_questions');
    }
}
