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
	                      <h5>Speaking Instruction</h5>
	                   </div>
	                   <div class="row">
	                       <div class="col-8 pl-0">
	                         <form class="form ml-1">
	                          <div class="sub-heading">
	                                <h4>Instruction<span>About discussion in Questions</span></h4>
	                          </div>
	                          <div class="form-group mb-3 row">
	                           <div class="col-12">
	                              <!-- <div id="editor">
	                                 <h2>The three greatest things you learn from traveling</h2>
	                              </div> -->
	                              <textarea name="editor" id="editor16"></textarea>
	                           </div>
	                        </div>
	                         </form>
	                    </div>
	                    <div class="col-4">
	                       <form class="form mt-4">
	                            <h5 class="mt-4">Image</h5>
	                           <div class="form-group mb-2 row">
	                                <div class="col-12 p-0">                              
	                                    <div class="custom-file mb-3">
	                                        <input type="file" class="custom-file-input" id="customFile">
	                                        <label class="custom-file-label" for="customFile">Select Image</label>
	                                    </div>
	                                      <input type="text" class="form-control " placeholder="">
	                                </div>
	                            </div>
	                       </form>
	                    </div>
	                    </div>
	                   <form class="form ml-1">
	                       <div class="form-group row">
	                            <div class="col-11 save-btn mt-5 ">
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