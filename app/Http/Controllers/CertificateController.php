<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailUser;
use Illuminate\Http\Request;
use App\Models\Certificates;
use PDF;

class CertificateController extends Controller
{
    public function download($id){
    	ini_set('max_execution_time', 3000);
    	$certificate = Certificates::with(['test', 'student'])->where(['id' => $id])->first();
    	if($certificate){
    		view()->share('data', $certificate);
	        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('certificate', $certificate);
	        $fileName = time().'_'.$certificate->test->test_name.'.pdf';

	        // download PDF file with download method
	       	return $pdf->download($fileName);
    	}
		
    }
}
