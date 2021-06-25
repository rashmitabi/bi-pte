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
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Re-order Paragraphs(8)</h5>
                   </div>
                   <form class="form ml-1" class="re_order" id="re_order" method="POST" action="{{ (isset($questions->name))?route('superadmin-question-update-re-order-paragraph'):route('superadmin-question-store-re-order-paragraph') }}">
                       @csrf
                       <div class=" col-11 mt-5 ml-3 white-bg common-col" id="answerBlog">
                           @if(!isset($questions->name))
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Ans Options A</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options_A" id="ans_options_A" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Ans Options B</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options_B" id="ans_options_B" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Ans Options C</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options_C" id="ans_options_C" placeholder="Which of the Following Are True Statements?">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Ans Options D</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options_D" id="ans_options_D" placeholder="Which of the Following Are True Statements?">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Ans Options E</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options_E" id="ans_options_E" placeholder="Which of the Following Are True Statements?">
                                 </div>
                                 <div class="plus-icon" onclick="addQuestionColumn()" data-qid="E" data-aid="5">
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
                                 <div class="form-group mb-3 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Ans Options {{ $arrayValue }}</label>
                                    <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                       <input type="text" class="form-control " name="ans_options_{{$arrayValue}}" id="ans_options_{{$arrayValue}}" placeholder="Which of the Following Are True Statements?" value="{{ $questions->questiondata[$i]->data_value }}" required>
                                    </div>
                                    @if($label == $count)
                                       <div class="plus-icon" onclick="addQuestionColumn()" data-qid="{{$arrayValue}}" data-aid="{{$label}}">
                                          <a><i class="fas fa-plus"></i></a>
                                       </div>
                                    @endif
                                 </div>
                              @endfor
                           @endif
                       </div>
                        <div class=" col-11 mt-4 ml-3 white-bg common-col" id="correctBlog">
                           @if(!isset($questions->name))
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="correct_options1" id="correct_options1" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Correct Options</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="correct_options2" id="correct_options2" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="correct_options3" id="correct_options3" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Correct Options</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="correct_options4" id="correct_options4" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              <div class="form-group mb-3 row">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="correct_options5" id="correct_options5" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                                 </div>
                              </div>
                              @else
                                 @php
                                    $count = count($questions->questiondata);
                                    $temp = 0;
                                 @endphp
                                 @for($c=0;$c<$count;$c++)
                                    @php
                                       $temp++;
                                    @endphp
                                    <div class="form-group mb-3 row">
                                       <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options</label>
                                       <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                          <input type="text" class="form-control " name="correct_options{{ $temp }}" id="correct_options{{ $temp }}" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction." value="{{ $questions->answerdata[$c]->answer_value}}" required>
                                       </div>
                                    </div>
                                 @endfor
                              @endif
                       </div>
                       <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn mt-5 ">
                                 <input type="hidden" name="section_id" value="{{ $section_id }}">
                                 <input type="hidden" name="test_id" value="{{ $test_id }}">
                                 <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                 <input type="hidden" name="numberSlug" id="numberSlug" value="{{(isset($questions->name))?$temp:'E'}}">
                                 <input type="hidden" name="alphaSlug" id="alphaSlug" value="{{(isset($questions->name))?$arrayValue:'5'}}">
                                 @if(isset($questions->name))
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
<script src="{{ asset('assets/js/readingReOrderParagraph.js') }}" defer></script>
@endsection