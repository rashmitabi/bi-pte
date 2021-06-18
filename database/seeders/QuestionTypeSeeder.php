<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $readings = [
                        'Reading and Writing:Fill in the blanks(1)',
                        'Reading and Writing:Fill in the blanks(2)',
                        'Reading and Writing:Fill in the blanks(3)',
                        'Reading and Writing:Fill in the blanks(4)',
                        'Reading and Writing:Fill in the blanks(5)',
                        'Multiple-choice,Choose multiple answers(6)',
                        'Multiple-choice,Choose multiple answers(7)',
                        'Re-order Paragraphs(8)',
                        'Re-order Paragraphs(9)',
                        'Reading:Fill in the blanks(10)',
                        'Reading:Fill in the blanks(11)',
                        'Reading:Fill in the blanks(12)',
                        'Reading:Fill in the blanks(13)',
                        'Multiple-choice,choose single answers(14)',
                        'Multiple-choice,choose single answers(15)'
                    ];
        $listings  = [
                        'Summarize Spoken item (1-2)',
                        'Choose Multiple answers item (3-4)',
                        'Fill in the blanks (5-6)',
                        'Highlight correct summary item (7-8)',
                        'Multiple-choice,choose single answers item (9-10)',
                        'Select missing word item (11-12)',
                        'Highlight Incorrect Word (13-14)',
                        'Write Form Dictations (15-17)'
                    ];
        $writings = [
                        'Writing Instruction',
                        'Summarize Written',
                        'Essay Writing'
                    ];
        $speakings = [
                        'Speaking Instruction',
                        'Read Aloud',
                        'Repeat Sentence',
                        'Describe Image',
                        'Re-tell lecture',
                        'Answer-short Question',
                        'Update Audio Time'
                    ];
        foreach($readings as $reading)
        {
            DB::table('question_types')->insert([
                'section_id' =>'1',
                'question_title'=>$reading
            ]);
        }
        foreach($listings as $listing)
        {
            DB::table('question_types')->insert([
                'section_id' =>'2',
                'question_title'=>$listing
            ]);
        }
        foreach($writings as $writing)
        {
            DB::table('question_types')->insert([
                'section_id' =>'3',
                'question_title'=>$writing
            ]);
        }
        foreach($speakings as $speaking)
        {
            DB::table('question_types')->insert([
                'section_id' =>'4',
                'question_title'=>$speaking
            ]);
        }
    }
}
