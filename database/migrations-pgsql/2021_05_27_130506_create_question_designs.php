<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionDesigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_designs', function (Blueprint $table) {
            //$table->tinyInteger('id');
            $table->tinyIncrements('id');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->string('design_name',255);
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        // DB::statement("ALTER TABLE question_designs CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        // DB::statement("ALTER TABLE question_designs MODIFY  id tinyint(4) AUTO_INCREMENT  PRIMARY KEY");
        DB::statement("CREATE TRIGGER update_timestamp
          BEFORE UPDATE
          ON question_designs
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
        Schema::dropIfExists('question_designs');
    }
}
