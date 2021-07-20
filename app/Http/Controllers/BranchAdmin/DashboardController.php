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

    	$data['chartSubs'] = userSubscriptions::selectRaw('monthname(created_at) month, count(*) count')->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->orderBy('month', 'desc')
                ->get();

        $data['userSession'] = UserSession::selectRaw('DATE_FORMAT(created_at, "%l:00 %p") time, count(*) count')->whereDate('created_at', date('Y-m-d'))
                ->whereIn('user_id',$allStudents)    
                ->groupBy('time')
                ->orderBy('time', 'ASC')
                ->get();

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

    public function transactions(Request $request){
        if($request->ajax())  {
            $data = userSubscriptions::with(['user','subscription', 'transaction'])->latest()->limit(10)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('transaction_id', function($row){
                        return $row->transaction->trancation_id;
                    })                    
                    ->addColumn('name', function($row){
                        return $row->user->name;
                    })
                    ->addColumn('amount', function($row){
                        return $row->transaction->amount;
                    })
                    ->addColumn('date', function($row){                        
                        return date('Y-m-d', strtotime($row->created_at));
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    }

    public function expired_subscriptions(Request $request){
        if($request->ajax())  {
            $today = date('Y-m-d');
            $data = \App\Models\userSubscriptions::with(['user','subscription', 'transaction'])->where('end_date', '<', $today)->get();
            return Datatables::of($data)
                    ->addIndexColumn()                                      
                    ->addColumn('name', function($row){
                        return $row->subscription->title;
                    })
                    ->addColumn('status', function($row){
                        return 'Expired';
                    })  
                    ->addColumn('price', function($row){
                        return $row->transaction->amount;
                    })
                    ->addColumn('institute', function($row){                        
                        return $row->user->name;
                    })
                    ->addColumn('date', function($row){                        
                        return date('Y-m-d', strtotime($row->end_date));
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    }

    public function near_to_expire(Request $request){
        if($request->ajax())  {
            $today = date('Y-m-d');
            $date_10days = date('Y-m-d', strtotime($today. ' + 10 days'));
            $data = \App\Models\userSubscriptions::with(['user','subscription'])->where('end_date', '>', $today)->where('end_date', '<=', $date_10days)->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()                                      
                    ->addColumn('name', function($row){
                        return $row->subscription->title;
                    })
                    ->addColumn('status', function($row){
                        return 'Expired';
                    })  
                    ->addColumn('price', function($row){
                        return $row->transaction->amount;
                    })
                    ->addColumn('institute', function($row){                        
                        return $row->user->name;
                    })
                    ->addColumn('date', function($row){                        
                        return date('Y-m-d', strtotime($row->end_date));
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    }

    public function top_ranking_institutes(Request $request){
        if($request->ajax())  {
            $data = User::withCount('children')->where(['role_id' => 2])->orderBy('children_count', 'desc')->limit(5)->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()                                      
                    ->addColumn('institute_name', function($row){
                        return $row->name;
                    })
                    ->addColumn('students', function($row){
                        return $row->children_count;
                    })  
                    ->addColumn('mobile', function($row){
                        return $row->mobile_no;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    }
}
