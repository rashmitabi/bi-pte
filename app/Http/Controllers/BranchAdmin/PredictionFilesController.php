<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use App\Models\PredictionFiles;
use App\Models\Sections;
use App\Models\QuestionDesigns;
use App\Models\Notifications;
use App\Models\Activities;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePredictionRequest;
use App\Http\Requests\UpdatePredictionRequest;
use DataTables;

class PredictionFilesController extends Controller
{
    private $moduleTitleP = "branchadmin.predictionfiles.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('prediction_file') && !checkPermission('manage_prediction_file') && !checkPermission('add_prediction_file')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
        if($request->ajax())  {
            if(\Auth::user()->institue->show_admin_files == 'Y'){
                $superadmin = User::select('id')->where('role_id', 1)->first();
                $data = PredictionFiles::latest()
                ->where('user_id',\Auth::user()->id)
                ->orWhere('user_id',$superadmin->id)
                ->get();
            }
            else{
                $data = PredictionFiles::latest()->where('user_id',\Auth::user()->id)->get();
            }  
            if(checkPermission('manage_prediction_file')){
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
                        return ucfirst($row->section->section_name).' - '.ucfirst($row->design->design_name);
                    })
                    ->addColumn('created by', function($row){
                        if($row->user_id == \Auth::user()->id){
                            return 'You';
                        }else{
                            return 'Superadmin';
                        }
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
                        if($row->user_id == \Auth::user()->id){
                            if($row->status == "E"){
                                $iconClass = "red";
                            }else{
                                $iconClass = "green";
                            }
                            $btn = '<ul class="actions-btns">
                                <li class="action" data-toggle="modal" data-target="#editprediction"><a href="javascript:void(0);" class="file-edit" data-id="'.$row->id.'" data-url="'.route('branchadmin-predictionfiles.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                                <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('branchadmin-predictionfiles.destroy', $row->id).'" data-id="'.$row->id.'" data-title="Prediction File"><i class="fas fa-trash"></i></a></li>
                                <li class="action shield '.$iconClass.'"><a href="'.route('branchadmin-predictionfiles-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                                </ul>';
                            return $btn;
                        }
                        else{
                            return '';
                        }
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
            }
            else{
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
                        return ucfirst($row->section->section_name).' - '.ucfirst($row->design->design_name);
                    })
                    ->addColumn('created by', function($row){
                        if($row->user_id == \Auth::user()->id){
                            return 'You';
                        }else{
                            return 'Superadmin';
                        }
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
                    ->make(true);
            }
            
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
        if(!checkPermission('add_prediction_file')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
        $sections = Sections::all();
        $designs = QuestionDesigns::all();
        $types = array();
        foreach($designs as $des){
            $types[$des->section_id][] = array('id' => $des->id, 'name' => $des->design_name);
        }
        return view('branchadmin/predictionfiles/addpredictionfiles',compact('sections', 'types'));
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
        $prediction->description = isset($input['description'])?$input['description']:'';
        $prediction->link = $filePath;
        if(!isset($input['status'])){
            $prediction->status = 'D';
        }else{
            $prediction->status = $input['status'];
        }
        
        if($prediction->save()){
            if(isset($input['status'])){
                //send notification to students if video status is enabled
                $mystudents = User::select('id')->where('parent_user_id', \Auth::user()->id)->get();
                foreach($mystudents as $stud){
                    $notification_data[] = array(
                            'user_id' => $stud->id,
                            'sender_id' => \Auth::user()->id,
                            'type' => 'Student',
                            'title' => "New prediction file has been added to your account.",
                            'body' => 'New prediction file has been added with title - '.$input['title'],
                            'url' => "",
                            'created_at' => date('Y-m-d h:i:s')
                        );
                }            
                if(isset($notification_data) && count($notification_data) > 0){
                    $notification = Notifications::insert($notification_data);
                }  
            }
            //add activity log
            $activity_data = array(
                'user_id' => \Auth::user()->id,
                'role_id' => \Auth::user()->role_id,
                'subject' => 'Added a new prediction file',
                'message' => 'New prediction file has been added with title - '.$input['title'],
                'ip_address' => getUserIP(),
                'latitude' => '',
                'longitude' => ''
            );
            $activity = Activities::create($activity_data);
            return redirect()->route('branchadmin-predictionfiles.index')
            ->with('success','Prediction file added successfully!');
        }else{
            return redirect()->route('branchadmin-predictionfiles.index')
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
        $sections = Sections::all();
        $designs = QuestionDesigns::all();
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
        $input = \Arr::except($request->all(),array('_token')); 
             
        if($request->file()){
            $fileName = substr(time().'_'.str_replace(' ', '_', $request->file->getClientOriginalName()), 0, 250);  
            if($request->file->move(public_path('files/predictions'), $fileName)){
                $input['link'] = 'files/predictions/'.$fileName;
                unset($input['file']);
                $prediction = PredictionFiles::find($id);                
            }
        }     
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }    
        $input['description'] = isset($input['description'])?$input['description']:'';   
        $result = PredictionFiles::where('id',$id)->update($input);        
        if($result){
            if(isset($prediction) && file_exists(public_path($prediction->link))){
                unlink(public_path($prediction->link));
            }
            \Session::put('success', 'Prediction File updated Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something went wrong. Please try Again.');
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
        if(!checkPermission('manage_prediction_file')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
        $prediction = PredictionFiles::find($id);
        $result = PredictionFiles::where('id',$id)->delete();
        if(file_exists(public_path($prediction->link))){
            unlink(public_path($prediction->link));
        }        
        if($result)
        {
            return redirect()->route('branchadmin-predictionfiles.index')
                        ->with('success','Prediction file deleted successfully!');
        }
        else
        {
            return redirect()->route('branchadmin-predictionfiles.index')
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
        if(!checkPermission('manage_prediction_file')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
        $prediction = PredictionFiles::find($id);
        if($prediction->status == 'D'){
            $prediction->status = 'E';
        }else{
            $prediction->status = 'D';
        }
        $result = $prediction->update();
        if($result){
            return redirect()->route('branchadmin-predictionfiles.index')
                        ->with('success','Prediction file status updated successfully!');
        }else{
            return redirect()->route('branchadmin-predictionfiles.index')
                        ->with('error','Status Not Updated!');
        }
    }

}
