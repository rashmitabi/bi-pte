<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $type = $request->input('type');
        if($request->ajax()) {
            if($type == "S"){
                $data = User::where('role_id',3)->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $checkbox = '<input type="checkbox" class="form-check-input position-relative ml-0" >';
                        return $checkbox;
                    })
                    ->addColumn('name', function($row){
                        
                        $name = $row->first_name." ".$row->last_name;
                        return $name;
                    }) 
                    ->addColumn('email', function($row){
                        
                        $email = $row->email;
                        return $email;
                    }) 
                    ->addColumn('mobile_no', function($row){
                        
                        $mobile_no = $row->mobile_no;
                        return $mobile_no;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash" ></i></a></li>

                                    <li class="action shield green"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>

                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
            }else{

                $data = User::where('role_id',2)->with(['institue'])->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $checkbox = '<input type="checkbox" class="form-check-input position-relative ml-0" >';
                        return $checkbox;
                    })
                    ->addColumn('name', function($row){
                        $name = '';
                        if(isset($row->institue->institute_name)){

                            $name = $row->institue->institute_name;
                        }
                        return $name;
                    }) 
                    ->addColumn('email', function($row){
                        
                        $email = $row->email;
                        return $email;
                    }) 
                    ->addColumn('phone_number', function($row){
                        
                        $phone_number = $row->institue->phone_number;
                        return $phone_number;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                <li class="action" data-toggle="modal"data-target="#mocktest"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>

                                    <li class="action shield green"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action"data-toggle="modal"data-target="#editsecurity"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
            }
        }
        return view('superadmin/users/index');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('superadmin/users/add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        if(!isset($input['videos'])){
            $input['videos'] = 'N';
        }
        if(!isset($input['prediction_files'])){
            $input['prediction_files'] = 'N';
        }
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        $result = User::create($input);
        if($result){
            return redirect()->route('subscription.index')
                        ->with('success','Subscription created successfully!');
        }else{
            return redirect()->route('subscription.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::where('id',$id)->delete();
        if($result)
        {
            return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
        }
        else
        {
            return redirect()->route('users.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        if($user->status == 'R'){
            $user->status = 'A';
        }else{
            $user->status = 'R';
        }
        $result = $user->update();
        if($result){
            return redirect()->route('users.index')
                        ->with('success','Status Update successfully');
        }else{
            return redirect()->route('users.index')
                        ->with('error','Status Not Updated!');
        }
    }
}
