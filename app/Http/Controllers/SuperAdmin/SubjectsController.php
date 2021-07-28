<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use App\Models\Tests;
use App\Models\Questions;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use DataTables;

class SubjectsController extends Controller
{
    private $moduleTitleP = 'superadmin.subjects.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = Subjects::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('subject_name', function($row){
                        return $row->subject_name;
                    })                    
                    ->addColumn('status', function($row){
                        if($row->status == "E"){
                            $status = "Enabled";
                        }else{
                            $status = "Disabled";
                        }
                        return $status;
                    })
                    ->addColumn('tests', function($row){
                        $total_tests = Tests::where(['subject_id' => $row->id, 'status' => 'E'])->count();
                        return $total_tests;
                    })
                    ->addColumn('action', function($row){
                        if($row->status == "E"){
                            $iconClass = "red";
                        }else{
                            $iconClass = "green";
                        }
                        $btn = '<ul class="actions-btns">
                            <li class="action" data-toggle="modal" data-target="#editsubjects"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit" class="subject-edit" data-id="'.$row->id.'" data-url="'.route('subjects.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                            <li class="action bg-danger" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('subjects.destroy', $row->id).'" data-id="'.$row->id.'" data-title="Subject"><i class="fas fa-trash"></i></a></li>
                            <li class="action shield '.$iconClass.'" data-toggle="tooltip" data-placement="top" title="status update"><a href="'.route('superadmin-subjects-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
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
        return view($this->moduleTitleP.'addsubjects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubjectRequest $request)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        $subject = new Subjects;
        $subject->subject_name = $input['name'];
        if(!isset($input['status'])){
            $subject->status = 'D';
        }else{
            $subject->status = $input['status'];
        }
        if($subject->save()){
            return redirect()->route('subjects.index')
                        ->with('success','Subject created successfully!');
        }else{
            return redirect()->route('subjects.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show(Subjects $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subjects::find($id);

        $html_subject = view($this->moduleTitleP.'edit', compact('subject'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_subject    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, $id)
    {        
        $input  = \Arr::except($request->all(),array('_token'));
        if(!isset($input['status'])){
            $data['status'] = 'D';
        } 
        else{
            $data['status'] = 'E';
        }
        $data['subject_name'] = $input['name'];
        $result = Subjects::where('id',$id)->update($data);
        if($result){
            \Session::put('success', 'Subject updated Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tests = Tests::where('subject_id',$id)->pluck('id')->toArray();
        if(count($tests)>0)
        {   
            return redirect()->route('subjects.index')
                            ->with('warning','Subject not delete because tests available!');
        }
        else
        {
            $result = Subjects::where('id',$id)->delete();
            if($result)
            {
                return redirect()->route('subjects.index')
                            ->with('success','Subject deleted successfully!');
            }
            else
            {
                return redirect()->route('subjects.index')
                            ->with('error','Sorry!Something wrong.Try again later!');
            }
        }
    }

    /**
     * Change status field of the specified resource from storage.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $subject = Subjects::find($id);
        if($subject->status == 'D'){
            $subject->status = 'E';
        }else{
            $subject->status = 'D';
        }
        $result = $subject->update();
        if($result){
            return redirect()->route('subjects.index')
                        ->with('success','Subject status updated successfully!');
        }else{
            return redirect()->route('subjects.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
