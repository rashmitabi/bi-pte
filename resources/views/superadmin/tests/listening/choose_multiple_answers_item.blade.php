@extends('layouts.appSuperAdmin')
@section('content')
  @php
  $section_id = $_GET['section_id'];
  $test_id    = $_GET['test_id'];
  $question_id = $_GET['question_type_id'];
  @endphp
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
        <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
          <div class="question-forms">
            <div class="col-12 heading-text">
              <h5>Choose Multiple answers Item (3-4)</h5>
            </div>
            <form class="form ml-1" method="POST" id="frm-choose-multiple-answers-item" name="frm-choose-multiple-answers-item" action="{{ (isset($questions->desc))?route('update-choose-multiple-answers-item'):route('add-choose-multiple-answers-item')}}">
              @csrf
              <input type="hidden" name="question_type_id" value="{{ $question_id }}">
              <input type="hidden" name="section_id" value="{{ $section_id }}">
              <input type="hidden" name="test_id" value="{{ $test_id }}">
              <div class="row">
                <div class="col-8">
                  @if(isset($questions->desc))
                    @php
                      $count = count($questions->questiondata);
                    @endphp
                    <input type="hidden" name="question_id" value="{{ $questions->id }}">
                    @for($i=0;$i<$count;$i++)
                     <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                        <input type="hidden" name="question_data_id[]" value="{{ $questions->questiondata[$i]->id }}">
                        @php
                          $data_value = json_decode($questions->questiondata[$i]->data_value);
                        @endphp
                        <div class="form-group mb-2 row">
                          <label class="col-4 col-form-label">Q3 Question</label>
                          <div class="col-7 p-0">
                            <input type="text" name="question[]" value="{{ (isset($data_value->question) ? $data_value->question : '') }}" class="form-control " placeholder="Whole,Total,Very,Open">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-4 col-form-label ">Q3 Audio</label>
                          <div class="col-7 p-0">
                            <input type="text" name="question_audio[]" value="{{ (isset($data_value->question_audio) ? $data_value->question_audio : '') }}" class="form-control " placeholder="Whole">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-4 col-form-label ">Q3 Options</label>
                          <div class="col-7 p-0">
                            <input type="text" name="question_option[]" value="{{ (isset($data_value->question_option) ? $data_value->question_option : '') }}" class="form-control " placeholder="Whole">
                          </div>
                        </div>
                        <input type="hidden" name="answer_data_id[]" value="{{ $questions->answerdata[$i]->id }}">
                        <div class="form-group mb-2 row">
                          <label class="col-4 col-form-label ">Q3 Correct Answers</label>
                          <div class="col-7 p-0">
                            <input type="text" name="correct_ans[]" value="{{ $questions->answerdata[$i]->answer_value }}" class="form-control " placeholder="Whole">
                          </div>
                        </div>
                      </div>
                    @endfor
                  @else
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label">Q3 Question</label>
                        <div class="col-7 p-0">
                          <input type="text" name="question[]"  class="form-control " placeholder="Whole,Total,Very,Open">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label ">Q3 Audio</label>
                        <div class="col-7 p-0">
                          <input type="text" name="question_audio[]"  class="form-control " placeholder="Whole">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label ">Q3 Options</label>
                        <div class="col-7 p-0">
                          <input type="text" name="question_option[]" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label ">Q3 Correct Answers</label>
                        <div class="col-7 p-0">
                          <input type="text" name="correct_ans[]" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label">Q4 Question</label>
                        <div class="col-7 p-0">
                          <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label ">Q4 Audio</label>
                        <div class="col-7 p-0">
                          <input type="text" name="question_audio[]" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label ">Q4 Options</label>
                        <div class="col-7 p-0">
                          <input type="text" name="question_option[]" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-4 col-form-label ">Q4 Correct Answers</label>
                        <div class="col-7 p-0">
                          <input type="text" name="correct_ans[]" class="form-control " placeholder="Whole">
                        </div>
                      </div>
                    </div>
                  @endif
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

<!-- <script src="{{ asset('assets/js/addQuestions.js') }}" defer></script> -->
@endsection