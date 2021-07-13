<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check = DB::table('users')->count();
        if($check < 1){
        	//super admin
        	DB::table('users')->insert([
        		'id' => 1,
            	'role_id' => 1,
	            'parent_user_id' => null,
	            'first_name' => 'Superadmin',
	            'last_name' => 'Superadmin',
	            'name' => 'Superadmin',
	            'email' => 'superadmin@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '8780295566',
	            'date_of_birth' => null,
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => null,
	            'country_citizen' => '',
	            'country_residence' => '',
	            'validity' => null,
	            'status' => 'A'
	        ]);

	        //branch admin
        	DB::table('users')->insert([
        		'id' => 2,
	        	'role_id' => 2,
	            'parent_user_id' => 1,
	            'first_name' => 'branchadmin',
	            'last_name' => 'branchadmin',
	            'name' => 'branchadmin',
	            'email' => 'branchadmin@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '8780295566',
	            'date_of_birth' => '1995-05-29',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'M',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
        	//child table in insert record
        	DB::table('institues')->insert([
        		'id' => 1,
        		'user_id' =>2,
        		'sub_domain' => 'http://pte.bi-team.in/',
        		'domain' => 'http://pte.bi-team.in/',
        		'students_allowed' => '50',
        		'logo' => 'logo.png',
        		'banner_image' => 'banner.png',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y',
        		'welcome_message' => 'Hi',
        		'country_phone_code' => '91',
        		'phone_number' => '8780295566',
        		'institute_name' => 'branchadmin institute',
        		'white_labelling' => 'N'
        	]);


	        //student admin
        	DB::table('users')->insert([
        		'id' => 3,
	        	'role_id' => 3,
	            'parent_user_id' => 2,
	            'first_name' => 'student1',
	            'last_name' => 'student1',
	            'name' => 'student1',
	            'email' => 'student1@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '978295577',
	            'date_of_birth' => '1987-06-05',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('student_details')->insert([
        		'id' => 1,
        		'user_id' =>3,
        		'address' => '-',
        		'user_interests' => '-',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y'
        	]);

	        DB::table('users')->insert([
        		'id' => 4,
	        	'role_id' => 3,
	            'parent_user_id' => 2,
	            'first_name' => 'student2',
	            'last_name' => 'student2',
	            'name' => 'student2',
	            'email' => 'student2@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '969995577',
	            'date_of_birth' => '1982-06-05',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('student_details')->insert([
        		'id' => 2,
        		'user_id' =>4,
        		'address' => '-',
        		'user_interests' => '-',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y'
        	]);


	        DB::table('users')->insert([
        		'id' => 5,
	        	'role_id' => 3,
	            'parent_user_id' => 2,
	            'first_name' => 'student3',
	            'last_name' => 'student3',
	            'name' => 'student3',
	            'email' => 'student3@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '889995577',
	            'date_of_birth' => '1984-06-08',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('student_details')->insert([
        		'id' => 3,
        		'user_id' =>5,
        		'address' => '-',
        		'user_interests' => '-',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y'
        	]);

	        //second branch admin
        	DB::table('users')->insert([
        		'id' => 6,
	        	'role_id' => 2,
	            'parent_user_id' => 1,
	            'first_name' => 'branchadmin2',
	            'last_name' => 'branchadmin2',
	            'name' => 'branchadmin2',
	            'email' => 'branchadmin2@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '9988295566',
	            'date_of_birth' => '1995-05-04',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('institues')->insert([
        		'id' => 2,
        		'user_id' =>6,
        		'sub_domain' => 'http://pte.bi-team.in/',
        		'domain' => 'http://pte.bi-team.in/',
        		'students_allowed' => '50',
        		'logo' => 'logo.png',
        		'banner_image' => 'banner.png',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y',
        		'welcome_message' => 'Hi',
        		'country_phone_code' => '91',
        		'phone_number' => '9988295566',
        		'institute_name' => 'branchadmin2 institute',
        		'white_labelling' => 'N'
        	]);

	        //second student admin
        	DB::table('users')->insert([
        		'id' => 7,
	        	'role_id' => 3,
	            'parent_user_id' => 6,
	            'first_name' => 'student4',
	            'last_name' => 'student4',
	            'name' => 'student4',
	            'email' => 'student4@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '978295577',
	            'date_of_birth' => '1987-06-05',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('student_details')->insert([
        		'id' => 4,
        		'user_id' =>7,
        		'address' => '-',
        		'user_interests' => '-',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y'
        	]);

	        DB::table('users')->insert([
        		'id' => 8,
	        	'role_id' => 3,
	            'parent_user_id' => 6,
	            'first_name' => 'student5',
	            'last_name' => 'student5',
	            'name' => 'student5',
	            'email' => 'student5@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '969995577',
	            'date_of_birth' => '1982-06-05',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('student_details')->insert([
        		'id' => 5,
        		'user_id' =>8,
        		'address' => '-',
        		'user_interests' => '-',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y'
        	]);

	        DB::table('users')->insert([
        		'id' => 9,
	        	'role_id' => 3,
	            'parent_user_id' => 6,
	            'first_name' => 'student6',
	            'last_name' => 'student6',
	            'name' => 'student6',
	            'email' => 'student6@gmail.com',
	            'password' => '$2y$10$783PDgbQeC7dPYtjtYWoPeRmSRNs.Xlbnvq2JO0qPD4pAn1QPa8GW',
	            'mobile_no' => '889995577',
	            'date_of_birth' => '1984-06-08',
	            'profile_image' => 'default.png',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => 'F',
	            'country_citizen' => 'india',
	            'country_residence' => 'india',
	            'validity' => date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s') . " +1 year")),
	            'status' => 'A'
	        ]);
	        //child table in insert record
        	DB::table('student_details')->insert([
        		'id' => 6,
        		'user_id' =>9,
        		'address' => '-',
        		'user_interests' => '-',
        		'show_admin_videos' => 'Y',
        		'show_admin_tests' => 'Y',
        		'show_admin_files' => 'Y',
        		'show_practice_questions' => 'Y'
        	]);
        }
    }

}?>