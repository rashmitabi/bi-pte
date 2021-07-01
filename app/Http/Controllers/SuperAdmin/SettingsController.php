<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\QuestionTypes;
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
        $readingQuestionTypes = QuestionTypes::where('section_id',1)->pluck('instructions')->toArray();
        $readingInstructions = array_values(array_unique($readingQuestionTypes));
        
        $listeningQuestionTypes = QuestionTypes::where('section_id',2)->pluck('instructions')->toArray();
        $listeningInstructions = array_values(array_unique($listeningQuestionTypes));

        $writingQuestionTypes = QuestionTypes::where('section_id',3)->pluck('instructions')->toArray();
        $writingInstructions = array_values(array_unique($writingQuestionTypes));

        $speakingQuestionTypes = QuestionTypes::where('section_id',4)->pluck('instructions')->toArray();
        $speakingInstructions = array_values(array_unique($speakingQuestionTypes));

        return view('superadmin.setting',compact('settings','readingInstructions','listeningInstructions','writingInstructions','speakingInstructions'));
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
            'currency'                  => 'required',
            'admin_email_address'       =>'required|email',
            'customer_email_address'    => 'required|email',
            'company_name'              => 'required|max:50',
            'company_mobile_number'     => 'required|numeric|digits:10',
            'company_address'           => 'required',
            'company_invoice_address'   =>'required',
            'company_gst_number'        => 'required|max:15',
            'hsn_code'                  => 'required',
            'stgst'                     => 'required|numeric',
            'cgst'                      => 'required',
            'igst'                      => 'required',
            'digital_signature'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $currency               = $request->currency;
        $admin_email_address    = $request->admin_email_address;
        $customer_email_address = $request->customer_email_address;
        $company_name           = $request->company_name;
        $company_mobile_number  = $request->company_mobile_number;
        $company_address        = $request->company_address;
        $company_invoice_address= $request->company_invoice_address;
        $company_gst_number     = $request->company_gst_number;
        $hsn_code               = $request->hsn_code;
        $stgst                  = $request->stgst;
        $cgst                   = $request->cgst;
        $igst                   = $request->igst;
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
            Settings::updateOrCreate([
                'label'   => 'company_name',
            ],[
                'value'     => $company_name,
            ]);
            Settings::updateOrCreate([
                'label'   => 'company_mobile_number',
            ],[
                'value'     => $company_mobile_number,
            ]);
            Settings::updateOrCreate([
                'label'   => 'company_address',
            ],[
                'value'     => $company_address,
            ]);
            Settings::updateOrCreate([
                'label'   => 'company_invoice_address',
            ],[
                'value'     => $company_invoice_address,
            ]);
            Settings::updateOrCreate([
                'label'   => 'company_gst_number',
            ],[
                'value'     => $company_gst_number,
            ]);
            Settings::updateOrCreate([
                'label'   => 'hsn_code',
            ],[
                'value'     => $hsn_code,
            ]);
            Settings::updateOrCreate([
                'label'   => 'stgst',
            ],[
                'value'     => $stgst,
            ]);
            Settings::updateOrCreate([
                'label'   => 'cgst',
            ],[
                'value'     => $cgst,
            ]);
            Settings::updateOrCreate([
                'label'   => 'igst',
            ],[
                'value'     => $igst,
            ]);
            if($request->file()){
                $filePath = '';
                $fileName = substr(time().'_'.str_replace(' ', '_', $request->digital_signature->getClientOriginalName()), 0, 250);  
                if($request->digital_signature->move(public_path('assets/images'), $fileName)){
                    $filePath = $fileName;
                }
                Settings::updateOrCreate([
                    'label'   => 'digital_signature',
                ],[
                    'value'     => $filePath,
                ]);
            }
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

        $result = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        if($result){
            \Session::put('success', 'Password Change Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }
}
