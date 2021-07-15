<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Subscriptions;
use App\Models\userSubscriptions;
use App\Models\Settings;
use DataTables;
use PDF;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
       if($request->ajax())  {
            $data = array();
	    	$transactions = \App\Models\userSubscriptions::with(['user','subscription', 'transaction'])->where('user_id', \Auth::user()->id)->latest()->get();
	    	foreach($transactions as $transaction){
	    		$data[] = array(
	    			'payment_id' => $transaction->transaction->id,
	    			'user_subscription_id' => $transaction->id,
	    			'name' => $transaction->user->name,
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
                    ->addColumn('package', function($row){
                        return $row['package'];
                    }) 
                    ->addColumn('amount', function($row){
                        return $row['amount'];
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
                            <li class="action"><a target="_blank" href="'.route('branchadmin-download-invoice', $row['payment_id']).'" class="download_invoice" data-url="'.route('branchadmin-download-invoice', $row['payment_id']).'"><i class="fas fa-download"></i></a></li>                            
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
    	return view('branchadmin/transactions/index');
    }   

    /**
     * Download invoice from storage.
     *
     * @param  \App\Models\Transactions  $payment_id
     * @return \Illuminate\Http\Response
     */
    public function download_invoice($id)
    {
        ini_set('max_execution_time', 300);
        $transaction = \App\Models\userSubscriptions::with(['user','subscription', 'transaction'])->where('payment_id',$id)->first();

        $sub_start_date = strtotime($transaction->start_date); 
		$sub_end_date = strtotime($transaction->end_date); 

		// Formulate the Difference between two dates
		$diff = abs($sub_end_date - $sub_start_date); 
		$years = floor($diff / (365*60*60*24)); 
		$months = floor(($diff - $years * 365*60*60*24)
                               / (30*60*60*24));

		$settings = Settings::all();
		$setting = array();
		foreach($settings as $set){
			$setting[$set->label] = $set->value;
		}

        $stgst = (isset($setting['stgst']))?$setting['stgst']:9;
        $cgst = (isset($setting['cgst']))?$setting['cgst']:9;
        $igst = (isset($setting['igst']))?$setting['igst']:9;

        if($transaction->user->state_code == 3){
            $rate = round($transaction->transaction->amount * 100 / (100+$stgst+$cgst));
        }
        else{
            $rate = round($transaction->transaction->amount * 100 / (100+$igst));
        }
        
        
        $data = array(
	    			'payment_id' => $transaction->transaction->id,
	    			'billed_to' => $transaction->user->institue->institute_name,
	    			'name' => $transaction->user->first_name." ".$transaction->user->last_name,
	    			'state' => $transaction->user->state,
	    			'state_code' => $transaction->user->state_code,
	    			'customer_address' => $transaction->user->country_citizen,
	    			'customer_GSTIN' => $transaction->user->gstin,
	    			'validity' => $months,
	    			'amount' => $transaction->transaction->amount,
	    			'rate' => $rate,
	    			'package' => $transaction->subscription->title,
	    			'transaction_id' => $transaction->transaction->trancation_id,
	    			'created' => date('Y-m-d', strtotime($transaction->transaction->created_at)),
	    			'company_name' => (isset($setting['company_name']))?$setting['company_name']:'',
	    			'company_address' => (isset($setting['company_invoice_address']))?$setting['company_invoice_address']:'',
	    			'company_gst_number' => (isset($setting['company_gst_number']))?$setting['company_gst_number']:'',
	    			'hsn_code' => (isset($setting['hsn_code']))?$setting['hsn_code']:'',
	    			'company_mobile_number' => (isset($setting['company_mobile_number']))?$setting['company_mobile_number']:'',
	    			'digital_signature' => (isset($setting['digital_signature']))?url('/assets/images/'.$setting["digital_signature"]):'',
	    			'stgst' => (isset($setting['stgst']))?$setting['stgst']:9,
	    			'cgst' => (isset($setting['cgst']))?$setting['cgst']:9,
	    			'igst' => (isset($setting['igst']))?$setting['igst']:18
	    		);

       // echo '<pre>';print_r($data);echo '</pre>';die;
        //return view('downloadinvoice',compact('data'));
        // share data to view
       view()->share('data', $data);
       $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('downloadinvoice', $data);

       $filename = time().'_invoice.pdf';
       // download PDF file with download method
       return $pdf->download($filename);
    }

    public function create()
    {
    	return view('invoice');
    }
}
    
