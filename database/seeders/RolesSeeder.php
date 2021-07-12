<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check = DB::table('roles')->count();
        if($check < 1){
            DB::table('roles')->insert([
            	'id' => 1,
                'role_name' => 'Super Admin',
                'status'=>'E'
            ]);
           
            DB::table('roles')->insert([
            	'id' => 2,
                'role_name' => 'Branch Admin',
                'status'=>'E'
            ]);

            DB::table('roles')->insert([
            	'id' => 3,
                'role_name' => 'Student',
                'status'=>'E'
            ]);

        }	
    }
}
?>