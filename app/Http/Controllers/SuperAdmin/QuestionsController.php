<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answerdata;
use App\Models\Questiondata;
use DB;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin/questions/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('superadmin/subscription/addsubscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = \Arr::except($request->all(),array('_token'));
        
        $question_type_id = $input['question_type_id'];
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();

        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $questionType->question_title;
        $questions->short_desc      = "sort desc";
        $questions->desc            = $input['editor'];
        $questions->order           = 0;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save()){
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
            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    /* start writing section */
    public function storeSummarizeWritten(Request $request){
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

            $questiondata = new Questiondata;
            $questiondata->question_id = $id;
            $questiondata->data_type = "summarize written1";
            $questiondata->data_value = $input['item-1'];
            $questiondata->save();

            $questiondata = new Questiondata;
            $questiondata->question_id = $id;
            $questiondata->data_type = "summarize written2";
            $questiondata->data_value = $input['item-2'];
            $questiondata->save();

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = "summarize written1";
            $answerdata->answer_value = "-";
            $answerdata->sample_answer = $input['sample-item-1'];
            $answerdata->save();

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = "summarize written2";
            $answerdata->answer_value = "-";
            $answerdata->sample_answer = $input['sample-item-2'];
            $answerdata->save();

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }

    public function storeEssayWritting(Request $request){
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

            $questiondata = new Questiondata;
            $questiondata->question_id = $id;
            $questiondata->data_type = "essay writting";
            $questiondata->data_value = $input['essay_title'];
            $questiondata->save();
           

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = "essay writting";
            $answerdata->answer_value = "-";
            $answerdata->sample_answer = $input['sample_essay'];
            $answerdata->save();
            

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    /* end writing section */

    /* start speaking section */
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

            for($i=1;$i<6;$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = "Read Aloud".$i;
                $questiondata->data_value = $input['question'.$i];
                $questiondata->save();
               

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = "Read Aloud".$i;
                $answerdata->answer_value = "-";
                $answerdata->sample_answer = $input['sample_ans'.$i];
                $answerdata->save();
            }
            

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
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
            for($i=1;$i<10;$i++){
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = "repeat sentence".$i;
                $questiondata->data_value = $input['question'.$i];
                $questiondata->save();
           

                $answerdata = new Answerdata;
                $answerdata->question_id = $id;
                $answerdata->answer_type = "repeat sentence".$i;
                $answerdata->answer_value = "-";
                $answerdata->sample_answer = $input['ans'.$i];
                $answerdata->save();
            }

            return redirect()->route('tests.index')->with('success','Questions added Successfully!');
        }else{
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    /* end speaking section */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
