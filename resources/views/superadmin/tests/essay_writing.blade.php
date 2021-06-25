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
	                      <h5>Essay Writing</h5>
	                   </div>
	                   <div class="sub-heading">
	                       <h4>Essay Title<span>Question</span></h4>
	                   </div>
	                   <form class="form ml-1">
	                      <div class="form-group mb-3 row">
	                           <div class="col-12 col-md-12 col-xl-11 col-sm-12">
	                              <!-- <div id="editor">
	                                 <h2>The three greatest things you learn from traveling</h2>
	                              </div> -->
	                              <textarea name="editor" id="editor14"></textarea>
	                           </div>
	                        </div>
	                        <div class="sub-heading">
	                           <h4>Sample Essay<span>Question</span></h4>
	                        </div>
	                        <div class="form-group mb-3 row">
	                           <div class="col-12 col-md-12 col-xl-11 col-sm-12">
	                              <!-- <div id="editor">
	                                 <h2>The three greatest things you learn from traveling</h2>
	                              </div> -->
	                              <textarea name="editor" id="editor15"></textarea>
	                           </div>
	                        </div>
	                       <div class="form-group row">
	                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn mt-5 ">
	                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
	                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
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