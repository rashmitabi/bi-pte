<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use DataTables;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->ajax()) {
            $data = Roles::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->role_name;
                    })
                    ->addColumn('permission', function($row){
                        return 'abc';
                    })
                    ->addColumn('totaluser', function($row){
                        return "asdas";
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="">
                                        <a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"  class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('roles.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield">
                                        <a href="'.route('superadmin-roles-changestatus', $row->id ).'" ><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('superadmin/roles/index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin/roles/addnewroles');
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
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Roles::where('id',$id)->delete();
        if($result)
        {
            return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
        }
        else
        {
            return redirect()->route('roles.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    public function changeStatus($id)
    {
        $role = Roles::find($id);
        if($role->status == 'D'){
            $role->status = 'E';
        }else{
            $role->status = 'D';
        }
        $result = $role->update();
        if($result){
            return redirect()->route('roles.index')
                        ->with('success','Status Update successfully');
        }else{
            return redirect()->route('roles.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
