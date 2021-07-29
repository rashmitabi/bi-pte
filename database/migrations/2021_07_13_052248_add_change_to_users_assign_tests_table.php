<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangeToUsersAssignTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_assign_tests', function (Blueprint $table) {
            $table->dateTime('created_at')->useCurrent()->change();
            
        });
        
        DB::statement("ALTER TABLE users_assign_tests
        CHANGE `created_at` `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
        CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_assign_tests', function (Blueprint $table) {
            //
        });
    }
}
