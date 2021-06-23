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
	                      <h5>Speaking Task 1: Read Aloud</h5>
	                   </div>
	                   {!! Form::open(array('route' => 'add-read-aloud','method'=>'POST','class'=>'form ml-1')) !!}
	                   		<div class="row">
	                       		<div class="col-8 pl-0">
	                           		<input type="hidden" name="question_type_id" value="{{ $question_id }}">
	                    			<input type="hidden" name="section_id" value="{{ $section_id }}">
	                    			<input type="hidden" name="test_id" value="{{ $test_id }}">
	                        
	                                <div class="sub-heading">
	                                    <h4>Speaking Question 1<span>Paragraph</span></h4>
	                               </div>
	                                <div class="form-group mb-1 row">
	                                   <div class="col-12 pr-0">
	                                      <textarea name="question1" id="editor17">{{ old('question1') }}</textarea>
	                                      	
	                                  </div>
	                                </div>
	                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
	                                    <div class="form-group mb-3 row">
	                                       <label class="col-3 col-form-label">Sample Ans 1</label>
	                                       <div class="col-9">
	                                          <input type="text" name="sample_ans1" value="{{ old('sample_ans1') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                </div>
	                                <div class="sub-heading">
	                                    <h4>Speaking Question 2<span>Paragraph</span></h4>
	                                </div>
	                                <div class="form-group mb-1 row">
	                                   <div class="col-12 pr-0">
	                                      <textarea name="question2" id="editor18">{{ old('question2') }}</textarea>
	                                  </div>
	                                </div>
	                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Sample Ans 2</label>
	                                       <div class="col-9">
	                                          <input type="text" name="sample_ans2" value="{{ old('sample_ans2') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                </div>
	                                <div class="sub-heading">
	                                    <h4>Speaking Question 3<span>Paragraph</span></h4>
	                                </div>
	                                <div class="form-group mb-1 row">
	                                    <div class="col-12 pr-0">
	                                      <textarea name="question3" id="editor19">{{ old('question3') }}</textarea>
	                                    </div>
	                                </div>
	                                <div class=" col-12 mt-4 ml-3  white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Sample Ans 3</label>
	                                       <div class="col-9">
	                                          <input type="text" name="sample_ans3" value="{{ old('sample_ans3') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                </div>
	                                <div class="sub-heading">
	                                    <h4>Speaking Question 4<span>Paragraph</span></h4>
	                                </div>
	                                <div class="form-group mb-1 row">
	                                   <div class="col-12 pr-0">
	                                      <textarea name="question4" id="editor20">{{ old('question4') }}</textarea>
	                                  </div>
	                                </div>
	                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Sample Ans 4</label>
	                                       <div class="col-9">
	                                          <input type="text" name="sample_ans4" value="{{ old('sample_ans4') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                </div>
	                                <div class="sub-heading">
	                                    <h4>Speaking Question 5<span>Paragraph</span></h4>
	                                </div>
	                                <div class="form-group mb-1 row">
	                                   <div class="col-12 pr-0">
	                                      <textarea name="question5" id="editor21">{{ old('question5') }}</textarea>
	                                  </div>
	                                </div>
	                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Sample Ans 5</label>
	                                       <div class="col-9">
	                                          <input type="text" name="sample_ans5" value="{{ old('sample_ans5') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                </div>
	                                <div class="sub-heading">
	                                    <h4>Speaking Question 6<span>Paragraph</span></h4>
	                                </div>
	                                <div class="form-group mb-1 row">
	                                   <div class="col-12 pr-0">
	                                      <textarea name="question6" id="editor22">{{ old('question6') }}</textarea>
	                                  </div>
	                                </div>
	                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Sample Ans 6</label>
	                                       <div class="col-9">
	                                          <input type="text" name="sample_ans6" value="{{ old('sample_ans6') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                </div>
	                         		<!-- </form> -->
	                       		</div>
                       			<div class="col-4">
	                       			<!-- <form class="form mt-4"> -->
                            		<h5 class="mt-4">Audio</h5>
	                           		<div class="form-group mb-2 row">
	                                	<div class="col-12 p-0">    
	                                		<div class="custom-file mb-3">
		                                        <input type="file" class="custom-file-input" id="customFile">
		                                        <label class="custom-file-label" for="customFile">Select Audio</label>
		                                    </div>
	                                      	<input type="text" class="form-control " placeholder="">
                                		</div>
	                            	</div>
	                       			<!-- </form> -->
	                    		</div>
	                    	</div>
	                   		<!-- <form class="form ml-1"> -->
	                       	<div class="form-group row">
	                            <div class="col-11 save-btn mt-3">
	                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
	                                <button  type="submit" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
	                            </div> 
	                        </div>
	                   		<!-- </form> -->
	               		{!! Form::close() !!}
	               </div>
	            </div>
	        </div>
	    </section>
	</div>
@endsection