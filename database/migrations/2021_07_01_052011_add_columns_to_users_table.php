<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name',100)->nullable()->change();
            $table->string('last_name',100)->nullable()->change();
            $table->string('password',255)->nullable()->change();
            $table->string('country_citizen',255)->nullable()->change();
            $table->string('country_residence',255)->nullable()->change();
            $table->string('state',100)->nullable()->after('status');
            $table->string('state_code',100)->nullable()->after('state');
            $table->string('gstin',100)->nullable()->after('state_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('state_code');
            $table->dropColumn('gstin');
        });
    }
}
