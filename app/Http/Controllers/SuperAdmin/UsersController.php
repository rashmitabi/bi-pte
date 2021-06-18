<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Institues;
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
                                    <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" class="user-edit" data-id="'.$row->id .'" data-url="'.route('users.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash" ></i></a></li>

                                    <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "green" : "bg-danger"):'').'"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('superadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

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
                                <li class="action" data-toggle="modal" data-target="#mocktest"><a href="#"><i class="fas fa-user"></i></a></li>

                                    <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" class="user-edit" data-id="'.$row->id .'" data-url="'.route('users.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger"><a href="javascript:void(0);" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>

                                    <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "green" : "bg-danger"):'').'"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('superadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>
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
    {   
        $result='';
        $type = $request->input('type');
        if($type == 3){
            $request->validate([
                'type'=>'required',
                'fname' => 'required',
                'lname' => 'required',
                'uname'=>'required|unique:users,name',
                'password'=>'required',
                'confirm_password'=>'required|same:password',
                'semail'=>'required|email|unique:users,email',
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

            $request->validate([
                'type'=>'required',
                'iuname' => 'required|unique:users,name',
                'iname'=>'required',
                'iemail'=>'required|email|unique:users,email',
                'ipassword'=>'required',
                'iconfirm_password'=>'required',
                'country_code'=>'required|max:5',
                'phone_no' =>'required',
                'status'=>'required|in:P,A,R',
                'students_allowed' =>'required',
                'subdomain' =>'required',
                'domain'=>'required',
                'welcome_msg'=>'required',
                'city'=>'required',
                'logo'=>'nullable',
                'banner'=>'nullable',
                'validity'=>'required',
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
                'admin_practice_question'=>'required|in:Y,N',
                'admin_test'=>'required|in:Y,N'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));
            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => 0,
                // 'first_name' => '',
                // 'last_name' => '',
                'name' => $input['iuname'],
                'email' => $input['iemail'],
                'password' => $input['password'],
                'mobile_no' => $input['phone_no'],
                // 'date_of_birth' => '',
                'profile_image' => '',
                // 'gender' => '',
                'country_citizen' => $input['city'],
                // 'country_residence' => '',
                'validity' => $input['validity'],
                'status' => $input['status'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );

            $user_id = User::create($user_input)->id;

            $institue = array(
                'user_id' => $user_id,
                'sub_domain' => $input['subdomain'],
                'domain' => $input['domain'],
                'students_allowed' => $input['students_allowed'],
                'logo' => '',
                'banner_image' => '',
                'show_admin_videos' => $input['admin_video'],
                'show_admin_tests' => $input['admin_test'],
                'show_admin_files' => $input['admin_prediction_file'],
                'show_practice_questions' => $input['admin_practice_question'],
                'welcome_message'=> $input['welcome_msg'],
                'country_phone_code'=> $input['country_code'],
                'phone_number'=> $input['phone_no'],
                'institute_name'=> $input['iname'],
                'white_labelling'=> 'N'
            );

            $result = Institues::create($institue);
            
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Roles::all();
        $user = User::with(['institue'])->find($id);
        $html_user = view($this->moduleTitleP.'edit', compact('roles','user'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_user    
        ]);
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
        $type = $request->input('type');
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
            $result = User::where('id',$id)->update($user_input);
        }else if($type == 2){
            $request->validate([
                'type'=>'required',
                'iuname' => 'required|unique:users,name,'.$id,
                'iname'=>'required',
                'iemail'=>'required|email|unique:users,email,'.$id,
                'ipassword'=>'required',
                'iconfirm_password'=>'required',
                'country_code'=>'required|max:5',
                'phone_no' =>'required',
                'status'=>'required|in:P,A,R',
                'students_allowed' =>'required',
                'subdomain' =>'required',
                'domain'=>'required',
                'welcome_msg'=>'required',
                'city'=>'required',
                'logo'=>'nullable',
                'banner'=>'nullable',
                'validity'=>'required',
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
                'admin_practice_question'=>'required|in:Y,N',
                'admin_test'=>'required|in:Y,N'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));
            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => 0,
                // 'first_name' => '',
                // 'last_name' => '',
                'name' => $input['iuname'],
                'email' => $input['iemail'],
                'password' => $input['ipassword'],
                'mobile_no' => $input['phone_no'],
                // 'date_of_birth' => '',
                'profile_image' => '',
                // 'gender' => '',
                'country_citizen' => $input['city'],
                // 'country_residence' => '',
                'validity' => $input['validity'],
                'status' => $input['status'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );

            $result = User::where('id',$id)->update($user_input);

            $institue = array(
                'user_id' => $id,
                'sub_domain' => $input['subdomain'],
                'domain' => $input['domain'],
                'students_allowed' => $input['students_allowed'],
                'logo' => '',
                'banner_image' => '',
                'show_admin_videos' => $input['admin_video'],
                'show_admin_tests' => $input['admin_test'],
                'show_admin_files' => $input['admin_prediction_file'],
                'show_practice_questions' => $input['admin_practice_question'],
                'welcome_message'=> $input['welcome_msg'],
                'country_phone_code'=> $input['country_code'],
                'phone_number'=> $input['phone_no'],
                'institute_name'=> $input['iname'],
                'white_labelling'=> 'N'
            );

            $result = Institues::where('user_id',$id)->update($institue);
        }

        if($result){
            \Session::put('success', 'User updated successfully!');
            return true;
            
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
            
        }
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

    public function showPassword($id){
        $user = User::find($id);
        $html_password = view($this->moduleTitleP.'password', compact('user'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_password    
        ]);
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
