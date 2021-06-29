<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PredictionFiles;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePredictionRequest;
use App\Http\Requests\UpdatePredictionRequest;
use DB;
use DataTables;

class PredictionFilesController extends Controller
{
    private $moduleTitleP = "superadmin.predictionfiles.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = PredictionFiles::latest()->where('user_id',\Auth::user()->id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('title', function($row){
                        return $row->title;
                    })  
                    ->addColumn('link', function($row){
                        if($row->link != ''){
                            return url('/'.$row->link);
                        }
                        else{
                            return 'N/A';
                        }                        
                    })   
                    ->addColumn('type', function($row){
                        if($row->section_id != ""){
                            $section = DB::table('sections')->select('section_name')->where('id',$row->section_id)->first();
                        }
                        if($row->design_id != ""){
                            $type = DB::table('question_designs')->select('design_name')->where('id',$row->design_id)->first();
                        }
                        return ucfirst($section->section_name).' - '.ucfirst($type->design_name);
                    })
                    ->addColumn('created date', function($row){
                        return date('Y-m-d', strtotime($row->created_at));
                    })
                    ->addColumn('status', function($row){
                        if($row->status == "E"){
                            $status = "Enabled";
                        }else{
                            $status = "Disabled";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        if($row->status == "E"){
                            $iconClass = "red";
                        }else{
                            $iconClass = "green";
                        }
                        $btn = '<ul class="actions-btns">
                            <li class="action" data-toggle="modal" data-target="#editprediction"><a href="javascript:void(0);" class="file-edit" data-id="'.$row->id.'" data-url="'.route('predictionfiles.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                            <li class="action"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('predictionfiles.destroy', $row->id).'" data-id="'.$row->id.'" data-title="Prediction File"><i class="fas fa-trash"></i></a></li>
                            <li class="action shield '.$iconClass.'"><a href="'.route('superadmin-predictionfiles-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
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
        $sections = DB::table('sections')->get();
        $designs = DB::table('question_designs')->select('id', 'section_id', 'design_name')->get();
        $types = array();
        foreach($designs as $des){
            $types[$des->section_id][] = array('id' => $des->id, 'name' => $des->design_name);
        }
        return view('superadmin/predictionfiles/addpredictionfiles',compact('sections', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePredictionRequest $request)
    {
        $input = \Arr::except($request->all(),array('_token'));        
        //print_r($request->file);die;
        $filePath = '';
        
        if($request->file()){
            $fileName = substr(time().'_'.str_replace(' ', '_', $request->file->getClientOriginalName()), 0, 250);  
            if($request->file->move(public_path('files/predictions'), $fileName)){
                $filePath = 'files/predictions/'.$fileName;
            }
        }
        
        $prediction = new PredictionFiles;
        $prediction->user_id = \Auth::user()->id;
        $prediction->section_id = $input['section_id'];
        $prediction->design_id = $input['design_id'];
        $prediction->title = $input['title'];
        $prediction->description = $input['description'];
        $prediction->link = $filePath;
        if(!isset($input['status'])){
            $prediction->status = 'D';
        }else{
            $prediction->status = $input['status'];
        }
        
        if($prediction->save()){
            return redirect()->route('predictionfiles.index')
            ->with('success','Prediction file added successfully!');
        }else{
            return redirect()->route('predictionfiles.index')
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
        $prediction = PredictionFiles::find($id);
        $sections = DB::table('sections')->get();
        $designs = DB::table('question_designs')->select('id', 'section_id', 'design_name')->get();
        $types = array();
        foreach($designs as $des){
            $types[$des->section_id][] = array('id' => $des->id, 'name' => $des->design_name);
        }

        $html_subject = view($this->moduleTitleP.'edit', compact('prediction', 'sections', 'types'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_subject    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePredictionRequest $request, $id)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        // if($request->file()){
        //     \Session::put('success', 'Prediction File got!');
        //     return true;
        //     $fileName = substr(time().'_'.str_replace(' ', '_', $request->file->getClientOriginalName()), 0, 250);  
        //     if($request->file->move(public_path('files/predictions'), $fileName)){
        //         $input['link'] = 'files/predictions/'.$fileName;
        //     }
        // }
        $result = PredictionFiles::where('id',$id)->update($input);
        if($result){
            \Session::put('success', 'Prediction File updated Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prediction = PredictionFiles::find($id);
        $result = PredictionFiles::where('id',$id)->delete();
        unlink(public_path($prediction->link));
        if($result)
        {
            return redirect()->route('predictionfiles.index')
                        ->with('success','Prediction file deleted successfully!');
        }
        else
        {
            return redirect()->route('predictionfiles.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    /**
     * Change status field of the specified resource from storage.
     *
     * @param  \App\Models\PredictionFiles  $prediction
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $prediction = PredictionFiles::find($id);
        if($prediction->status == 'D'){
            $prediction->status = 'E';
        }else{
            $prediction->status = 'D';
        }
        $result = $prediction->update();
        if($result){
            return redirect()->route('predictionfiles.index')
                        ->with('success','Prediction file status updated successfully!');
        }else{
            return redirect()->route('predictionfiles.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
