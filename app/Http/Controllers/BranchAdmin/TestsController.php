<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tests;
use App\Models\QuestionTypes;
use App\Models\Questions;
use App\Models\Questiondata;
use App\Models\Answerdata;
use App\Models\StudentsAnswerData;
use App\Models\TestResults;
use App\Models\StudentTests;

use App\Models\Institues;
use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\User;
use Aws\Exception\AwsException;
use DataTables;
use DB;
use AWS;
class TestsController extends Controller
{
    private $moduleTitleP = 'branchadmin.tests.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        if($request->ajax())  {
            if(\Auth::user()->institue->show_admin_tests == 'Y')
            {
                $superadmin = User::select('id')->where('role_id', 1)->first();
                
                $data = Tests::with('subject')->where('type','P')
                ->whereIn('generated_by_user_id',[$superadmin->id,$id])
                ->latest()->get();
            }
            else
            {
                $data = Tests::with('subject')->where(['type'=>'P','generated_by_user_id'=>$id])->latest()->get();
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('test_name', function($row){
                        return $row->test_name;
                    })
                    ->addColumn('subject', function($row){
                        return $row->subject->subject_name;
                    })
                    ->addColumn('action', function($row){
                        if($row->generated_by_role_id == '1')
                        {
                            $btn = '<ul class="actions-btns">
                                        <li class="action" data-toggle="tooltip" data-placement="top" title="Add Questions"><a href="'.route('branchadmin-tests.show',$row->id).'"><i class="fas fa-question"></i></a></li>
                                    </ul>';
                        }
                        else
                        {
                            $btn = '<ul class="actions-btns">
                                <li class="action" data-toggle="tooltip" data-placement="top" title="Add Questions"><a href="'.route('branchadmin-tests.show',$row->id).'"><i class="fas fa-question"></i></a></li>
                                <li class="action" data-toggle="modal" data-target="#edittest"><a
                                    href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit" class="test-edit" data-id="'.$row->id.'" data-url="'.route('branchadmin-tests.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                                <li class="action" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('branchadmin-tests.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                            <li class="action shield '.(($row->status == "E") ? "red" : "green").'" data-toggle="tooltip" data-placement="top" title="'.(($row->status == "E") ? "Disable" : "Enable").'"><a href="'.route('branchadmin-tests-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                            </ul>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
        return view($this->moduleTitleP.'index');
    }
    public function mockTests(Request $request)
    {
        $red = 'red';
        $green = 'green';
        $id = \Auth::user()->id;
        if($request->ajax())  {
            if(\Auth::user()->institue->show_admin_tests == 'Y')
            {
                $superadmin = User::select('id')->where('role_id', 1)->first();

                $data = Tests::with('subject')->where('type','M')
                ->whereIn('generated_by_user_id',[$superadmin->id,$id])
                ->latest()->get();
            }
            else
            {
                $data = Tests::with('subject')->where(['type'=>'M','generated_by_user_id'=>$id])->latest()->get();
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('test_name', function($row){
                        return $row->test_name;
                    })
                    ->addColumn('subject', function($row){
                        return $row->subject->subject_name;
                    })
                    ->addColumn('action', function($row){
                        if($row->generated_by_role_id == '1')
                        {
                            $btn = '<ul class="actions-btns">
                                    <li class="action"><a href="'.route('branchadmin-tests.show',$row->id).'"><i class="fas fa-question"></i></a></li>
                                    </ul>';
                        }
                        else
                        {
                            $btn = '<ul class="actions-btns">
                                <li class="action"><a href="'.route('branchadmin-tests.show',$row->id).'"><i class="fas fa-question"></i></a></li>
                                <li class="action" data-toggle="modal" data-target="#edittest"><a
                                    href="javascript:void(0);" class="test-edit" data-id="'.$row->id.'" data-url="'.route('branchadmin-tests.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                                <li class="action"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('branchadmin-tests.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                                <li class="action shield '.(($row->status == "E") ? "red" : "green").'"><a href="'.route('branchadmin-tests-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                                </ul>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subjects::where('status','E')->latest()->get();

        return view($this->moduleTitleP.'add',compact('subjects'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'test_name' =>'required|min:3|max:50',
            'subject'   =>'required',
            'type'      =>'required|in:M,P',
            'image'     =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = \Arr::except($request->all(),array('_token'));

        $count = Tests::where('generated_by_user_id',\Auth::user()->id)->count();
        $Institues = Institues::where('user_id',\Auth::user()->id)->get();
        
        if($count == $Institues[0]->tests_allowed || $count > $Institues[0]->tests_allowed){
            return redirect()->route('branchadmin-tests.index')
            ->with('error','Sorry!Your generate test limit is out of reach!');
        }
        
        $filePath = '';
        $input['subject_id'] = $input['subject'];
        $input['generated_by_user_id'] = \Auth::user()->id;
        $input['generated_by_role_id'] = \Auth::user()->role_id;
        unset($input['subject']);

        $fileName = substr(time().'_'.str_replace(' ', '_', $request->image->getClientOriginalName()), 0, 250);  
        if($request->image->move(public_path('assets/images/test-images'), $fileName)){
            $filePath = $fileName;
        }
        /*try{
            $s3 = AWS::createClient('s3');
            $s3->putObject(array(
                'Bucket'     => 'au-pte-dev',
                'Key'        => $fileName,
                'SourceFile' => $request->image,
            ));
        }catch(AwsException $e){
            echo $e->getMessage();
        }*/
        $input['image'] = $fileName;
        $result = Tests::create($input);
        
        if($result){
            return redirect()->route('branchadmin-tests.index')
            ->with('success','Test created successfully!');
        }else{
            return redirect()->route('branchadmin-tests.index')
            ->with('error','Sorry!Something wrong.Try again later!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sections           = DB::table('sections')->get();
        $readingQuestions   = DB::table('question_types')->where('section_id', 1)->get();
        $listeningQuestions = DB::table('question_types')->where('section_id', 2)->get();
        $writingQuestions   = DB::table('question_types')->where('section_id', 3)->get();
        $speakingQuestions  = DB::table('question_types')->where('section_id', 4)->get();
        
        return view ($this->moduleTitleP.'addquestion',compact('sections','readingQuestions','listeningQuestions','writingQuestions','speakingQuestions'));
    }
    public function addQuestions(Request $request)
    {
        $section_id         =  $request->input('section_id');
        $test_id            = $request->input('test_id');
        $question_type_id   = $request->input('question_type_id');
        $question_id   = $request->input('question_type_id');
        
        $test = Tests::find($test_id);
        $buttonHide = 'No';
        if($test->generated_by_role_id == '1'){
            $buttonHide = 'Yes';
        }
        $questionType = QuestionTypes::where('id',$question_type_id)->first();
        $design       = DB::table('question_designs')->where('id',$questionType->desgin_id)->first();
        
        $questions    = Questions::with('questiondata','answerdata')->where(['test_id'=>$test_id,'question_type_id'=>$question_type_id])->first();
        
        if($section_id == 4){
            return view ($this->moduleTitleP."/speaking/".$design->file_name,compact('questions','section_id','test_id','question_id','buttonHide'));
        }else if($section_id == 3){
            return view ($this->moduleTitleP."/writing/".$design->file_name,compact('questions','section_id','test_id','question_id','buttonHide'));
        }else if($section_id == 2){
            return view ($this->moduleTitleP."/listening/".$design->file_name,compact('questions','section_id','test_id','question_id','buttonHide'));
        }else if($section_id == 1){
            return view ($this->moduleTitleP."/reading/".$design->file_name,compact('questions','section_id','test_id','question_id','buttonHide'));
        }else{
             return view ($this->moduleTitleP.$design->file_name,compact('questions'));
        }
    }
    public function changeStatus($id)
    {
        $tests = Tests::find($id);
        if($tests){
            if($tests->status == 'E'){
                $tests->status = 'D';
            }else{
                $tests->status = 'E';
            }
            $result = $tests->update();
            if($result){
                return redirect()->route('branchadmin-tests.index')
                            ->with('success','Status Update successfully');
            }else{
                return redirect()->route('branchadmin-tests.index')
                            ->with('error','Status Not Updated!');
            }
        }else{
            return redirect()->back()->with('error','Sorry!Something wrong.Try again later!');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Tests::find($id);

        $subjects = Subjects::where('status','E')->latest()->get();

        $html_test = view($this->moduleTitleP.'edit', compact('test','subjects'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_test    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'test_name' =>'required|min:3|max:50',
            'subject'   =>'required',
            'type'      =>'required|in:M,P',
            'image'     =>'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input  = \Arr::except($request->all(),array('_token'));
        $input['subject_id'] = $input['subject'];
        $input['generated_by_user_id'] = \Auth::user()->id;
        $input['generated_by_role_id'] = \Auth::user()->role_id;
        unset($input['subject']);
        if($request->file()){
            $fileName = substr(time().'_'.str_replace(' ', '_', $request->image->getClientOriginalName()), 0, 250);  
            if($request->image->move(public_path('assets/images/test-images'), $fileName)){
                $filePath = $fileName;
            }
            $input['image'] = $filePath;
        }
        $result = Tests::where('id',$id)->update($input);
        if($result){
            \Session::put('success', 'Test update Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getTest = Tests::find($id);
        if($getTest)
        {
            $questions = Questions::where('test_id',$id)->pluck('id')->toArray();
            if(count($questions)>0)
            {
                $response = 0;
                try{
                    DB::beginTransaction();
                        Questiondata::whereIn('question_id',$questions)->delete();
                        Answerdata::whereIn('question_id',$questions)->delete();
                        StudentsAnswerData::whereIn('question_id',$questions)->delete();
                        TestResults::whereIn('question_id',$questions)->delete();
                        StudentTests::where('test_id',$id)->delete();
                        Questions::where('test_id',$id)->delete();
                        Tests::where('id',$id)->delete();
                        DB::commit();
                        $response = 1;
                }catch(\Exception $e){
                    DB::rollback();
                    $response = 0;
                    dd($e->getMessage());
                    return redirect()->route('branchadmin-tests.index')
                            ->with('error','Sorry!Something wrong.Try again later!');
                }
            }else{
                Tests::where('id',$id)->delete();
                $response = 1;
            }
            
            if($response == 1)
            {
                return redirect()->route('branchadmin-tests.index')
                            ->with('success','Test deleted Successfully!');
            }
            else
            {
                return redirect()->route('branchadmin-tests.index')
                            ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            return redirect()->route('branchadmin-tests.index')
                            ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}
