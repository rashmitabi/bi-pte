<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestResults;
use App\Models\Certificates;
use App\Models\Notifications;
use App\Models\Tests;
use App\Http\Requests\CreateCertificateRequest;
use DataTables;
use PDF;

class CertificatesController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax()) {
            //$data = TestResults::with(['test','user'])->select('test_id','user_id')->groupBy('test_id', 'user_id')->get();    
            $data = TestResults::with(['test','user'])
                ->select('test_results.test_id','test_results.user_id')
                ->join('student_tests', function($join)
                         {
                             $join->on('student_tests.user_id', '=', 'test_results.user_id');
                             $join->on('student_tests.test_id', '=', 'test_results.test_id');
                         })
                ->where('student_tests.status', 'C')
                ->groupBy('test_id', 'user_id')
                ->get();              
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
                        $existing_certificate = Certificates::latest()->where(['student_user_id' => $row->user_id, 'test_id' => $row->test_id])->first();
                        if($existing_certificate){
                            $btn = 'Certificate Already generated';
                        }
                        else{
                            $btn = '<ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editcertificates">
                                    <a href="javascript:void(0)" class="generate_certificate" data-url="'.route('generate-certificate', ['aid' => $row->user_id, 'bid' => $row->test_id]).'">
                                    <img src="'. asset('assets/images/icons/certificate.svg').'"
                                                class=""></a></li>
                                </ul>';
                        }
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
        //get section wise score
        $data = TestResults::selectRaw('SUM(get_score) AS score,section_id')->groupBy('test_id', 'user_id', 'section_id')->where(['test_id' => $tid, 'user_id' => $uid])->get(); 
        $resultdata = array();
        foreach($data as $d){
            $resultdata[$d->section_id] = $d->score;
        }

        $result = array(
            1 => (isset($resultdata[1])) ? $resultdata[1] : 0,
            2 => (isset($resultdata[2])) ? $resultdata[2] : 0,
            3 => (isset($resultdata[3])) ? $resultdata[3] : 0,
            4 => (isset($resultdata[4])) ? $resultdata[4] : 0
        );


        $count = Certificates::where(['student_user_id' => $uid])->count(); 

        $scores = $this->getValues($result, $count);

        $scores['user_id'] = $uid;
        $scores['test_id'] = $tid;

        $html = view('superadmin.certificates.edit', compact('scores'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html   
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCertificateRequest $request)
    {
        $input = \Arr::except($request->all(),array('_token'));
        $input['generate_by_user_id'] = \Auth::user()->id;
        $count = Certificates::where(['student_user_id' => $input['student_user_id'], 'test_id' => $input['test_id']])->count(); 
        if($count == 0){
            $test = Tests::find($input['test_id']);
            $resdata = $input;
            $resdata['test_name'] = $test->test_name;
            $result = Certificates::create($input);
            /*if($result){
                //send notification                
                if($test->type == "M"){
                    $type = "Mock Test";
                }
                else if($test->type == "P"){
                    $type = "Practice Test";
                }
                $notification_data = array(
                    'user_id' => $input['student_user_id'],
                    'sender_id' => $input['generate_by_user_id'],
                    'type' => "student",
                    'title' => "New certificate has been generated",
                    'body' => "A new certificate has been generated for ".$type." - ".$test->test_name." attempted by you.",
                    'url' => ""
                );
                $notification = Notifications::create($notification_data);
                \Session::put('success', 'Certificate generated successfully!');
                return true;   
            }*/
            //generate certificate file
            view()->share('data', $resdata);
            $pdf = PDF::loadView('superadmin.certificates.certificate', $input);
            $path = public_path('files/certificates/');
            $fileName = time().'_'.$test->test_name.'.pdf';
            if($pdf->save($path . '/' . $fileName)){
                $input['file_path'] = 'files/certificates/'.$fileName;
                //print_r($input);die;
                // add record in database 
                $result = Certificates::create($input);
                if($result){
                    //send notification                
                    if($test->type == "M"){
                        $type = "Mock Test";
                    }
                    else if($test->type == "P"){
                        $type = "Practice Test";
                    }
                    $notification_data = array(
                        'user_id' => $input['student_user_id'],
                        'sender_id' => $input['generate_by_user_id'],
                        'type' => getUserRole($input['student_user_id']),
                        'title' => "New certificate has been generated",
                        'body' => "A new certificate has been generated for ".$type." - ".$test->test_name." attempted by you.",
                        'url' => ""
                    );
                    $notification = Notifications::create($notification_data);
                    \Session::put('success', 'Certificate generated successfully!');
                    return true;   
                }   
                else{
                    \Session::put('error', 'Unable to generate certificate. Please try Again.');
                    return false;
                }  
            }
            else{
                \Session::put('error', 'Sorry!Something went wrong. Please try Again.');
                return false;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videos  $Certificates
     * @return \Illuminate\Http\Response
     */
    public function show(Certificates $certificates)
    {
        //
    }

    /**
     * Calculate the score for the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateScore(Request $request)
    {
        $input = \Arr::except($request->all(),array('_token'));
        $result = array(
            1 => $input['reading'],
            2 => $input['listening'],
            3 => $input['writing'],
            4 => $input['speaking']
        );
        $count = $input['count'];
        $scores = $this->getValues($result, $count);
        return response()->json([
            'success' => 1,
            'data'=>$scores   
        ]);
    }

    public function getValues($result, $count)
    {
        $readingScore = $result[1];
        $listeningScore = $result[2];
        $writingScore = $result[3];
        $speakingScore = $result[4];

        // get count of generated certificates        
        while($count >= 15){
            $count = $count - 15;
        }

        if(($writingScore + $listeningScore) >= 0 && ($writingScore + $listeningScore) <= 40){
            $written_disclosure = [10, 11, 12, 8, 9, 13, 7, 12, 11, 14, 15, 16, 18, 20, 21];
            $spelling = [7, 5, 9, 8, 12, 10, 7, 6, 14, 15, 13, 16, 18, 20, 11];
            $grammar = [15, 18, 12, 10, 15, 13, 17, 16, 12, 11, 19, 20, 13, 8, 21];
            $vocabulary = [13, 12, 14, 18, 16, 20, 22, 13, 17, 19, 21, 13, 17, 15, 14];
        }
        else if(($writingScore + $listeningScore) >= 41 && ($writingScore + $listeningScore) <= 60){
            $written_disclosure = [27,18,24,26,27,21,29,19,22,30,20,39,36,35,33];
            $spelling = [24,16,18,12,30,22,26,13,28,25,22,34,38,35,31];
            $grammar = [34,38,40,26,22,30,35,26,28,33,40,42,36,39,41];
            $vocabulary = [35,18,41,22,26,34,27,37,39,40,45,43,33,31,30,];
        }
        else if(($writingScore + $listeningScore) >= 61 && ($writingScore + $listeningScore) <= 80){
            $written_disclosure = [25,27,40,37,28,42,34,36,39,31,19,29,31,41,44,];
            $spelling = [18,24,37,35,32,42,24,22,25,29,38,31,37,28,42];
            $grammar = [34,42,36,32,39,37,36,38,22,26,31,36,40,42,44];
            $vocabulary = [33,39,40,31,32,29,42,40,21,23,39,31,30,44,42];
        }
        else if(($writingScore + $listeningScore) >= 81 && ($writingScore + $listeningScore) <= 100){
            $written_disclosure = [35,24,40,46,47,52,50,53,36,49,45,41,39,38,44];
            $spelling = [22,46,19,30,38,42,46,49,52,50,51,49,42,44,38];
            $grammar = [60,52,59,37,39,60,50,49,44,46,55,54,62,39,38];
            $vocabulary = [40,38,46,48,49,50,61,42,43,56,60,48,52,56,53];
        }
        else if(($writingScore + $listeningScore) >= 101 && ($writingScore + $listeningScore) <= 120){
            $written_disclosure = [40,54,60,57,39,42,47,52,53,56,59,51,55,48,43];
            $spelling = [21,39,67,30,41,50,40,46,47,50,59,60,51,49,63];
            $grammar = [56,65,58,43,52,61,49,55,57,60,62,65,61,48,47];
            $vocabulary = [56,55,50,57,61,63,59,49,51,58,50,42,59,56,55];
        }
        else if(($writingScore + $listeningScore) >= 121 && ($writingScore + $listeningScore) <= 140){
            $written_disclosure = [40,61,66,53,56,58,62,70,49,65,70,72,69,52,49,70];
            $spelling = [60,55,46,49,51,52,63,46,33,49,52,67,66,59,75,62];
            $grammar = [63,61,67,58,55,76,70,62,57,54,72,59,70,54,67,66];
            $vocabulary = [73,43,61,44,64,56,58,51,59,68,76,55,63,78,49,60];
        }
        else if(($writingScore + $listeningScore) >= 141 && ($writingScore + $listeningScore) <= 160){
            $written_disclosure = [65,72,83,66,75,80,76,77,70,81,52,71,73,49,69];
            $spelling = [70,60,38,49,38,59,56,60,81,85,61,65,86,83,79];
            $grammar = [42,82,71,69,63,66,64,72,71,83,65,63,66,73,74];
            $vocabulary = [77,80,84,69,87,53,56,54,80,76,85,83,70,59,73];
        }
        else if(($writingScore + $listeningScore) >= 161 && ($writingScore + $listeningScore) <= 180){
            $written_disclosure = [78,73,80,89,90,82,81,83,80,75,70,88,78,75,90];
            $spelling = [66,59,88,89,80,70,71,73,75,80,90,78,77,73,69];
            $grammar = [88,83,80,90,79,89,83,86,84,81,90,84,89,60,87];
            $vocabulary = [90,86,90,88,84,70,79,90,81,76,88,66,79,89,90];
        }

        if($speakingScore >= 0 && $speakingScore <= 30){
            $pronunciation = [20,15,18,16,24,13,11,26,30,10,11,34,17,19,20];
            $oral_fluency = [35,30,24,26,34,18,20,34,36,24,22,30,26,39,32];
        }
        else if($speakingScore >= 31 && $speakingScore <= 50){
            $pronunciation = [32,34,26,22,24,39,44,48,36,46,45,47,49,35,39];
            $oral_fluency = [54,52,46,44,50,43,58,60,56,53,57,63,65,48,50];
        }
        else if($speakingScore >= 51 && $speakingScore <= 70){
            $pronunciation = [40,48,52,56,65,60,45,57,60,42,52,56,58,67,70];
            $oral_fluency = [55,67,76,70,72,61,72,76,66,56,47,62,68,81,79];
        }
        else if($speakingScore >= 71 && $speakingScore <= 80){
            $pronunciation = [65,63,62,66,69,72,75,71,70,69,73,60,67,68,72];
            $oral_fluency = [80,75,77,70,81,80,82,72,80,75,70,72,75,78,80];
        }
        else if($speakingScore >= 81 && $speakingScore <= 90){
            $pronunciation = [79,75,82,87,88,85,90,78,90,77,81,80,79,78,90];
            $oral_fluency = [90,89,85,87,87,86,90,83,87,88,83,90,86,87,90];
        }

        $scores = array(
            'reading' => $readingScore,
            'writing' => $writingScore,
            'listening' => $listeningScore,
            'speaking' => $speakingScore,
            'written_disclosure' => $written_disclosure[$count],
            'spelling' => $spelling[$count],
            'grammar' => $grammar[$count],
            'vocabulary' => $vocabulary[$count],
            'pronunciation' => $pronunciation[$count],
            'oral_fluency' => $oral_fluency[$count],
            'overall' => round(($readingScore + $writingScore + $listeningScore + $speakingScore + $written_disclosure[$count] + $spelling[$count] + $grammar[$count] + $vocabulary[$count] + $pronunciation[$count] + $oral_fluency[$count]) / 10),
            'count'=> $count         
        );

        return $scores;
    }
}
