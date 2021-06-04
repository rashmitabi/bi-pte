<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->integer('test_id')->comment('Foreign key of generat test  table');
            $table->tinyInteger('design_id')->comment('Foreign key of generat question_design  table');
            $table->tinyInteger('question_type_id')->comment('Foreign key of question_type table');
            $table->string('name',500);
            $table->string('short_desc',1000);
            $table->string('desc',5000);
            $table->tinyInteger('order');
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->tinyInteger('marks');
            $table->tinyInteger('answer_time');
            $table->tinyInteger('waiting_time');
            $table->tinyInteger('max_time');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE question CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE question MODIFY  id bigint(20)  AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
