@extends('layouts.appSuperAdmin')
@section('content')

<div id="content">
 <!-- reading fill in blanks -->
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
                      <h5>Reading : Fill in the blanks({{ $question_id }})</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1" name="fill_in_blanks" id="fill_in_blanks" method="POST" action="{{ (isset($questions->desc))?route('superadmin-question-update-fill-in-the-blanks'):route('superadmin-question-store-fill-in-the-blanks') }}">
                      <div class="form-group mb-5 row">
                           <div class="col-12 col-md-12 col-xl-11 col-sm-12">
                               @csrf
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor2" id="editor2" required>{{ (isset($questions->desc)?$questions->desc:'')}}</textarea>
                           </div>
                      </div>
                        @if(!isset($questions->desc))
                            <div class=" col-11 mt-2 ml-3 white-bg common-col mainbox1">
                                <div class="form-group mb-3 row">
                                <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Ans Options 1</label>
                                <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                    <input type="text" class="form-control " name="ans_options1" id="ans_options1" placeholder="Whole,Total,Very,Open">
                                </div>
                                </div>
                                <div class="form-group mb-3 row subbox1">
                                    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options 1</label>
                                    <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                        <input type="text" class="form-control " name="correct_options1" id="correct_options1" placeholder="Whole">
                                    </div>
                                    <div class="add-icon" onclick="addQuestionColumn()" data-id="1">
                                        <a><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            @else
                                @php
                                    $count = count($questions->questiondata);
                                    $temp = 0;
                                @endphp
                                @for($i=0;$i<$count;$i++)
                                    @php
                                        $temp++;
                                    @endphp
                                    <div class=" col-11 mt-2 ml-3 white-bg common-col mainbox{{$temp}}">
                                        <div class="form-group mb-3 row">
                                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label ">Ans Options {{$temp}}</label>
                                            <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                                <input type="text" class="form-control " name="ans_options{{$temp}}" id="ans_options{{$temp}}" placeholder="Whole,Total,Very,Open" value="{{ $questions->answerdata[$i]->answer_value}}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row subbox{{$temp}}">
                                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label custom-label">Correct Options {{$temp}}</label>
                                            <div class="col-12 col-md-7 col-xl-7 col-sm-12 p-0">
                                                <input type="text" class="form-control " name="correct_options{{$temp}}" id="correct_options{{$temp}}" placeholder="Whole" value="{{ $questions->questiondata[$i]->data_value}}">
                                            </div>
                                            @if($temp == $count)
                                                <div class="add-icon" onclick="addQuestionColumn()" data-id="{{$count}}">
                                                    <a><i class="fas fa-plus"></i></a>
                                                </div>
                                                @if($count != '1')
                                                <div class="minus-icon-common" onclick="minusQuestionColumn()" data-id="{{$count}}">
                                                    <a><i class="fas fa-minus"></i></a>
                                                </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endfor
                            @endif
                       <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn mt-5 ">
                                <input type="hidden" name="section_id" value="{{ $section_id }}">
                                <input type="hidden" name="test_id" value="{{ $test_id }}">
                                <input type="hidden" name="question_type_id" value="{{ $question_id }}">
                                <input type="hidden" name="slug" id="slug" value="{{ (isset($questions->desc)?$count:'1')}}">
                                @if(isset($questions->desc))
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
<script src="{{ asset('assets/js/reading/readingFillinTheBlanks.js') }}" defer></script>
@endsection