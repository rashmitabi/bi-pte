<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('test_name',255);
            $table->tinyInteger('subject_id')->comment('Foreign key of test subjects table');
            $table->integer('generated_by_user_id')->comment('Foreign key of users table');
            $table->tinyInteger('generated_by_role_id')->comment('Foreign key of roles table');
            $table->enum('type',['M','P'])->comment('M=Mock test,P=Practices test');
            $table->enum('free_test',['Y','N'])->comment("Y=yes, N=no (default = no) - only superadmin can manage this field");
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->date('expired_date');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generate_tests');
    }
}
