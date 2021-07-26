<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            // $table->bigInteger('id');
            $table->bigIncrements('id');
            $table->integer('test_id')->comment('Foreign key of generate_tests  table');
            $table->integer('user_id')->comment('Foreign key of users  table');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->tinyInteger('question_type_id')->comment('Foreign key of question_types table');
            $table->tinyInteger('subject_id')->comment('Foreign key of test subject table');
            $table->tinyInteger('get_score');
            $table->bigInteger('question_id')->comment('Foreign key of questions table');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        // DB::statement("ALTER TABLE test_results CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        // DB::statement("ALTER TABLE test_results MODIFY  id bigint(20) AUTO_INCREMENT  PRIMARY KEY");

        DB::statement("CREATE TRIGGER update_timestamp
          BEFORE UPDATE
          ON test_results
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
        Schema::dropIfExists('test_results');
    }
}
