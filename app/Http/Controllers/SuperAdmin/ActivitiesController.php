<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activities;
use DataTables;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = Activities::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function($row){
                        return $row->user->first_name.' '.$row->user->last_name;
                    })
                    ->addColumn('role', function($row){
                        return $row->user->role->role_name;
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
        return view('superadmin.activities.index');
    }
}
