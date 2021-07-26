<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Subscriptions;
use App\Models\Roles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Razorpay;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use DataTables;

class SubscriptionsController extends Controller
{
    private $moduleTitleP = 'superadmin.subscription.';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = Subscriptions::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('title', function($row){
                        return $row->title;
                    })
                    ->addColumn('monthly_price', function($row){
                        return $row->monthly_price;
                    })
                    ->addColumn('quarterly_price', function($row){
                        return $row->quarterly_price;
                    })
                    ->addColumn('halfyearly_price', function($row){
                        return $row->halfyearly_price;
                    })
                    ->addColumn('annually_price', function($row){
                        return $row->annually_price;
                    })
                    ->addColumn('white_labelling_price', function($row){
                       
                        return $row->white_labelling_price;
                    })
                    ->addColumn('students_allowed', function($row){
                       
                        return $row->students_allowed;
                    })
                    ->addColumn('mock_tests', function($row){
                       
                        return $row->mock_tests;
                    })
                    ->addColumn('practice_tests', function($row){
                       
                        return $row->practice_tests;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                            <li class="action" data-toggle="modal" data-target="#editsubscription"><a href="javascript:void(0);" class="subscription-edit" data-id="'.$row->id.'" data-url="'.route('subscription.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                            <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('subscription.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                            <li class="action shield '.(($row->status == "E") ? "red" : "green").'"><a href="'.route('superadmin-subscription-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }       
        return view($this->moduleTitleP.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::where('status','E')->get();
        return view($this->moduleTitleP.'add',compact('roles'));
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
        $subscription   = Subscriptions::find($id);
        $roles          = Roles::where('status','E')->get();
        $html_subscription = view($this->moduleTitleP.'edit', compact('subscription','roles'))->render();

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
            \Session::put('success', 'Subscription updated Successfully!');
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
                        ->with('success','Subscription status updated successfully');
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
                        ->with('success','Subscription deleted successfully!');
        }
        else
        {
            return redirect()->route('subscription.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}
