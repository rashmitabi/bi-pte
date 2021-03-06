@extends('layouts.appSuperAdmin')
@section('content')
<div id="content">

 <!-- multiple choice single answers -->
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
                      <h5>Multiple-choice,choose single answers Item (9-10)</h5>
                   </div>
                   <form class="form" name="listen_multiple_choice" id="listen_multiple_choice" method="POST" action="{{ (isset($questions->name))?route('update-listen-multiple-choice-choose-single'):route('store-listen-multiple-choice-choose-single') }}">
                        <div class="row">
                            <div class="col-12 col-md-8 col-xl-8 col-sm-12">
                                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                        @csrf
                                        @if(isset($questions->name))
                                            @php
                                                $json9 = json_decode($questions->questiondata[0]->data_value);
                                                $json10= json_decode($questions->questiondata[1]->data_value);
                                            @endphp
                                        @endif
                                        <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q9 Question</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="question_q9" id="question_q9" placeholder="Please Enter question9" value="{{(isset($json9))?$json9->question : ''}}">
                                        </div>
                                        </div>
                                        <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q9 Audio</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="audio_q9" id="audio_q9" placeholder="Please Enter audio9" value="{{(isset($json9))?$json9->audio : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q9 choice 1</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_1_q9" id="choice_1_q9" placeholder="Please Enter choice 1" value="{{(isset($json9))?$json9->choice_1 : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q9 choice 2</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_2_q9" id="choice_2_q9" placeholder="Please Enter choice 2" value="{{(isset($json9))?$json9->choice_2 : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q9 choice 3</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_3_q9" id="choice_3_q9" placeholder="Please Enter choice 3" value="{{(isset($json9))?$json9->choice_3 : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q9 choice 4</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_4_q9" id="choice_4_q9" placeholder="Please Enter choice 4" value="{{(isset($json9))?$json9->choice_4 : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q9 Correct Answers</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="correct_answers_q9" id="correct_answers_q9" placeholder="Please Enter correct answers9" value="{{(isset($json9))?$questions->answerdata[0]->answer_value : ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q10 Question</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="question_q10" id="question_q10" placeholder="Please Enter question10" value="{{(isset($json10)?$json10->question:'')}}">
                                        </div>
                                    </div>
                                        <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q10 Audio</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0"> 
                                            <input type="text" class="form-control " name="audio_q10" id="audio_q10" placeholder="Please Enter audio10" value="{{(isset($json10)?$json10->audio:'')}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q10 choice 1</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_1_q10" id="choice_1_q10" placeholder="Please Enter choice 1" value="{{(isset($json10)?$json10->choice_1:'')}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q10 choice 2</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_2_q10" id="choice_2_q10" placeholder="Please Enter choice 2" value="{{(isset($json10)?$json10->choice_2:'')}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q10 choice 3</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_3_q10" id="choice_3_q10" placeholder="Please Enter choice 3" value="{{(isset($json10)?$json10->choice_3:'')}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q10 choice 4</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="choice_4_q10" id="choice_4_q10" placeholder="Please Enter choice 4" value="{{(isset($json10)?$json10->choice_4:'')}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q10 Correct Answers</label>
                                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                            <input type="text" class="form-control " name="correct_answers_q10" id="correct_answers_q10" placeholder="Please Enter correct answers9" value="{{(isset($json10))?$questions->answerdata[1]->answer_value : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-xl-4 col-sm-12">
                                <h5 class="mt-4">Audio</h5>
                                <div class="form-group mb-2 row">
                                    <div class="col-12 p-0">                              
                                        <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input " onchange ="uploadAduio()" id="customFile_audio123" data-url="{{ route('upload-audio') }}" data-token="{{ csrf_token() }}">
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
                                <input type="hidden" name="question_data_id_9" value="{{ $questions->questiondata[0]->id }}">
                                <input type="hidden" name="question_data_id_10" value="{{ $questions->questiondata[1]->id }}">
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
<script src="{{ asset('assets/js/listening/listeningMultipleChoiceChooseSingle.js') }}" defer></script>
@endsection