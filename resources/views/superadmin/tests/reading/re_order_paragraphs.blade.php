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
                      <h5>Re-order Paragraphs({{ $question_id }})</h5>
                   </div>
                   <form class="form ml-1" class="re_order" id="re_order" method="POST" action="{{ (isset($questions->name))?route('superadmin-question-update-re-order-paragraph'):route('superadmin-question-store-re-order-paragraph') }}">
                       @csrf
                       <div class=" col-11 mt-5 ml-3 white-bg common-col" id="answerBlog">
                           @if(!isset($questions->name))
                              <div class="form-group mb-3 row dynamicblockA">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Ans Options A</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options_A" id="ans_options_A" placeholder="Which of the Following Are True Statements?">
                                 </div>
                                 <div class="plus-icon" onclick="addQuestionColumn()" data-qid="A" data-aid="1">
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
                                 <div class="form-group mb-3 row dynamicblock{{$arrayValue}}">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Ans Options {{ $arrayValue }}</label>
                                    <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                       <input type="text" class="form-control " name="ans_options_{{$arrayValue}}" id="ans_options_{{$arrayValue}}" placeholder="Which of the Following Are True Statements?" value="{{ $questions->questiondata[$i]->data_value }}" required>
                                    </div>
                                    @if($label == $count)
                                       <div class="plus-icon" onclick="addQuestionColumn()" data-qid="{{$arrayValue}}" data-aid="{{$label}}">
                                          <a><i class="fas fa-plus"></i></a>
                                       </div>
                                       @if($label > 1)
                                          <div class="minus-icon" onclick="minusQuestionColumn()" data-qid="{{$arrayValue}}" data-aid="{{$label}}">
                                             <a><i class="fas fa-minus"></i></a>
                                          </div>
                                       @endif
                                    @endif
                                 </div>
                              @endfor
                           @endif
                       </div>
                        <div class=" col-11 mt-4 ml-3 white-bg common-col" id="correctBlog">
                           @if(!isset($questions->name))
                              <div class="form-group mb-3 row dynamicblock1">
                                 <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options 1</label>
                                 <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="correct_options1" id="correct_options1" placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
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
                                    <div class="form-group mb-3 row dynamicblock{{ $temp }}">
                                       <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options {{ $temp }}</label>
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
                                 <input type="hidden" name="numberSlug" id="numberSlug" value="{{(isset($questions->name))?$temp:'1'}}">
                                 <input type="hidden" name="alphaSlug" id="alphaSlug" value="{{(isset($questions->name))?$arrayValue:'A'}}">
                                 @if(isset($questions->name))
                                    <input type="hidden" name="question_id" value="{{ $questions->id }}">
                                 @endif
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
<script src="{{ asset('assets/js/reading/readingReOrderParagraph.js') }}" defer></script>
@endsection