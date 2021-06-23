<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVideosRequest;
use DataTables;
use DB;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin/videos/index');
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
        return view('superadmin/videos/addvideos',compact('sections', 'types'));
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
        $video->description = $input['description'];
        $video->link = $input['link'];
        if(!isset($input['status'])){
            $video->status = 'D';
        }else{
            $video->status = $input['status'];
        }
        
        if($video->save()){
            return redirect()->route('videos.index')
            ->with('success','Video added successfully!');
        }else{
            return redirect()->route('videos.index')
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
    public function edit(Videos $videos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $videos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $videos)
    {
        //
    }

    /**
     * Change status field of the specified resource from storage.
     *
     * @param  \App\Models\Subjects  $subjects
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
            return redirect()->route('videos.index')
                        ->with('success','Video status updated successfully!');
        }else{
            return redirect()->route('videos.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
