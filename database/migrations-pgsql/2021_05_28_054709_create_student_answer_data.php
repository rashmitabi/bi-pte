<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAnswerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_answer_data', function (Blueprint $table) {
            //$table->bigInteger('id');
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->comment('Foreign key of questions table');
            $table->string('answer_type',255)->comment('correct Option,keywords,list of correct Order');
            $table->string('answer_value',3000);
            $table->tinyInteger('time_taken')->comment('time in seconds');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        // DB::statement("ALTER TABLE student_answer_data CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        // DB::statement("ALTER TABLE student_answer_data MODIFY  id bigint(20)  AUTO_INCREMENT  PRIMARY KEY");
        DB::statement("CREATE TRIGGER update_timestamp
          BEFORE UPDATE
          ON student_answer_data
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
        Schema::dropIfExists('student_answer_data');
    }
}
