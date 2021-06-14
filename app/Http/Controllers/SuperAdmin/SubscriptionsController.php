<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;

class SubscriptionsController extends Controller
{
    private $moduleTitleP = 'superadmin.subscription.';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscriptions::get();
        
        return view($this->moduleTitleP.'index',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->moduleTitleP.'add');
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
        $input['practice_questions'] = 0;
        $result = Subscriptions::create($input);
        if($result){
            return redirect()->route('subscription.index')
                        ->with('success','Subscription created successfully!');
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
        $subscription = Subscriptions::find($id);

        $html_subscription = view($this->moduleTitleP.'edit', compact('subscription'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_subscription    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request, $id)
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

        $result = Subscriptions::where('id',$id)->update($input);
        if($result){
            \Session::put('success', 'Subscription update Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }

    }
    public function changeStatus($id)
    {
        $subscription = Subscriptions::find($id);
        if($subscription->status == 'D'){
            $subscription->status = 'E';
        }else{
            $subscription->status = 'D';
        }
        $result = $subscription->update();
        if($result){
            return redirect()->route('subscription.index')
                        ->with('success','Status Update successfully');
        }else{
            return redirect()->route('subscription.index')
                        ->with('error','Status Not Updated!');
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
