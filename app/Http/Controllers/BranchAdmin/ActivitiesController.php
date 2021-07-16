<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activities;
use App\Models\User;
use DataTables;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = Activities::latest()->select('log_activities.*')
            	->join('users', 'users.id', '=', 'log_activities.user_id')
            	->where('users.parent_user_id', \Auth::user()->id)
            	->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('student', function($row){
                        return $row->user->first_name.' '.$row->user->last_name;
                    })
                    ->addColumn('title', function($row){
                        return $row->subject;
                    })  
                    ->addColumn('message', function($row){
                        return $row->message;
                    })                       
                    ->addColumn('created date', function($row){
                        return date('Y-m-d', strtotime($row->created_at));
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
        return view('branchadmin.activities.index');
    }
}
