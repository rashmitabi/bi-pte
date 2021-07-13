<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class QuestionDesignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('question_designs')->count();
        if($check < 1){
            //section one start
            DB::table('question_designs')->insert([
                'id' => 1,
                'section_id' => 1,
                'design_name'=>'Reading and Writing:Fill in the blanks',
                'file_name'=>'reading_and_writing_fill_in_the_blanks'
            ]);
            DB::table('question_designs')->insert([
                'id' => 2,
                'section_id' => 1,
                'design_name'=>'Multiple-choice,Choose multiple answers',
                'file_name'=>'multiple_choice_choose_multiple_answers'
            ]);
            DB::table('question_designs')->insert([
                'id' => 3,
                'section_id' => 1,
                'design_name'=>'Re-order Paragraphs',
                'file_name'=>'re_order_paragraphs'
            ]);
            DB::table('question_designs')->insert([
                'id' => 4,
                'section_id' => 1,
                'design_name'=>'Reading:Fill in the blanks',
                'file_name'=>'reading_fill_in_the_blanks'
            ]);
            DB::table('question_designs')->insert([
                'id' => 5,
                'section_id' => 1,
                'design_name'=>'Multiple-choice,choose single answers',
                'file_name'=>'multiple_choice_choose_single_answers'
            ]);
            //section one end

            //section two start
            DB::table('question_designs')->insert([
                'id' => 6,
                'section_id' => 2,
                'design_name'=>'Summarize Spoken item',
                'file_name'=>'summarize_spoken_item'
            ]);
            DB::table('question_designs')->insert([
                'id' => 7,
                'section_id' => 2,
                'design_name'=>'Choose Multiple answers item',
                'file_name'=>'choose_multiple_answers_item'
            ]);
            DB::table('question_designs')->insert([
                'id' => 8,
                'section_id' => 2,
                'design_name'=>'Fill in the blanks',
                'file_name'=>'fill_in_the_blanks'
            ]);
            DB::table('question_designs')->insert([
                'id' => 9,
                'section_id' => 2,
                'design_name'=>'Highlight correct summary item',
                'file_name'=>'highlight_correct_summary_item'
            ]);
            DB::table('question_designs')->insert([
                'id' => 10,
                'section_id' => 2,
                'design_name'=>'Multiple-choice,choose single answers item',
                'file_name'=>'multiple_choice_choose_single_answers_item'
            ]);
            DB::table('question_designs')->insert([
                'id' => 11,
                'section_id' => 2,
                'design_name'=>'Select missing word item (11-12)',
                'file_name'=>'select_missing_word_item'
            ]);
            DB::table('question_designs')->insert([
                'id' => 12,
                'section_id' => 2,
                'design_name'=>'Highlight Incorrect Word (13-14)',
                'file_name'=>'highlight_incorrect_word'
            ]);
            DB::table('question_designs')->insert([
                'id' => 13,
                'section_id' => 2,
                'design_name'=>'Write Form Dictations',
                'file_name'=>'write_form_dictations'
            ]);
            //section two end

            //section three start
           
            DB::table('question_designs')->insert([
                'id' => 14,
                'section_id' => 3,
                'design_name'=>'Summarize Written',
                'file_name'=>'summarize_written'
            ]);
            DB::table('question_designs')->insert([
                'id' => 15,
                'section_id' => 3,
                'design_name'=>'Essay Writing',
                'file_name'=>'essay_writing'
            ]);
            //section three end

            //section four start
           
            DB::table('question_designs')->insert([
                'id' => 16,
                'section_id' => 4,
                'design_name'=>'Read Aloud',
                'file_name'=>'read_aloud'
            ]);
            DB::table('question_designs')->insert([
                'id' => 17,
                'section_id' => 4,
                'design_name'=>'Repeat Sentence',
                'file_name'=>'repeat_sentence'
            ]);
            DB::table('question_designs')->insert([
                'id' => 18,
                'section_id' => 4,
                'design_name'=>'Describe Image',
                'file_name'=>'describe_image'
            ]);
            DB::table('question_designs')->insert([
                'id' => 19,
                'section_id' => 4,
                'design_name'=>'Re-tell lecture',
                'file_name'=>'re_tell_lecture'
            ]);
            DB::table('question_designs')->insert([
                'id' => 20,
                'section_id' => 4,
                'design_name'=>'Answer-short Question',
                'file_name'=>'answer_short_question'
            ]);

            //section four start
        }
    }
}
