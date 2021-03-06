<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PredictionFiles;
use App\Models\Sections;
use App\Models\QuestionDesigns;
use App\Models\Notifications;
use App\Models\User;
use App\Models\Institues;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePredictionRequest;
use App\Http\Requests\UpdatePredictionRequest;
use Aws\Exception\AwsException;
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
            //$data = PredictionFiles::latest()->where('user_id',\Auth::user()->id)->get();
            $data = PredictionFiles::with(['user'])->latest()->get();
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
                        return $row->user->first_name.' '.$row->user->last_name.' ('.$row->user->role->role_name.')';
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
                            <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('predictionfiles.destroy', $row->id).'" data-id="'.$row->id.'" data-title="Prediction File"><i class="fas fa-trash"></i></a></li>
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
        $sections = Sections::all();
        $designs = QuestionDesigns::all();
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

            /*try{
                $client = createAwsClient();
                $upload = $client->putObject([
                    'Bucket' => env('AWS_BUCKET'),
                    'Key'    => 'predictionFiles/' . $fileName,
                    'Body'   => fopen($request->file, 'r'),
                    'ACL'    => 'public-read'
                ]);
                $filePath = $upload['ObjectURL'];
                dd($upload); 
            } catch (AwsException $e){
                dd($e->getMessage());
            }*/
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
                $institutes = Institues::select('user_id')->where('show_admin_files', 'Y')->get();
                foreach($institutes as $inst){
                    $notification_data[] = array(
                                'user_id' => $inst->user_id,
                                'sender_id' => \Auth::user()->id,
                                'type' => 'Branch Admin',
                                'title' => "New prediction file has been added to your students account.",
                                'body' => 'New prediction file has been added to students account with title - '.$input['title'],
                                'url' => "",
                                'created_at' => date('Y-m-d h:i:s')
                            );
                    $mystudents = User::select('id')->where('parent_user_id', $inst->user_id)->get();
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
                }
                if(isset($notification_data) && count($notification_data) > 0){
                    $notification = Notifications::insert($notification_data);
                }                  
            }

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
            /*try{
                $client = createAwsClient();
                $upload = $client->putObject([
                    'Bucket' => env('AWS_BUCKET'),
                    'Key'    => 'predictionFiles/' . $fileName,
                    'Body'   => fopen($request->file, 'r'),
                    'ACL'    => 'public-read'
                ]);
                dd($upload);  
            } catch (AwsException $e){
                dd($e->getMessage());
            }*/
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
        $prediction = PredictionFiles::find($id);
        $result = PredictionFiles::where('id',$id)->delete();
        if(file_exists(public_path($prediction->link))){
            unlink(public_path($prediction->link));
        }        
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
