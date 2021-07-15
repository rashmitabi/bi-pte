<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeviceLogs;
use DataTables;

class DeviceController extends Controller
{
    private $moduleTitleP = 'branchadmin.device.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = DeviceLogs::with('user')
            ->select('device_logs.*')
            ->leftJoin('users', 'users.id', '=', 'device_logs.user_id')
            ->where('users.parent_user_id', \Auth::user()->id)
            ->orderBy('device_logs.created_at', 'desc')->get();
            //print_r($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('username', function($row){
                        return $row->user->name;
                    })
                    ->addColumn('browsername', function($row){
                        return $row->browser_name;
                    })
                    ->addColumn('ip_address', function($row){
                        return $row->ip_address;
                    })
                    ->addColumn('devicename', function($row){
                        return $row->device_name;
                    })
                    ->addColumn('status', function($row){
                        if($row->status == "Y"){
                            $status = "Enable";
                        }else{
                            $status = "Disable";
                        }
                        return $status;
                    })
                    ->addColumn('logintime', function($row){
                        return $row->created_at->format('d-M-Y h:i A');
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                    <li class="action shield '.(($row->status == "Y") ? "red" : "green").'"><a href="'.route('branchadmin-device-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
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
    public function changeStatus($id)
    {
        $device = DeviceLogs::find($id);
        if($device->status == 'N'){
            $device->status = 'Y';
        }else{
            $device->status = 'N';
        }
        $result = $device->update();
        if($result){
            return redirect()->route('branchadmin-device.index')
                        ->with('success','Status updated successfully');
        }else{
            return redirect()->route('branchadmin-device.index')
                        ->with('error','Status Not Updated!');
        }
    }
    public function create()
    {
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
