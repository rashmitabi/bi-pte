<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use App\Models\Sections;
use App\Models\QuestionDesigns;
use App\Models\Notifications;
use App\Models\Activities;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVideosRequest;
use App\Http\Requests\UpdateVideosRequest;
use DataTables;

class VideosController extends Controller
{
    private $moduleTitleP = "branchadmin.videos.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if($request->ajax())  {
            if(\Auth::user()->institue->show_admin_videos == 'Y'){
                $superadmin = User::select('id')->where('role_id', 1)->first();
                $data = Videos::latest()
                ->where('user_id',\Auth::user()->id)
                ->orWhere('user_id',$superadmin->id)
                ->get();
            }
            else{
                $data = Videos::latest()->where('user_id',\Auth::user()->id)->get();
            }            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('title', function($row){
                        return $row->title;
                    })  
                    ->addColumn('link', function($row){
                        return $row->link;
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
                                <li class="action" data-toggle="modal" data-target="#editvideos"><a href="javascript:void(0);" class="video-edit" data-id="'.$row->id.'" data-url="'.route('branchadmin-videos.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                                <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('branchadmin-videos.destroy', $row->id).'" data-id="'.$row->id.'" data-title="Video"><i class="fas fa-trash"></i></a></li>
                                <li class="action shield '.$iconClass.'"><a href="'.route('branchadmin-videos-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
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
        return view('branchadmin/videos/addvideos',compact('sections', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVideosRequest $request)
    {
        $input = \Arr::except($request->all(),array('_token'));
        $video = new Videos;
        $video->user_id = \Auth::user()->id;
        $video->section_id = $input['section_id'];
        $video->design_id = $input['design_id'];
        $video->title = $input['title'];
        $video->description = isset($input['description'])?$input['description']:'';
        $video->link = $input['link'];
        if(!isset($input['status'])){
            $video->status = 'D';
        }else{
            $video->status = $input['status'];
        }
        if($video->save()){
            if(isset($input['status'])){
                //send notification to students if video status is enabled
                $mystudents = User::select('id')->where('parent_user_id', \Auth::user()->id)->get();
                foreach($mystudents as $stud){
                    $notification_data[] = array(
                            'user_id' => $stud->id,
                            'sender_id' => \Auth::user()->id,
                            'type' => 'Student',
                            'title' => "New video has been added to your account.",
                            'body' => 'New video has been added with title - '.$input['title'],
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
                'subject' => 'Added a new video',
                'message' => 'New video has been added with title - '.$input['title'],
                'ip_address' => getUserIP(),
                'latitude' => '',
                'longitude' => ''
            );
            $activity = Activities::create($activity_data);
            return redirect()->route('branchadmin-videos.index')
            ->with('success','Video added successfully!');
        }else{
            return redirect()->route('branchadmin-videos.index')
            ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function show(Videos $videos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Videos::find($id);
        $sections = Sections::all();
        $designs = QuestionDesigns::all();
        $types = array();
        foreach($designs as $des){
            $types[$des->section_id][] = array('id' => $des->id, 'name' => $des->design_name);
        }

        $html_subject = view($this->moduleTitleP.'edit', compact('video', 'sections', 'types'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_subject    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videos  $video_id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideosRequest $request, $id)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        $input['description'] = isset($input['description'])?$input['description']:'';
        $result = Videos::where('id',$id)->update($input);
        if($result){
            \Session::put('success', 'Video updated Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Videos::where('id',$id)->delete();
        if($result)
        {
            return redirect()->route('branchadmin-videos.index')
                        ->with('success','Video deleted successfully!');
        }
        else
        {
            return redirect()->route('branchadmin-videos.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    /**
     * Change status field of the specified resource from storage.
     *
     * @param  \App\Models\Videos  $video
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $video = Videos::find($id);
        if($video->status == 'D'){
            $video->status = 'E';
        }else{
            $video->status = 'D';
        }
        $result = $video->update();
        if($result){
            return redirect()->route('branchadmin-videos.index')
                        ->with('success','Video status updated successfully!');
        }else{
            return redirect()->route('branchadmin-videos.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
