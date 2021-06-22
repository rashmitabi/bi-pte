<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DesignSeeder extends Seeder
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
                'section_id' => 1,
                'design_name'=>'Reading and Writing:Fill in the blanks',
                'file_name'=>'reading_and_writing_fill_in_the_blanks.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 1,
                'design_name'=>'Multiple-choice,Choose multiple answers',
                'file_name'=>'multiple_choice_choose_multiple_answers.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 1,
                'design_name'=>'Re-order Paragraphs',
                'file_name'=>'re_order_paragraphs.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 1,
                'design_name'=>'Reading:Fill in the blanks',
                'file_name'=>'reading_fill_in_the_blanks.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 1,
                'design_name'=>'Multiple-choice,choose single answers',
                'file_name'=>'multiple_choice_choose_single_answers.blade.php'
            ]);
            //section one end

            //section two start
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Summarize Spoken item',
                'file_name'=>'summarize_spoken_item.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Choose Multiple answers item',
                'file_name'=>'choose_multiple_answers_item.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Fill in the blanks',
                'file_name'=>'fill_in_the_blanks.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Highlight correct summary item',
                'file_name'=>'highlight_correct_summary_item.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Multiple-choice,choose single answers item',
                'file_name'=>'multiple_choice_choose_single_answers_item.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Select missing word item (11-12)',
                'file_name'=>'select_missing_word_item.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Highlight Incorrect Word (13-14)',
                'file_name'=>'highlight_incorrect_word.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 2,
                'design_name'=>'Write Form Dictations',
                'file_name'=>'write_form_dictations.blade.php'
            ]);
            //section two end

            //section three start
            DB::table('question_designs')->insert([
                'section_id' => 3,
                'design_name'=>'Writing Instruction',
                'file_name'=>'writing_instruction.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 3,
                'design_name'=>'Summarize Written',
                'file_name'=>'summarize_written.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 3,
                'design_name'=>'Essay Writing',
                'file_name'=>'essay_writing.blade.php'
            ]);
            //section three end

            //section four start
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Speaking Instruction',
                'file_name'=>'speaking_instruction.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Read Aloud',
                'file_name'=>'read_aloud.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Repeat Sentence',
                'file_name'=>'repeat_sentence.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Describe Image',
                'file_name'=>'describe_image.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Re-tell lecture',
                'file_name'=>'re_tell_lecture.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Answer-short Question',
                'file_name'=>'answer_short_question.blade.php'
            ]);
            DB::table('question_designs')->insert([
                'section_id' => 4,
                'design_name'=>'Update Audio Time',
                'file_name'=>'update_audio_time.blade.php'
            ]);
            //section four start
        }
    }
}
