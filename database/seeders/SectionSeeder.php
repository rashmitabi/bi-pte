<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $check = DB::table('sections')->count();
        if($check < 1){
            DB::table('sections')->insert([
                'id' => 1,
                'section_name' => 'reading',
                'image' => 'reading.png'
            ]);

            DB::table('sections')->insert([
                'id' => 2,
                'section_name' => 'listening',
                'image' => 'listening.jpg'
            ]);

            DB::table('sections')->insert([
                'id' => 3,
                'section_name' => 'writing',
                'image' => 'writing.png'
            ]);
            DB::table('sections')->insert([
                'id' => 4,
                'section_name' => 'speaking',
                'image' => 'speaking.png'
            ]);
             
        }
    }
}
