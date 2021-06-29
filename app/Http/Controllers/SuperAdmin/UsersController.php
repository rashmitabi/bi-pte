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
                        $checkbox = '<input type="checkbox" class="form-check-input position-relative ml-0 checkSingleStudent" data-id="'.$row->id.'" value="0">';
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
                                <li class="action" data-toggle="modal" data-target="#userdetail"><a href="javascript:void(0);" ><i class="fas fa-user"></i></a></li>

                                    <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" class="user-edit" data-id="'.$row->id .'" data-url="'.route('users.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash" ></i></a></li>

                                    <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "green" : "bg-danger"):'').'"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('superadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

                                    <li class="action" class="action" data-toggle="modal" data-target="#mocktest"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action" class="action" data-toggle="modal" data-target="#practisetest"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
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
                        $checkbox = '<input type="checkbox" class="form-check-input position-relative ml-0 checkSingleInstitute" data-id="'.$row->id.'" value="0">';
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
                        
                        $phone_number = isset($row->institue->phone_number) ? $row->institue->phone_number : '-';
                        return $phone_number;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                                <li class="action" data-toggle="modal" data-target="#userdetail"><a href="javascript:void(0);" ><i class="fas fa-user"></i></a></li>

                                    <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" class="user-edit" data-id="'.$row->id .'" data-url="'.route('users.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger"><a href="javascript:void(0);" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>

                                    <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "green" : "bg-danger"):'').'"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('superadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

                                    <li class="action" class="action" data-toggle="modal" data-target="#mocktest"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action" class="action" data-toggle="modal" data-target="#practisetest"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
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
                'fname' => 'required|min:3|max:100',
                'lname' => 'required|min:3|max:100',
                'uname'=>'required|unique:users,name|max:255',
                'semail'=>'required|email|unique:users,email|max:255',
                'dob' =>'required|before:18 years ago',
                'mobileno' =>'required|max:20',
                'sstatus'=>'required|in:P,A,R',
                'gender'=>'required|in:M,F',
                'scitizen'=>'required|min:2|max:255',
                'sresidence'=>'required|min:2|max:255',
                'svalidity'=>'required|after:' . date('Y-m-d'),
                'simage'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));
            
           
  
            if ($image = $request->file('simage')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
            }

            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => 0,
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['semail'],
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => isset($fileNameToStore)?$fileNameToStore:'',
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
                'iuname' => 'required|unique:users,name|max:255',
                'iname'=>'required|min:2|max:255',
                'iemail'=>'required|email|unique:users,email|max:255',
                'country_code'=>'required|max:5',
                'phone_no' =>'required|max:20',
                'status'=>'required|in:P,A,R',
                'students_allowed' =>'required',
                'subdomain' =>'required|max:255',
                'domain'=>'required|max:255',
                'welcome_msg'=>'required|max:500',
                'city'=>'required|min:2|max:255',
                'logo'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'banner'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'bimage'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'validity'=>'required|after:' . date('Y-m-d'),
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
                'admin_practice_question'=>'required|in:Y,N',
                'admin_test'=>'required|in:Y,N'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));

            if ($image = $request->file('logo')) {
                $destinationPath = 'assets/images/institute/';
                $logo = date('YmdHis') ."_logo". "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $logo);
            }

            if ($image = $request->file('banner')) {
                $destinationPath = 'assets/images/institute/';
                $banner = date('YmdHis') ."_banner". "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $banner);
            }

            if ($image = $request->file('bimage')) {
                $destinationPath = 'assets/images/profile/';
                $profile = date('YmdHis') ."_banner". "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profile);
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    // 'first_name' => '',
                    // 'last_name' => '',
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
                    'mobile_no' => $input['phone_no'],
                    // 'date_of_birth' => '',
                    'profile_image' => $profile,
                    // 'gender' => '',
                    'country_citizen' => $input['city'],
                    // 'country_residence' => '',
                    'validity' => $input['validity'],
                    'status' => $input['status'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );
            }else{
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    // 'first_name' => '',
                    // 'last_name' => '',
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
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
            }

            

            $user_id = User::create($user_input)->id;

            $institue = array(
                'user_id' => $user_id,
                'sub_domain' => $input['subdomain'],
                'domain' => $input['domain'],
                'students_allowed' => $input['students_allowed'],
                'logo' => isset($logo) ? $logo : '',
                'banner_image' => isset($banner) ? $banner : '',
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
       $roles = Roles::all();
       $user = User::with(['institue'])->find($id);
       $html_user = view($this->moduleTitleP.'show', compact('roles','user'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_user    
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
                'fname' => 'required|min:3|max:100',
                'lname' => 'required|min:3|max:100',
                'uname'=>'required|unique:users,name,'.$id.'|max:255',
                'semail'=>'required|email|unique:users,email,'.$id.'|max:255',
                'dob' =>'required|before:18 years ago',
                'mobileno' =>'required|max:20',
                'sstatus'=>'required|in:P,A,R',
                'gender'=>'required|in:M,F',
                'scitizen'=>'required|min:2|max:255',
                'sresidence'=>'required|min:2|max:255',
                'svalidity'=>'required|after:' . date('Y-m-d'),
                'simage'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));

            if ($image = $request->file('simage')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    'first_name' => $input['fname'],
                    'last_name' => $input['lname'],
                    'name' => $input['uname'],
                    'email' => $input['semail'],
                    'mobile_no' => $input['mobileno'],
                    'date_of_birth' => $input['dob'],
                    'profile_image' => $fileNameToStore,
                    'gender' => $input['gender'],
                    'country_citizen' => $input['scitizen'],
                    'country_residence' => $input['sresidence'],
                    'validity' => $input['svalidity'],
                    'status' => $input['sstatus'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );

            }else{
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    'first_name' => $input['fname'],
                    'last_name' => $input['lname'],
                    'name' => $input['uname'],
                    'email' => $input['semail'],
                    'mobile_no' => $input['mobileno'],
                    'date_of_birth' => $input['dob'],
                    'gender' => $input['gender'],
                    'country_citizen' => $input['scitizen'],
                    'country_residence' => $input['sresidence'],
                    'validity' => $input['svalidity'],
                    'status' => $input['sstatus'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );

            }

            
            $result = User::where('id',$id)->update($user_input);
        }else if($type == 2){
           $request->validate([
                'type'=>'required',
                'iuname' => 'required|unique:users,name,'.$id.'|max:255',
                'iname'=>'required',
                'iemail'=>'required|email|unique:users,email,'.$id.'|max:255',
                'country_code'=>'required|max:5',
                'phone_no' =>'required|max:20',
                'status'=>'required|in:P,A,R',
                'students_allowed' =>'required',
                'subdomain' =>'required|max:255',
                'domain'=>'required|max:255',
                'welcome_msg'=>'required|max:500',
                'city'=>'required|min:2|max:255',
                'logo'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'banner'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'validity'=>'required|after:' . date('Y-m-d'),
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
                'admin_practice_question'=>'required|in:Y,N',
                'admin_test'=>'required|in:Y,N'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));

            if ($image = $request->file('logo')) {
                $destinationPath = 'assets/images/institute/';
                $logo = date('YmdHis') ."_logo". "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $logo);
            }

            if ($image = $request->file('banner')) {
                $destinationPath = 'assets/images/institute/';
                $banner = date('YmdHis') ."_banner". "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $banner);
            }

            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => 0,
                // 'first_name' => '',
                // 'last_name' => '',
                'name' => $input['iuname'],
                'email' => $input['iemail'],
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
            if(isset($logo) && isset($banner)){
                $institue = array(
                    'user_id' => $id,
                    'sub_domain' => $input['subdomain'],
                    'domain' => $input['domain'],
                    'students_allowed' => $input['students_allowed'],
                    'logo' => $logo,
                    'banner_image' => $banner,
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
            }elseif (isset($logo) && !isset($banner)) {
                $institue = array(
                    'user_id' => $id,
                    'sub_domain' => $input['subdomain'],
                    'domain' => $input['domain'],
                    'students_allowed' => $input['students_allowed'],
                    'logo' => $logo,
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
            }elseif (!isset($logo) && isset($banner)) {
                $institue = array(
                    'user_id' => $id,
                    'sub_domain' => $input['subdomain'],
                    'domain' => $input['domain'],
                    'students_allowed' => $input['students_allowed'],
                    'banner_image' => $banner,
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
            }else{
                $institue = array(
                    'user_id' => $id,
                    'sub_domain' => $input['subdomain'],
                    'domain' => $input['domain'],
                    'students_allowed' => $input['students_allowed'],
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
            }
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

    public function changeStatus(Request $request,$id)
    {
        if(is_array($request->user_ids)){
            $users = User::whereIn('id',$request->user_ids)->get();
            $status = 'P';
            foreach ($users as $user) {
                if($user->status == 'R'){
                    $status = 'A';
                }else if($user->status == 'P'){
                    $status = 'A';    
                }else{
                    $status = 'R';
                }
                $result = User::where('id',$user->id)->update(array("status" => $status));
            }
            if($result){
                \Session::put('success', 'Status Update successfully');
                return true;
                
            }else{
                \Session::put('error', 'Status Not Updated!');
                return false;
                
            }
        }else{
            $user = User::find($id);
            if($user->status == 'R'){
                $user->status = 'A';
            }else if($user->status == 'P'){
                    $status = 'A';    
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

    public function showPassword(Request $request,$id){
        if(is_array($request->id)){
            $user = User::whereIn('id',$request->id)->get();
        }else{
            $user = User::find($id);
        }
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
        
        if(is_array($request->user_ids)){
            $result = User::whereIn('id',$request->user_ids)->where('role_id',$request->role_id)->update($input_password);
        }else{
            $result = User::where('id',$id)->update($input_password);
        }
        if($result){
            \Session::put('success', 'Set Password Update successfully');
            return true;
            
        }else{
            \Session::put('error', 'Set Password Not Updated!');
            return false;
            
        }
    }
}
