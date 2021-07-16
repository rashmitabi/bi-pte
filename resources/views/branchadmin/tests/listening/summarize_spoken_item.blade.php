@extends('layouts.appBranchAdmin')
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
              <h5>Summarize Spoken Item (1-2)</h5>
            </div>  
            <form class="form ml-1" method="POST" id="frm-summarize-spoken-item" name="frm-summarize-spoken-item" action="{{ (isset($questions->desc))?route('branchadmin-update-summarize-spoken-item'):route('branchadmin-add-summarize-spoken-item')}}">
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
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q{{ $i+1 }} Audio</label>
                          <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="question_audio{{ $i+1 }}" id="question_audio{{ $i+1 }}" value="{{ (isset($data_value[0]) ? $data_value[0]:'') }}" class="form-control " placeholder="Please Enter audio{{ $i+1 }}">
                          </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q{{ $i+1 }} Images</label>
                          <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                            <input type="text" name="question_image{{ $i+1 }}" id="question_image{{ $i+1 }}" value="{{ (isset($data_value[1]) ? $data_value[1]:'') }}" class="form-control " placeholder="Please Enter image{{ $i+1 }}">
                          </div>
                        </div>
                      </div>

                      <input type="hidden" name="answer_data_id{{ $i+1 }}" id="answer_data_id{{ $i+1 }}" value="{{ $questions->answerdata[$i]->id }}">
                      <div class="sub-heading pl-1">
                         <h5>Summary Script<span>Paragraph</span></h5>
                      </div>
                      <div class="form-group mb-2 row">
                        <div class="col-12 pl-1 p-0">
                          <textarea name="summary_script{{ $i+1 }}" id="summary_script{{ $i+1 }}" class="ckeditor">{{ $questions->answerdata[$i]->answer_value }}</textarea>
                        </div>
                      </div>
                      <div class="sub-heading pl-1">
                        <h5>Sample Answer<span>Paragraph</span></h5>
                      </div>
                      <div class="form-group mb-2 row">
                        <div class="col-12 pl-1 p-0">
                          <textarea name="sample_ans{{ $i+1 }}" id="sample_ans{{ $i+1 }}" class="ckeditor">{{ $questions->answerdata[$i]->sample_answer }}</textarea>
                        </div>
                      </div>
                    @endfor
                  @else
                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q1 Audio</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="question_audio1" id="question_audio1" class="form-control " placeholder="Please Enter audio1">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q1 Images</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="question_image1" id="question_image1" class="form-control " placeholder="Please Enter image1">
                        </div>
                      </div>
                    </div>
                    <div class="sub-heading pl-1">
                       <h5>Summary Script<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="summary_script1" id="summary_script1" class="ckeditor"></textarea>
                      </div>
                    </div>
                    <div class="sub-heading pl-1">
                      <h5>Sample Answer<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="sample_ans1" id="sample_ans1" class="ckeditor"></textarea>
                        <div id="error_check_editor"></div>
                      </div>
                    </div>

                    <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Q2 Audio</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="question_audio2" id="question_audio2" class="form-control " placeholder="Please Enter audio2">
                        </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Q2 Images</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                          <input type="text" name="question_image2" id="question_image2" class="form-control " placeholder="Please Enter image2">
                        </div>
                      </div>
                    </div>
                    <div class="sub-heading pl-1">
                      <h5>Summary Script<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="summary_script2" id="summary_script2" class="ckeditor"></textarea>
                      </div>
                    </div>
                    <div class="sub-heading pl-1">
                      <h5>Sample Answer<span>Paragraph</span></h5>
                    </div>
                    <div class="form-group mb-2 row">
                      <div class="col-12 pl-1 p-0">
                        <textarea name="sample_ans2" id="sample_ans2" class="ckeditor"></textarea>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="col-12 col-md-4 col-xl-4 col-sm-12">
                  <h5 class="mt-4">Images</h5>
                  <div class="form-group mb-2 row">
                    <div class="col-12 p-0">                              
                      <div class="custom-file mb-3" >
                          <input type="file" class="custom-file-input" onchange="uploadImage()" id="customFile_image789" data-url="{{ route('branchadmin-upload-image') }}" data-token="{{ csrf_token() }}">
                          <label class="custom-file-label" for="customFile">Select Image</label>
                      </div>
                      <input type="text" name="upload-image" id="upload-image" class="form-control">
                      <span class="error-msg" id="upload-imageError"></span>
                    </div>
                  </div>
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
                  <a href="{{ route('branchadmin-tests.show', $test_id) }}"><button  type="button" class="btn btn-outline-primary"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}">Cancel</button></a>
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
<script src="{{ asset('assets/js/branchadmin/listening/summarizespokenitem.js') }}" defer></script>
@endsection