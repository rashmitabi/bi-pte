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
                      <h5>Reading and Writing : Fill in the blanks({{ $question_id }})</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1" method="POST" id="fill_in_blanks" name="fill_in_blanks" action="{{ (isset($questions->desc))?route('superadmin-question-update-readingwriting-fillintheblanks'):route('superadmin-reading-store-fill-in-the-blanks')}}">
                      @csrf
                      <div class="form-group mb-5 row">
                           <div class="col-12 col-md-12 col-xl-11 col-sm-12">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor">{{ (isset($questions->desc))?$questions->desc:''}}</textarea>
                           </div>
                       </div>
                       @if(!isset($questions->desc))
                       <div class=" col-11 mt-2 ml-3 white-bg common-col dynamicblock1">
                            <div class="form-group mb-3 row">
                              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Ans Options 1</label>
                              <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                 <input type="text" class="form-control " name="ans_options1" id="ans_options1" placeholder="Please Enter options1 like Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row btn-click subblock1">
                              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options 1</label>
                              <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                 <input type="text" class="form-control " name="correct_option1" id="correct_option1" placeholder="Please Enter Correct options1">
                              </div>
                              <div class="add-icon" onclick="addQuestionColumn()"  data-id="1">
                                  <a><i class="fas fa-plus"></i></a>  
                              </div>
                           </div>
                       </div>
                        <div class="form-group row">
                           <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn mt-5 ">
                                 <input type="hidden" name="section_id" value="{{ $section_id }}">
                                 <input type="hidden" name="test_id" value="{{ $test_id }}">
                                 <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                 <input type="hidden" name="slug" id="slug" value="8">
                                 <button  type="button" class="btn btn-outline-primary"><a href="{{ route('tests.show',$test_id )}}"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                 <button  type="submit" class="btn btn-outline-primary mr-2" data-sectionid="{{ $section_id }}" data-testid="{{ $test_id }}" data-questionid="{{ $question_id }}"><i class="far fa-save save-icon"></i>Submit</button>
                           </div> 
                        </div>
                       @else
                           @php 
                              $count = count($questions->questiondata);
                              $label = 0;
                           @endphp
                           @for($i=0;$i<$count;$i++)
                              @php
                                 $label++;
                              @endphp
                              <div class=" col-11 mt-2 ml-3 white-bg common-col dynamicblock{{$label}}">
                                 <div class="form-group mb-3 row">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Ans Options {{ $label }}</label>
                                    <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                       <input type="text" class="form-control " name="ans_options{{$label}}" id="ans_options{{$label}}" placeholder="Please Enter options{{$label}} like Whole,Total,Very,Open" value="{{ (isset($questions->desc))?$questions->questiondata[$i]->data_value:''}}">
                                    </div>
                                 </div>
                                 <div class="form-group mb-3 row subblock{{$label}}">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options {{ $label }}</label>
                                    <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                       <input type="text" class="form-control " name="correct_option{{$label}}" id="correct_option{{$label}}" placeholder="Please Enter Correct options {{ $label }}" value="{{ (isset($questions->desc))?$questions->answerdata[$i]->answer_value:''}}">
                                    </div>
                                    @if($label == $count)
                                          <div class="minus-icon-common" onclick="minusQuestionColumn()" data-id="{{$count}}">
                                             <a><i class="fas fa-minus"></i></a>
                                          </div>
                                          <div class="add-icon" onclick="addQuestionColumn()"  data-id="{{$count}}">
                                             <a><i class="fas fa-plus"></i></a>
                                          </div>
                                    @endif
                                 </div>
                              </div>
                           @endfor
                           <div class="form-group row">
                              <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn mt-5 ">
                                    @if(isset($questions->desc))
                                    <input type="hidden" name="question_id" value="{{ $questions->id }}">
                                    @endif
                                    <input type="hidden" name="section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="test_id" value="{{ $test_id }}">
                                    <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                    <input type="hidden" name="slug" id="slug" value="{{(isset($count))?$count:'8'}}">
                                    <a href="{{ route('tests.show',$test_id )}}"><button  type="button" class="btn btn-outline-primary"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}">Cancel</button></a>
                                    <button  type="submit" class="btn btn-outline-primary mr-2" data-sectionid="{{ $section_id }}" data-testid="{{ $test_id }}" data-questionid="{{ $question_id }}"><i class="far fa-save save-icon"></i>Submit</button>
                              </div> 
                           </div>
                       @endif
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
<script src="{{ asset('assets/js/reading/readingAndWritingFillinTheBlanks.js') }}" defer></script>
@endsection