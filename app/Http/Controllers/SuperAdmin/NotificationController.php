<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;
use DataTables;

class NotificationController extends Controller
{
    private $moduleTitleP = 'superadmin.notifications.';
    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        if($request->ajax())  {
            $data = Notifications::where('user_id',$id)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('title', function($row){
                        return $row->title;
                    })
                    ->addColumn('body', function($row){
                        return $row->body;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                    <li ><a href="'.route('superadmin-view-notifications', $row->id ).'"><button type="button" class="btn btn-primary">
                                    View</button></a></li>
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
        return view($this->moduleTitleP.'index');
    }
    public function viewNotification($id)
    {
        $notification =  Notifications::find($id);

        $notification->is_read = 'Y';

        $notification->update();

        return view($this->moduleTitleP.'view',compact('notification'));
    }
}
