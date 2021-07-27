<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('modules')->count();
        if($check < 1){
            DB::table('modules')->insert([
            	'id' => 1,
                'module_name' => "Add Student",
                'module_slug' => "add_student",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 2,
                'module_name' => "Add Mock Test",
                'module_slug' => "add_mock_test",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 3,
                'module_name' => "View Mock Test",
                'module_slug' => "mock_test",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 4,
                'module_name' => "Add Practice Test",
                'module_slug' => "add_practice_test",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 5,
                'module_name' => "View Practice Test",
                'module_slug' => "practice_test",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 7,
                'module_name' => "View Test Result",
                'module_slug' => "test_result",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 8,
                'module_name' => "Add Videos",
                'module_slug' => "add_video",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 9,
                'module_name' => "View Videos",
                'module_slug' => "video",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 10,
                'module_name' => "Add Prediction Files",
                'module_slug' => "add_prediction_file",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 11,
                'module_name' => "View Prediction Files",
                'module_slug' => "prediction_file",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 12,
                'module_name' => "Generate Certificates",
                'module_slug' => "add_test_reports",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 13,
                'module_name' => "View Certificates",
                'module_slug' => "test_reports",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 14,
                'module_name' => "View Activity Logs",
                'module_slug' => "activity_log",
                'status'=>'E'
            ]);
            DB::table('modules')->insert([
            	'id' => 15,
                'module_name' => "View Device Logs",
                'module_slug' => "device_log",
                'status'=>'E'
            ]);
        }
    }
}
