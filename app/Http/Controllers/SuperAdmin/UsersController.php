<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DeviceLogs;
use App\Models\Notifications;
use App\Models\Activities;
use App\Models\UserSession;
use App\Models\StudentsAnswerData;
use App\Models\TestResults;
use App\Models\StudentTests;
use App\Models\UserAssignTests;
use App\Models\Certificates;
use App\Models\StudentDetails;
use App\Models\Videos;
use App\Models\PredictionFiles;
use App\Models\Questions;
use App\Models\Questiondata;
use App\Models\Answerdata;

use App\Models\Tests;
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
use App\Mail\SendEmailUser;
use DB;
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
                $data = User::where('role_id',3)->latest()->get();
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
                                <li class="action" data-toggle="modal" data-target="#userdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="view" class="user-show" data-id="'.$row->id .'" data-url="'.route('users.show', $row->id).'"><i class="fas fa-user"></i></a></li>

                                    <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="edit" class="user-edit" data-id="'.$row->id .'" data-url="'.route('users.edit', $row->id).'" data-md="no"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger" data-toggle="tooltip" data-placement="top" title="delete"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash" ></i></a></li>

                                    <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "bg-danger" : "green"):'').'" data-toggle="tooltip" data-placement="top" title="status"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="password" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('superadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

                                    <li class="action" class="action" data-toggle="modal" data-target="#mocktest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="mock test" class="get-assign-test" data-test-type="M" data-id="'.$row->id.'" data-url="'.route('superadmin-user-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/exam.svg').'"
                                                class=""></a></li>

                                    <li class="action" class="action" data-toggle="modal" data-target="#practisetest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="practise test" class="get-assign-test" data-test-type="P" data-id="'.$row->id.'" data-url="'.route('superadmin-user-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/test.svg').'"
                                                class=""></a></li>   

                                    <li class="action" class="action" data-toggle="modal" data-target="#result">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Student Test Result" class="view-test-result" data-id="'.$row->id.'" data-url="'.route('superadmin-student-result',$row->id).'">
                                        <i class="fas fa-eye"></i>
                                        </a>
                                    </li>                                 
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
            }else{

                $data = User::where('role_id',2)->latest()->with(['institue'])->get();
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
                                <li class="action" data-toggle="modal" data-target="#userdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="view" class="user-show" data-id="'.$row->id .'" data-url="'.route('users.show', $row->id).'"><i class="fas fa-user"></i></a></li>

                                    <li class="action" data-toggle="modal" data-target="#editdetail"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="edit" class="user-edit" data-id="'.$row->id .'" data-url="'.route('users.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>

                                    <li class="action bg-danger" data-toggle="tooltip" data-placement="top" title="delete"><a href="javascript:void(0);" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('users.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>

                                    <li class="action shield '.(($row->status != "P")? (($row->status == "A") ? "bg-danger" : "green"):'').'" data-toggle="tooltip" data-placement="top" title="status"><a href="'.route('superadmin-user-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>

                                    <li class="action" data-toggle="modal" data-target="#setpassword"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="password" class="user-setpassword" data-id="'.$row->id .'" data-url="'.route('superadmin-user-showpassword', $row->id).'"><i class="fas fa-unlock-alt"></i></a></li>

                                    <li class="action" class="action" data-toggle="modal" data-target="#mocktest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="mock test" class="get-assign-test" data-test-type="M" data-id="'.$row->id.'" data-url="'.route('superadmin-user-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/exam.svg').'"
                                                class=""></a></li>

                                    <li class="action" class="action" data-toggle="modal" data-target="#practisetest"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="practise test" class="get-assign-test" data-test-type="P" data-id="'.$row->id.'" data-url="'.route('superadmin-user-get-assign-test',$row->id).'"><img src="'. asset('assets/images/icons/test.svg').'"
                                                class=""></a></li>
                                </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
            }
        }
        return view($this->moduleTitleP.'index');
    }

    public function instituteExport(Request $request) 
    {
        return Excel::download(new InstituteExport($request->ids), 'institue.xlsx');
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
        $tests = Tests::where(['type'=>$type,'generated_by_user_id'=>\Auth::user()->id])->latest()->get();
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
        $user = User::find($user_id);
        if($type == 'P'){
            $result = UserAssignTests::updateOrCreate(['user_id'   => $user_id,],
            ['practise_test_id'   => $test_id,]);
        }else{
            $result = UserAssignTests::updateOrCreate(['user_id'   => $user_id,],
                    ['mock_test_id'   => $test_id,]);
        }
        if($result){
            if($user->role == '3')
            {
                $notification_data = array(
                    'user_id' => $user_id,
                    'sender_id' => \Auth::user()->id,
                    'type' => getUserRole($user_id),
                    'title' => "Assign Tests",
                    'body' => "Super admin Assign test to you.",
                    'url' => ""
                );
            }
            else
            {
                $notification_data = array(
                    'user_id' => $user_id,
                    'sender_id' => \Auth::user()->id,
                    'type' => getUserRole($user_id),
                    'title' => "Assign Tests",
                    'body' => "Super admin Assign test to you.",
                    'url' => ""
                );
            }
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
        $tests = Tests::where(['type'=>$type,'generated_by_user_id'=>\Auth::user()->id])->latest()->get();
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
        // $data = Location::get();
       // dd($data);

        $result='';
        $type = $request->input('type');
        $body = '';
        $subject = '';
        $regexUrl = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        if($type == 3){
            $request->validate([
                'type'=>'required',
                'branch_admin'=>'required',
                'fname' => 'required|min:3|max:100',
                'lname' => 'required|min:3|max:100',
                'uname'=>'required|regex:/^[a-zA-Z0-9]+$/u|unique:users,name|max:255',
                'semail'=>'required|email|unique:users,email|max:255',
                'spassword'=>'required|min:6|max:20',
                'confirm_spassword'=>'required|same:spassword',
                'dob' =>'required|before:18 years ago',
                'mobileno' =>'required|digits:10',
                'gender'=>'required|in:M,F',
                'scitizen'=>'required|min:2|max:255',
                'sresidence'=>'required|min:2|max:255',
                'sstate'=>'required|min:2|max:100',
                'sstate_code'=>'required|min:1|max:100',
                'scity'=>'required|min:2|max:100',
                'svalidity'=>'required|after:' . date('Y-m-d'),
                'simage'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ],
            [
                'semail.required'=> 'Email is required', // custom message
                'semail.email'=> 'Email is must be email format',
                'semail.unique'=> 'Email has already taken',
                'semail.max'=> 'Email maximum length allow 255',
                'spassword.required'=>'Password is required',
                'spassword.min'=>'Password min length at least 6',
                'spassword.max'=>'Password maximum length allow 20',
                'confirm_spassword.required'=>'Confirm password is required',
                'confirm_spassword.same'=>'Confirm password not match with password',
                'scitizen.required'=> 'Country Citizen is required',
                'scitizen.min'=>'Country Citizen min length at least 2',
                'scitizen.max'=>'Country Citizen maximum length allow 255',
                'sresidence.required'=>'Country Residence is required',
                'sresidence.min'=>'Country Residence min length at least 2',
                'sresidence.max'=>'Country Residence maximum length allow 255',
                'sstate.required'=>'State is required',
                'sstate.min'=>'State min length at least 2',
                'sstate.max'=>'State maximum length allow 255',
                'sstate_code.required'=>'State Code is required',
                'sstate_code.min'=>'State Code min length at least 1',
                'sstate_code.max'=>'State Code maximum length allow 255',
                'scity.required'=>'City is required',
                'scity.min'=>'City min length at least 2',
                'scity.max'=>'City maximum length allow 100',
                'svalidity.required'=>'Validity is required',
                'svalidity.after'=>'Validity date must be after today',
                'simage.image'=>'Image must be image file',
                'simage.mimes'=>'Image must be file jpeg,png,jpg format'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));
            $body = '</p>You are successfuly register as Student.</p>';
            $subject = 'Student register';
            $emailid = $input['semail'];
            if(!isset($input['sstatus'])){
                $input['sstatus'] = 'P';
            }
                
            if ($image = $request->file('simage')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
            }
            $password = Hash::make($input['spassword']);
            $user_input = array(
                'role_id' => $input['type'],
                'parent_user_id' => $input['branch_admin'],
                'first_name' => $input['fname'],
                'last_name' => $input['lname'],
                'name' => $input['uname'],
                'email' => $input['semail'],
                'password'=>$password,
                'mobile_no' => $input['mobileno'],
                'date_of_birth' => $input['dob'],
                'profile_image' => isset($fileNameToStore)?$fileNameToStore:'',
                'gender' => $input['gender'],
                'country_citizen' => $input['scitizen'],
                'country_residence' => $input['sresidence'],
                'state' => $input['sstate'],
                'state_code' => $input['sstate_code'],
                'city'=> $input['scity'],
                // 'gstin' => $input['sgstin'],
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
                'iuname' => 'required|regex:/^[a-zA-Z0-9]+$/u|unique:users,name|max:255',
                'iname'=>'required|min:2|max:255',
                'iemail'=>'required|email|unique:users,email|max:255',
                'ipassword'=>'required|min:6|max:20',
                'confirm_ipassword'=>'required|same:ipassword',
                'country_code'=>'required|max:5',
                'phone_no' =>'required|min:6|max:20',
                'subdomain' =>'required|max:255|regex:'.$regexUrl,
                'domain'=>'required|max:255|regex:'.$regexUrl,
                'welcome_msg'=>'required|max:500',
                'istate'=>'required|min:2|max:100',
                'istate_code'=>'required|min:1|max:100',
                'icity'=>'required|min:2|max:100',
                'igstin'=>'required|min:2|max:100',
                'logo'=>'required|image|mimes:jpeg,png,jpg|max:2048',
                'banner'=>'required|image|mimes:jpeg,png,jpg|max:2048',
                'bimage'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'validity'=>'required|after:' . date('Y-m-d'),
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
                //'admin_practice_question'=>'required|in:Y,N',
                'admin_test'=>'required|in:Y,N'
            ],
            [
                'iuname.required'=> 'user name is required', // custom message
                'iuname.regex'=> 'user name format not valid',
                'iuname.unique'=> 'user name already taken', // custom message
                'iuname.max'=> 'user name maximum length allow 255', // custom message
                'iname.required'=>'Institute Name is required',
                'iname.min'=>'Institute Name min length at least 2',
                'iname.max'=>'Institute Name max length is 255',
                'iemail.required'=>'Email is required',
                'iemail.email'=>'Email must be email format',
                'iemail.unique'=>'Email has already taken',
                'iemail.max'=>'Email maximum length allow 255',
                'ipassword.required'=>'Password is required',
                'ipassword.min'=>'Password min length at least 6',
                'ipassword.max'=>'Password maximum length allow 20',
                'confirm_ipassword.required'=>'Confirm password is required',
                'confirm_ipassword.same'=>'Confirm password not match with password',
                'istate.required'=>'State is required',
                'istate.min'=>'State min length at least 2',
                'istate.max'=>'State maximum length allow 100',
                'istate_code.required'=>'State Code is required',
                'istate_code.min'=>'State Code min length at least 1',
                'istate_code.max'=>'State Code maximum length allow 100',
                'icity.required'=>'City is required',
                'icity.min'=>'City min length at least 2',
                'icity.max'=>'City maximum length allow 100',
                'igstin.required'=>'GSTIN is required',
                'igstin.min'=>'GSTIN min length at least 2',
                'igstin.max'=>'GSTIN maximum length allow 100',
                'bimage.image'=>'Background image must be image format',
                'bimage.mimes'=>'Background image must be jpeg,png,jpg format',
                'bimage.max'=>'Background image maximum length allow 2048'
               ]);
            $input  = \Arr::except($request->all(),array('_token'));
            $body = '</p>You are successfuly register as Branch admin.</p>';
            $subject = 'Branch admin register';
            $emailid = $input['iemail'];

            if(!isset($input['istatus'])){
                $input['istatus'] = 'P';
            }
            $password = Hash::make($input['ipassword']);
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
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
                    'password'=> $password,
                    'mobile_no' => $input['phone_no'],
                    'profile_image' => $profile,
                    'state' => $input['istate'],
                    'state_code' => $input['istate_code'],
                    'city'=> $input['icity'],
                    'gstin' => $input['igstin'],
                    'validity' => $input['validity'],
                    'status' => $input['istatus'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );
            }else{
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
                    'password'=> $password,
                    'mobile_no' => $input['phone_no'],
                    'profile_image' => '',
                    'state' => $input['istate'],
                    'state_code' => $input['istate_code'],
                    'city'=> $input['icity'],
                    'gstin' => $input['igstin'],
                    'validity' => $input['validity'],
                    'status' => $input['istatus'],
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
                'logo' => isset($logo) ? $logo : '',
                'banner_image' => isset($banner) ? $banner : '',
                'show_admin_videos' => $input['admin_video'],
                'show_admin_tests' => $input['admin_test'],
                'show_admin_files' => $input['admin_prediction_file'],
                //'show_practice_questions' => $input['admin_practice_question'],
                'welcome_message'=> $input['welcome_msg'],
                'country_phone_code'=> $input['country_code'],
                'phone_number'=> $input['phone_no'],
                'institute_name'=> $input['iname'],
                'white_labelling'=> 'N'
            );

            $result = Institues::create($institue);
            
        }
        $data = ['body'=>$body,'subject'=>$subject];
        if($result){
            try{
                Mail::to($emailid)->send(new SendEmailUser($data));
                $flag = 1;
            }catch(\Exception $e){
                dd($e->getMessage());
            }
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
        $type = $request->input('type');
        $subject  = '';
        $body     = '';
        $user_emailid = '';
        if($type == 3){
            $request->validate([
                'type'=>'required',
                'branch_admin'=>'required',
                'fname' => 'required|min:3|max:100',
                'lname' => 'required|min:3|max:100',
                'uname'=>'required|unique:users,name,'.$id.'|max:255',
                'semail'=>'required|email|unique:users,email,'.$id.'|max:255',
                'dob' =>'required|before:18 years ago',
                'mobileno' =>'required|max:20',
                'gender'=>'required|in:M,F',
                'scitizen'=>'required|min:2|max:255',
                'sresidence'=>'required|min:2|max:255',
                'sstate'=>'required|min:2|max:100',
                'sstate_code'=>'required|min:1|max:100',
                'scity'=>'required|min:2|max:100',
                // 'sgstin'=>'required|min:2|max:100',
                'svalidity'=>'required|after:' . date('Y-m-d'),
                'simage'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ],
            [
                'semail.required'=> 'Email is required', // custom message
                'semail.email'=> 'Email is must be email format',
                'semail.unique'=> 'Email has already taken',
                'semail.max'=> 'Email maximum length allow 255',
                'scitizen.required'=> 'Country Citizen is required',
                'scitizen.min'=>'Country Citizen min length at least 2',
                'scitizen.max'=>'Country Citizen maximum length allow 255',
                'sresidence.required'=>'Country Residence is required',
                'sresidence.min'=>'Country Residence min length at least 2',
                'sresidence.max'=>'Country Residence maximum length allow 255',
                'sstate.required'=>'State is required',
                'sstate.min'=>'State min length at least 2',
                'sstate.max'=>'State maximum length allow 255',
                'sstate_code.required'=>'State Code is required',
                'sstate_code.min'=>'State Code min length at least 1',
                'sstate_code.max'=>'State Code maximum length allow 255',
                'scity.required'=>'City is required',
                'scity.min'=>'City min length at least 2',
                'scity.max'=>'City maximum length allow 100',
                'svalidity.required'=>'Validity is required',
                'svalidity.after'=>'Validity date must be after today',
                'simage.image'=>'Image must be image file',
                'simage.mimes'=>'Image must be file jpeg,png,jpg format'
            ]);
            $input  = \Arr::except($request->all(),array('_token'));
            if ($image = $request->file('simage')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => $input['branch_admin'],
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
                    'state' => $input['sstate'],
                    'state_code' => $input['sstate_code'],
                    'city'=>$input['scity'],
                    // 'gstin' => $input['sgstin'],
                    'validity' => $input['svalidity'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );

            }else{
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => $input['branch_admin'],
                    'first_name' => $input['fname'],
                    'last_name' => $input['lname'],
                    'name' => $input['uname'],
                    'email' => $input['semail'],
                    'mobile_no' => $input['mobileno'],
                    'date_of_birth' => $input['dob'],
                    'gender' => $input['gender'],
                    'country_citizen' => $input['scitizen'],
                    'country_residence' => $input['sresidence'],
                    'state' => $input['sstate'],
                    'state_code' => $input['sstate_code'],
                    'city'=>$input['scity'],
                    // 'gstin' => $input['sgstin'],
                    'validity' => $input['svalidity'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );

            }

            if(isset($input['sstatus'])){
                $user_input['status'] = $input['sstatus'];
            }else{
                $user_input['status'] = 'P';
            }
            
            $result = User::where('id',$id)->update($user_input);
            $user = User::find($id);
            $subject = 'Student Profile Update';
            $body    = '<p>Hello '.$user->fullname.', Your profile update by superadmin.</p>';
            $user_emailid = $user->email;
        }else if($type == 2){
            $request->validate([
                'type'=>'required',
                'iuname' => 'required|unique:users,name,'.$id.'|max:255',
                'iname'=>'required',
                'iemail'=>'required|email|unique:users,email,'.$id.'|max:255',
                'country_code'=>'required|max:5',
                'phone_no' =>'required|max:20',
                'students_allowed' =>'required',
                'subdomain' =>'required|max:255',
                'domain'=>'required|max:255',
                'welcome_msg'=>'required|max:500',
                'istate'=>'required|min:2|max:100',
                'istate_code'=>'required|min:1|max:100',
                'icity'=>'required|min:2|max:100',
                'igstin'=>'required|min:2|max:100',
                'logo'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'banner'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'validity'=>'required|after:' . date('Y-m-d'),
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
                //'admin_practice_question'=>'required|in:Y,N',
                'admin_test'=>'required|in:Y,N'
            ],
            [
                'iuname.required'=> 'user name is required', // custom message
                'iuname.unique'=> 'user name already taken', // custom message
                'iuname.max'=> 'user name maximum length allow 255', // custom message
                'iname.required'=>'Institute Name is required',
                'iname.min'=>'Institute Name min length at least 2',
                'iname.max'=>'Institute Name max length is 255',
                'iemail.required'=>'Email is required',
                'iemail.email'=>'Email must be email format',
                'iemail.unique'=>'Email has already taken',
                'iemail.max'=>'Email maximum length allow 255',
                'istate.required'=>'State is required',
                'istate.min'=>'State min length at least 2',
                'istate.max'=>'State maximum length allow 100',
                'istate_code.required'=>'State Code is required',
                'istate_code.min'=>'State Code min length at least 1',
                'istate_code.max'=>'State Code maximum length allow 100',
                'icity.required'=>'City is required',
                'icity.min'=>'City min length at least 2',
                'icity.max'=>'City maximum length allow 100',
                'igstin.required'=>'GSTIN is required',
                'igstin.min'=>'GSTIN min length at least 2',
                'igstin.max'=>'GSTIN maximum length allow 100'
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

            if ($image = $request->file('iimage')) {
                $destinationPath = 'assets/images/profile/';
                $fileNameToStore = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileNameToStore);
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
                    'mobile_no' => $input['phone_no'],
                    'profile_image' => $fileNameToStore,
                    'state' => $input['istate'],
                    'state_code' => $input['istate_code'],
                    'city'=>$input['icity'],
                    'gstin' => $input['igstin'],
                    'validity' => $input['validity'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );
            }else{
                $user_input = array(
                    'role_id' => $input['type'],
                    'parent_user_id' => 0,
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
                    'mobile_no' => $input['phone_no'],
                    'state' => $input['istate'],
                    'state_code' => $input['istate_code'],
                    'city'=>$input['icity'],
                    'gstin' => $input['igstin'],
                    'validity' => $input['validity'],
                    'ip_address' => '',
                    'latitude' => '',
                    'longitude' => ''
                );
            }
            if(isset($input['istatus'])){
                $user_input['status'] = $input['istatus'];
            }else{
                $user_input['status'] = 'P';
            }
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
                    //'show_practice_questions' => $input['admin_practice_question'],
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
                    //'show_practice_questions' => $input['admin_practice_question'],
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
                    //'show_practice_questions' => $input['admin_practice_question'],
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
                    //'show_practice_questions' => $input['admin_practice_question'],
                    'welcome_message'=> $input['welcome_msg'],
                    'country_phone_code'=> $input['country_code'],
                    'phone_number'=> $input['phone_no'],
                    'institute_name'=> $input['iname'],
                    'white_labelling'=> 'N'
                );
            }

            $result = Institues::where('user_id',$id)->update($institue);
            $user = User::find($id);
            $subject = 'BranchAdmin Profile Update';
            $body    = '<p>Hello '.$user->fullname.', Your profile update by superadmin.</p>';
            $user_emailid = $user->email;
        }

        if($result){
            if($type == 2)
            {
                $notification_data = array(
                    'user_id' => $id,
                    'sender_id' => \Auth::user()->id,
                    'type' => getUserRole($id),
                    'title' => "Update your profile.",
                    'body' => "Super Admin change your profile details.",
                    'url' => ""
                );
                
            }
            else
            {
                $notification_data = array(
                    'user_id' => $id,
                    'sender_id' => \Auth::user()->id,
                    'type' => getUserRole($id),
                    'title' => "Update your profile.",
                    'body' => "Super Admin change your profile details.",
                    'url' => ""
                );
            }
            $notification = Notifications::create($notification_data);
            $data = ['body'=>$body,'subject'=>$subject];
            try{
                Mail::to($user_emailid)->send(new SendEmailUser($data));
            }catch(\Exception $e){
                dd($e->getMessage());
            }
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
        $user    = User::find($id);
        $body    = '';
        $subject = '';
        $emailid = '';
        if($user->role_id == '3')
        {
            try{
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
                DB::commit();
                //Mail send code
                $body = '<p>'.$user->fullname.' are remove from PTE-education system!</p>';
                $subject = 'Remove from PTE';
                $data = ['body'=>$body,'subject'=>$subject];
                $emailid = $user->email;
                Mail::to($emailid)->send(new SendEmailUser($data));
                
                return redirect()->route('users.index')->with('success','Student deleted successfully');
            }catch(\Exception $e){
                DB::rollback();
                dd($e->getMessage());
                return redirect()->route('users.index')->with('error','Sorry!Something wrong.Try again later!');
            }
        }
        else
        {
            $allTests = Tests::where('generated_by_user_id',$id)->pluck('id')->toArray();
            $allStudents = User::where('parent_user_id',$id)->pluck('id')->toArray();
            try{
                DB::beginTransaction();
                    if(count($allTests)>0)
                    {
                        foreach($allTests as $newTest)
                        {
                            $questions = Questions::where('test_id',$newTest)->pluck('id')->toArray();
                            if(count($questions)>0)
                            {
                                Questiondata::whereIn('question_id',$questions)->delete();
                                Answerdata::whereIn('question_id',$questions)->delete();
                                StudentsAnswerData::whereIn('question_id',$questions)->delete();
                                TestResults::whereIn('question_id',$questions)->delete();
                                StudentTests::where('test_id',$id)->delete();
                                Questions::where('test_id',$id)->delete();
                                Tests::where('id',$id)->delete();
                            }
                            else
                            {
                                Tests::where('id',$newTest)->delete();
                            }
                        }
                    }
                    if(count($allStudents)>0)
                    {
                        foreach($allStudents as $newStudent)
                        {
                            DeviceLogs::where('user_id',$newStudent)->delete();
                            Notifications::where('user_id',$newStudent)->delete();
                            Activities::where('user_id',$newStudent)->delete();
                            UserSession::where('user_id',$newStudent)->delete();
                            StudentsAnswerData::where('student_id',$newStudent)->delete();
                            TestResults::where('user_id',$newStudent)->delete();
                            StudentTests::where('user_id',$newStudent)->delete();
                            UserAssignTests::where('user_id',$newStudent)->delete();
                            Certificates::where('student_user_id',$newStudent)->delete();
                            StudentDetails::where('user_id',$newStudent)->delete();
                            User::where('id',$newStudent)->delete();
                        }
                    }
                    DeviceLogs::where('user_id',$id)->delete();
                    Notifications::where('user_id',$id)->delete();
                    Activities::where('user_id',$id)->delete();
                    UserSession::where('user_id',$id)->delete();
                    Videos::where('user_id',$id)->delete();
                    PredictionFiles::where('user_id',$id)->delete();
                    EmailTemplates::where('user_id',$id)->delete();
                    User::where('id',$id)->delete();
                DB::commit();
                
                $body = '<p>'.$user->fullname.' are remove from PTE-education system!</p>';
                $subject = 'Remove from PTE';
                $data = ['body'=>$body,'subject'=>$subject];
                $emailid = $user->email;
                Mail::to($emailid)->send(new SendEmailUser($data));

                return redirect()->route('users.index')->with('success','User deleted successfully');
            }catch(\Exception $e){
                DB::rollback();
                dd($e->getMessage());
                return redirect()->route('users.index')->with('error','Sorry!Something wrong.Try again later!');
            }
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
        //dd($request->all());
        $user_ids  = $request->user_ids;
        $emailtemplate  = $request->emailtemplate;
        
        $template = EmailTemplates::find($emailtemplate);
        if($template)
        {
            $allEmails= User::whereIn('id',$user_ids)->pluck('email')->toArray();
            $data = ['body'=>$request->body,'subject'=>$template->subject];
            $flag = 0;
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
                \Session::put('error', 'Email not sending!');
                return false;  
            }
        }
        else
        {
            \Session::put('error', 'Email not sending!');
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
                $st_name = '';
                if($status == 'A'){
                    $st_name = 'Active';
                }else if($status == 'P'){
                    $st_name = 'Pending';
                }else{
                    $st_name = 'Reject';
                }
                foreach($user_ids as $new_user)
                {
                    $user = User::find($new_user);
                    $body = '<p>Hello,'.$user->fullname.' now your status in PTE education is '.$st_name.'.</p>';
                    $subject = 'Status Change';
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
            $user = User::find($id);
            if($user->status == 'A'){
                $user->status = 'R';
            }else if($user->status == 'R' || $user->status == 'P'){
                $user->status = 'A';
            }
            $result = $user->update();
            if($result){
                $user = User::find($id);
                $st_name = '';
                if($user->status == 'A'){
                    $st_name = 'Active';
                }else if($user->status == 'P'){
                    $st_name = 'Pending';
                }else{
                    $st_name = 'Reject';
                }
                $body = '<p>Hello,'.$user->fullname.' now your status in PTE education is '.$st_name.'.</p>';
                $subject = 'Status Change';
                $data = ['body'=>$body,'subject'=>$subject];
                $emailid = 'vishal.mistry.bi@gmail.com';
                try{
                    Mail::to($emailid)->send(new SendEmailUser($data));
                }catch(\Exception $e){
                    dd($e->getMessage());
                }
                return redirect()->route('users.index')
                            ->with('success','Status Updated successfully');
            }else{
                return redirect()->route('users.index')
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

        $html = view('superadmin.users.result',compact('results'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html    
        ]);
    }
}
