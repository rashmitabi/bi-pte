<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVocuchersRequest;
use App\Http\Requests\UpdateVouchersRequest;
use App\Models\Vouchers;
use App\Models\Roles;
use Carbon\Carbon;
use DataTables;
class VouchersController extends Controller
{
    private $moduleTitleP = 'superadmin.vouchers.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = Vouchers::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->name;
                    })
                    ->addColumn('code', function($row){
                        return $row->code;
                    })
                    ->addColumn('discount_type', function($row){
                        if($row->discount_type == 'F')
                        {
                            $discount_type = 'Fixed';
                        }else{
                            $discount_type = 'Percentage';
                        }
                        return $discount_type;
                    })
                    ->addColumn('discount_price', function($row){
                        if($row->discount_type == 'F')
                        {
                            $discount_price = $row->discount_price;
                        }else{
                            $discount_price = $row->discount_percentage;
                        }
                        return $discount_price;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at->format('d/m/Y');
                    })
                    ->addColumn('valid_till', function($row){
                        return Carbon::parse($row->valid_till)->format('d/m/Y');
                    })
                    ->addColumn('status', function($row){
                        if($row->status == "E"){
                            $status = "Enable";
                            $iconClass = "red";
                        }else{
                            $status = "Disable";
                            $iconClass = "green";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                            <li class="action vouchers-edit" data-toggle="modal" data-target="#editvouchers" data-id="'.$row->id.'" data-url="'.route('vouchers.edit', $row->id).'"><a href="javascript:void(0);"><i class="fas fa-pen"></i></a></li>
                            <li class="action bg-danger"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('vouchers.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                            <li class="action shield '. (($row->status == "E") ? "red" : "green").'"><a href="'.route('superadmin-vouchers-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
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
        //$roles = Roles::where([['status','E'],['id',2]])->get();
        $roles = Roles::where('id',2)->get();
        return view($this->moduleTitleP.'add',compact('roles'));
    }

    /**[
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
        $voucher->status = (isset($input['status'])?$input['status']:'D');
        if($voucher->save()){
            return redirect()->route('vouchers.index')
                        ->with('success','Voucher created successfully!');
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
        $voucher        = Vouchers::find($id);
        //$roles          = Roles::where('status','E')->get();
        $roles = Roles::where('id',2)->get();
        $html_voucher   = view($this->moduleTitleP.'edit', compact('voucher','roles'))->render();

        
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
                        ->with('success','Voucher Status Updated successfully!');
        }else{
            return redirect()->route('vouchers.index')
                        ->with('error','Voucher Status Not Updated!');
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
            \Session::put('success', 'Voucher updated Successfully!');
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
                        ->with('success','Voucher deleted successfully!');
        }
        else
        {
            return redirect()->route('vouchers.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}
