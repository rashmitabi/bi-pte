@extends('layouts.appSuperAdmin')
@section('content')
@php
$section_id = $_GET['section_id'];
$test_id    = $_GET['test_id'];
$question_id = $_GET['question_type_id'];
@endphp
<div id="content">
<!-- multiple-choice -->
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
                      <h5>Multiple-choice,Choose multiple answers(6)</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1" method="POST" id="mutli_choice" name="mutli_choice" action="{{ (isset($questions->desc))?route('superadmin-question-update-MultipleChoice-Multipleanswers'):route('superadmin-question-store-MultipleChoice-Multipleanswers')}}">
                       @csrf
                      <div class="form-group mb-5 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor1" id="editor1">{{(isset($questions->desc))?$questions->desc:''}}</textarea>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Options Title</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " name="options_title" id="options_title" placeholder="Which of the Following Are True Statements?" value="{{(isset($questions->desc))?$questions->name:''}}">
                              </div>
                           </div>
                           @if(!isset($questions->desc))
                              <div class="form-group mb-3 row">
                                 <label class="col-3 col-form-label custom-label">Ans Options A</label>
                                 <div class="col-8 p-0">
                                    <input type="text" class="form-control " name="ans_options_A" id="ans_options_A" placeholder="Which of the Following Are True Statements?">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-3 col-form-label custom-label ">Ans Options B</label>
                                 <div class="col-8 p-0">
                                    <input type="text" class="form-control " name="ans_options_B" id="ans_options_B" placeholder="Which of the Following Are True Statements?">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-3 col-form-label custom-label">Ans Options C</label>
                                 <div class="col-8 p-0">
                                    <input type="text" class="form-control " name="ans_options_C" id="ans_options_C" placeholder="Which of the Following Are True Statements?">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-3 col-form-label custom-label ">Ans Options D</label>
                                 <div class="col-8 p-0">
                                    <input type="text" class="form-control " name="ans_options_D" id="ans_options_D" placeholder="Which of the Following Are True Statements?">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row ">
                                 <label class="col-3 col-form-label custom-label">Ans Options E</label>
                                 <div class="col-8 p-0">
                                    <input type="text" class="form-control " name="ans_options_E" id="ans_options_E" placeholder="Which of the Following Are True Statements?">
                                 </div>
                                 <div class="plus-icon" onclick="addQuestionColumn()" data-id="E">
                                    <a><i class="fas fa-plus"></i></a>
                                 </div>
                              </div>
                           @else
                              @php
                                 $list = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
                                 $count = count($questions->questiondata);
                                 $label = 0;
                              @endphp
                              @for($i=0;$i<$count;$i++)
                                 @php
                                    $arrayValue = $list[$i];
                                    $label++;
                                 @endphp
                                 <div class="form-group mb-3 row ">
                                    <label class="col-3 col-form-label custom-label">Ans Options {{$arrayValue}}</label>
                                    <div class="col-8 p-0">
                                       <input type="text" class="form-control " name="ans_options_{{$arrayValue}}" id="ans_options_{{$arrayValue}}" placeholder="Which of the Following Are True Statements?" value="{{ $questions->questiondata[$i]->data_value }}">
                                    </div>
                                    @if($label == $count)
                                    <div class="plus-icon" onclick="addQuestionColumn()" data-id="{{$arrayValue}}">
                                       <a><i class="fas fa-plus"></i></a>
                                    </div>
                                    @endif
                                 </div>
                              @endfor
                           @endif
                           <div class="form-group mb-3 row finalAnswer">
                              <label class="col-3 col-form-label custom-label">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " name="correct_options" id="correct_options" placeholder="Whole" value="{{(isset($questions->desc))?$questions->answerdata[0]->answer_value:''}}">
                              </div>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <input type="hidden" name="section_id" value="{{ $section_id }}">
                                <input type="hidden" name="test_id" value="{{ $test_id }}">
                                <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                <input type="hidden" name="slug" id="slug" value="{{(isset($arrayValue))?$arrayValue:'E'}}">
                                @if(isset($questions->desc))
                                 <input type="hidden" name="question_id" value="{{ $questions->id }}">
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
<script src="{{ asset('assets/js/readingMultipleChoiceMultipleAnswer.js') }}" defer></script>
@endsection