<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            //$table->tinyInteger('id');
            $table->tinyIncrements('id');
            $table->string('role_name',100);
            $table->enum('status',['E','D'])->comment("E=enable , D=disable");
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        //DB::statement("ALTER TABLE roles CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        //DB::statement("ALTER TABLE roles MODIFY  id tinyint(4) AUTO_INCREMENT  PRIMARY KEY");

        DB::statement("CREATE OR REPLACE FUNCTION upd_timestamp() RETURNS TRIGGER 
                LANGUAGE plpgsql
                AS
                $$
                BEGIN
                    NEW.updated_at = CURRENT_TIMESTAMP;
                    RETURN NEW;
                END;
                $$");

        DB::statement("CREATE TRIGGER update_timestamp
          BEFORE UPDATE
          ON roles
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
        Schema::dropIfExists('roles');
    }
}
