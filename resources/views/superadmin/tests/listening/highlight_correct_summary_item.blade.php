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
              <h5>Highlight correct summary Item (7-8)</h5>
            </div>
            <form class="form ml-1" method="POST" id="frm-highlight-correct-summary-item" name="frm-highlight-correct-summary-item" action="{{ (isset($questions->desc))?route('update-highlight-correct-summary-item'):route('add-highlight-correct-summary-item')}}">
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
                        <input type="hidden" name="question_data_id[]" value="{{ $questions->questiondata[$i]->id }}">
                        @php
                          $data_value = json_decode($questions->questiondata[$i]->data_value);
                        @endphp
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q{{ $i+7 }} Audio</label>
                          <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="audio[]" id="audio{{ $i+1 }}" value="{{ (isset($data_value->audio) ? $data_value->audio : '') }}" class="form-control " placeholder="Please Enter audio{{ $i+7 }}">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q{{ $i+7 }} choice 1</label>
                          <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="choice_1[]" id="choice_1{{ $i+1 }}" value="{{ (isset($data_value->choice_1) ? $data_value->choice_1 : '') }}" class="form-control " placeholder="Please Enter choice 1">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q{{ $i+7 }} choice 2</label>
                          <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="choice_2[]" id="choice_2{{ $i+1 }}" value="{{ (isset($data_value->choice_2) ? $data_value->choice_2 : '') }}" class="form-control " placeholder="Please Enter choice 2">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q{{ $i+7 }} choice 3</label>
                          <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="choice_3[]" id="choice_3{{ $i+1 }}" value="{{ (isset($data_value->choice_3) ? $data_value->choice_3 : '') }}" class="form-control" placeholder="Please Enter choice 3">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q{{ $i+7 }} choice 4</label>
                          <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="choice_4[]" id="choice_4{{ $i+1 }}" value="{{ (isset($data_value->choice_4) ? $data_value->choice_4 : '') }}" class="form-control" placeholder="Please Enter choice 4">
                          </div>
                        </div>
                        <input type="hidden" name="answer_data_id[]" value="{{ $questions->answerdata[$i]->id }}">
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q{{ $i+7 }} Correct Answers</label>
                          <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="correct_ans[]" id="correct_ans{{ $i+1 }}" value="{{ $questions->answerdata[$i]->answer_value }}" class="form-control" placeholder="Please Enter Correct Answers{{ $i+7 }}">
                          </div>
                        </div>
                      </div>
                    @endfor
                  @else
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q7 Audio</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="audio[]" id="audio1" class="form-control " placeholder="Please Enter audio7">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q7 choice 1</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_1[]" id="choice_11" class="form-control " placeholder="Please Enter choice 1">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q7 choice 2</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_2[]" id="choice_21" class="form-control " placeholder="Please Enter choice 2">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q7 choice 3</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_3[]" id="choice_31" class="form-control" placeholder="Please Enter choice 3">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q7 choice 4</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_4[]" id="choice_41" class="form-control" placeholder="Please Enter choice 4">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q7 Correct Answers</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="correct_ans[]" id="correct_ans1" class="form-control" placeholder="Please Enter correct answers7">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q8 Audio</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="audio[]" id="audio2" class="form-control " placeholder="Please Enter audio8">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q8 choice 1</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_1[]" id="choice_12" class="form-control" placeholder="Please Enter choice 1">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q8 choice 2</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_2[]" id="choice_22" class="form-control" placeholder="Please Enter choice 2">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q8 choice 3</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_3[]" id="choice_32" class="form-control" placeholder="Please Enter choice 3">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q8 choice 4</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="choice_4[]" id="choice_42" class="form-control" placeholder="Please Enter choice 4">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q8 Correct Answers</label>
                        <div class="col-12 col-md-6 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="correct_ans[]" id="correct_ans2" class="form-control" placeholder="Please Enter correct answers7">
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
                      <input type="text" name="upload-audio" id="upload-audio" class="form-control" placeholder="Here Display the code of Audio">
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

<script src="{{ asset('assets/js/listening/highlightcorrectsummaryitem.js') }}" defer></script>
@endsection