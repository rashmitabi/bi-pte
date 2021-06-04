<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrediction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediction', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('user_id')->comment('Foreign key of generat users_info  table');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->tinyInteger('question_type_id')->comment('Foreign key of question_type table');
            $table->string('title',255);
            $table->string('description',1000);
            $table->string('link',255);
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE prediction CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE prediction MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prediction');
    }
}
