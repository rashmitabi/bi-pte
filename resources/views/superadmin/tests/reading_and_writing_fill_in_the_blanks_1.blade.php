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
                      <h5>Reading and Writing : Fill in the blanks(1)</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1" method="POST" id="fill_in_blanks" name="fill_in_blanks" action="{{ route('questions.store')}}">
                      @csrf
                      <div class="form-group mb-5 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor"></textarea>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 1</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options1" id="ans_options1" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 1</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option1" id="correct_option1" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 2</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options2" id="ans_options2" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 2</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option2" id="correct_option2" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 3</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options3" id="ans_options3" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 3</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option3" id="correct_option3" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 4</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options4" id="ans_options4" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 4</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option4" id="correct_option4" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 5</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options5" id="ans_options5" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 5</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option5" id="correct_option5" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 6</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options6" id="ans_options6" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 6</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option6" id="correct_option6" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 7</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options7" id="ans_options7" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 7</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option7" id="correct_option7" placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 8</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="ans_options8" id="ans_options8" placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 8</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " name="correct_option8" id="correct_option8" placeholder="Whole">
                              </div>
                              <div class="add-icon">
                                  <a><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                       </div>
                       <div class="form-group row">
                                   <div class="col-11 save-btn mt-5 ">
                                          <input type="hidden" name="section_id" value="{{ $section_id }}">
                                          <input type="hidden" name="test_id" value="{{ $test_id }}">
                                          <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                        <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                        <button  type="submit" class="btn btn-outline-primary mr-2" data-sectionid="{{ $section_id }}" data-testid="{{ $test_id }}" data-questionid="{{ $question_id }}"><i class="far fa-save save-icon"></i>Submit</button>
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
<script type="text/javascript" defer>
   var url = "{{ route('questions.store') }}";
</script>
<script src="{{ asset('assets/js/addQuestions.js') }}" defer></script>
@endsection