<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use App\Models\Roles;
use App\Models\Modules;
use App\Models\RoleHasPermissions;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class RolesController extends Controller
{
    private $moduleTitleP = 'superadmin.roles.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        if($request->ajax()) {
            $data = Roles::with(['permission','user'])->where('id','!=',1)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->role_name;
                    })
                    ->addColumn('permission', function($row){
                        $slug = '';
                        $slugs = array();
                        foreach ($row->permission as $value) {
                            if(isset($value->slug)){
                               array_push($slugs,$value->slug);
                            }
                        }
                        $slug = implode(',',$slugs);
                        return $slug;
                        
                    })
                    ->addColumn('totaluser', function($row){
                        return count($row->user);
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editroles">
                                        <a href="javascript:void(0);" class="roles-edit" data-id="'.$row->id .'" data-url="'.route('roles.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"  class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('roles.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield '.(($row->status == "D") ? "green" : "bg-danger").'">
                                        <a href="'.route('superadmin-roles-changestatus', $row->id ).'" ><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view($this->moduleTitleP.'index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $modules = Modules::all();
        return view($this->moduleTitleP.'add',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        // dd($input);
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        
        $id = Roles::create($input)->id;
        if($id){
            foreach ($input['permission'] as $permission) {
                $module = explode("-",$permission);
                if(!empty($module)){
                    $input['role_id'] = $id;
                    $input['module_id'] = $module[0];
                    $input['slug'] = $module[1];
                }
                $result = RoleHasPermissions::create($input);
            }
            
            
        }
        if($id){
            return redirect()->route('roles.index')
                        ->with('success','Role created successfully!');
        }else{
            return redirect()->route('roles.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
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
    public function edit($id)
    {
        $roleData = Roles::with(['permission'])->find($id);
        $modules = Modules::all();
        $html_role = view($this->moduleTitleP.'edit', compact('roleData','modules'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_role    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        // dd($input);
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        $input_role = array(
            "role_name" => $input['role_name'],
            "status" => $input['status'],
             );
        $roleres = Roles::where('id',$id)->update($input_role);
        if($roleres){
            $result = RoleHasPermissions::where('role_id',$id)->delete();
            foreach ($input['permission'] as $permission) {
                $module = explode("-",$permission);
                if(!empty($module)){
                    $input['role_id'] = $id;
                    $input['module_id'] = $module[0];
                    $input['slug'] = $module[1];
                }
                $result = RoleHasPermissions::create($input);
            }
        }
        if($roleres){
            \Session::put('success', 'Role updated successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
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
                        ->with('success','Status Updated successfully');
        }else{
            return redirect()->route('roles.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
