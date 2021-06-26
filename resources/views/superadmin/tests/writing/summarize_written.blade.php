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
	                      <h5>Summarize Written</h5>
	                    </div>
	                    <form class="form ml-1" method="POST" id="frm-summarize-written" name="frm-summarize-written" action="{{ (isset($questions->desc))?route('update-summarize-written'):route('add-summarize-written')}}">
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
	                    			<input type="hidden" name="question_data_id{{ $i+1 }}" value="{{ $questions->questiondata[$i]->id }}">
	                                <div class="sub-heading">
				                       <h4>Item-{{ $i+1 }}<span>Question</span></h4>
				                    </div>
			                        <div class="form-group mb-3 row">
			                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
			                             	<textarea name="item-{{ $i+1 }}" id="editor{{ $i+1 }}">{{ $questions->questiondata[$i]->data_value }}
			                             	</textarea>
			                             	@if($errors->has('item-'.($i+1)))
					                            <span class="error-msg"> {{$errors->first('item-'.($i+1))}}</span>
					                        @endif
			                           </div>
			                        </div>
			                        <input type="hidden" name="answer_data_id{{ $i+1 }}" value="{{ $questions->answerdata[$i]->id }}">
			                        <div class="sub-heading">
			                           <h4>Sample Item-{{ $i+1 }}<span>Question</span></h4>
			                        </div>
			                        <div class="form-group mb-3 row">
			                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
			                                <textarea name="sample-item-{{ $i+1 }}" id="editor1{{ $i+1 }}">{{ $questions->answerdata[$i]->sample_answer }}</textarea>
			                                @if($errors->has('sample-item-'.($i+1)))
					                            <span class="error-msg">{{$errors->first('sample-item-'.($i+1))}}</span>
					                        @endif
			                            </div>
			                        </div>
		                       	@endfor 
	                    	@else
	                    		<div class="sub-heading">
			                       <h4>Item-1<span>Question</span></h4>
			                    </div>
		                        <div class="form-group mb-3 row">
		                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
		                             	<textarea name="item-1" id="editor10">
		                             		{{old('item-1')}}
		                             	</textarea>
		                             	@if($errors->has('item-1'))
				                            <span class="error-msg"> {{$errors->first('item-1')}}</span>
				                        @endif
		                           </div>
		                        </div>
		                        <div class="sub-heading">
		                           <h4>Sample Item-1<span>Question</span></h4>
		                        </div>
		                        <div class="form-group mb-3 row">
		                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
		                                <textarea name="sample-item-1" id="editor11">{{old('sample-item-1')}}</textarea>
		                                @if($errors->has('sample-item-1'))
				                            <span class="error-msg">{{$errors->first('sample-item-1')}}</span>
				                        @endif
		                            </div>
		                        </div>
		                        <div class="sub-heading">
		                           <h4>Item-2<span>Question</span></h4>
		                        </div>
		                        <div class="form-group mb-3 row">
		                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
		                                <textarea name="item-2" id="editor12">{{ old('item-2') }}</textarea>
		                                @if($errors->has('item-2'))
				                            <span class="error-msg">{{$errors->first('item-2')}}</span>
				                        @endif
		                            </div>
		                        </div>
		                        <div class="sub-heading">
		                           <h4>Sample Item-2<span>Question</span></h4>
		                        </div>
		                        <div class="form-group mb-3 row">
		                            <div class="col-12 col-md-12 col-xl-11 col-sm-12">
		                               <textarea name="sample-item-2" id="editor13">{{ old('sample-item-2') }}</textarea>
		                                @if($errors->has('sample-item-2'))
				                            <span class="error-msg">{{$errors->first('sample-item-2')}}</span>
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

<!-- <script src="" defer></script> -->
@endsection