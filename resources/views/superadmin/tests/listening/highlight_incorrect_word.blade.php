@extends('layouts.appSuperAdmin')
@section('content')
  <div id="content">
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
              <h5>Highlight Incorrect Words (13 - 14)</h5>
            </div>
            <form class="form ml-1" method="POST" id="hightlight_words" name="hightlight_words" action="{{ (isset($questions->desc))?route('update-listen-highlight-incorrect-words'):route('store-listen-highlight-incorrect-words')}}">
              @csrf
              <input type="hidden" name="question_type_id" value="{{ $question_id }}">
              <input type="hidden" name="section_id" value="{{ $section_id }}">
              <input type="hidden" name="test_id" value="{{ $test_id }}">
              @if(isset($questions->name))
              <input type="hidden" name="question_id" value="{{ $questions->id }}">
              <input type="hidden" name="q13_id" value="{{ $questions->questiondata[0]->id }}">
              <input type="hidden" name="q14_id" value="{{ $questions->questiondata[1]->id }}">
              <input type="hidden" name="a13_id" value="{{ $questions->answerdata[0]->id }}">
              <input type="hidden" name="a14_id" value="{{ $questions->answerdata[1]->id }}">
              @php
                    $json13 = json_decode($questions->questiondata[0]->data_value);
                    $json14 = json_decode($questions->questiondata[1]->data_value);
              @endphp
              @endif
              <div class="row">
                <div class="col-12 col-md-8 col-xl-8 col-sm-12">
                      <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q13 Audio</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                <input type="text" name="audio13" id="audio13" class="form-control " placeholder="Please Enter audio13" value="{{ (isset($json13))?$json13->audio13:''}}">
                            </div>
                        </div>
                      </div>
                      <div class="sub-heading pl-1">
                        <h5>Question13<span>Paragraph</span></h5>
                      </div>
                      <div class="form-group mb-2 row">
                        <div class="col-12 pl-1 p-0">
                          <textarea name="editor13" id="editor13">{{ (isset($json13))?$json13->editor13:''}}</textarea>
                        </div>
                      </div>
                      <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q13 Correct Answers</label>
                          <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="correct_ans13" id="correct_ans13" class="form-control " placeholder="Please Enter Correct Answers13" value="{{ (isset($json13))?$questions->answerdata[0]->answer_value:''}}">
                          </div>
                        </div>
                      </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q14 Audio</label>
                          <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                              <input type="text" name="audio14" id="audio14"  class="form-control " placeholder="Please Enter audio14" value="{{ (isset($json14))?$json14->audio14:''}}">
                          </div>
                       </div>
                    </div>
                    <div class="sub-heading pl-1">
                      <h5>Question 14<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="editor14" id="editor14">{{ (isset($json14))?$json14->editor14:''}}</textarea>
                      </div>
                    </div>
                    <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q14 Correct Answers</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="correct_ans14" id="correct_ans14" class="form-control " placeholder="Please Enter Correct Answers14" value="{{ (isset($json14))?$questions->answerdata[1]->answer_value:''}}">
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
<script src="{{ asset('assets/js/listening/highlightIncorrectWords.js') }}" defer></script>
@endsection