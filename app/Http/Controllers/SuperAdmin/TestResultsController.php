<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\TestResults;
use Illuminate\Http\Request;
use DataTables;
use DB;

class TestResultsController extends Controller
{
    private $moduleTitleP = 'superadmin.results.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            // dd($data);
        if($request->ajax()) {
            //$data = TestResults::with(['test','subject','user'])->get();
            $data = TestResults::with(['test','subject','user'])->select('test_id','user_id', 'subject_id', DB::raw('SUM(get_score) AS score'))->groupBy('test_id', 'user_id', 'subject_id')->get(); 
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
                        $btn = '<ul class="actions-btns"><li data-toggle="modal" data-target="#testresults" class="action"><a href="javascript:void(0);" class="results-edit" data-url="'.route('generate-result', ['aid' => $row->test_id, 'bid' => $row->user_id]).'"><i class="fas fa-eye"></i></a></li></ul>';
                        
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
        $data = TestResults::select(DB::raw('SUM(get_score) AS score'),'section_id')->groupBy('test_id', 'user_id', 'section_id')->where(['test_id' => $tid, 'user_id' => $uid])->get(); 
        $resultData = array();
        foreach($data as $d){
            $resultData[$d->section_id] = $d->score;
        }
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
