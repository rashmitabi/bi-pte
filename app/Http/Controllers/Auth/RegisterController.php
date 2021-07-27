<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Institues;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [ 
            'name' => ['required', 'string','regex:/^[a-zA-Z0-9]+$/u', 'max:255', 'unique:users,name'],
            'mobile_no' => ['required', 'string', 'digits:10'],
            'institute_name' => ['required', 'string',  'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6','max:20'],
            'confirm_password' => ['required', 'string', 'same:password'],
            'agree' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $data = [ 
            'user_name'=>$data['name'],
            'mobile_no'=>$data['mobile_no'],
            'institute_name'=>$data['institute_name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]; 
        
        $validator = validator($data); 
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

       
        $user = User::create([
            'role_id'=>2,
            'parent_user_id'=>0,
            'name'=>$data['user_name'] ,
            'email' => $data['email'],
            'password'=>$data['password'],
            'mobile_no'=>$data['mobile_no'],
            'profile_image'=>'',
            'ip_address'=>'',
            'latitude'=>'',
            'status' => 'A',
            'longitude'=>''
        ])->id;    

        if (!empty($user)) {
            $institute = Institues::create([
                'user_id'=>$user,
                'sub_domain'=>'',
                'domain'=>'',
                'students_allowed'=>'0',
                'welcome_message'=>'',
                'country_phone_code'=>'',
                'phone_number'=>$data['mobile_no'],
                'institute_name'=>$data['institute_name']
            ]);
          
           return redirect("login");
        }else{
            return false;
        }
        
    }

    
}
