<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleHasPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->tinyInteger('role_id')->comment('Foreign key of roles table');
            $table->tinyInteger('module_id')->comment('Foreign key of module table');
            $table->string('slug',255);
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        
        DB::statement("ALTER TABLE role_has_permissions CHANGE `updated_at` `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP");
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_permissions');
    }
}
