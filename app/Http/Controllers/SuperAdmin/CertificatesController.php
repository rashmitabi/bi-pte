<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestResults;
use DataTables;
use DB;

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
                        $btn = '<ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editcertificates">
                                    <a href="javascript:void(0)" class="generate_certificate" data-url="'.route('generate-certificate', ['aid' => $row->user_id, 'bid' => $row->test_id]).'">
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
        $data = TestResults::select(DB::raw('SUM(get_score) AS score'),'section_id')->groupBy('test_id', 'user_id', 'section_id')->where(['test_id' => $tid, 'user_id' => $uid])->get(); 
        $result = array();
        foreach($data as $d){
            $result[$d->section_id] = $d->score;
        }

        $readingScore = $result[1];
        $listeningScore = $result[2];
        $writingScore = $result[3];
        $speakingScore = $result[4];

        if(($writingScore + $listeningScore) <= 0 && ($writingScore + $listeningScore) >= 40){
            $written_disclosure = [10, 11, 12, 8, 9, 13, 7, 12, 11, 14, 15, 16, 18, 20, 21];
            $spelling = [7, 5, 9, 8, 12, 10, 7, 6, 14, 15, 13, 16, 18, 20, 11];
            $grammar = [15, 18, 12, 10, 15, 13, 17, 16, 12, 11, 19, 20, 13, 8, 21];
            $vocabulary = [13, 12, 14, 18, 16, 20, 22, 13, 17, 19, 21, 13, 17, 15, 14];
        }
        else if(($writingScore + $listeningScore) <= 41 && ($writingScore + $listeningScore) >= 60){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }
        else if(($writingScore + $listeningScore) <= 61 && ($writingScore + $listeningScore) >= 80){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }
        else if(($writingScore + $listeningScore) <= 81 && ($writingScore + $listeningScore) >= 100){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }
        else if(($writingScore + $listeningScore) <= 101 && ($writingScore + $listeningScore) >= 120){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }
        else if(($writingScore + $listeningScore) <= 121 && ($writingScore + $listeningScore) >= 140){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }
        else if(($writingScore + $listeningScore) <= 141 && ($writingScore + $listeningScore) >= 160){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }
        else if(($writingScore + $listeningScore) <= 161 && ($writingScore + $listeningScore) >= 180){
            $written_disclosure = [];
            $spelling = [];
            $grammar = [];
            $vocabulary = [];
        }

        if($speakingScore >= 0 && $speakingScore <= 30){
            $pronunciation = [];
            $oral_fluency = [];
        }
        else if($speakingScore >= 31 && $speakingScore <= 50){
            $pronunciation = [];
            $oral_fluency = [];
        }
        else if($speakingScore >= 51 && $speakingScore <= 70){
            $pronunciation = [];
            $oral_fluency = [];
        }
        else if($speakingScore >= 71 && $speakingScore <= 80){
            $pronunciation = [];
            $oral_fluency = [];
        }
        else if($speakingScore >= 81 && $speakingScore <= 90){
            $pronunciation = [];
            $oral_fluency = [];
        }


        $html = view('superadmin.certificates.edit', compact('result'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html   
        ]);
    }
}
