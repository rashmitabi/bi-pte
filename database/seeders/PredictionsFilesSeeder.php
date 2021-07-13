<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PredictionsFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check = DB::table('predictions')->count();
        if($check < 1){
            DB::table('predictions')->insert([
            	'id' => 1,
                'user_id' => 1,
                'section_id' => 1,
                'design_id' => 1,
                'title' => 'Reading and Writing:Fill in the blanks',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
            DB::table('predictions')->insert([
            	'id' => 2,
                'user_id' => 1,
                'section_id' => 1,
                'design_id' => 2,
                'title' => 'Multiple-choice,Choose multiple answers',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
            

            //listening
            DB::table('predictions')->insert([
            	'id' => 3,
                'user_id' => 1,
                'section_id' => 2,
                'design_id' => 6,
                'title' => 'Summarize Spoken item',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
            DB::table('predictions')->insert([
            	'id' => 4,
                'user_id' => 1,
                'section_id' => 2,
                'design_id' => 7,
                'title' => 'Choose Multiple answers item',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);

            //writing
            DB::table('predictions')->insert([
            	'id' => 5,
                'user_id' => 1,
                'section_id' => 3,
                'design_id' => 14,
                'title' => 'Summarize Written',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
            DB::table('predictions')->insert([
            	'id' => 6,
                'user_id' => 1,
                'section_id' => 3,
                'design_id' => 15,
                'title' => 'Essay Writing',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);

            //speaking
            DB::table('predictions')->insert([
            	'id' => 7,
                'user_id' => 1,
                'section_id' => 4,
                'design_id' => 16,
                'title' => 'Read Aloud',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
            DB::table('predictions')->insert([
            	'id' => 8,
                'user_id' => 1,
                'section_id' => 4,
                'design_id' => 17,
                'title' => 'Repeat Sentence',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);


            // Branch admin Add predication files
             DB::table('predictions')->insert([
                'id' => 9,
                'user_id' => 2,
                'section_id' => 1,
                'design_id' => 1,
                'title' => 'Reading and Writing:Fill in the blanks',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
            DB::table('predictions')->insert([
                'id' => 10,
                'user_id' => 2,
                'section_id' => 1,
                'design_id' => 2,
                'title' => 'Multiple-choice,Choose multiple answers',
                'description' => 'Added by Super Admin',
                'link' => 'files/predictions/1625919335_Answer_short_questions_1-14-04-2021.docx',
                'status'=>'E'
            ]);
        }
    }
}