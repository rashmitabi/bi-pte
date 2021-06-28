<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\TestResults;
use Illuminate\Http\Request;
use use App\Models\TestResults

class TestResultsController extends Controller
{
    private $moduleTitleP = 'superadmin.results.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($request->ajax()) {
            $data = TestResults::with(['test'])->all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->role_name;
                    })
                    ->addColumn('permission', function($row){
                        $slug = '';
                        $slugs = array();
                        foreach ($row->permission as $value) {
                            if(isset($value->slug)){
                               array_push($slugs,$value->slug);
                            }
                        }
                        $slug = implode(',',$slugs);
                        return $slug;
                        
                    })
                    ->addColumn('totaluser', function($row){
                        return count($row->user);
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editroles">
                                        <a href="javascript:void(0);" class="roles-edit" data-id="'.$row->id .'" data-url="'.route('roles.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"  class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('roles.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield '.(($row->status == "D") ? "green" : "bg-danger").'">
                                        <a href="'.route('superadmin-roles-changestatus', $row->id ).'" ><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                                </ul>';
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
    public function edit(TestResults $testResults)
    {
        //
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
