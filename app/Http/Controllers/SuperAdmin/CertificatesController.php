<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestResults;
use DataTables;

class CertificatesController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax()) {
            $data = TestResults::with(['test','user'])->select('test_id','user_id')->groupBy('test_id', 'user_id')->get(); 
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('username', function($row){
                        $name = $row->user->first_name." ".$row->user->last_name;
                        return $name;
                    })
                    ->addColumn('test_name', function($row){
                        return $row->test->test_name;
                        
                    })                                      
                    ->addColumn('action', function($row){
                        //$btn = '<ul class="actions-btns"><li data-toggle="modal" data-target="#testresults" class="action"><a href="javascript:void(0);" class="results-edit" data-id="'.$row->id .'" data-url="'.route('results.edit', $row->id).'"><i class="fas fa-eye"></i></a></li></ul>';

                        $btn = '<ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editcertificates">
                                    <a href="javascript:void(0)" class="generate_certificate" data-test="'.$row->test_id.'" data-user="'.$row->user_id.'" data-url="">
                                    <img src="'. asset('assets/images/icons/certificate.svg').'"
                                                class=""></a></li>
                                </ul>';
                        
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('superadmin/certificates/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid, $tid)
    {
        // $subject = Subjects::find($id);

        // $html_subject = view($this->moduleTitleP.'edit', compact('subject'))->render();

        // return response()->json([
        //     'success' => 1,
        //     'html'=>$html_subject    
        // ]);
    }
}
