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
	                   <form class="form ml-1" method="POST" id="frm-read-aloud" name="frm-read-aloud" action="{{ (isset($questions->desc))?route('update-read-aloud'):route('add-read-aloud')}}">
	                   		@csrf
	                    	<input type="hidden" name="question_type_id" value="{{ $question_id }}">
                			<input type="hidden" name="section_id" value="{{ $section_id }}">
                			<input type="hidden" name="test_id" value="{{ $test_id }}">
                			<div class="row">
		                       	<div class="col-8 pl-0">
			                    	@if(isset($questions->desc))
			                    		@php
			                    			$count = count($questions->questiondata);
			                    		@endphp
			                    		<input type="hidden" name="question_id" value="{{ $questions->id }}">
			                    		@for($i=0;$i<$count;$i++)
			                    			<input type="hidden" name="question_data_id[]" value="{{ $questions->questiondata[$i]->id }}">
			                    			<div class="sub-heading">
		                                    	<h4>Speaking Question 1<span>Paragraph</span></h4>
		                               		</div>
			                                <div class="form-group mb-1 row">
			                                   	<div class="col-12 pr-0">
			                                      <textarea name="question[]" id="editor1{{$i}}">{{ $questions->questiondata[$i]->data_value }}</textarea>
			                                    </div>
			                                </div>
			                                <input type="hidden" name="answer_data_id[]" value="{{ $questions->answerdata[$i]->id }}">
			                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
			                                    <div class="form-group mb-3 row">
			                                       <label class="col-3 col-form-label">Sample Ans 1</label>
			                                       <div class="col-9">
			                                          <input type="text" name="sample_ans[]"  value="{{ $questions->answerdata[$i]->sample_answer }}" class="form-control " placeholder="Whole,Total,Very,Open">
			                                       </div>
			                                    </div>
			                                </div>
			                    		@endfor
									@else 
		                   		   		<div class="sub-heading">
		                                    <h4>Speaking Question 1<span>Paragraph</span></h4>
		                               </div>
		                                <div class="form-group mb-1 row">
		                                   	<div class="col-12 pr-0">
		                                      <textarea name="question[]" id="editor17"></textarea>
		                                      	
		                                  	</div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-3 row">
		                                       <label class="col-3 col-form-label">Sample Ans 1</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans[]"  class="form-control " placeholder="Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 2<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="question[]" id="editor18"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 2</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans[]"  class="form-control " placeholder="Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 3<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                    <div class="col-12 pr-0">
		                                      <textarea name="question[]" id="editor19"></textarea>
		                                    </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3  white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 3</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans[]"  class="form-control " placeholder="Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 4<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="question[]" id="editor20"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 4</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans[]"  class="form-control " placeholder="Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 5<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="question[]" id="editor21"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 5</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans[]"  class="form-control " placeholder="Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 6<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="question[]" id="editor22"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 6</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans[]"  class="form-control " placeholder="Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                            @endif
		                        </div>
                       			<div class="col-4">
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
	                       		</div>
	                    	</div>
	                    	<div class="form-group row">
	                            <div class="col-11 save-btn mt-3">
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