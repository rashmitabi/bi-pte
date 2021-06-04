<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use App\User;
// use App\Roles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\GenerateTest::truncate();
        // \DB::table('roles')->delete();
    	$role = [
    		[
	            'role_name' => 'Super Admin',
	            'status' => 'E'
	        ],[
	            'role_name' => 'Branch Admin',
	            'status' => 'E'
	        ],[
	            'role_name' => 'Student',
	            'status' => 'E'
	        ]
    	];
        \DB::table('roles')->insert($role);

        // \DB::table('users')->delete();
        $users = [
        	[
	            'role_id' => 1,
	            'parent_user_id' => null,
	            'first_name' => 'admin',
	            'last_name' => 'admin',
	            'name' => 'superadmin',
	            'email' => 'superadmin@gmail.com',
	            'password' => '123',
	            'mobile_no' => '',
	            'date_of_birth' => null,
	            'profile_image' => '',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => null,
	            'country_citizen' => '',
	            'country_residence' => '',
	            'validity' => null,
	            'status' => 'A'
	        ],[
	            'role_id' => 2,
	            'parent_user_id' => null,
	            'first_name' => 'admin',
	            'last_name' => 'admin',
	            'name' => 'admin',
	            'email' => 'admin@gmail.com',
	            'password' => '123',
	            'mobile_no' => '',
	            'date_of_birth' => null,
	            'profile_image' => '',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => null,
	            'country_citizen' => '',
	            'country_residence' => '',
	            'validity' => null,
	            'status' => 'A'
        	],[
	            'role_id' => 3,
	            'parent_user_id' => 2,
	            'first_name' => 'student',
	            'last_name' => 'student',
	            'name' => 'student',
	            'email' => 'student@gmail.com',
	            'password' => '123',
	            'mobile_no' => '',
	            'date_of_birth' => null,
	            'profile_image' => '',
	            'ip_address' => '',
	            'latitude' => '',
	            'longitude' => '',
	            'gender' => null,
	            'country_citizen' => '',
	            'country_residence' => '',
	            'validity' => null,
	            'status' => 'A'
        	]
        ];
        \DB::table('users')->insert($users);
    }
}
