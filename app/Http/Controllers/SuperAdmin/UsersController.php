<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Requests\StoreUserRequest;

class UsersController extends Controller
{
    private $moduleTitleP = 'superadmin.users.';
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

                                    <li class="action shield '.(($row->status == "A") ? "green" : "bg-danger").'"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('users.show', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

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

                                    <li class="action shield '.(($row->status == "A") ? "green" : "bg-danger").'"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('users.show', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
            }
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
        $roles = Roles::all();
        return view($this->moduleTitleP.'add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $type = $request->input('type');
        
        
        if($type == 3){
            $request->validate([
                'type'=>'required',
                'fname' => 'required',
                'lname' => 'required',
                'uname'=>'required',
                'password'=>'required',
                'confirm_password'=>'required|same:password',
                'semail'=>'required',
                'dob' =>'required',
                'mobileno' =>'required',
                'sstatus'=>'required|in:P,A,R',
                'gender'=>'required|in:M,F',
                'scitizen'=>'required',
                'sresidence'=>'required',
                'svalidity'=>'required',
                'simage'=>'nullable'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));
            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => 0,
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['semail'],
                'password' => $input['password'],
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => '',
                'gender' => $input['gender'],
                'country_citizen' => $input['scitizen'],
                'country_residence' => $input['sresidence'],
                'validity' => $input['svalidity'],
                'status' => $input['sstatus'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );
            $result = User::create($user_input);
        }else if($type == 2){
            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => 0,
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['semail'],
                'password' => $input['password'],
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => '',
                'gender' => $input['gender'],
                'country_citizen' => $input['scitizen'],
                'country_residence' => $input['sresidence'],
                'validity' => $input['svalidity'],
                'status' => $input['sstatus'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );
           
            $result = User::create($user_input);
        }

        if($result){
            return redirect()->route('users.index')
                        ->with('success','User created successfully!');
        }else{
            return redirect()->route('users.index')
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
        $user = User::find($id);
        $html_password = view($this->moduleTitleP.'password', compact('user'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_password    
        ]);
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

    public function setPassword(Request $request,$id){
        
        $request->validate([
           'password' => 'required',
           'confirm_password' => 'required|same:password'
        ]);
        $input  = \Arr::except($request->all(),array('_token'));

        $input_password = array("password" => Hash::make($input['password']));

        $result = User::where('id',$id)->update($input_password);
        if($result){
            \Session::put('success', 'Set Password Update successfully');
            return true;
            
        }else{
            \Session::put('error', 'Set Password Not Updated!');
            return false;
            
        }
    }
}
