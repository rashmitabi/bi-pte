<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailUser;
use Illuminate\Http\Request;
use App\Models\Certificates;
use App\Models\User;
use App\Models\StudentTests;
use PDF;

class CertificateController extends Controller
{
    public function download($id){
    	ini_set('max_execution_time', 3000);
    	$data['certificate'] = Certificates::with(['test', 'student'])->where(['id' => $id])->first();
        $data['institute'] = User::with('institue')
            ->join('users as u2', function($join)
                         {
                             $join->on('u2.id', '=', 'users.parent_user_id');
                         })
            ->where(['users.id' => $data['certificate']->student_user_id])
            ->first();
        $data['student_test'] = StudentTests::where(['user_id' => $data['certificate']->student_user_id, 'test_id' => $data['certificate']->test_id, 'status' => 'C'])->first();
    	if($data['certificate'] && $data['institute'] && $data['student_test']){
    		view()->share('data', $data);
	        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('A4', 'landscape')->loadView('certificate', $data);
	        $fileName = time().'_'.$data['certificate']->test->test_name.'.pdf';

	        // download PDF file with download method
	       	return $pdf->download($fileName);
    	}

    }
}
