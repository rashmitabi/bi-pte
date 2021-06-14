<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVocuchersRequest;
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
        return view($this->moduleTitleP.'index');
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
        $input['discount_type'] = $input['voucher_type'];
        if($input['discount_type'] == 'P'){
            $input['discount_percentage'] = $input['voucher_price'];
            $input['discount_price'] = NULL;
        }else{
            $input['discount_price'] = $input['voucher_price'];
            $input['discount_percentage'] = NULL;
        }
        unset($input['voucher_price']);
        unset($input['voucher_type']);
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        $result = Vouchers::create($input);
        if($result){
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
