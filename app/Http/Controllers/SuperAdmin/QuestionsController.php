<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\QuestionTypes;
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
    public function storeReadingInstructions(Request $request)
    {
        $request->validate([
            'reading_writing_fill_in_the_blanks'        =>'required|max:500',
            'multiple_choice_choose_multiple_answers'   =>'required|max:500',
            're_order_paragraphs'                       =>'required|max:500',
            'reading_fill_in_the_blanks'                =>'required|max:500',
            'multiple_choice_choose_single_answers'     =>'required|max:500'

        ]);
        $input = \Arr::except($request->all(),array('_token'));
        
        try{
            QuestionTypes::where('desgin_id',1)->update(['instructions'=>$input['reading_writing_fill_in_the_blanks']]);
            QuestionTypes::where('desgin_id',2)->update(['instructions'=>$input['multiple_choice_choose_multiple_answers']]);
            QuestionTypes::where('desgin_id',3)->update(['instructions'=>$input['re_order_paragraphs']]);
            QuestionTypes::where('desgin_id',4)->update(['instructions'=>$input['reading_fill_in_the_blanks']]);
            QuestionTypes::where('desgin_id',5)->update(['instructions'=>$input['multiple_choice_choose_single_answers']]);
            \Session::put('success', 'Reading question instructions updated!');
            return true;
        }catch(\Exception $e){
            //dd($e->getMessage());
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
    public function storeListeningInstructions(Request $request)
    {
        $request->validate([
            'summarize_spoken_item'                         =>'required|max:500',
            'choose_multiple_answers_item'                  =>'required|max:500',
            'fill_in_the_blanks'                            =>'required|max:500',
            'highlight_correct_summary_item'                =>'required|max:500',
            'multiple_choice_choose_single_answers_item'    =>'required|max:500',
            'select_missing_word_item'                      =>'required|max:500',
            'highlight_incorrect_word'                      =>'required|max:500',
            'write_form_dictations'                         =>'required|max:500'

        ]);
        $input = \Arr::except($request->all(),array('_token'));

        try{
            QuestionTypes::where('desgin_id',6)->update(['instructions'=>$input['summarize_spoken_item']]);
            QuestionTypes::where('desgin_id',7)->update(['instructions'=>$input['choose_multiple_answers_item']]);
            QuestionTypes::where('desgin_id',8)->update(['instructions'=>$input['fill_in_the_blanks']]);
            QuestionTypes::where('desgin_id',9)->update(['instructions'=>$input['highlight_correct_summary_item']]);
            QuestionTypes::where('desgin_id',10)->update(['instructions'=>$input['multiple_choice_choose_single_answers_item']]);
            QuestionTypes::where('desgin_id',11)->update(['instructions'=>$input['select_missing_word_item']]);
            QuestionTypes::where('desgin_id',12)->update(['instructions'=>$input['highlight_incorrect_word']]);
            QuestionTypes::where('desgin_id',13)->update(['instructions'=>$input['write_form_dictations']]);

            \Session::put('success', 'Listening question instructions updated!');
            return true;
        }catch(\Exception $e){
            //dd($e->getMessage());
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
    public function storeWritingInstructions(Request $request)
    {
        $request->validate([
            'summarize_written'=>'required|max:500',
            'essay_writing'=>'required|max:500'
        ]);

        $input = \Arr::except($request->all(),array('_token'));

        try{
            QuestionTypes::where('desgin_id',15)->update(['instructions'=>$input['summarize_written']]);
            QuestionTypes::where('desgin_id',16)->update(['instructions'=>$input['essay_writing']]);
            
            \Session::put('success', 'Writing question instructions updated!');
            return true;
        }catch(\Exception $e){
            //dd($e->getMessage());
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
    public function storeSpeakingInstructions(Request $request)
    {
        $request->validate([
            'read_aloud'=>'required|max:500',
            'repeat_sentence'=>'required|max:500',
            'describe_image'=>'required|max:500',
            're_tell_lecture'=>'required|max:500',
            'answer_short_question'=>'required|max:500'
        ]);

        $input = \Arr::except($request->all(),array('_token'));

        try{

            QuestionTypes::where('desgin_id',18)->update(['instructions'=>$input['read_aloud']]);
            QuestionTypes::where('desgin_id',19)->update(['instructions'=>$input['repeat_sentence']]);
            QuestionTypes::where('desgin_id',20)->update(['instructions'=>$input['describe_image']]);
            QuestionTypes::where('desgin_id',21)->update(['instructions'=>$input['re_tell_lecture']]);
            QuestionTypes::where('desgin_id',22)->update(['instructions'=>$input['answer_short_question']]);
            
            \Session::put('success', 'Speaking question instructions updated!');
            return true;
        }catch(\Exception $e){
            //dd($e->getMessage());
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }


    }
}
