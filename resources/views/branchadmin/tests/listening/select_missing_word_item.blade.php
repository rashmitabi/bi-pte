@extends('layouts.appBranchAdmin')
@section('content')
<div id="content">
 <!-- missing word -->
 <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Select missing word item (11-12)</h5>
                   </div>
                   <form class="form" name="missing_word" id="missing_word" method="POST" action="{{ (isset($questions->name))?route('branchadmin-update-listen-missing-word-item'):route('branchadmin-store-listen-missing-word-item') }}">
                    @csrf
                    @if(isset($questions->name))
                        @php
                            $json11 = json_decode($questions->questiondata[0]->data_value);
                            $json12= json_decode($questions->questiondata[1]->data_value);
                        @endphp
                    @endif
                   <div class="row">
                        <div class="col-12 col-md-8 col-xl-8 col-sm-12">
                            <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q11 Audio</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="audio_q11" id="audio_q11" placeholder="Please Enter audio11" value="{{ (isset($json11)?$json11->audio_q11:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q11 choice 1</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_1_q11" id="choice_1_q11" placeholder="Please Enter choice 1" value="{{ (isset($json11)?$json11->choice_1_q11:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q11 choice 2</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_2_q11" id="choice_2_q11" placeholder="Please Enter choice 2" value="{{ (isset($json11)?$json11->choice_2_q11:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q11 choice 3</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_3_q11" id="choice_3_q11" placeholder="Please Enter choice 3" value="{{ (isset($json11)?$json11->choice_3_q11:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q11 choice 4</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_4_q11" id="choice_4_q11" placeholder="Please Enter choice 4" value="{{ (isset($json11)?$json11->choice_4_q11:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q11 Correct Answers</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="correct_answers_q11" id="correct_answers_q11" placeholder="Please Enter correct answers11" value="{{ (isset($json11)?$questions->answerdata[0]->answer_value:'')}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q12 Audio</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="audio_q12" id="audio_q12" placeholder="Please Enter audio12" value="{{ (isset($json12)?$json12->audio_q12:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q12 choice 1</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_1_q12" id="choice_1_q12" placeholder="Please Enter choice 1" value="{{ (isset($json12)?$json12->choice_1_q12:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q12 choice 2</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_2_q12" id="choice_2_q12" placeholder="Please Enter choice 2" value="{{ (isset($json12)?$json12->choice_2_q12:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q12 choice 3</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_3_q12" id="choice_3_q12" placeholder="Please Enter choice 3" value="{{ (isset($json12)?$json12->choice_3_q12:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q12 choice 4</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="choice_4_q12" id="choice_4_q12" placeholder="Please Enter choice 4" value="{{ (isset($json12)?$json12->choice_4_q12:'')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q12 Correct Answers</label>
                                    <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="correct_answers_q12" id="correct_answers_q12" placeholder="Please Enter correct answers12" value="{{ (isset($json12)?$questions->answerdata[1]->answer_value:'')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-xl-4 col-sm-12">
                            <h5 class="mt-4">Audio</h5>
                            <div class="form-group mb-2 row">
                                    <div class="col-12 p-0">                              
                                        <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input " onchange ="uploadAduio()" id="customFile_audio123" data-url="{{ route('branchadmin-upload-audio') }}" data-token="{{ csrf_token() }}">
                                            <label class="custom-file-label" for="customFile">Select Audio</label>
                                        </div>
                                        <input type="text" name="upload-audio" id="upload-audio" class="form-control" >
                                        <span class="error-msg" id="upload-audioError"></span>
                                    </div>
                                </div>        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn mt-5 ">
                            <input type="hidden" name="section_id" value="{{ $section_id }}">
                            <input type="hidden" name="test_id" value="{{ $test_id }}">
                            <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                            @if(isset($questions->name))
                                <input type="hidden" name="question_id" value="{{ $questions->id }}">
                                <input type="hidden" name="question_data_id_11" value="{{ $questions->questiondata[0]->id }}">
                                <input type="hidden" name="question_data_id_12" value="{{ $questions->questiondata[1]->id }}">
                                <input type="hidden" name="answer_data_1" value="{{ $questions->answerdata[0]->id }}">
                                <input type="hidden" name="answer_data_2" value="{{ $questions->answerdata[1]->id }}">
                            @endif
                            <a href="{{ route('tests.show', $test_id) }}"><button  type="button" class="btn btn-outline-primary"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}">Cancel</button></a>
                            <button  type="submit" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                        </div> 
                    </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js-hooks')
<script src="{{ asset('assets/js/branchadmin/listening/listeningMissingWorditem.js') }}" defer></script>
@endsection