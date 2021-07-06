<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tests;
use App\Models\userSubscriptions;
use App\Models\Activities;

class DashboardController extends Controller
{
	
    public function index()
    {
    	$data['students'] = User::where(['role_id' => 3])->count(); 
    	$data['institutes'] = User::where(['role_id' => 2])->count();
    	$data['mock_tests'] = Tests::where(['type' => 'M'])->count();
    	$data['practice_tests'] = Tests::where(['type' => 'P'])->count();
    	$data['transactions'] = \App\Models\userSubscriptions::with(['user','subscription', 'transaction'])->latest()->limit(5)->get();
    	$data['activities'] = \App\Models\Activities::with(['user'])->latest()->limit(5)->get();
    	$today = date('Y-m-d');
    	$data['expired_subscriptions'] = \App\Models\userSubscriptions::with(['user','subscription'])->where('end_date', '<', $today)->get();
    	$date_10days = date('Y-m-d', strtotime($today. ' + 10 days'));
    	$data['near_to_expire_subscriptions'] = \App\Models\userSubscriptions::with(['user','subscription'])->where('end_date', '>', $today)->where('end_date', '<=', $date_10days)->get();
        return view('superadmin/dashboard', compact('data'));
    }
}
