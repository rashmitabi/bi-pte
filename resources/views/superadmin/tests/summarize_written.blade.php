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
	                      <h5>Summarize Written</h5>
	                   </div>
	                   <div class="sub-heading">
	                       <h4>Item-1<span>Question</span></h4>
	                   </div>
	                    <!-- <form class="form ml-1"> -->
	                    {!! Form::open(array('route' => 'add-summarize-written','method'=>'POST','class'=>'form ml-1')) !!}
	                        <div class="form-group mb-3 row">
	                            <div class="col-11">
	                             	<textarea name="item-1" id="editor10">{{old('item-1')}}</textarea>
	                             	@if($errors->has('item-1'))
			                            <span class="error-msg">{{$errors->first('item-1')}}</span>
			                        @endif
	                           </div>
	                        </div>
	                        <div class="sub-heading">
	                           <h4>Sample Item-1<span>Question</span></h4>
	                        </div>
	                        <div class="form-group mb-3 row">
	                            <div class="col-11">
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
	                            <div class="col-11">
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
	                            <div class="col-11">
	                               <textarea name="sample-item-2" id="editor13">{{ old('sample-item-2') }}</textarea>
	                                @if($errors->has('sample-item-2'))
			                            <span class="error-msg">{{$errors->first('sample-item-2')}}</span>
			                        @endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-11 save-btn mt-5 ">
	                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
	                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
	                            </div> 
	                        </div>
	                    {!! Form::close() !!}
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