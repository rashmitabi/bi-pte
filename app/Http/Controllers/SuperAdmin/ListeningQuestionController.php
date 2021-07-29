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

class ListeningQuestionController extends Controller
{

    public function uploadImage(Request $request){
        $request->validate([
            'image_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image_file')) {
            $destinationPath = 'assets/images/upload-image/';
            $ImageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $ImageName);
        }

        return response()->json([
            'success' => 1,
            'html'=>"<img src='".url($destinationPath.$ImageName)."'>"    
        ]);
    }

    public function uploadAudio(Request $request){
        $request->validate([
            'audio_file' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac,ogg',
        ]);
  
        $input = $request->all();
        $image = $request->file('audio_file');
        if ($image) {
            $destinationPath = 'assets/images/upload-audio/';
            $ImageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $ImageName);
        }

        $html ='<audio controls >';
            $html .='<source src="'.url($destinationPath.$ImageName).'" type="audio/'.$image->getClientOriginalExtension().'">';
            $html .='Your browser does not support the audio element.';
        $html .='</audio>';

        return response()->json([
            'success' => 1,
            'html'=> $html    
        ]);
    }



	public function storeSummarizeSpokenItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
		$question_type_id = $input['question_type_id'];
        $questionType = QuestionTypes::where('id',$question_type_id)->first();

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
        $questions->marks           = 25;
        $questions->prepration_time    = 10;
        $questions->max_time        = 10;

        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
             $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>13]);

            $matchThese = ['section_id'=>3,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>12]);
            

            $id = $questions->id;
            for($i=1;$i<= 2;$i++){
	            $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
	            		array("question_audio" => $input['question_audio'.$i],"question_image" => $input['question_image'.$i])
	            	);
	            $questiondata->save();

	            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['summary_script'.$i];
	            $answerdata->sample_answer = $input['sample_ans'.$i];
	            $answerdata->save();
	        }

            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
	}
	public function updateSummarizeSpokenItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
	    for($i=1;$i<= 2;$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'.$i])->update(
                array(
                    "data_value" => json_encode(
	            			array("question_audio" =>$input['question_audio'.$i],"question_image" => $input['question_image'.$i])
	            		)
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'.$i])->update(
                array(
                    "answer_value" => $input['summary_script'.$i],
                    "sample_answer" => $input['sample_ans'.$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
	}

	public function storeChooseMultipleAnswersItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
		$question_type_id = $input['question_type_id'];
        $questionType = QuestionTypes::where('id',$question_type_id)->first();

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
        $questions->marks           = 3;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>3]);

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

            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
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
            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
	}

	public function storeFillInTheBlanks(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
		$question_type_id = $input['question_type_id'];
        $questionType = QuestionTypes::where('id',$question_type_id)->first();

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
        $questions->marks           = 14;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>7]);

            $matchThese = ['section_id'=>3,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>7]);

           
            $id = $questions->id;
            for($i=1;$i<= 2;$i++){
	            $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
	            		array(
	            			'audio' => $input['audio'.$i],
	            			'question' => $input['question'.$i]
	            		)
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_ans'.$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();
	        }

            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
	}
	public function updateFillInTheBlanks(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
	    for($i=1;$i<= 2;$i++){
           
            $questiondata = Questiondata::where('id',$input['question_data_id'.$i])->update(
                array(
                    "data_value" => json_encode(
	            		array(
	            			'question' => $input['question'.$i],
	            			'audio' => $input['audio'.$i]
	            		)
	            	)
                )
            );
            $answerdata = Answerdata::where('id',$input['answer_data_id'.$i])->update(
                array(
                    "answer_value" => $input['correct_ans'.$i]
                )
            );
           
        }

        if($questiondata || $answerdata){
            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
	}

	public function storeHighlightCorrectSummaryItem(Request $request){
		$input  = \Arr::except($request->all(),array('_token'));
		
		$question_type_id = $input['question_type_id'];
        $questionType = QuestionTypes::where('id',$question_type_id)->first();

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
        $questions->marks           = 3;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save()){
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>1]);

            $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>2]);

            $sectionquestionscores = new SectionQuestionScores;
            $sectionquestionscores->section_id = 2;
            $sectionquestionscores->question_type_id = $question_type_id;
            $sectionquestionscores->score_division = 1;
            $sectionquestionscores->save();

            $sectionquestionscores = new SectionQuestionScores;
            $sectionquestionscores->section_id = 1;
            $sectionquestionscores->question_type_id = $question_type_id;
            $sectionquestionscores->score_division = 2;
            $sectionquestionscores->save();

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

            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
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
            return redirect()->route('tests.show',$input['test_id'])->with('success','Questions added Successfully!');
	    }else{
            return redirect()->route('tests.show',$input['test_id'])->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeMultipleChoiceChooseSingle(Request $request)/*Store listening multiple choice choose single*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;

        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 1;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save())
        {
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>1]);

            $id = $questions->id;
            for($i=9;$i<=10;$i++)
            {
                $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
                    array(
                        'question_q'.$i=>$input['question_q'.$i],
                        'audio_q'.$i=>$input['audio_q'.$i],
                        'choice_1_q'.$i=>$input['choice_1_q'.$i],
                        'choice_2_q'.$i=>$input['choice_2_q'.$i],
                        'choice_3_q'.$i=>$input['choice_3_q'.$i],
                        'choice_4_q'.$i=>$input['choice_4_q'.$i]
                        )
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_answers_q'.$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();             
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions added Successfully!');
        }
        else
        {
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateMultipleChoiceChooseSingle(Request $request)/*Update listening multiple choice choose single*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $question_id        = $request->question_id;
        $question_data_id_9 = $request->question_data_id_1;
        $question_data_id_10 = $request->question_data_id_2;
        $answer_data_1      = $request->answer_data_1;
        $answer_data_2      = $request->answer_data_2;

        try{
            $result1 = Answerdata::where('id',$answer_data_1)->update(['answer_value'=>$input['correct_answers_q9']]);
            $result2 = Answerdata::where('id',$answer_data_2)->update(['answer_value'=>$input['correct_answers_q10']]);

    
            for($i=9;$i<=10;$i++)
            {
                $json  = json_encode(
                    array(
                        'question_q'.$i=>$input['question_q'.$i],
                        'audio_q'.$i=>$input['audio_q'.$i],
                        'choice_1_q'.$i=>$input['choice_1_q'.$i],
                        'choice_2_q'.$i=>$input['choice_2_q'.$i],
                        'choice_3_q'.$i=>$input['choice_3_q'.$i],
                        'choice_4_q'.$i=>$input['choice_4_q'.$i]
                        )
                    );
                $id = $input['question_data_id_'.$i];
                $finalResult = Questiondata::where('id',$id)->update(['data_value'=>$json]);
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions updated Successfully!');
        }catch(\Exception $e){
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeMissingWordItem(Request $request)/*Store listening missing word item*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;

        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 1;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save())
        {
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>1]);

            $id = $questions->id;
            for($i=11;$i<=12;$i++)
            {
                $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
                    array(
                        'audio_q'.$i=>$input['audio_q'.$i],
                        'choice_1_q'.$i=>$input['choice_1_q'.$i],
                        'choice_2_q'.$i=>$input['choice_2_q'.$i],
                        'choice_3_q'.$i=>$input['choice_3_q'.$i],
                        'choice_4_q'.$i=>$input['choice_4_q'.$i]
                        )
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_answers_q'.$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();             
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions added Successfully!');
        }
        else
        {
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateMissingWordItem(Request $request)/*Update listening missing word item*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $question_id        = $request->question_id;
        $question_data_id_11 = $request->question_data_id_1;
        $question_data_id_12 = $request->question_data_id_2;
        $answer_data_1      = $request->answer_data_1;
        $answer_data_2      = $request->answer_data_2;

        

        try{
            $result1 = Answerdata::where('id',$answer_data_1)->update(['answer_value'=>$input['correct_answers_q11']]);
            $result2 = Answerdata::where('id',$answer_data_2)->update(['answer_value'=>$input['correct_answers_q12']]);
    
            for($i=11;$i<=12;$i++)
            {
                $json  = json_encode(
                    array(
                        'audio_q'.$i=>$input['audio_q'.$i],
                        'choice_1_q'.$i=>$input['choice_1_q'.$i],
                        'choice_2_q'.$i=>$input['choice_2_q'.$i],
                        'choice_3_q'.$i=>$input['choice_3_q'.$i],
                        'choice_4_q'.$i=>$input['choice_4_q'.$i]
                        )
                    );
                $id = $input['question_data_id_'.$i];
                $finalResult = Questiondata::where('id',$id)->update(['data_value'=>$json]);
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions updated Successfully!');
        }catch(\Exception $e){
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeHighlightIncorrectWords(Request $request)/*Store listening highlight incorrect words*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;

        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 17;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save())
        {
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>8]);

            $matchThese = ['section_id'=>1,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>9]);

            $id = $questions->id;
            for($i=13;$i<=14;$i++)
            {
                $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = json_encode(
                    array(
                        'audio'.$i=>$input['audio'.$i],
                        'editor'.$i=>$input['editor'.$i]
                        )
	            	);
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input['correct_ans'.$i];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions added Successfully!');
        }
        else
        {
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }

    }
    public function updateHighlightIncorrectWords(Request $request)/*Update listening highlight incorrect words*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $question_type_id   = $request->question_type_id;
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_id        = $request->question_id;

        try{
            for($i=13;$i<=14;$i++)
            {
                $qid = 'q'.$i.'_id';
                $aid = 'a'.$i.'_id';
                $answer = 'correct_ans'.$i;
                $data_value = json_encode(
                    array(
                        'audio'.$i=>$input['audio'.$i],
                        'editor'.$i=>$input['editor'.$i]
                        )
                    );
                $firstResult = Questiondata::where('id',$input[$qid])->update(['data_value'=>$data_value]);
                $secondResult= Answerdata::where('id',$input[$aid])->update(['answer_value'=>$input[$answer]]);
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions updated Successfully!');
        }catch(\Exception $e){
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeWriteFormDictations(Request $request)/*Store listening write form dictations*/
    {
        $input  = \Arr::except($request->all(),array('_token'));

        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;

        $questionType = QuestionTypes::where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "-";
        $questions->desc            = "-";
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 47;
        $questions->prepration_time    = 7;
        $questions->max_time        = 7;

        if($questions->save())
        {
             //1-reading 2-listening 3-writing 4-speaking
              $matchThese = ['section_id'=>2,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>20]);

            $matchThese = ['section_id'=>3,'question_type_id'=>$question_type_id];
            SectionQuestionScores::updateOrCreate($matchThese,["score_division"=>27]);

           $id = $questions->id;

            for($i=15;$i<=17;$i++)
            {
                $questionString = 'audio_q'.$i;
                $answerString   = 'correct_answers_q'.$i;

                $questiondata = new Questiondata;
	            $questiondata->question_id = $id;
	            $questiondata->data_type = $questionType->question_title.$i;
	            $questiondata->data_value = $input[$questionString];
	            $questiondata->save();
            
	            $answerdata = new Answerdata;
	            $answerdata->question_id = $id;
	            $answerdata->answer_type = $questionType->question_title.$i;
	            $answerdata->answer_value = $input[$answerString];
	            $answerdata->sample_answer = '-';
	            $answerdata->save();

            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions added Successfully!');
        }
        else
        {
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function updateWriteFormDictations(Request $request)/*Update write form dictations*/
    {
        $input  = \Arr::except($request->all(),array('_token'));
        $test_id = $input['test_id'];
        try{
            for($i=15;$i<=17;$i++)
            {
                $answerString = 'correct_answers_q'.$i;
                $answer_id    = 'a'.$i;

                $questionString = 'audio_q'.$i;
                $question_id    = 'q'.$i;
                
                $secondResult   = Questiondata::where('id',$input[$question_id])->update(['data_value'=>$input[$questionString]]);
                $firstResult    = Answerdata::where('id',$input[$answer_id])->update(['answer_value'=>$input[$answerString]]);
            }
            return redirect()->route('tests.show',$test_id)->with('success','Questions updated Successfully!');
        }catch(\Exception $e){
            //dd($e->getMessage());
            return redirect()->route('tests.show',$test_id)->with('error','Sorry!Something wrong.Try Again.');
        }
        
    }
}
?>