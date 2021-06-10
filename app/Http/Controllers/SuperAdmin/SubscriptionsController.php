<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin/subscription/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin/subscription/addsubscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'title'=>'required',
        //     'description'=>'required',
        //     'role_id'=>'required',
        //     'students_allowed'=>'required',
        //     'monthly_price'=>'required',
        //     'quarterly_price'=>'required',
        //     'halfyearly_price'=>'required',
        //     'annually_price'=>'required',
        //     'white_labelling_price'=>'required',
        //     'mock_tests'=>'required',
        //     'practice_tests'=>'required',
        //     'videos'=>'required',
        //     'prediction_files'=>'required',
        //     'status'=>'required'
        //  ]);
        $input  = \Arr::except($request->all(),array('_token'));
        $input['practice_questions'] = 10;
        $result = Subscriptions::create($input);
        if($result){
            return redirect()->route('subscription.index')
                        ->with('success','Subscription created successfully');
        }else{
            return redirect()->route('subscription.index')
                        ->with('error','Subscription created successfully');
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
}
