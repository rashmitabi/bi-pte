<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answerdata;
use App\Models\Questiondata;
use App\Models\QuestionTypes;
use App\Models\SectionQuestionScores; 

class ReadingQuestionController extends Controller
{
    public function storeFillInTheBlanks(Request $request)/* Reading and writing fill in the blanks form store*/
    {
        $input = \Arr::except($request->all(),array('_token'));
        
        $question_type_id = $input['question_type_id'];
        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "sort desc";
        $questions->desc            = $input['editor'];
        $questions->order           = 1;
        $questions->status          = "E";
        $questions->marks           = 44;
        $questions->recording_answer_time     = '';
        $questions->befor_audio_waiting_time    = '';
        $questions->prepration_time    = '';
        $questions->max_time        = '';
        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>22]);

            $matchThese = ['section_id'=>3,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>22]);

            $id = $questions->id;
            $slug = $input['slug'];
            $ansArrry = [];
            $correctArry = [];
            for($i=1;$i<=$slug;$i++)
            {
                $ansArrry[]='ans_options'.$i;
                $correctArry[]='correct_option'.$i;
            }
            $newAnsData = array_values($ansArrry);
            $newCorrectData = array_values($correctArry);
            foreach($newAnsData as $ans)
            {
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = "fill in the blank";
                $questiondata->data_value = $input[$ans];
                $questiondata->save();
            }
            foreach($newCorrectData as $corrAns)
            {
                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = "fill in the blank";
                $answerdata->answer_value = $input[$corrAns];
                $answerdata->sample_answer = "no sample answer";
                $answerdata->save();
            }
            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateFillInTheBlanks(Request $request)/* Reading and writing fill in the blanks form update*/
    {
        $input = \Arr::except($request->all(),array('_token'));
        
        $question_id        = $request->question_id;
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $slug               = $request->slug;

        $updateArry = [];
        $updateArry['desc'] = $input['editor'];
        $result = Questions::where('id',$question_id)->update($updateArry);
        if($result)
        {
            $id = $question_id;
            try{
                Answerdata::where('question_id',$question_id)->delete();
                Questiondata::where('question_id',$question_id)->delete();
                $ansArrry = [];
                $correctArry = [];
                for($i=1;$i<=$slug;$i++)
                {
                    $ansArrry[]='ans_options'.$i;
                    $correctArry[]='correct_option'.$i;
                }
                $newAnsData = array_values($ansArrry);
                $newCorrectData = array_values($correctArry);
                foreach($newAnsData as $ans)
                {
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type = "fill in the blank";
                    $questiondata->data_value = $input[$ans];
                    $questiondata->save();
                }
                foreach($newCorrectData as $corrAns)
                {
                    $answerdata = new Answerdata;
                    $answerdata->question_id = $id;
                    $answerdata->answer_type = "fill in the blank";
                    $answerdata->answer_value = $input[$corrAns];
                    $answerdata->sample_answer = "no sample answer";
                    $answerdata->save();
                }
                return redirect()->route('tests.show',$test_id)->with('success','Questions Update Successfully!');
            }catch(\Exception $e){
                dd($e->getMessage());
            }
        }
        else
        {
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeMultipleChoiceMultipleanswers(Request $request)/* Reading section multiple choice and multiple answers store*/
    {
        $input = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $slug               = $request->slug;

        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $all = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        
        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $input['options_title'];
        $questions->short_desc      = "sort desc";
        $questions->desc            = $input['editor1'];
        $questions->order           =  2;
        $questions->status          = "E";
        if($request->type == "single"){
            $questions->marks           = 1;
        }else{

            $questions->marks           = 3;
        }
        $questions->recording_answer_time     = '';
        $questions->befor_audio_waiting_time    = '';
        $questions->prepration_time    = '';
        $questions->max_time        = '';
        if($questions->save())
        {
            if($input['type'] == "single"){
                 //1-reading 2-listening 3-writing 4-speaking
                $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
                SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>1]);

            }else{
                //1-reading 2-listening 3-writing 4-speaking
                $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
                SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>3]);
            }


            $id = $questions->id;
            $finalValue = array_search($slug,$all);
            try{
                for($i=0;$i<=$finalValue;$i++)
                {
                    $indexValue = $all[$i];
                    $string = 'ans_options_'.$indexValue;
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type   = 'multiple-choice-multiple-answer';
                    $questiondata->data_value  = $input[$string];
                    $questiondata->save();
                }
                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = "multiple-choice-multiple-answer";
                $answerdata->answer_value = $input['correct_options'];
                $answerdata->sample_answer = "no sample answer";
                $answerdata->save();
                
                return redirect()->route('tests.show',$test_id)
                    ->with('success','Questions added Successfully!');

            }catch(\Exception $e){
                return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            return redirect()->route('tests.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
    public function updateMultipleChoiceMultipleanswers(Request $request)/* Reading section multiple choice and multiple answers update*/
    {
        $input  = \Arr::except($request->all(),array('_token'));
        
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $slug               = $request->slug;
        $question_id        = $request->question_id;
        $all = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

        $updateArry = [];
        $updateArry['desc'] = $request->editor1;
        $updateArry['name'] = $request->options_title;

        $result = Questions::where('id',$question_id)->update($updateArry);

        if($result)
        {
            $id = $question_id;
            $finalValue = array_search($slug,$all);
            try{
                Answerdata::where('question_id',$question_id)->delete();
                Questiondata::where('question_id',$question_id)->delete();
                
                for($i=0;$i<=$finalValue;$i++)
                {
                    $indexValue = $all[$i];
                    $string = 'ans_options_'.$indexValue;
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type   = 'multiple-choice-multiple-answer';
                    $questiondata->data_value  = $input[$string];
                    $questiondata->save();
                }
                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = "multiple-choice-multiple-answer";
                $answerdata->answer_value = $input['correct_options'];
                $answerdata->sample_answer = "no sample answer";
                $answerdata->save();
                return redirect()->route('tests.show',$test_id)
                    ->with('success','Questions Updated Successfully!');
            }catch(\Exception $e){
                dd($e->getMessage());
            }
        }
        else
        {
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeReOrderParagraph(Request $request)/* Reading section re-order paragraph store*/
    {
        $input  = \Arr::except($request->all(),array('_token'));
        
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $numberSlug         = $request->numberSlug;
        $alphaSlug          = $request->alphaSlug;
        $questionType = QuestionTypes::where('id',$question_type_id)->first();
        $all = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        
        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = 'Re-order paragraph';
        $questions->short_desc      = "sort desc";
        $questions->desc            = "";
        $questions->order           =  8;
        $questions->status          = "E";
        $questions->marks           = 6;
        $questions->recording_answer_time     = '';
        $questions->befor_audio_waiting_time    = '';
        $questions->prepration_time    = '';
        $questions->max_time        = '';

        if($questions->save())
        {
            //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>6]);

            $id = $questions->id;
            $finalValue = array_search($alphaSlug,$all);
            try{
                for($i=0;$i<=$finalValue;$i++)
                {
                    $indexValue = $all[$i];
                    $string = 'ans_options_'.$indexValue;
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type   = 're-order paragraph';
                    $questiondata->data_value  = $input[$string];
                    $questiondata->save();
                }

                for($a=1;$a<=$numberSlug;$a++)
                {
                    $correctValue = "correct_options".$a;
                    $answerdata = new Answerdata;
                    $answerdata->question_id = $id;
                    $answerdata->answer_type = "re-order paragraph";
                    $answerdata->answer_value = $input[$correctValue];
                    $answerdata->sample_answer = "no sample answer";
                    $answerdata->save();
                }
                return redirect()->route('tests.show',$test_id)
                    ->with('success','Questions added Successfully!');

            }catch(\Exception $e){
                return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
    }
    public function updateReOrderParagraph(Request $request)/* Reading section re-order paragraph update*/
    {
        $input  = \Arr::except($request->all(),array('_token'));
        
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $numberSlug         = $request->numberSlug;
        $alphaSlug          = $request->alphaSlug;
        $question_id        = $request->question_id;
        $all = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        Answerdata::where('question_id',$question_id)->delete();
        Questiondata::where('question_id',$question_id)->delete();

        $id = $question_id;
        $finalValue = array_search($alphaSlug,$all);
            try{
                for($i=0;$i<=$finalValue;$i++)
                {
                    $indexValue = $all[$i];
                    $string = 'ans_options_'.$indexValue;
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type   = 're-order paragraph';
                    $questiondata->data_value  = $input[$string];
                    $questiondata->save();
                }

                for($a=1;$a<=$numberSlug;$a++)
                {
                    $correctValue = "correct_options".$a;
                    $answerdata = new Answerdata;
                    $answerdata->question_id = $id;
                    $answerdata->answer_type = "re-order paragraph";
                    $answerdata->answer_value = $input[$correctValue];
                    $answerdata->sample_answer = "no sample answer";
                    $answerdata->save();
                }
                return redirect()->route('tests.show',$test_id)
                    ->with('success','Questions Updated Successfully!');

            }catch(\Exception $e){
                return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
            }
    }
    public function storeReadingFillInTheBlanks(Request $request)/* Reading section fill in the blanks store*/
    {
        $input  = \Arr::except($request->all(),array('_token'));
        
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $slug               = $request->slug;
        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = 'fill in the blanks';
        $questions->short_desc      = "sort desc";
        $questions->desc            = $input['editor2'];
        $questions->order           =  10;
        $questions->status          = "E";
        $questions->marks           = 15;
        $questions->recording_answer_time     = '';
        $questions->befor_audio_waiting_time    = '';
        $questions->prepration_time    = '';
        $questions->max_time        = '';

        if($questions->save())
        {
             //1-reading 2-listening 3-writing 4-speaking
            $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>15]);

            $id = $questions->id;
            $temp = 0;
            try{
                for($i=0;$i<$slug;$i++)
                {
                    $temp++;
                    $string = 'ans_options'.$temp;
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type   = 'fill in the blanks';
                    $questiondata->data_value  = $input[$string];
                    $questiondata->save();
                }
                $correct = 0;
                for($a=0;$a<$slug;$a++)
                {
                    $correct++;
                    $correctValue = "correct_options".$correct;
                    $answerdata = new Answerdata;
                    $answerdata->question_id = $id;
                    $answerdata->answer_type = "fill in the blanks";
                    $answerdata->answer_value = $input[$correctValue];
                    $answerdata->sample_answer = "no sample answer";
                    $answerdata->save();
                }
                return redirect()->route('tests.show',$test_id)
                    ->with('success','Questions added Successfully!');

            }catch(\Exception $e){
                //dd($e->getMessage());
                return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
    public function updateReadingFillInTheBlanks(Request $request)/* Reading section fill in the blanks update*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $slug               = $request->slug;
        $question_id        = $request->question_id;

        $result = Questions::where('id',$question_id)->update(['desc'=>$input['editor2']]);
        if($result)
        {
            Answerdata::where('question_id',$question_id)->delete();
            Questiondata::where('question_id',$question_id)->delete();
            $id = $question_id;
            $temp = 0;
            try{
                for($i=0;$i<$slug;$i++)
                {
                    $temp++;
                    $string = 'ans_options'.$temp;
                    $questiondata = new Questiondata;
                    $questiondata->question_id = $id;
                    $questiondata->data_type   = 'fill in the blanks';
                    $questiondata->data_value  = $input[$string];
                    $questiondata->save();
                }
                $correct = 0;
                for($a=0;$a<$slug;$a++)
                {
                    $correct++;
                    $correctValue = "correct_options".$correct;
                    $answerdata = new Answerdata;
                    $answerdata->question_id = $id;
                    $answerdata->answer_type = "fill in the blanks";
                    $answerdata->answer_value = $input[$correctValue];
                    $answerdata->sample_answer = "no sample answer";
                    $answerdata->save();
                }
                return redirect()->route('tests.show',$test_id)
                    ->with('success','Questions updated Successfully!');

            }catch(\Exception $e){
                //dd($e->getMessage());
                return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            return redirect()->route('tests.show',$test_id)
                ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}
