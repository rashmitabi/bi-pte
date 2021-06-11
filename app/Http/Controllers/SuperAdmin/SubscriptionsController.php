<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscriptionRequest;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscriptions::get();
        
        return view('superadmin/subscription/index',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin/subscription/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        
        $input  = \Arr::except($request->all(),array('_token'));
        if(!isset($input['videos'])){
            $input['videos'] = 'N';
        }
        if(!isset($input['prediction_files'])){
            $input['prediction_files'] = 'N';
        }
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        $result = Subscriptions::create($input);
        if($result){
            return redirect()->route('subscription.index')
                        ->with('success','Subscription created successfully');
        }else{
            return redirect()->route('subscription.index')
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
        $result = Subscriptions::where('id',$id)->delete();
        if($result)
        {
            return redirect()->route('subscription.index')
                        ->with('success','Subscription deleted successfully');
        }
        else
        {
            return redirect()->route('subscription.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}
