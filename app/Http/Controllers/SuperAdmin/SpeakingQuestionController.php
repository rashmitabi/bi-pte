<?php
namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answerdata;
use App\Models\Questiondata;
use DB;

class SpeakingQuestionController extends Controller
{

	public function storeReadAloud(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        
        $question_type_id = $input['question_type_id'];
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
            $id = $questions->id;

            for($i=0;$i< count($input['question']);$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = $questionType->question_title.$i;
                $questiondata->data_value = $input['question'][$i];
                $questiondata->save();
               

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = $questionType->question_title.$i;
                $answerdata->answer_value = "-";
                $answerdata->sample_answer = $input['sample_ans'][$i];
                $answerdata->save();
            }
            

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateReadAloud(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 
        for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => $input['question'][$i]
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "sample_answer" => $input['sample_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions Updated Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function storeRepeatSentence(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        // dd($input);
        $question_type_id = $input['question_type_id'];
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
            $id = $questions->id;

            for($i=0;$i<count($input['question']);$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = $questionType->question_title.$i;
                $questiondata->data_value = $input['question'][$i];
                $questiondata->save();
           

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = $questionType->question_title.$i;
                $answerdata->answer_value = "-";
                $answerdata->sample_answer = $input['sample_ans'][$i];
                $answerdata->save();
            }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateRepeatSentence(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 

        for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => $input['question'][$i]
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "sample_answer" => $input['sample_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){   
            return redirect()->route('tests.index')->with('success','Questions Updated Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function storeDescribeImage(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        
        $question_type_id = $input['question_type_id'];
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
            $id = $questions->id;

            for($i=0;$i<count($input['question']);$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = $questionType->question_title.$i;
                $questiondata->data_value = $input['question'][$i];
                $questiondata->save();
           

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = $questionType->question_title.$i;
                $answerdata->answer_value = "-";
                $answerdata->sample_answer = $input['sample_ans'][$i];
                $answerdata->save();
            }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateDescribeImage(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 

        for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => $input['question'][$i]
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "sample_answer" => $input['sample_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions Updated Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function storeReTellLecture(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        
        $question_type_id = $input['question_type_id'];
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
            $id = $questions->id;

            for($i=0;$i<count($input['question']);$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = $questionType->question_title.$i;
                $questiondata->data_value = $input['question'][$i];
                $questiondata->save();
           

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = $questionType->question_title.$i;
                $answerdata->answer_value = $input['image'][$i];
                $answerdata->sample_answer = $input['sample_ans'][$i];
                $answerdata->save();
            }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateReTellLecture(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 

        for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => $input['question'][$i]
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "answer_value" => $input['image'][$i],
                    "sample_answer" => $input['sample_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions Updated Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function storeAnswerShortQuestion(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        
        $question_type_id = $input['question_type_id'];
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
            $id = $questions->id;

            for($i=0;$i<count($input['question']);$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = $questionType->question_title.$i;
                $questiondata->data_value = $input['question'][$i];
                $questiondata->save();
           

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = $questionType->question_title.$i;
                $answerdata->answer_value = $input['image'][$i];
                $answerdata->sample_answer = $input['sample_ans'][$i];
                $answerdata->save();
            }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateAnswerShortQuestion(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 

        for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => $input['question'][$i]
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "answer_value" => $input['image'][$i],
                    "sample_answer" => $input['sample_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){    
            return redirect()->route('tests.index')->with('success','Questions Updated Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
	
}

?>