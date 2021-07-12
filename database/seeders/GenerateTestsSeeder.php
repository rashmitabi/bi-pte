<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GenerateTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check = DB::table('test_subjects')->count();
        if($check < 1){
        	DB::table('test_subjects')->insert([
        		'id' => 1,
        		'subject_name' => 'Test Subject',
        		'status' => 'E'
        	]);

        	DB::table('test_subjects')->insert([
        		'id' => 2,
        		'subject_name' => 'Test Subject1',
        		'status' => 'D'
        	]);

	    	//before insert child row add subject table in entry 
	    	$check = DB::table('generate_tests')->count();
	        if($check < 1){
	            DB::table('generate_tests')->insert([
	            	'id' => 1,
	                'test_name' => 'Mock Test',
	                'subject_id'=> 1,
	                'generated_by_user_id' => 1,
	                'generated_by_role_id' => 1,
	                'type' => 'M',
	                'free_test' => 'Y',
	                'status' => 'E',
	                'expired_date' => date('Y-m-d',strtotime(date('Y-m-d') . " +1 year")),
	                'image' => ''
	            ]);
	           
	            DB::table('generate_tests')->insert([
	            	'id' => 2,
	                'test_name' => 'Practice Test',
	                'subject_id'=> 1,
	                'generated_by_user_id' => 1,
	                'generated_by_role_id' => 1,
	                'type' => 'P',
	                'free_test' => 'Y',
	                'status' => 'E',
	                'expired_date' => date('Y-m-d',strtotime(date('Y-m-d') . " +1 year")),
	                'image' => ''
	            ]);

	            DB::table('generate_tests')->insert([
	            	'id' => 3,
	                'test_name' => 'Mock Test2',
	                'subject_id'=> 1,
	                'generated_by_user_id' => 1,
	                'generated_by_role_id' => 1,
	                'type' => 'M',
	                'free_test' => 'Y',
	                'status' => 'E',
	                'expired_date' => date('Y-m-d',strtotime(date('Y-m-d') . " +1 year")),
	                'image' => ''
	            ]);

	        }	
	    }
    }

}
?>