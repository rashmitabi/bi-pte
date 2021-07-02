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
	                      <h5>Essay Writing</h5>
	                    </div>
	                    <form class="form ml-1" method="POST" id="frm-essay-writting" name="frm-essay-writting" action="{{ (isset($questions->desc))?route('update-essay-writting'):route('add-essay-writting')}}">
                       		@csrf
	                    	<input type="hidden" name="question_type_id" value="{{ $question_id }}">
	                    	<input type="hidden" name="section_id" value="{{ $section_id }}">
	                    	<input type="hidden" name="test_id" value="{{ $test_id }}">
	                    	@if(isset($questions->desc))
	                    		@php
	                    			$count = count($questions->questiondata);
	                    		@endphp
	                    		<input type="hidden" name="question_id" value="{{ $questions->id }}">
	                    		@for($i=0;$i<$count;$i++)
		                    		<input type="hidden" name="question_data_id{{ $i+1 }}" id="question_data_id{{ $i+1 }}" value="{{ $questions->questiondata[$i]->id }}">
		                            <div class="sub-heading">
				                       <h4>Essay Title<span>Question</span></h4>
				                    </div>
				                    <div class="form-group mb-3 row">
			                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
			                               <textarea name="essay_title{{ $i+1 }}" id="essay_title{{ $i+1 }}" class="ckeditor">{{ $questions->questiondata[$i]->data_value }}</textarea>
			                                @if($errors->has('essay_title'))
					                            <span class="error-msg"> {{$errors->first('essay_title')}}</span>
					                        @endif
			                            </div>
			                        </div>
			                        <input type="hidden" name="answer_data_id{{$i+1}}" id="answer_data_id{{$i+1}}" value="{{ $questions->answerdata[$i]->id }}">
			                        <div class="sub-heading">
			                           <h4>Sample Essay<span>Question</span></h4>
			                        </div>
			                        <div class="form-group mb-3 row">
			                           <div class="col-12 col-md-12 col-xl-11 col-sm-12">
			                               <textarea name="sample_essay{{ $i+1 }}" id="sample_essay{{ $i+1 }}" class="ckeditor">{{ $questions->answerdata[$i]->sample_answer }}</textarea>
			                               @if($errors->has('sample_essay'))
					                            <span class="error-msg">{{$errors->first('sample_essay')}}</span>
					                        @endif
			                           </div>
			                        </div>
			                    @endfor
		                    @else
	                    		<div class="sub-heading">
			                       <h4>Essay Title<span>Question</span></h4>
			                    </div>
		                        <div class="form-group mb-3 row">
		                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
		                               <textarea name="essay_title1" id="essay_title1" class="ckeditor">{{ old('essay_title') }}</textarea>
		                                @if($errors->has('essay_title'))
				                            <span class="error-msg"> {{$errors->first('essay_title')}}</span>
				                        @endif
		                            </div>
		                        </div>
		                        <div class="sub-heading">
		                           <h4>Sample Essay<span>Question</span></h4>
		                        </div>
		                        <div class="form-group mb-3 row">
		                           <div class="col-12 col-md-12 col-xl-11 col-sm-12">
		                               <textarea name="sample_essay1" id="sample_essay1" class="ckeditor">{{ old('sample_essay') }}</textarea>
		                               @if($errors->has('sample_essay'))
				                            <span class="error-msg">{{$errors->first('sample_essay')}}</span>
				                        @endif
		                           </div>
		                        </div>
		                    @endif
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
<script src="{{ asset('assets/js/writing/essaywriting.js') }}" defer></script>
@endsection