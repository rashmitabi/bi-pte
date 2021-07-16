<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institues;
use App\Models\User;
use DataTables;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('institue')->where('id', \Auth::user()->id)->first();
        return view('branchadmin.profile.index',compact('user'));
    }
}
