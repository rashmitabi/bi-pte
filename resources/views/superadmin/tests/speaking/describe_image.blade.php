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
              <h5>Describe Image</h5>
            </div>
            <form class="form ml-1" method="POST" id="frm-describe-image" name="frm-describe-image" action="{{ (isset($questions->desc))?route('update-describe-image'):route('add-describe-image')}}">
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
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question {{ $i+17 }}</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" value="{{ $questions->questiondata[$i]->data_value }}" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                          </div>

                          <input type="hidden" name="answer_data_id[]" value="{{ $questions->answerdata[$i]->id }}">
                          <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans {{ $i+17 }}</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" value="{{ $questions->answerdata[$i]->sample_answer }}" class="form-control " placeholder="Whole">
                            </div>
                          </div>
                      </div>
                    @endfor
                  @else
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                          <div class="form-group mb-2 row">
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 17</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                          </div>
                         <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 17</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" class="form-control " placeholder="Whole">
                            </div>
                         </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                        <div class="form-group mb-2 row">
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 18</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 18</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" class="form-control " placeholder="Whole">
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                        <div class="form-group mb-2 row">
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 19</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 19</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" class="form-control " placeholder="Whole">
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                        <div class="form-group mb-2 row">
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 20</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 20</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" class="form-control " placeholder="Whole">
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                        <div class="form-group mb-2 row">
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 21</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 21</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" class="form-control " placeholder="Whole">
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                        <div class="form-group mb-2 row">
                             <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Question 22</label>
                             <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="question[]" class="form-control " placeholder="Whole,Total,Very,Open">
                             </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Sample Ans 22</label>
                            <div class="col-12 col-md-7 col-xl-8 col-sm-12 p-0">
                                <input type="text" name="sample_ans[]" class="form-control " placeholder="Whole">
                            </div>
                        </div>
                    </div>
                  @endif
                </div>
                <div class="col-12 col-md-4 col-xl-4 col-sm-12">
                  <h5 class="mt-4">Image</h5>
                  <div class="form-group mb-2 row">
                    <div class="col-12 p-0">                              
                      <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Select Image</label>
                      </div>
                      <input type="text" class="form-control " placeholder="">
                    </div>
                  </div>
                  <h5 class="mt-2">Audio</h5>
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

<!-- <script src="{{ asset('assets/js/addQuestions.js') }}" defer></script> -->
@endsection