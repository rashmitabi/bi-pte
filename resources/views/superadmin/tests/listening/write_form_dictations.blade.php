@extends('layouts.appSuperAdmin')
@section('content')
@php
$section_id = $_GET['section_id'];
$test_id    = $_GET['test_id'];
$question_id = $_GET['question_type_id'];
@endphp
<div id="content">
    <!-- write dictations -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Write Form Dictations (15-17)</h5>
                   </div>
                   <form class="form" name="form_dictations" id="form_dictations" method="POST" action="{{(isset($questions->name))?route('update-listen-write-form-dictations'):route('store-listen-write-form-dictations')}}">
                    @csrf
                   <div class="row">
                        <div class="col-8">
                            <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q15 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " name="audio_q15" id="audio_q15" placeholder="Whole,Total,Very,Open" value="{{(isset($questions->name))?$questions->questiondata[0]->data_value:''}}">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q15 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " name="correct_answers_q15" id="correct_answers_q15" placeholder="Whole" value="{{(isset($questions->name))?$questions->answerdata[0]->answer_value:''}}">
                                      </div>
                                   </div>
                              </div><div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q16 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " name="audio_q16" id="audio_q16" placeholder="Whole,Total,Very,Open" value="{{(isset($questions->name))?$questions->questiondata[1]->data_value:''}}">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q16 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " name="correct_answers_q16" id="correct_answers_q16" placeholder="Whole" value="{{(isset($questions->name))?$questions->answerdata[1]->answer_value:''}}">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q17 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " name="audio_q17" id="audio_q17" placeholder="Whole,Total,Very,Open" value="{{(isset($questions->name))?$questions->questiondata[2]->data_value:''}}">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q17 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " name="correct_answers_q17" id="correct_answers_q17" placeholder="Whole" value="{{(isset($questions->name))?$questions->answerdata[2]->answer_value:''}}">
                                      </div>
                                   </div>
                              </div>
                    </div>
                    <div class="col-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                    </div>
                    </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <input type="hidden" name="section_id" value="{{ $section_id }}">
                                <input type="hidden" name="test_id" value="{{ $test_id }}">
                                <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                @if(isset($questions->name))
                                    <input type="hidden" name="question_id" value="{{ $questions->id }}">
                                    <input type="hidden" name="q15" value="{{ $questions->questiondata[0]->id }}">
                                    <input type="hidden" name="q16" value="{{ $questions->questiondata[1]->id }}">
                                    <input type="hidden" name="q17" value="{{ $questions->questiondata[2]->id }}">
                                    <input type="hidden" name="a15" value="{{ $questions->answerdata[0]->id }}">
                                    <input type="hidden" name="a16" value="{{ $questions->answerdata[1]->id }}">
                                    <input type="hidden" name="a17" value="{{ $questions->answerdata[2]->id }}">
                                @endif
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
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
<script src="{{ asset('assets/js/listening/listeningWriteFormDictations.js') }}" defer></script>
@endsection