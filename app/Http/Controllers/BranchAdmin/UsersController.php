<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentDetails;
use App\Models\StudentTests;
use App\Models\UserAssignTests;
use App\Models\UserSession;
use App\Models\StudentAnswerData;
use App\Models\TestResults;
use App\Models\Certificates;
use App\Models\DeviceLogs;
use App\Models\Activities;
use App\Models\Notifications;
use App\Models\StudentsAnswerData;
use App\Models\PrecticeAnswerData;
use App\Models\Tests;
use App\Models\Roles;
use App\Models\Sections;
use App\Models\Institues;
use App\Models\EmailTemplates;
use App\Models\Subscriptions;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Requests\StoreUserRequest;
use Stevebauman\Location\Facades\Location;
use App\Exports\InstituteExport;
use App\Exports\studentExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailUser;
use DB;
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
        if(!checkPermission('add_student') && !checkPermission('manage_student') && !checkPermission('view_student')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
        $id = \Auth::user()->id;

            
        if($request->ajax()) {
             $data = User::with(['student_taken_test'])->where(['parent_user_id'=>$id,'role_id'=>3])->latest()->get();

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
                 ->addColumn('count', function($row){
                    
                    $count = ($row->student_taken_test->count() >0) ? $row->student_taken_test->count(): 0;
                    return $count;
                })
                ->addColumn('action', function($row){
                    $btn = '<ul class="actions-btns">
                            <li class="action" data-toggle="modal" data-target="#userdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="view" class="user-show" data-id="'.$row->id .'" data-url="'.route('branchadmin-students.show', $row->id).'"><i class="fas fa-user"></i></a></li>';
                    if(checkPermission('manage_student')){
                       $btn .= '<li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="edit" class="user-edit" data-id="'.$row->id .'" data-url="'.route('branchadmin-students.edit', $row->id).'" data-md="no"><i class="fas fa-pen"></i></a></li>

                                <li class="action bg-danger" data-toggle="tooltip" data-placement="top" title="delete"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('branchadmin-students.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash" ></i></a></li>

                                <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "bg-danger" : "green"):'').'" data-toggle="tooltip" data-placement="top" title="status"><a href="'.route('branchadmin-students-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="password" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('branchadmin-students-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

                                <li class="action" class="action" data-toggle="modal" data-target="#mocktest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="mock test" class="get-assign-test" data-test-type="M" data-id="'.$row->id.'" data-url="'.route('branchadmin-students-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/exam.svg').'"
                                            class=""></a></li>

                                <li class="action" class="action" data-toggle="modal" data-target="#practisetest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="practise test" class="get-assign-test" data-test-type="P" data-id="'.$row->id.'" data-url="'.route('branchadmin-students-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/test.svg').'"
                                            class=""></a></li> 

                                <li class="action" class="action" data-toggle="modal" data-target="#result">
                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Student Test Result" class="view-test-result" data-id="'.$row->id.'" data-url="'.route('branchadmin-student-result',$row->id).'">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                </li>                                   
                            </ul>';
                    }
                    else{
                        $btn .= '</ul>';
                    }

                                
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
            $notification_data = array(
                'user_id' => $user_id,
                'sender_id' => \Auth::user()->id,
                'type' => getUserRole($user_id),
                'title' => "Branch admin assign test to students",
                'body' => "A new Test assign you.",
                'url' => ""
            );
            $notification = Notifications::create($notification_data);
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
        $auth_id = \Auth::user()->id;
        $tests = Tests::where(['type'=>$type,'generated_by_user_id'=>$auth_id])->latest()->get();
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
                $notification_data = array(
                    'user_id' => $new_user,
                    'sender_id' => \Auth::user()->id,
                    'type' => getUserRole($new_user),
                    'title' => "Branch admin assign test to students",
                    'body' => "A new Test assign you.",
                    'url' => ""
                );
                $notification = Notifications::create($notification_data);
            }
        }else{
            foreach($user_id as $new_user)
            {
                $result = UserAssignTests::updateOrCreate(['user_id'   => $new_user,],
                ['mock_test_id'   => $test_id,]);
                $notification_data = array(
                    'user_id' => $new_user,
                    'sender_id' => \Auth::user()->id,
                    'type' => getUserRole($new_user),
                    'title' => "Branch admin assign test to students",
                    'body' => "A new Test assign you.",
                    'url' => ""
                );
                $notification = Notifications::create($notification_data);
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
        if(!checkPermission('add_student')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
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
            'uname'=>'required|regex:/^[a-zA-Z0-9]+$/u|unique:users,name|max:255,',
            'email'=>'required|email|unique:users,email|max:255',
            'password'=>'required|min:8|max:20',
            'confirm_password'=>'required|same:password',
            'dob' =>'required|before:18 years ago',
            'mobileno' =>'required|digits:10',
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

            $body = 'Hello '.$input['uname'].', <p>A PTE account has been created by your branch administrator using your email address. You can Contact Us at '.\Auth::user()->email.' if you have any questions regarding the creation of your account.</p><p>You can access your account with following details:</p>User Name: '.$input['uname'].' <br/> Password : '.$input['password'].' <br/>Thanks,<br/>PTE Team';

            $subject = 'A new PTE account has been created with your email address.';
            


            $count = User::where('parent_user_id',\Auth::user()->id)->count();
            $Institues = Institues::where('user_id',\Auth::user()->id)->get();
            
            if($count == $Institues[0]->students_allowed || $count > $Institues[0]->students_allowed){
                return redirect()->route('branchadmin-students.index')
                ->with('error','Sorry!Your student add limit is out of reach!');
            }
            
            if ($image = $request->file('image')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
            }

            if(!isset($input['status'])){
                $input['status'] = 'P';
            }

            $password = Hash::make($input['password']);
            $user_input = array(
                'role_id' => '3',
                'parent_user_id' => \Auth::user()->id,
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['email'],
                'password'=>$password,
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => isset($fileNameToStore)?$fileNameToStore:'',
                'gender' => $input['gender'],
                'country_citizen' => $input['citizen'],
                'country_residence' => $input['residence'],
                'state' => $input['state'],
                'state_code' => $input['state_code'],
                'city'=> $input['city'],
                'validity' => $input['validity'],
                'status' => $input['status'],
                'ip_address' => '',
                'latitude' => '',
                'longitude' => ''
            );
            $result = User::create($user_input);
        if($result){
            $data = ['body'=>$body,'subject'=>$subject];
            try{
                Mail::to($input['email'])->send(new SendEmailUser($data));
                $flag = 1;
            }catch(\Exception $e){
                dd($e->getMessage());
            }

            $name = getUserName($result->id);
            $activity_data = array(
                'user_id' => \Auth::user()->id,
                'role_id' => \Auth::user()->role_id,
                'subject' => 'Add student '.$name,
                'message' => "You successfully create student ".$name,
                'ip_address' => getUserIP(),
                'latitude' => '',
                'longitude' => ''
            );
            $activity = Activities::create($activity_data);
            return redirect()->route('branchadmin-students.index')
                        ->with('success','User created successfully!');
        }else{
            return redirect()->route('branchadmin-students.index')
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
            'uname'=>'required|regex:/^[a-zA-Z0-9]+$/u|unique:users,name,'.$id.'|max:255',
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
            $subject = 'Your PTE account information has been updated.';
            $body    = 'Hello '.$input['fname'].' '.$input['lname'].', <p>Your PTE account information has been updated by the branch administrator. Please login and check your account details for the updated information.</p><br/>Thanks,<br/>PTE Team';
            $data = ['body'=>$body,'subject'=>$subject];
            try{
                Mail::to($input['email'])->send(new SendEmailUser($data));
            }catch(\Exception $e){
                dd($e->getMessage());
            }
            $notification_data = array(
                'user_id' => $id,
                'sender_id' => \Auth::user()->id,
                'type' => getUserRole($id),
                'title' => "Update your profile.",
                'body' => "Your account information has been updated.",
                'url' => ""
            );
            $notification = Notifications::create($notification_data);
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
        if(!checkPermission('manage_student')){
            return redirect()->route('branchadmin-dashboard')
                        ->with('error','You are not accessible to the requested URL.');
        
        }
        $name = getUserName($id);
        $user = User::find($id);
        if($user)
        {
            $activity_data = array(
                'user_id' => \Auth::user()->id,
                'role_id' => \Auth::user()->role_id,
                'subject' => 'delete student '.$name,
                'message' => "You successfully deleted student ".$name,
                'ip_address' => getUserIP(),
                'latitude' => '',
                'longitude' => ''
            );
            try{
                $body = 'Hello '.$user->fullname.', <p>Your PTE account has been deleted by the branch administrator. You can Contact Us at '.\Auth::user()->email.' if you have any questions regarding the deletion of your account.</p><br/>Thanks,<br/>PTE Team';
                $subject = 'Your PTE account has been deleted.';
                $data = ['body'=>$body,'subject'=>$subject];
                $emailid = $user->email;
                Mail::to($emailid)->send(new SendEmailUser($data));

                DB::beginTransaction();
                    DeviceLogs::where('user_id',$id)->delete();
                    Notifications::where('user_id',$id)->delete();
                    Activities::where('user_id',$id)->delete();
                    UserSession::where('user_id',$id)->delete();
                    StudentsAnswerData::where('student_id',$id)->delete();
                    TestResults::where('user_id',$id)->delete();
                    StudentTests::where('user_id',$id)->delete();
                    UserAssignTests::where('user_id',$id)->delete();
                    Certificates::where('student_user_id',$id)->delete();
                    StudentDetails::where('user_id',$id)->delete();
                    User::where('id',$id)->delete();
                    $activity = Activities::create($activity_data);
                DB::commit();

                

                return redirect()->route('branchadmin-students.index')->with('success','Student deleted successfully');
            }catch(\Exception $e){
                DB::rollback();
                dd($e->getMessage());
                return redirect()->route('branchadmin-students.index')->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            return redirect()->route('branchadmin-students.index')
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
        $templates = EmailTemplates::where('user_id',\Auth::user()->id)->get();
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
        $flag = 0;
        $template = EmailTemplates::find($emailtemplate);
        if($template)
        {
            $allEmails= User::whereIn('id',$user_ids)->pluck('email')->toArray();
            //dd($template->body,$allEmails);
            $data = ['body'=>$request->body,'subject'=>$template->subject];
             // \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
            try{
                Mail::to($allEmails)->send(new SendEmailUser($data));
                $flag = 1;
            }catch(\Exception $e){
                $flag = 0;
                dd($e->getMessage());
            }
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
                foreach($user_ids as $new_user)
                {
                    $user = User::find($new_user);
                    $body = 'Hello '.$user->fullname.', <p>Your PTE account has been blocked/unblocked by the branch administrator. You can Contact Us at '.\Auth::user()->email.' if you have any questions regarding the same.</p><br/>Thanks,<br/>PTE Team';
                    $subject = 'Your PTE account has been blocked/unblocked.';
                    $data = ['body'=>$body,'subject'=>$subject];
                    $emailid = $user->email;
                    try{
                        Mail::to($emailid)->send(new SendEmailUser($data));
                    }catch(\Exception $e){
                        dd($e->getMessage());
                    }
                }

                \Session::put('success', 'Status Updated successfully');
                return true;
                
            }else{
                \Session::put('error', 'Status Not Updated!');
                return false;
                
            }
        }
        else
        {            
            if(!checkPermission('manage_student')){
                return redirect()->route('branchadmin-dashboard')
                            ->with('error','You are not accessible to the requested URL.');
            
            }
            $user = User::find($id);
            if($user->status == 'A'){
                $user->status = 'R';
            }else if($user->status == 'R' || $user->status == 'P'){
                $user->status = 'A';
            }
            $result = $user->update();
            if($result){
                $user = User::find($id);
                $body = 'Hello '.$user->fullname.', <p>Your PTE account has been blocked/unblocked by the branch administrator. You can Contact Us at '.\Auth::user()->email.' if you have any questions regarding the same.</p><br/>Thanks,<br/>PTE Team';
                $subject = 'Your PTE account has been blocked/unblocked.';
                $data = ['body'=>$body,'subject'=>$subject];
                $emailid = $user->email;
                try{
                    Mail::to($emailid)->send(new SendEmailUser($data));
                }catch(\Exception $e){
                    dd($e->getMessage());
                }
                return redirect()->route('branchadmin-students.index')
                            ->with('success','Status Updated successfully');
            }else{
                return redirect()->route('branchadmin-students.index')
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
            $user = User::find($new_user);
            $body = 'Hello '.$user->fullname.', <p>Your PTE account has been blocked/unblocked by the branch administrator. You can Contact Us at '.\Auth::user()->email.' if you have any questions regarding the same.</p><br/>Thanks,<br/>PTE Team';
            $subject = 'Your PTE account has been blocked/unblocked.';
            $data = ['body'=>$body,'subject'=>$subject];
            $emailid = $user->email;
            try{
                Mail::to($emailid)->send(new SendEmailUser($data));
            }catch(\Exception $e){
                dd($e->getMessage());
            }
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
           'password' => 'required|min:8|max:20',
           'confirm_password' => 'required|same:password'
        ]);
        $input  = \Arr::except($request->all(),array('_token'));

        $input_password = array("password" => Hash::make($input['password']));
        
        if(is_array($request->user_ids)){
            $result = User::whereIn('id',$request->user_ids)->where('role_id',$request->role_id)->update($input_password);
            foreach ($request->user_ids as $user_id) {
                $user = User::find($user_id);
                $body = "Hello ".$user->fullname.", <p>Your PTE account password has been changed by the branch administrator. You can Contact Us at ".\Auth::user()->email." if you have any questions regarding the updation of your account password.</p><p>You can now access your PTE account with following login details:</p>Username:".$user->name."<br/>Password:".$input['password']."<br/>Thanks,<br/>PTE Team";
                $subject = "Your PTE account password has been reset.";
                $data = ['body'=>$body,'subject'=>$subject];
                try{
                    Mail::to($user->email)->send(new SendEmailUser($data));
                }catch(\Exception $e){
                    dd($e->getMessage());
                }
            }
        }else{
            $result = User::where('id',$id)->update($input_password);
            $user = User::find($id);
            $body = "Hello ".$user->fullname.", <p>Your PTE account password has been changed by the branch administrator. You can Contact Us at ".\Auth::user()->email." if you have any questions regarding the updation of your account password.</p><p>You can now access your PTE account with following login details:</p>Username:".$user->name."<br/>Password:".$input['password']."<br/>Thanks,<br/>PTE Team";
            $subject = "Your PTE account password has been reset.";
            $data = ['body'=>$body,'subject'=>$subject];
            try{
                Mail::to($user->email)->send(new SendEmailUser($data));
            }catch(\Exception $e){
                dd($e->getMessage());
            }
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
        
        $subscriptions = Subscriptions::where('status','E')->get();

        return view('branchadmin.subscription',compact('subscriptions'));
    }

    public function subscriptionPayment(Request $request)
    {
        dd($request->all());
    }

    public function result($id){
        $data = TestResults::with(['test'])
                ->selectRaw('test_results.test_id,test_results.section_id,SUM(get_score) AS score')
                ->join('student_tests', function($join)
                         {
                             $join->on('student_tests.user_id', '=', 'test_results.user_id');
                             $join->on('student_tests.test_id', '=', 'test_results.test_id');
                         })
                ->where('test_results.user_id', '=', $id)
                ->where('student_tests.status', '=', 'C')
                ->groupBy('test_results.test_id', 'test_results.section_id')
                ->get();  

        $results = array();
        foreach($data as $d){
            $results[$d->test_id]['name'] = $d->test->test_name;
            $results[$d->test_id][strtolower($d->section->section_name)] = $d->score;
        }

        $html = view('branchadmin.student.result',compact('results'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html    
        ]);
    }
}
