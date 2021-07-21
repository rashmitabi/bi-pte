<?php
namespace App\Http\Controllers\BranchAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answerdata;
use App\Models\Questiondata;
use App\Models\SectionQuestionScores;
use DB; 

class SpeakingQuestionController extends Controller
{
    
	public function storeReadAloud(Request $request){
        
        // $request->validate([
        //     'question'=>'required|array',
        //     'sample_ans'=>'required|array'
        // ]);

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
        $questions->marks           = 44;
        $questions->recording_answer_time     = 40;
        $questions->prepration_time    = 40;
        $questions->max_time        = 80;
        if($questions->save()){
            //1-reading 2-listening 3-writing 4-speaking
            $matchThese = ['section_id'=>4,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>22]);

            $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>22]);

            $id = $questions->id;

            for($i=1;$i<= 6;$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = $questionType->question_title.$i;
                $questiondata->data_value = $input['editor'.$i];
                $questiondata->save();
               

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = $questionType->question_title.$i;
                $answerdata->answer_value = "-";
                $answerdata->sample_answer = $input['sample_ans'.$i];
                $answerdata->save();
            }
            

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateReadAloud(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        
        $questiondata = 1;
        $answerdata = 1;
        try{
            for($i=1;$i< 6;$i++){
           
                $questiondata = Questiondata::where('id',$input['question_data_id'.$i])->update(
                    array(
                        "data_value" => $input['editor'.$i]
                    )
                );
                $answerdata = Answerdata::where('id',$input['answer_data_id'.$i])->update(
                    array(
                        "sample_answer" => $input['sample_ans'.$i]
                    )
                );
               
            }
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions Updated Successfully!');
        }catch(\Exception $e){
            //dd($e->getMessage());
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
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
        $questions->marks           = 52;
        $questions->recording_answer_time     = 10;
        $questions->befor_audio_waiting_time    = 3;
        $questions->prepration_time    = 1;
        $questions->max_time        = 14;
       
        if($questions->save()){
            //1-reading 2-listening 3-writing 4-speaking
            $matchThese = ['section_id'=>4,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>32]);

            $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>20]);

            

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

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateRepeatSentence(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 

        try{
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
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions Updated Successfully!');
        }catch(\Exception $e){
            //dd($e->getMessage());
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
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
        $questions->marks           = 22;
        $questions->recording_answer_time     = 40;
        $questions->prepration_time    = 25;
        $questions->max_time        = 65;
        if($questions->save()){
            //1-reading 2-listening 3-writing 4-speaking
             $matchThese = ['section_id'=>4,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>22]);

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

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateDescribeImage(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 

        try{
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
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions Updated Successfully!');
        }catch(\Exception $e){
            //dd($e->getMessage());
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
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
        $questions->marks           = 22;
        $questions->recording_answer_time     = 40;
        $questions->befor_audio_waiting_time    = 3;
        $questions->prepration_time    = 10;
        $questions->max_time        = 53;
        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
             $matchThese = ['section_id'=>4,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>12]);

            $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>10]);
           
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

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateReTellLecture(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 
        try{
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
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions Updated Successfully!');
        }catch(\Exception $e){
            //dd($e->getMessage());
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
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
        $questions->marks           = 8;
        $questions->recording_answer_time     = 5;
        $questions->befor_audio_waiting_time    = 3;
        $questions->prepration_time    = 1;
        $questions->max_time        = 9;
        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
             $matchThese = ['section_id'=>4,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>2]);

            $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>6]);

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

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateAnswerShortQuestion(Request $request){
        $input  = \Arr::except($request->all(),array('_token'));
        $questiondata = 1;
        $answerdata = 1; 
        try{
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
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions Updated Successfully!');
        }catch(\Exception $e){
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
	
}

?>