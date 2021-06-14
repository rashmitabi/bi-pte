<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVocuchersRequest;
use App\Http\Requests\UpdateVouchersRequest;
use App\Models\Vouchers;

class VouchersController extends Controller
{
    private $moduleTitleP = 'superadmin.vouchers.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Vouchers::all();

        return view($this->moduleTitleP.'index',compact('vouchers'));
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
    public function store(CreateVocuchersRequest $request)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        $type = $input['voucher_type'];
        $voucher = new Vouchers;
        $voucher->name = $input['name'];
        $voucher->code = $input['code'];
        $voucher->discount_type = $type;

        if($type == 'P'){
            $voucher->discount_percentage = $input['voucher_price'];
            $voucher->discount_price = null;
        }else{
            $voucher->discount_percentage = null;
            $voucher->discount_price = $input['voucher_price'];
        }

        $voucher->role_id = $input['role_id'];
        $voucher->valid_till = $input['valid_till'];
        $voucher->status = $input['status'];
        if($voucher->save()){
            return redirect()->route('vouchers.index')
                        ->with('success','voucher created successfully');
        }else{
            return redirect()->route('vouchers.index')
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
        $voucher = Vouchers::find($id);

        $html_voucher = view($this->moduleTitleP.'edit', compact('voucher'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_voucher    
        ]);
    }
    public function changeStatus($id)
    {
        $voucher = Vouchers::find($id);
        if($voucher->status == 'D'){
            $voucher->status = 'E';
        }else{
            $voucher->status = 'D';
        }
        $result = $voucher->update();
        if($result){
            return redirect()->route('vouchers.index')
                        ->with('success','Status Update successfully');
        }else{
            return redirect()->route('vouchers.index')
                        ->with('error','Status Not Updated!');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVouchersRequest $request, $id)
    {
        $request->validate([
            'code'=>'required|unique:vouchers,code,'.$id
        ]);
        $input  = \Arr::except($request->all(),array('_token'));
        $input['discount_type'] = $input['voucher_type'];
        if($input['voucher_type'] == 'P')
        {
            $input['discount_percentage'] = $input['voucher_price'];
            $input['discount_price'] = NULL;
        }
        else
        {
            $input['discount_percentage'] = NULL;
            $input['discount_price'] = $input['voucher_price'];
        }
        unset($input['voucher_type']);
        unset($input['voucher_price']);
        $result = Vouchers::where('id',$id)->update($input);
        if($result){
            \Session::put('success', 'Voucher update Successfully!');
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
        $result = Vouchers::where('id',$id)->delete();
        if($result)
        {
            return redirect()->route('vouchers.index')
                        ->with('success','Vouchers deleted successfully');
        }
        else
        {
            return redirect()->route('vouchers.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}
