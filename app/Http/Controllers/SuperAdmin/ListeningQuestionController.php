<?php
namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answerdata;
use App\Models\Questiondata;
use DB;

class ListeningQuestionController extends Controller
{

	public function storeSummarizeSpokenItem(Request $request){
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
            for($i=0;$i< count($input['summary_script']);$i++){
	            $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
	            		array($input['question_audio'][$i],$input['question_image'][$i])
	            	);
	            $questiondata->save();

	            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['summary_script'][$i];
	            $answerdata->sample_answer = $input['sample_ans'][$i];
	            $answerdata->save();
	        }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}
	public function updateSummarizeSpokenItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
	    for($i=0;$i< count($input['summary_script']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => json_encode(
	            			array($input['question_audio'][$i],$input['question_image'][$i])
	            		)
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "answer_value" => $input['summary_script'][$i],
                    "sample_answer" => $input['sample_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}

	public function storeChooseMultipleAnswersItem(Request $request){
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
	            $questiondata->data_value = json_encode(
	            		array(
	            			'question' => $input['question'][$i],
	            			'question_audio' => $input['question_audio'][$i],
	            			'question_option' => $input['question_option'][$i],
	            		)
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_ans'][$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();
	        }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}
	public function updateChooseMultipleAnswersItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
	    for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => json_encode(
	            		array(
	            			'question' => $input['question'][$i],
	            			'question_audio' => $input['question_audio'][$i],
	            			'question_option' => $input['question_option'][$i],
	            		)
	            	)
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "answer_value" => $input['correct_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}

	public function storeFillInTheBlanks(Request $request){
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
	            $questiondata->data_value = json_encode(
	            		array(
	            			'audio' => $input['audio'][$i],
	            			'question' => $input['question'][$i]
	            		)
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_ans'][$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();
	        }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}
	public function updateFillInTheBlanks(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
	    for($i=0;$i< count($input['question']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => json_encode(
	            		array(
	            			'question' => $input['question'][$i],
	            			'audio' => $input['audio'][$i]
	            		)
	            	)
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "answer_value" => $input['correct_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}

	public function storeHighlightCorrectSummaryItem(Request $request){
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
            for($i=0;$i< count($input['audio']);$i++){
	            $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
	            		array(
	            			'audio' => $input['audio'][$i],
	            			'choice_1' => $input['choice_1'][$i],
	            			'choice_2' => $input['choice_2'][$i],
	            			'choice_3' => $input['choice_3'][$i],
	            			'choice_4' => $input['choice_4'][$i]
	            		)
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_ans'][$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();
	        }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}
	public function updateHighlightCorrectSummaryItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
	    for($i=0;$i< count($input['audio']);$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'][$i])->update(
                array(
                    "data_value" => json_encode(
	            		array(
	            			'audio' => $input['audio'][$i],
	            			'choice_1' => $input['choice_1'][$i],
	            			'choice_2' => $input['choice_2'][$i],
	            			'choice_3' => $input['choice_3'][$i],
	            			'choice_4' => $input['choice_4'][$i]
	            		)
	            	)
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'][$i])->update(
                array(
                    "answer_value" => $input['correct_ans'][$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
	}

}
?>