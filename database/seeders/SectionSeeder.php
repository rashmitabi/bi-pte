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
        $data = ['reading','listening','writing','speaking'];
        $check = DB::table('sections')->count();
        if($check < 1){
            foreach($data as $section)
            {
                DB::table('sections')->insert([
                    'section_name' => $section
                ]); 
            }  
        }
    }
}
