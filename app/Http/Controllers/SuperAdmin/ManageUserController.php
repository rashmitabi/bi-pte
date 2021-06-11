<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
	
    public function index()
    {
        return view('superadmin/users/index');
    }
    /**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
    public function create()
    {
        return view('superadmin/users/addnewusers');
    }

}
