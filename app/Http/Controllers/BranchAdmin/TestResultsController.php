<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use App\Models\TestResults;
use Illuminate\Http\Request;
use DataTables;

class TestResultsController extends Controller
{
    private $moduleTitleP = 'branchadmin.results.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)   
    {
        if($request->ajax()) {    
            $data = TestResults::with(['test','subject','user'])
                ->selectRaw('test_results.test_id,test_results.user_id,test_results.subject_id,SUM(get_score) AS score')
                ->join('users', 'users.id', '=', 'test_results.user_id')
                ->join('student_tests', function($join)
                         {
                             $join->on('student_tests.user_id', '=', 'test_results.user_id');
                             $join->on('student_tests.test_id', '=', 'test_results.test_id');
                         })
                ->where('users.parent_user_id', '=', \Auth::user()->id)
                ->where('student_tests.status', '=', 'C')
                //mysql group by
                //->groupBy('test_id', 'user_id', 'subject_id')

                //pgsql group by
                ->groupBy('test_results.test_id', 'test_results.user_id', 'subject_id')
                ->get();  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('username', function($row){
                        $name = $row->user->first_name." ".$row->user->last_name;
                        return $name;
                    })
                    ->addColumn('test_name', function($row){
                        return $row->test->test_name;
                        
                    })
                    ->addColumn('test_type', function($row){
                        if($row->test->type == "P"){
                            return "Practice";
                        }else{
                            return "Mock";
                        }
                        
                    })
                    ->addColumn('subject', function($row){
                        return $row->subject->subject_name;
                    })
                    ->addColumn('score', function($row){
                        return $row->score;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns"><li data-toggle="modal" data-target="#testresults" class="action"><a href="javascript:void(0);" class="results-edit" data-url="'.route('branchadmin-generate-result', ['aid' => $row->test_id, 'bid' => $row->user_id]).'"><i class="fas fa-eye"></i></a></li></ul>';
                        
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view($this->moduleTitleP.'index');
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function show(TestResults $testResults)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function edit($tid, $uid)
    {        
        $data = TestResults::selectRaw('SUM(get_score) AS score,section_id')->groupBy('test_id', 'user_id', 'section_id')->where(['test_id' => $tid, 'user_id' => $uid])->get(); 
        $result = array();
        foreach($data as $d){
            $result[$d->section_id] = $d->score;
        }
        $resultData = array(
            1 => (isset($result[1])) ? $result[1] : 0,
            2 => (isset($result[2])) ? $result[2] : 0,
            3 => (isset($result[3])) ? $result[3] : 0,
            4 => (isset($result[4])) ? $result[4] : 0
        );
        $html_role = view($this->moduleTitleP.'edit', compact('resultData'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_role    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestResults $testResults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestResults $testResults)
    {
        //
    }
}
