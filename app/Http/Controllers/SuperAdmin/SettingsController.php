<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        return view('superadmin.setting',compact('settings'));
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
        $request->validate([
            'currency'              => 'required',
            'admin_email_address'   =>'required|email',
            'customer_email_address'=> 'required|email'
        ]);

        $currency               = $request->currency;
        $admin_email_address    = $request->admin_email_address;
        $customer_email_address = $request->customer_email_address;
        
        try{
            Settings::updateOrCreate([
                'label'   => 'currency',
            ],[
                'value'     => $currency,
            ]);
            Settings::updateOrCreate([
                'label'   => 'admin_email_address',
            ],[
                'value'     => $admin_email_address,
            ]);
            Settings::updateOrCreate([
                'label'   => 'customer_email_address',
            ],[
                'value'     => $customer_email_address,
            ]);

            \Session::put('success', 'Settings saved successfully!');
            return true;
        }catch(\Exception $e){
            dd($e->getMessage());
            //\Session::put('error', 'Sorry!Something wrong.try Again.');
            //return false;
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
        //
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' =>'same:password'
        ]);

        $result = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        if($result){
            \Session::put('success', 'Password Change Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
}
