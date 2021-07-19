<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tests;
use App\Models\UserAssignTests;
use App\Models\Roles;
use App\Models\Sections;
use App\Models\Institues;
use App\Models\EmailTemplates;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Requests\StoreUserRequest;
use Stevebauman\Location\Facades\Location;
use App\Exports\InstituteExport;
use App\Exports\studentExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class UsersController extends Controller
{
    private $moduleTitleP = 'branchadmin.student.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        if($request->ajax()) {
            $data = User::where(['parent_user_id'=>$id,'role_id'=>3])->latest()->get();
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
                            <li class="action" data-toggle="modal" data-target="#userdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="view" class="user-show" data-id="'.$row->id .'" data-url="'.route('branchadmin-users.show', $row->id).'"><i class="fas fa-user"></i></a></li>

                                <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="edit" class="user-edit" data-id="'.$row->id .'" data-url="'.route('branchadmin-users.edit', $row->id).'" data-md="no"><i class="fas fa-pen"></i></a></li>

                                <li class="action bg-danger" data-toggle="tooltip" data-placement="top" title="delete"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('branchadmin-users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash" ></i></a></li>

                                <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "bg-danger" : "green"):'').'" data-toggle="tooltip" data-placement="top" title="status"><a href="'.route('branchadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="password" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('branchadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

                                <li class="action" class="action" data-toggle="modal" data-target="#mocktest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="mock test" class="get-assign-test" data-test-type="M" data-id="'.$row->id.'" data-url="'.route('branchadmin-user-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/exam.svg').'"
                                            class=""></a></li>

                                <li class="action" class="action" data-toggle="modal" data-target="#practisetest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="practise test" class="get-assign-test" data-test-type="P" data-id="'.$row->id.'" data-url="'.route('branchadmin-user-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/test.svg').'"
                                            class=""></a></li>                                   
                            </ul>';
                    return $btn;
                })
                ->rawColumns(['checkbox','action'])
                ->make(true);
            
        }
        return view($this->moduleTitleP.'index');
    } 
    public function studentExport(Request $request) 
    {
        return Excel::download(new studentExport($request->ids), 'student.xlsx');
    }

    public function showMockTest(){
        $roles = Roles::all();
        $user = User::with(['institue'])->find($id);
        $admins = User::where('role_id',2)->with(['institue'])->get();
        $html_user = view($this->moduleTitleP.'edit', compact('roles','user','admins'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_user    
        ]);
    }
    /* single user assign tests start*/
    public function getAssignTest(Request $request,$id)
    {
        $type = $request->type;
        $auth_id = \Auth::user()->id;
        $tests = Tests::where(['type'=>$type,'generated_by_user_id'=>$auth_id])->latest()->get();
        $user_id = $id;
        $user = User::find($id);
        $userAssignTests = UserAssignTests::where('user_id',$user_id)->first();
        if($type == 'P'){
            $alreadyAssign = [];
            if(isset($userAssignTests->practise_test_id) && !empty($userAssignTests->practise_test_id)){
                $alreadyAssign = explode(",",$userAssignTests->practise_test_id);
            }
        }else{
            $alreadyAssign = [];
            if(isset($userAssignTests->mock_test_id) && !empty($userAssignTests->mock_test_id)){
                $alreadyAssign = explode(",",$userAssignTests->mock_test_id);
            }
        }
        $html_Prectice = view($this->moduleTitleP.'assignTest', compact('user', 'tests','user_id','alreadyAssign','type'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_Prectice   
        ]);
    }
    public function postAssignTest(Request $request)
    {
        $user_id = $request->user_id;
        $test_id = implode(",",$request->id);
        $type    = $request->type;
        if($type == 'P'){
            $result = UserAssignTests::updateOrCreate(['user_id'   => $user_id,],
            ['practise_test_id'   => $test_id,]);
        }else{
            $result = UserAssignTests::updateOrCreate(['user_id'   => $user_id,],
                    ['mock_test_id'   => $test_id,]);
        }
        if($result){
            \Session::put('success', 'Tests Assiged successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
    /* single user assign tests end*/

    /* multiple user assign tests start*/
    public function getMultipleAssignTest(Request $request)
    {
        $type = $request->type;
        $tests = Tests::where(['type'=>$type])->latest()->get();
        $user_id = implode(",",$request->id);
        $role = $request->role;
        $users = User::whereIn('id', $request->id)->get();     
        $usernames = $role.' -  ';
        $i = 1;
        foreach($users as $user){
            if($role = 'Students'){
                $usernames .= $user->first_name.' '.$user->last_name;
            }
            elseif($role = 'Institute'){
                if(isset($user->institue->institute_name)){
                    $usernames .= $user->institue->institute_name;
                }
                elseif(isset($user->name)){
                    $usernames .= $user->name;
                }
            }
            if($i < count($users)){
                $usernames.= ',  ';
            }
            $i++;
        }   
        $html_Prectice = view($this->moduleTitleP.'assignMultipleUserTests', compact('tests','user_id','type', 'usernames'))->render();
        return response()->json([
            'success' => 1,
            'html'=>$html_Prectice   
        ]);
    }
    public function postMultipleAssignTest(Request $request)
    {
        $user_id = explode(",",$request->user_id);
        $test_id = implode(",",$request->id);
        $type    = $request->type;
        if($type == 'P'){
            foreach($user_id as $new_user)
            {
                $result = UserAssignTests::updateOrCreate(['user_id'   => $new_user,],
                        ['practise_test_id'   => $test_id,]);
            }
        }else{
            foreach($user_id as $new_user)
            {
                $result = UserAssignTests::updateOrCreate(['user_id'   => $new_user,],
                ['mock_test_id'   => $test_id,]);
            }
        }
        if($result){
            \Session::put('success', 'Tests Assiged successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
    /* multiple user assign tests end*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        $admins = User::where('role_id',2)->with(['institue'])->get();
        return view($this->moduleTitleP.'add',compact('roles','admins'));
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
        $request->validate([
            'fname' => 'required|min:3|max:100',
            'lname' => 'required|min:3|max:100',
            'uname'=>'required|unique:users,name|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'dob' =>'required|before:18 years ago',
            'mobileno' =>'required|digits:10',
            'gender'=>'required|in:M,F',
            'citizen'=>'required|min:2|max:255',
            'residence'=>'required|min:2|max:255',
            'state'=>'required|min:2|max:100',
            'state_code'=>'required|min:1|max:100',
            'validity'=>'required|after:' . date('Y-m-d'),
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
            $input  = \Arr::except($request->all(),array('_token'));
            
            if ($image = $request->file('image')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
            }

            if(!isset($input['status'])){
                $input['status'] = 'P';
            }
            $user_input = array(
                'role_id' => '3',
                'parent_user_id' => \Auth::user()->id,
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['email'],
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => isset($fileNameToStore)?$fileNameToStore:'',
                'gender' => $input['gender'],
                'country_citizen' => $input['citizen'],
                'country_residence' => $input['residence'],
                'state' => $input['state'],
                'state_code' => $input['state_code'],
                'validity' => $input['validity'],
                'status' => $input['status'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );
            $result = User::create($user_input);
        if($result){
            return redirect()->route('branchadmin-users.index')
                        ->with('success','User created successfully!');
        }else{
            return redirect()->route('branchadmin-users.index')
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
        $admins = User::where('role_id',2)->with(['institue'])->get();
        $html_user = view($this->moduleTitleP.'edit', compact('roles','user','admins'))->render();

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
        $request->validate([
            'fname' => 'required|min:3|max:100',
            'lname' => 'required|min:3|max:100',
            'uname'=>'required|unique:users,name,'.$id.'|max:255',
            'email'=>'required|email|unique:users,email,'.$id.'|max:255',
            'dob' =>'required|before:18 years ago',
            'mobileno' =>'required|max:20',
            'gender'=>'required|in:M,F',
            'citizen'=>'required|min:2|max:255',
            'residence'=>'required|min:2|max:255',
            'state'=>'required|min:2|max:100',
            'state_code'=>'required|min:1|max:100',
            'city'=>'required|min:2|max:100',
            'validity'=>'required|after:' . date('Y-m-d'),
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $input  = \Arr::except($request->all(),array('_token'));
        if(!isset($input['status'])){
            $input['status'] = 'P';
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/profile/';
            $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileNameToStore);
            $user_input = array(
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['email'],
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => $fileNameToStore,
                'gender' => $input['gender'],
                'country_citizen' => $input['citizen'],
                'country_residence' => $input['residence'],
                'state' => $input['state'],
                'state_code' => $input['state_code'],
                'city'=>$input['city'],
                'validity' => $input['validity'],
                'status' => $input['status'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );

        }else{
            $user_input = array(
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['email'],
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'gender' => $input['gender'],
                'country_citizen' => $input['citizen'],
                'country_residence' => $input['residence'],
                'state' => $input['state'],
                'state_code' => $input['state_code'],
                'city'=>$input['city'],
                'validity' => $input['validity'],
                'status' => $input['status'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );

        }    
        $result = User::where('id',$id)->update($user_input);

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
            return redirect()->route('branchadmin-users.index')
                        ->with('success','User deleted successfully');
        }
        else
        {
            return redirect()->route('branchadmin-users.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
    public function getChangeStatus(Request $request)
    {
        $user_ids = implode(",",$request->user_ids);
        
        $html_password = view($this->moduleTitleP.'userstatusmodel',compact('user_ids'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_password    
        ]);
    }

    public function getSendEmail(Request $request)
    {
        // $user = implode(",",$request->user_ids);
        $user = $request->user_ids;
        $templates = EmailTemplates::get();
        $html_password = view($this->moduleTitleP.'emailtemplate',compact('user','templates'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_password    
        ]);
    }

    public function SendEmail(Request $request){
        // dd($request->all());
        $user_ids  = $request->user_ids;
        $emailtemplate  = $request->emailtemplate;
        
        $template = EmailTemplates::find($emailtemplate);
        $allEmails= User::whereIn('id',$user_ids)->pluck('email')->toArray();
        //dd($template->body,$allEmails);
        $data = ['body'=>$template->body];
        $flag = 0;
         // \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
        try{
            Mail::to($allEmails)->send(new SendEmailUser($data));
            $flag = 1;
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        
        if($flag == 1){
            \Session::put('success', 'Email send successfully!');
            return true;
        }else{
            \Session::put('error', 'Email address not valid..!');
            return false;  
        }
    }

    public function changeStatus(Request $request,$id)
    {
        if($request->has('status'))
        {
            $status   = $request->status;
            $user_ids = explode(",",$request->user_id);
            $result = User::whereIn('id',$user_ids)->update(['status'=>$status]);
            if($result){
                \Session::put('success', 'Status Updated successfully');
                return true;
                
            }else{
                \Session::put('error', 'Status Not Updated!');
                return false;
                
            }
        }
        else
        {
            $user = User::find($id);
            if($user->status == 'A'){
                $user->status = 'R';
            }else if($user->status == 'R' || $user->status == 'P'){
                $user->status = 'A';
            }
            $result = $user->update();
            if($result){
                return redirect()->route('branchadmin-users.index')
                            ->with('success','Status Updated successfully');
            }else{
                return redirect()->route('branchadmin-users.index')
                            ->with('error','Status Not Updated!');
            }
        }
    }
    public function singleUserBlock($id)
    {
        $user = User::find($id);
        if($user)
        {
            $user->status = "R";
            $user->update();   

            return redirect()->route('users.index')
                            ->with('success','Status Updated successfully');
        }
        else
        {
            return redirect()->route('users.index')
                            ->with('error','Status Not Updated!');
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
           'password' => 'required|min:6',
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
            \Session::put('success', 'Password Updated successfully');
            return true;
            
        }else{
            \Session::put('error', 'Set Password Not Updated!');
            return false;
            
        }
    }

    public function checkUniqueUsername(Request $request)
    {
        $username = $request->uname;
        $unique_type = $request->unique_type;
        $action      = $request->action;

        if($unique_type == 'username')
        {
            if($action == 'store'){
                if(User::where('name',$username)->exists()){
                    return false;
                }else{
                    return true;
                }
            }else{
                $id = $request->id;
                if(User::where('name',$username)->where('id','!=',$id)->exists()){
                    return false;
                }else{
                    return true;
                } 
            }
        }
        else
        {
            if($action == 'store'){
                if(User::where('email',$username)->exists()){
                    return false;
                }else{
                    return true;
                }
            }else{
                $id = $request->id;
                if(User::where('email',$username)->where('id','!=',$id)->exists()){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
    public function subscription(){
        return view('branchadmin.subscription');
    }
}
