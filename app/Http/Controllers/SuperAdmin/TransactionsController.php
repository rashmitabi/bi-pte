<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Subscriptions;
use App\Models\userSubscriptions;
use DataTables;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())  {
            $data = array();
	    	$transactions = \App\Models\userSubscriptions::with(['user','subscription', 'transaction'])->get();
	    	foreach($transactions as $transaction){
	    		$data[] = array(
	    			'payment_id' => $transaction->transaction->id,
	    			'user_subscription_id' => $transaction->id,
	    			'name' => $transaction->user->first_name." ".$transaction->user->last_name,
	    			'role' => $transaction->user->role->role_name,
	    			'amount' => $transaction->transaction->amount,
	    			'package' => $transaction->subscription->title,
	    			'voucher' => ($transaction->transaction->voucher_id != NULL) ? $transaction->transaction->voucher->name : 'Not Applied',
	    			'method' => $transaction->transaction->payment_method,
	    			'transaction_id' => $transaction->transaction->trancation_id,
	    			'status' => ($transaction->transaction->status == 'C') ? 'Completed' : 'Pending',
	    			'created' => date('Y-m-d', strtotime($transaction->transaction->created_at)),
	    		);
	    	}

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('username', function($row){
                        return $row['name'];
                    })  
                    ->addColumn('role', function($row){
                        return $row['role'];
                    }) 
                    ->addColumn('amount', function($row){
                        return $row['amount'];
                    }) 
                    ->addColumn('package', function($row){
                        return $row['package'];
                    }) 
                    ->addColumn('voucher', function($row){
                        return $row['voucher'];
                    }) 
                    ->addColumn('method', function($row){
                        return $row['method'];
                    }) 
                    ->addColumn('transaction_id', function($row){
                        return $row['transaction_id'];
                    }) 
                    ->addColumn('created', function($row){
                        return $row['created'];
                    }) 
                    ->addColumn('status', function($row){
                        return $row['status'];
                    })
                    ->addColumn('action', function($row){
                        
                        $btn = '<ul class="actions-btns">
                            <li class="action"><a href="javascript:void(0);" class="download_invoice" data-url="'.route('transaction-download-invoice', $row['payment_id']).'"><i class="fas fa-download"></i></a></li>                            
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    	return view('superadmin/transactions/index');
    }   

    /**
     * Download invoice from storage.
     *
     * @param  \App\Models\Transactions  $payment_id
     * @return \Illuminate\Http\Response
     */
    public function download_invoice($id)
    {
        $transaction = \App\Models\userSubscriptions::with(['user','subscription', 'transaction'])->where('payment_id',$id)->first();
        echo json_encode($transaction);
    }
}
    
