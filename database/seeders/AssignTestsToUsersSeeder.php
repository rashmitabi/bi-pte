<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AssignTestsToUsersSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check = DB::table('users_assign_tests')->count();
        if($check < 1){
            DB::table('users_assign_tests')->insert([
            	'id' => 1,
                'user_id' => 3,
                'mock_test_id'=>'1',
                'practise_test_id' => '2'
            ]);
           
            DB::table('users_assign_tests')->insert([
            	'id' => 2,
                'user_id' => 4,
                'mock_test_id'=>'1',
                'practise_test_id' => '2'
            ]);

            DB::table('users_assign_tests')->insert([
            	'id' => 3,
                'user_id' => 5,
                'mock_test_id'=>'1',
                'practise_test_id' => '2'
            ]);

            

        }	
    }
}
?>