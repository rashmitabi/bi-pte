<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            //$table->bigInteger('id');
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('Foreign key of generat users  table');
            $table->tinyInteger('section_id')->comment('Foreign key of sections table');
            $table->tinyInteger('question_type_id')->comment('Foreign key of question_types table');
            $table->string('title',255);
            $table->string('description',1000);
            $table->string('link',255);
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        // DB::statement("ALTER TABLE predictions CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        // DB::statement("ALTER TABLE predictions MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
        DB::statement("CREATE TRIGGER update_timestamp
          BEFORE UPDATE
          ON predictions
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
        Schema::dropIfExists('predictions');
    }
}
