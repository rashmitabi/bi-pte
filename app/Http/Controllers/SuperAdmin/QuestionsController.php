<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answerdata;
use App\Models\Questiondata;
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
        $questions                  = new Questions;
        $questions->section_id      = $input['section_id'];
        $questions->test_id         = $input['test_id'];
        $questions->design_id       = 1;
        $questions->question_type_id= $input['question_type_id'];
        $questions->name            = $input['question_type_id'];
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
            $ansArrry = ['ans_options1','ans_options2','ans_options3','ans_options4',
                                'ans_options5','ans_options6','ans_options7','ans_options8'];
            
            $correctArry = ['correct_option1','correct_option2','correct_option3','correct_option4',
                            'correct_option5','correct_option6','correct_option7','correct_option8'];
            
            foreach($ansArrry as $ans)
            {
                $questiondata = new Questiondata;
                $questiondata->question_id = $id;
                $questiondata->data_type = "fill in the blank";
                $questiondata->data_value = $input[$ans];
                $questiondata->save();
            }

            foreach($correctArry as $corrAns)
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
