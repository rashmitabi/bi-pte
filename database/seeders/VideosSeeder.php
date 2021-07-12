<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check = DB::table('videos')->count();
        if($check < 1){
            DB::table('videos')->insert([
            	'id' => 1,
                'user_id' => '1',
                'section_id' => '1',
                'design_id' => 'Super Admin',
                'title' => 'Super Admin',
                'description' => 'Super Admin',
                'link' => 'Super Admin',
                'status'=>'E'
            ]);
        }
    }
}