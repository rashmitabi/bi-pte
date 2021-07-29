<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('subscription', function (Blueprint $table) {
        //     $table->tinyInteger('id');
        //     $table->tinyInteger('role_id')->comment('Foreign key of roles table');
        //     $table->string('title',255);
        //     $table->float('price',8, 2);
        //     $table->string('description',500);
        //     $table->tinyInteger('days');
        //     $table->enum('status',['E','D'])->comment("E=enable , D=disable");
        //     $table->dateTime('created_at')->useCurrent();
        //     $table->timestamp('updated_at')->nullable();
        // });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->tinyInteger('role_id')->comment('Foreign key of roles table');
            $table->string('title',255);
            $table->tinyInteger('students_allowed')->comment('No. of students allowed, 0 if unlimited');
            $table->string('description',500);
            $table->float('monthly_price',8, 2);
            $table->float('quarterly_price',8, 2);
            $table->float('halfyearly_price',8, 2);
            $table->float('annually_price',8, 2);
            $table->float('white_labelling_price',8, 2);
            $table->tinyInteger('mock_tests')->comment('No of mock tests allowed');
            $table->tinyInteger('practice_tests')->comment('No of practice tests allowed');
            $table->tinyInteger('practice_questions')->comment('No of practice questions allowed');
            $table->enum('videos',['Y','N'])->default('Y')->comment('Y=yes, N=no If can add videos or not, default = y');
            $table->enum('prediction_files',['Y','N'])->default('Y')->comment('Y=yes , N=no If can add prediction files or not, default = y');
            $table->enum('status',['E','D'])->comment('E=enable , D=disable');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE subscriptions CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE subscriptions MODIFY  id tinyint(4) AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
