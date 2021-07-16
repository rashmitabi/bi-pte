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
              <h5>Answer-Short Question</h5>
            </div>
            <form class="form ml-1" method="POST" id="frm-answer-short-question" name="frm-answer-short-question" action="{{ (isset($questions->desc))?route('update-answer-short-question'):route('add-answer-short-question')}}">
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
                      <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                        <input type="hidden" name="question_data_id[]" value="{{ $questions->questiondata[$i]->id }}">
                        <div class="form-group mb-2 row">
                           <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question {{ $i+26 }}</label>
                           <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                              <input type="text" name="question[]" id="question{{ $i+1 }}" value="{{ $questions->questiondata[$i]->data_value }}" class="form-control " placeholder="Please Enter question{{ $i+26 }} like Whole,Total,Very,Open">
                           </div>
                        </div>
                        <input type="hidden" name="answer_data_id[]" value="{{ $questions->answerdata[$i]->id }}">
                        <div class="form-group mb-2 row">
                           <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image {{ $i+26 }}</label>
                           <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                              <input type="text" name="image[]" id="image{{ $i+1 }}" value="{{ $questions->answerdata[$i]->answer_value }}" class="form-control " placeholder="Please Enter image{{ $i+26 }}">
                           </div>
                        </div>
                        <div class="form-group mb-2 row">
                          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans {{ $i+26 }}</label>
                          <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                              <input type="text" name="sample_ans[]" id="sample_ans{{ $i+1 }}" value="{{ $questions->answerdata[$i]->sample_answer }}" class="form-control " placeholder="Please Enter sample answer{{ $i+26 }}">
                          </div>
                        </div>
                      </div>
                    @endfor
                  @else
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 26</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question1" class="form-control " placeholder="Please Enter question26 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 26</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image1"  class="form-control " placeholder="Please Enter image26">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 26</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans1" class="form-control " placeholder="Please Enter sample answer26">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 27</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question2" class="form-control " placeholder="Please Enter question27 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 27</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image2" class="form-control " placeholder="Please Enter image27">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 27</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans2" class="form-control " placeholder="Please Enter sample answer27">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 28</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question3" class="form-control " placeholder="Please Enter question28 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 28</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image3" class="form-control " placeholder="Please Enter image28">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 28</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans3" class="form-control " placeholder="Please Enter sample answer28">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 29</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question4" class="form-control " placeholder="Please Enter question29 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 29</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image4" class="form-control " placeholder="Please Enter image29">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 29</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans4" class="form-control " placeholder="Please Enter sample answer29">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 30</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question5" class="form-control " placeholder="Please Enter question30 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 30</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image5" class="form-control " placeholder="Please Enter image30">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 30</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans5" class="form-control " placeholder="Please Enter sample answer30">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 31</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question6" class="form-control " placeholder="Please Enter question31 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 31</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image6" class="form-control " placeholder="Please Enter image31">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 31</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans6" class="form-control " placeholder="Please Enter sample answer31">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 32</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question7" class="form-control " placeholder="Please Enter question32 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 32</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image7" class="form-control " placeholder="Please Enter image32">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 32</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans7" class="form-control " placeholder="Please Enter sample answer32">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 33</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question8" class="form-control " placeholder="Please Enter question32 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 33</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image8" class="form-control " placeholder="Please Enter image33">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 33</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans8" class="form-control " placeholder="Please Enter sample answer33">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 34</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question9" class="form-control " placeholder="Please Enter question34 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 34</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image9" class="form-control " placeholder="Please Enter image34">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 34</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans9" class="form-control " placeholder="Please Enter sample answer34">
                        </div>
                      </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 35</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="question[]" id="question10" class="form-control " placeholder="Please Enter question35 like Whole,Total,Very,Open">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                         <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Image 35</label>
                         <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="image[]" id="image10" class="form-control " placeholder="Please Enter image35">
                         </div>
                      </div>
                      <div class="form-group mb-2 row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 35</label>
                        <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                            <input type="text" name="sample_ans[]" id="sample_ans10" class="form-control " placeholder="Please Enter sample answer35">
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="col-12 col-md-4 col-xl-4 col-sm-12">
                  <h5 class="mt-4">Image</h5>
                  <div class="form-group mb-2 row">
                    <div class="col-12 p-0">                              
                      <div class="custom-file mb-3" >
                          <input type="file" class="custom-file-input" onchange="uploadImage()" id="customFile_image" data-url="{{ route('upload-image') }}" data-token="{{ csrf_token() }}">
                          <label class="custom-file-label" for="customFile">Select Image</label>
                      </div>
                      <input type="text" name="upload-image" id="upload-image" class="form-control">
                      <span class="error-msg" id="upload-imageError"></span>
                    </div>
                  </div>

                  <h5 class="mt-2">Audio</h5>
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
                  <a href="{{ route('tests.show', $test_id) }}"><button  type="button" class="btn btn-outline-primary"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}">Cancel</button></a>
                  <button  type="Submit" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
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

<script src="{{ asset('assets/js/speaking/answershortquestion.js') }}" defer></script>
@endsection