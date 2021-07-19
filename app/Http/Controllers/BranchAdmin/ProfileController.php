<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institues;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('institue')->where('id', \Auth::user()->id)->first();
        return view('branchadmin.profile.profile',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::with('institue')->where('id', \Auth::user()->id)->first();
        return view('branchadmin.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = \Auth::user()->id;
        $request->validate([
                'iuname' => 'required|unique:users,name,'.$id.'|max:255',
                'iname'=>'required',
                'iemail'=>'required|email|unique:users,email,'.$id.'|max:255',
                'country_code'=>'required|max:5',
                'phone_no' =>'required|max:20',
                'subdomain' =>'required|max:255',
                'domain'=>'required|max:255',
                'welcome_msg'=>'required|max:500',
                'istate'=>'required|min:2|max:100',
                'istate_code'=>'required|min:1|max:100',
                'icity'=>'required|min:2|max:100',
                'igstin'=>'required|min:2|max:100',
                'logo'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'banner'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'admin_video'=>'required|in:Y,N',
                'admin_prediction_file'=>'required|in:Y,N',
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
            //dd($input);die;
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
                    'ip_address' => getUserIP()
                );
            }else{
                $user_input = array(
                    'name' => $input['iuname'],
                    'email' => $input['iemail'],
                    'mobile_no' => $input['phone_no'],
                    'state' => $input['istate'],
                    'state_code' => $input['istate_code'],
                    'city'=>$input['icity'],
                    'gstin' => $input['igstin'],
                    'ip_address' => getUserIP()
                );
            }
            $result1 = User::where('id',$id)->update($user_input);

            if(isset($logo) && isset($banner)){
                $institue = array(
                    'user_id' => $id,
                    'sub_domain' => $input['subdomain'],
                    'domain' => $input['domain'],
                    'logo' => $logo,
                    'banner_image' => $banner,
                    'show_admin_videos' => $input['admin_video'],
                    'show_admin_tests' => $input['admin_test'],
                    'show_admin_files' => $input['admin_prediction_file'],
                    'welcome_message'=> $input['welcome_msg'],
                    'country_phone_code'=> $input['country_code'],
                    'phone_number'=> $input['phone_no'],
                    'institute_name'=> $input['iname']
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
                    'banner_image' => $banner,
                    'show_admin_videos' => $input['admin_video'],
                    'show_admin_tests' => $input['admin_test'],
                    'show_admin_files' => $input['admin_prediction_file'],
                    'welcome_message'=> $input['welcome_msg'],
                    'country_phone_code'=> $input['country_code'],
                    'phone_number'=> $input['phone_no'],
                    'institute_name'=> $input['iname']
                );
            }else{
                $institue = array(
                    'user_id' => $id,
                    'sub_domain' => $input['subdomain'],
                    'domain' => $input['domain'],
                    'show_admin_videos' => $input['admin_video'],
                    'show_admin_tests' => $input['admin_test'],
                    'show_admin_files' => $input['admin_prediction_file'],
                    'welcome_message'=> $input['welcome_msg'],
                    'country_phone_code'=> $input['country_code'],
                    'phone_number'=> $input['phone_no'],
                    'institute_name'=> $input['iname']
                );
            }

            $result2 = Institues::where('user_id',$id)->update($institue);
             if($result2){
                return redirect()->route('branchadmin-profile.index')
                ->with('success','Profile updated successfully!');
            }
            else{
                return redirect()->route('branchadmin-profile.index')
                ->with('error','Sorry!Something wrong.Try again later!');        
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
        //
    }

    /**
     * Show the form for changing the password.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepassword(){
        return view('branchadmin.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' =>'same:password'
        ]);

        $result = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        if($result){
            \Session::put('success', 'Password Changed Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    
    public function updateProfile(Request $request)
    {
        
    }
}
