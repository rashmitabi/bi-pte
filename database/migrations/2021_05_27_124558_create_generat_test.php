<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generat_test', function (Blueprint $table) {
            $table->integer('id');
            $table->string('test_name',255);
            $table->tinyInteger('subject_id')->comment('Foreign key of test subject table');
            $table->integer('generated_by_user_id')->comment('Foreign key of users_info table');
            $table->tinyInteger('generated_by_role_id')->comment('Foreign key of roles table');
            $table->enum('type',['M','P'])->comment('M=Mock test,P=Practices test');
            $table->enum('free_test',['Y','N'])->comment("Y=yes, N=no (default = no) - only superadmin can manage this field");
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->date('expired_date');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::statement("ALTER TABLE generat_test CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        DB::statement("ALTER TABLE generat_test MODIFY  id INT AUTO_INCREMENT  PRIMARY KEY");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generat_test');
    }
}
