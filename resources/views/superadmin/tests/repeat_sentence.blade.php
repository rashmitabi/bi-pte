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
	                      <h5>Speaking : Repeat Sentence</h5>
	                   </div>
	                   	{!! Form::open(array('route' => 'add-repeat-sentence','method'=>'POST','class'=>'form')) !!}
	                   		<!-- <form class="form ml-1"> -->
	                   		<input type="hidden" name="question_type_id" value="{{ $question_id }}">
	                    	<input type="hidden" name="section_id" value="{{ $section_id }}">
	                    	<input type="hidden" name="test_id" value="{{ $test_id }}">
	                        
	                   		<div class="row">
	                       		<div class="col-8">
	                               <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 7</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question1" value="{{ old('question1') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                    </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 7</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans1" value="{{ old('ans1') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 8</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question2" value="{{ old('question2') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 8</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans2" value="{{ old('ans2') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 9</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question3" value="{{ old('question3') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 9</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans3" value="{{ old('ans3') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 10</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question4" value="{{ old('question4') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 10</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans4" value="{{ old('ans4') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 11</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question5" value="{{ old('question5') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 11</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans5" value="{{ old('ans5') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 12</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question6" value="{{ old('question6') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 12</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans6" value="{{ old('ans6') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 13</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question7" value="{{ old('question7') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 13</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans7" value="{{ old('ans7') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 14</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question8" value="{{ old('question8') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 14</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans8" value="{{ old('ans8') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 15</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question9" value="{{ old('question9') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 15</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans9" value="{{ old('ans9') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
	                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
	                                    <div class="form-group mb-2 row">
	                                       <label class="col-3 col-form-label">Question 16</label>
	                                       <div class="col-9 p-0">
	                                          <input type="text" name="question10" value="{{ old('question10') }}" class="form-control " placeholder="Whole,Total,Very,Open">
	                                       </div>
	                                  </div>
	                                   <div class="form-group mb-2 row">
	                                      <label class="col-3 col-form-label ">Sample Ans 16</label>
	                                      <div class="col-9 p-0">
	                                          <input type="text" name="ans10" value="{{ old('ans10') }}" class="form-control " placeholder="Whole">
	                                      </div>
	                                   </div>
	                              </div>
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
	                    	<!-- </form> -->
	                   		<!-- <form class="form ml-1"> -->
	                        <div class="form-group row">
	                            <div class="col-11 save-btn mt-5 ">
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