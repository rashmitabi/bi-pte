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
    public function updateReadingWirtingFillInTheBlanks(Request $request)
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
                return redirect()->route('tests.index')->with('success','Questions Update Successfully!');
            }catch(\Exception $e){
                dd($e->getMessage());
            }
        }
        else
        {
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
    public function storeMultipleChoiceMultipleanswers(Request $request)
    {
        $input = \Arr::except($request->all(),array('_token'));
        
        $section_id         = $request->section_id;
        $test_id            = $request->test_id;
        $question_type_id   = $request->question_type_id;
        $slug               = $request->slug;
        $questionType = DB::table('question_types')->where('id',$question_type_id)->first();
        $all = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        
        $questions                  = new Questions;
        $questions->section_id      = $section_id;
        $questions->test_id         = $test_id;
        $questions->design_id       = $questionType->desgin_id;
        $questions->question_type_id= $question_type_id;
        $questions->name            = $input['options_title'];
        $questions->short_desc      = "sort desc";
        $questions->desc            = $input['editor1'];
        $questions->order           =  6;
        $questions->status          = "E";
        $questions->marks           = 50;
        $questions->answer_time     = 40;
        $questions->waiting_time    = 40;
        $questions->max_time        = 40;
        if($questions->save())
        {
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
                
                return redirect()->route('tests.index')
                    ->with('success','Questions added Successfully!');

            }catch(\Exception $e){
                return redirect()->route('tests.index')
                ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            return redirect()->route('tests.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
    public function updateMultipleChoiceMultipleanswers(Request $request)
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
                return redirect()->route('tests.index')
                    ->with('success','Questions Updated Successfully!');
            }catch(\Exception $e){
                dd($e->getMessage());
            }
        }
        else
        {
            return redirect()->route('tests.index')->with('error','Sorry!Something wrong.Try Again.');
        }
    }
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
            $questiondata->data_type = "fill in the blank";
            $questiondata->data_value = $input[$ans];
            $questiondata->save();

            $answerdata = new Answerdata;
            $answerdata->question_id = $id;
            $answerdata->answer_type = "fill in the blank";
            $answerdata->answer_value = $input[$corrAns];
            $answerdata->sample_answer = "no sample answer";
            $answerdata->save();
        
        }else{
            return redirect()->route('roles.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
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
