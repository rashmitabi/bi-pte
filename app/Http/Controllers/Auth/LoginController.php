<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DeviceLogs;
use App\Models\UserSession;
// use hisorange\BrowserDetect\Parser as Browser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        
    }

  
    public function login(Request $request)
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
            ? 'email' 
            : 'name';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            
            $user = Auth::user();
            if($user->role_id == 2){
                $loginrecord = UserSession::where("user_id",$user->id)->first();
                if($loginrecord){
                    $sessiondata = [
                        "status" =>"A"
                    ];
                    UserSession::where("user_id",$user->id)->update($sessiondata);
                }else{
                    $sessiondata = [
                        "role_id" =>$user->role_id,
                        "user_id" =>$user->id,
                        "status" =>"A"
                    ];
                    UserSession::create($sessiondata);
                }
                

                $browser = getBrowserInfo();
                $devicelog = DeviceLogs::where("user_id",$user->id)->where("browser_name",$browser['browser'])->where("device_name",$browser['device'])->first();
                
                $devicelogCount = ($devicelog != '') ? $devicelog->count() : 0;
                
                $data = array(
                    "user_id" => $user->id,
                    "user_agent" => $browser['user_agent'],
                    "browser_name" => $browser['browser'],
                    "device_name" => $browser['device'],
                    "ip_address" => $request->getClientIp(),
                    "login_time" => date("Y-m-d h:i:s"),
                    "status" => 'Y'
                );
                if($devicelogCount == 0){
                    DeviceLogs::create($data);
                    return redirect()->intended($this->redirectPath());
                }else{

                    if($devicelog->status == "Y"){
                        return redirect()->intended($this->redirectPath());
                    }else{
                        $this->guard()->logout();
                        $request->session()->flush();
                        $request->session()->regenerate();
                        return redirect()->back()
                        ->withInput()
                        ->withErrors([
                            'login' => 'This device login block by admin.',
                        ]);
                    }
                }
            }else{
                return redirect()->intended($this->redirectPath());
            }
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'These credentials do not match our records.',
            ]);
    } 

    public function logout(Request $request)
    {
       
        $user = Auth::user();
        if($user){
            $sessiondata = array(
                "status" =>"D"
            );
            $loginrecord = UserSession::where('user_id',$user->id)->update($sessiondata);
        }
        // Get the session key for this user
        $sessionKey = $this->guard()->getName();

        // Logout current user by guard
        $this->guard()->logout();

        // Delete single session key (just for this user)
        $request->session()->forget($sessionKey);

        // After logout, redirect to login screen again
        return redirect()->route('login');
    }

    

    public function redirectTo(){

        $user = Auth::user(); 
        // Check user role
        switch ($user->role_id) {
            case 1:
                return '/superadmin/dashboard';
                break;
            case 2:
               
                return '/branchadmin/dashboard';
                break; 
            case 3:
                return '/home';
                break; 
            default:
                return '/login'; 
                break;
        }
    }
    
}
