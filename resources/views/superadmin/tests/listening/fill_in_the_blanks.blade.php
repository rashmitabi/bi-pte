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
              <h5>Fill in the blanks (5-6)</h5>
            </div>
            <form class="form ml-1" method="POST" id="frm-fill-in-the-blanks" name="frm-fill-in-the-blanks" action="{{ (isset($questions->desc))?route('update-fill-in-the-blanks'):route('add-fill-in-the-blanks')}}">
              @csrf
              <input type="hidden" name="question_type_id" value="{{ $question_id }}">
              <input type="hidden" name="section_id" value="{{ $section_id }}">
              <input type="hidden" name="test_id" value="{{ $test_id }}">
              <div class="row">
                <div class="col-12 col-md-8 col-xl-8 col-sm-12">
                  @if(isset($questions->desc))
                    @php
                      $count = count($questions->questiondata);
                    @endphp
                    <input type="hidden" name="question_id" value="{{ $questions->id }}">
                    @for($i=0;$i<$count;$i++)
                      <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                        <input type="hidden" name="question_data_id{{ $i+1 }}" id="question_data_id{{ $i+1 }}" value="{{ $questions->questiondata[$i]->id }}">
                        @php
                          $data_value = json_decode($questions->questiondata[$i]->data_value);
                        @endphp
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q{{ $i+5 }} Audio</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                <input type="text" name="audio{{ $i+1 }}" id="audio{{ $i+1 }}" value="{{ (isset($data_value->audio) ? $data_value->audio : '') }}" class="form-control " placeholder="Whole">
                            </div>
                        </div>
                      </div>
                      <div class="sub-heading pl-1">
                        <h5>Question {{ $i+5 }}<span>Paragraph</span></h5>
                      </div>
                      <div class="form-group mb-2 row">
                        <div class="col-12 pl-1 p-0">
                          <textarea name="question{{ $i+1 }}" id="question{{ $i+1 }}" class="ckeditor">{{ (isset($data_value->question) ? $data_value->question : '') }}</textarea>
                        </div>
                      </div>
                      <input type="hidden" name="answer_data_id{{ $i+1 }}" id="answer_data_id{{ $i+1 }}" value="{{ $questions->answerdata[$i]->id }}">
                      <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q{{ $i+5 }} Correct Answers</label>
                          <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="correct_ans{{ $i+1 }}" id="correct_ans{{ $i+1 }}" value="{{ $questions->answerdata[$i]->answer_value }}" class="form-control " placeholder="Whole">
                          </div>
                        </div>
                      </div>
                    @endfor
                  @else
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q5 Audio</label>
                          <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                              <input type="text" name="audio1" id="audio1" class="form-control " placeholder="Whole">
                          </div>
                       </div>
                    </div>
                    <div class="sub-heading pl-1">
                      <h5>Question 5<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="question1" id="question1" class="ckeditor"></textarea>
                      </div>
                    </div>
                    <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q5 Correct Answers</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="correct_ans1" id="correct_ans1" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                    </div>

                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q6 Audio</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="audio2" id="audio2" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                    </div>
                    <div class="sub-heading pl-1">
                      <h5>Question 6<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="question2" id="question2" class="ckeditor"></textarea>
                      </div>
                    </div>
                    <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label pl-1 ">Q6 Correct Answers</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="correct_ans2" id="correct_ans2" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="col-12 col-md-4 col-xl-4 col-sm-12">
                  <h5 class="mt-4">Audio</h5>
                  <div class="form-group mb-2 row">
                    <div class="col-12 p-0">                              
                      <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input " onchange ="uploadAduio()" id="customFile_audio" data-url="{{ route('upload-audio') }}" data-token="{{ csrf_token() }}">
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
                  <a href="{{ route('tests.index') }}"><button  type="button" class="btn btn-outline-primary"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}">Cancel</button></a>
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
<script src="{{ asset('assets/js/listening/fillintheblanks.js') }}" defer></script>
@endsection