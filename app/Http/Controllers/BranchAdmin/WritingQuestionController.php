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

class WritingQuestionController extends Controller
{

	public function storeSummarizeWritten(Request $request){

        // $request->validate([
        //     'item-1'=>'required',
        //     'item-2'=>'required',
        //     'sample-item-1'=>'required',
        //     'sample-item-2'=>'required'
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
        $questions->marks           = 20;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>3,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>10]);

            $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>10]);

            $id = $questions->id;

            $questiondata = new Questiondata;
            $questiondata->question_id = $id;
            $questiondata->data_type = $questionType->question_title."1";
            $questiondata->data_value = $input['editor1'];
            $questiondata->save();

            $questiondata = new Questiondata;
            $questiondata->question_id = $id;
            $questiondata->data_type = $questionType->question_title."2";
            $questiondata->data_value = $input['editor2'];
            $questiondata->save();

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = $questionType->question_title."1";
            $answerdata->answer_value = "-";
            $answerdata->sample_answer = $input['sample_editor1'];
            $answerdata->save();

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = $questionType->question_title."2";
            $answerdata->answer_value = "-";
            $answerdata->sample_answer = $input['sample_editor2'];
            $answerdata->save();

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function updateSummarizeWritten(Request $request){

        // $request->validate([
        //     'item-1'=>'required',
        //     'item-2'=>'required',
        //     'sample-item-1'=>'required',
        //     'sample-item-2'=>'required'
        // ]);

        $input  = \Arr::except($request->all(),array('_token'));

        $questiondata = Questiondata::where('id',$input['question_data_id1'])->update(
                array(
                    "data_value" => $input['editor1']
                )
            );
        $questiondata = Questiondata::where('id',$input['question_data_id2'])->update(
                array(
                    "data_value" => $input['editor2']
                )
            );
        $answerdata = Answerdata::where('id',$input['answer_data_id1'])->update(
                array(
                    "sample_answer" => $input['sample_editor1']
                )
            );
        $answerdata = Answerdata::where('id',$input['answer_data_id2'])->update(
                array(
                    "sample_answer" => $input['sample_editor2']
                )
            );

            
        if($answerdata || $questiondata){
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions Updated Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function storeEssayWritting(Request $request){
        // $request->validate([
        //     'essay_title'=>'required',
        //     'sample_essay'=>'required'
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
        $questions->marks           = 12;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>3,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>12]);

            $id = $questions->id;

            $questiondata = new Questiondata;
            $questiondata->question_id = $id;
            $questiondata->data_type = $questionType->question_title;
            $questiondata->data_value = $input['essay_title1'];
            $questiondata->save();
           

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = $questionType->question_title;
            $answerdata->answer_value = "-";
            $answerdata->sample_answer = $input['sample_essay1'];
            $answerdata->save();
            

            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function updateEssayWritting(Request $request){
        // $request->validate([
        //     'essay_title'=>'required',
        //     'sample_essay'=>'required'
        // ]);
        $input  = \Arr::except($request->all(),array('_token'));

        
        $questiondata = Questiondata::where('id',$input['question_data_id1'])->update(
            array(
                "data_value" => $input['essay_title1']
            )
        );
        $answerdata = Answerdata::where('id',$input['answer_data_id1'])->update(
                array(
                    "sample_answer" => $input['sample_essay1']
                )
            );

        if($questiondata || $answerdata){
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('success','Questions updated Successfully!');
        }else{
            return redirect()->route('branchadmin-tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }

}

?>