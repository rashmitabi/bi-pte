@extends('layouts.appBranchAdmin')
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
	            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
	               <div class="question-forms">
	                   <div class="col-12 heading-text">
	                      <h5>Speaking Task 1: Read Aloud</h5>
	                   </div>  
	                   <form class="form ml-1" method="POST" id="frm-read-aloud" name="frm-read-aloud" action="{{ (isset($questions->desc))?route('branchadmin-update-read-aloud'):route('branchadmin-add-read-aloud')}}">
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
			                    			<input type="hidden" name="question_data_id{{ $i+1 }}" id="question_data_id{{ $i+1 }}" value="{{ $questions->questiondata[$i]->id }}">
			                    			<div class="sub-heading">
		                                    	<h4>Speaking Question {{$i+1}}<span>Paragraph</span></h4>
		                               		</div>
			                                <div class="form-group mb-1 row">
			                                   	<div class="col-12 pr-0">
			                                      <textarea name="editor{{$i+1}}" id="editor{{$i+1}}">{{ $questions->questiondata[$i]->data_value }}</textarea>
			                                    </div>
			                                </div>
			                                <input type="hidden" name="answer_data_id{{$i+1}}" id="answer_data_id{{$i+1}}" value="{{ $questions->answerdata[$i]->id }}">
			                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
			                                    <div class="form-group mb-3 row">
			                                       <label class="col-3 col-form-label">Sample Ans {{$i+1}}</label>
			                                       <div class="col-9">
			                                          <input type="text" name="sample_ans{{$i+1}}" id="sample_ans{{$i+1}}" value="{{ $questions->answerdata[$i]->sample_answer }}" class="form-control " placeholder="Please Enter sample answer{{$i+1}} like Whole,Total,Very,Open">
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
		                                      	<textarea name="editor1" id="editor1"></textarea>
		                                      	@if($errors->has('question'))
						                            <span class="error-msg"> {{$errors->first('question')}}</span>
						                        @endif
		                                  	</div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-3 row">
		                                       <label class="col-3 col-form-label">Sample Ans 1</label>
		                                       	<div class="col-9">
		                                          	<input type="text" name="sample_ans1" id="sample_ans1" class="form-control sample_ans" placeholder="Please Enter sample answer1 like Whole,Total,Very,Open">
		                                          	@if($errors->has('sample_ans'))
							                            <span class="error-msg"> {{$errors->first('sample_ans')}}</span>
							                        @endif
		                                       	</div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 2<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="editor2" id="editor2"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 2</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans2" id="sample_ans2"  class="form-control sample_ans" placeholder="Please Enter sample answer2 like Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 3<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                    <div class="col-12 pr-0">
		                                      <textarea name="editor3" id="editor3"></textarea>
		                                    </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3  white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 3</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans3" id="sample_ans3" class="form-control sample_ans" placeholder="Please Enter sample answer3 like Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 4<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="editor4" id="editor4"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 4</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans4" id="sample_ans4" class="form-control sample_ans" placeholder="Please Enter sample answer4 like Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 5<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="editor5" id="editor5"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 5</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans5"  id="sample_ans5" class="form-control sample_ans" placeholder="Please Enter sample answer5 like Whole,Total,Very,Open">
		                                       </div>
		                                    </div>
		                                </div>
		                                <div class="sub-heading">
		                                    <h4>Speaking Question 6<span>Paragraph</span></h4>
		                                </div>
		                                <div class="form-group mb-1 row">
		                                   <div class="col-12 pr-0">
		                                      <textarea name="editor6" id="editor6"></textarea>
		                                  </div>
		                                </div>
		                                <div class=" col-12 mt-4 ml-3 white-bg common-col">
		                                    <div class="form-group mb-2 row">
		                                       <label class="col-3 col-form-label">Sample Ans 6</label>
		                                       <div class="col-9">
		                                          <input type="text" name="sample_ans6" id="sample_ans6" class="form-control sample_ans" placeholder="Please Enter sample answer6 like Whole,Total,Very,Open">
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
					                        	<input type="file" class="custom-file-input " onchange ="uploadAduio()" id="customFile_audio" data-url="{{ route('branchadmin-upload-audio') }}" data-token="{{ csrf_token() }}">
					                        	<label class="custom-file-label" for="customFile">Select Audio</label>
					                      	</div>
						                      <input type="text" name="upload-audio" id="upload-audio" class="form-control" placeholder="Here Display the code of Audio">
						                      <span class="error-msg" id="upload-audioError"></span>
                                		</div>
	                            	</div>
	                       		</div>
	                    	</div>
	                    	<div class="form-group row">
	                            <div class="col-11 save-btn mt-3">
	                                <a href="{{ route('branchadmin-tests.show', $test_id) }}"><button  type="button" class="btn btn-outline-primary"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}">Cancel</button></a>
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
<script type="text/javascript" defer>
   var btnClass = "{{ $buttonHide }}";
</script>
<script src="{{ asset('assets/js/branchadmin/speaking/readaloud.js') }}" defer></script>
@endsection