<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tests;
use App\Models\userSubscriptions;
use App\Models\Activities;
use App\Models\UserSession;
use App\Models\PredictionFiles;
use DataTables;

class DashboardController extends Controller
{
	
    public function index()
    {
        $allStudents = User::where('parent_user_id',\Auth::user()->id)->pluck('id')->toArray(); 
    	$data['students'] = User::where(['parent_user_id'=>\Auth::user()->id])->count(); 
    	$data['prediction'] = PredictionFiles::where(['user_id'=>\Auth::user()->id])->count();
    	$data['mock_tests'] = Tests::where(['type' => 'M','generated_by_user_id'=>\Auth::user()->id])->count();
    	$data['practice_tests'] = Tests::where(['type' => 'P','generated_by_user_id'=>\Auth::user()->id])->count();

    	//mysql query
        $data['userSession'] = UserSession::selectRaw('DATE_FORMAT(created_at, "%l:00 %p") time, count(*) count')->whereDate('created_at', date('Y-m-d'))
                ->whereIn('user_id',$allStudents)    
                ->groupBy('time')
                ->orderBy('time', 'ASC')
                ->get();

        //pgsql query
        // $data['userSession'] = UserSession::selectRaw("CASE WHEN updated_at IS NOT NULL THEN to_char(updated_at, 'hh pm') ELSE to_char(created_at, 'hh pm') END as time, count(*) count")
        // ->whereIn('user_id',$allStudents)
        // ->whereDate('created_at', date('Y-m-d'))
        // ->orWhereDate('updated_at', date('Y-m-d'))
        // ->groupBy('time')
        // ->orderBy('time', 'ASC')
        // ->get();

        return view('branchadmin/dashboard', compact('data'));
    }
    public function activitylogs(Request $request){
        if($request->ajax())  {
            $data = \App\Models\Activities::select('log_activities.*')->join('users', 'users.id', '=', 'log_activities.user_id')
            	->where('users.parent_user_id', \Auth::user()->id)
            ->latest()->limit(10)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('subject', function($row){
                        return $row->subject;
                    })                    
                    ->addColumn('created by', function($row){
                        return $row->user->first_name." ".$row->user->last_name.' ('.$row->role->role_name.')';
                    })
                    ->addColumn('created date', function($row){                        
                        return date('Y-m-d', strtotime($row->created_at));
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    }
}
