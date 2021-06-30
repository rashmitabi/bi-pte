@extends('layouts.appSuperAdmin')
@section('content')
@php
$currency = getSingleSettingValue('currency');

@endphp
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
      <div class="row mx-0 align-items-center">
           <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
                <h1 class="title mb-4">Settings</h1>
           </div>
       </div>
   </section>

   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <form action="" name="settings" id="settings" enctype="multipart/form-data">
                    <div class="form">
                        <h4 class="mt-3 ml-3">Setting</h4>
                        <div class="form-group row mt-4">
                            <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Set Currency</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <select class="user-type" name="currency" id="currency">
                                <option selected disabled>Select Currency</option>
                                <option value="2" {{ ($currency == '2')?'selected':''}}>Dollar</option>
                                <option value="3" {{ ($currency == '3')?'selected':''}}>Rupees</option>
                            </select>
                            <span class="error-msg" id="currencyError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Admin Email Address</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="admin_email_address" id="admin_email_address" value="{{ getSingleSettingValue('admin_email_address')}}" class="form-control " placeholder="Enter Email Address">
                            <span class="error-msg" id="adminEmailError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Customer Email Address</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="customer_email_address" id="customer_email_address" value="{{ getSingleSettingValue('customer_email_address')}}" class="form-control " placeholder="Enter Email Address">
                                <span class="error-msg" id="customerEmailError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Company Name</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="company_name" id="company_name" value="{{ getSingleSettingValue('company_name')}}" class="form-control " placeholder="Enter Company Name">
                                <span class="error-msg" id="companyNameError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Company Mobile Number</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="company_mobile_number" id="company_mobile_number" value="{{ getSingleSettingValue('company_mobile_number')}}" class="form-control " placeholder="Enter Company Mobile Number">
                                <span class="error-msg" id="companyMobileError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Company Address</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <textarea class="form-control" name="company_address" id="company_address" cols="30" rows="5" placeholder="Enter Invoice Address">{{ getSingleSettingValue('company_address')}}</textarea>
                                <span class="error-msg" id="companyAddressError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Company Invoice Address</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <textarea class="form-control" name="company_invoice_address" id="company_invoice_address" cols="30" rows="5" placeholder="Enter Invoice Address">{{ getSingleSettingValue('company_invoice_address')}}</textarea>
                                <span class="error-msg" id="companyInvoiceError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Company GST Number</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="company_gst_number" id="company_gst_number" value="{{ getSingleSettingValue('company_gst_number')}}" class="form-control " placeholder="Enter Company GST Number">
                                <span class="error-msg" id="companyGstError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">HSN Code</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="hsn_code" id="hsn_code" value="{{ getSingleSettingValue('hsn_code')}}" class="form-control " placeholder="Enter HSN Code">
                                <span class="error-msg" id="hsnCodeError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">STGST (in %age) </label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="stgst" id="stgst" value="{{ getSingleSettingValue('stgst')}}" class="form-control " placeholder="Enter State STGST %">
                                <span class="error-msg" id="stgstError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">CGST (in %age) </label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="cgst" id="cgst" value="{{ getSingleSettingValue('cgst')}}" class="form-control " placeholder="Enter Central CGST %">
                                <span class="error-msg" id="cgstError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">IGST (in %age) </label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="igst" id="igst" value="{{ getSingleSettingValue('igst')}}" class="form-control " placeholder="Enter IGST %">
                                <span class="error-msg" id="igstError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Digital Signature</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">                              
                                <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="digital_signature" id="digital_signature">
                                    <label class="custom-file-label" for="customFile">Select file</label>
                                </div>
                                <span class="error-msg" id="signatureError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary save-setting" data-url="{{ route('settings.store') }}"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <form id="changePassword" name="changePassword">
                    <div class="form">
                        <h4 class="mt-3 ml-3 mb-4">Change Password</h4>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">New Password</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="password" name="password" id="password" class="form-control " placeholder="***********">
                            <span class="error-msg" id="passwordError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Confirm Password</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control " placeholder="**************">
                            <span class="error-msg" id="confirmPass"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary change-password" data-url="{{ route('superadmin-change-password') }}"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <form id="readingQuestionInstuction" name="readingQuestionInstuction">
                    <div class="form">
                        <h4 class="mt-3 ml-3 mb-4">Reading Questions Instructions</h4>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Reading and Writing:Fill in the blanks</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="reading_writing_fill_in_the_blanks" id="reading_writing_fill_in_the_blanks" class="form-control " placeholder="Add Reading and Writing:Fill in the blanks instructions" value="{{ (isset($readingInstructions[0]))?$readingInstructions[0]:''}}">
                            <span class="error-msg" id="fillInTheBlanksError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Multiple-choice,Choose multiple answers</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="multiple_choice_choose_multiple_answers" id="multiple_choice_choose_multiple_answers" class="form-control " placeholder="Add Multiple-choice,Choose multiple answers instructions" value="{{ (isset($readingInstructions[1]))?$readingInstructions[1]:''}}">
                                <span class="error-msg" id="multipleChoiceChooseMultipleAnswersError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Re-order Paragraphs</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="re_order_paragraphs" id="re_order_paragraphs" class="form-control " placeholder="AddRe-order Paragraphs instructions" value="{{ (isset($readingInstructions[2]))?$readingInstructions[2]:''}}">
                                <span class="error-msg" id="reOrderParagraphsError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Reading:Fill in the blanks</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="reading_fill_in_the_blanks" id="reading_fill_in_the_blanks" class="form-control " placeholder="Add Reading:Fill in the blanks instructions" value="{{ (isset($readingInstructions[3]))?$readingInstructions[3]:''}}">
                                <span class="error-msg" id="readingFillinBlanksError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Multiple-choice,choose single answers</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="multiple_choice_choose_single_answers" id="multiple_choice_choose_single_answers" class="form-control " placeholder="Add Multiple-choice,choose single answers instructions" value="{{ (isset($readingInstructions[4]))?$readingInstructions[4]:''}}">
                                <span class="error-msg" id="multipleChoiceChooseSingleError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary reading-store-instructions" data-url="{{ route('superadmin-reading-questions-instructions') }}"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <form id="listeningQuestionInstuction" name="listeningQuestionInstuction">
                    <div class="form">
                        <h4 class="mt-3 ml-3 mb-4">Listening Questions Instructions</h4>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Summarize Spoken item</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="summarize_spoken_item" id="summarize_spoken_item" class="form-control " placeholder="Add Summarize Spoken item instructions" value="{{ (isset($listeningInstructions[0]))?$listeningInstructions[0]:''}}">
                            <span class="error-msg" id="summerizeSpokemError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Choose Multiple answers item</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="choose_multiple_answers_item" id="choose_multiple_answers_item" class="form-control " placeholder="Add Choose Multiple answers item instructions" value="{{ (isset($listeningInstructions[1]))?$listeningInstructions[1]:''}}">
                                <span class="error-msg" id="chooseMultipleAnswersError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Fill in the blanks</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="fill_in_the_blanks" id="fill_in_the_blanks" class="form-control " placeholder="Add Fill in the blanks instructions" value="{{ (isset($listeningInstructions[2]))?$listeningInstructions[2]:''}}">
                                <span class="error-msg" id="fillInBlanksError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Highlight correct summary item</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="highlight_correct_summary_item" id="highlight_correct_summary_item" class="form-control " placeholder="Add Highlight correct summary item instructions" value="{{ (isset($listeningInstructions[3]))?$listeningInstructions[3]:''}}">
                                <span class="error-msg" id="highlightCorrectError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Multiple-choice,choose single answers item</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="multiple_choice_choose_single_answers_item" id="multiple_choice_choose_single_answers_item" class="form-control " placeholder="Add Multiple-choice,choose single answers item instructions" value="{{ (isset($listeningInstructions[4]))?$listeningInstructions[4]:''}}">
                                <span class="error-msg" id="multipleChoiceChooseSingleItemError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Select missing word item</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="select_missing_word_item" id="select_missing_word_item" class="form-control " placeholder="Add Select missing word item instructions" value="{{ (isset($listeningInstructions[5]))?$listeningInstructions[5]:''}}">
                                <span class="error-msg" id="selectMissingWordItemError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Highlight Incorrect Word</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="highlight_incorrect_word" id="highlight_incorrect_word" class="form-control " placeholder="Add Highlight Incorrect Word instructions" value="{{ (isset($listeningInstructions[6]))?$listeningInstructions[6]:''}}">
                                <span class="error-msg" id="highlightIncorrectError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Write Form Dictations</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="write_form_dictations" id="write_form_dictations" class="form-control " placeholder="Add Write Form Dictations instructions" value="{{ (isset($listeningInstructions[7]))?$listeningInstructions[7]:''}}">
                                <span class="error-msg" id="writeFormError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary listening-store-instructions" data-url="{{ route('superadmin-listening-questions-instructions') }}"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <form id="listeningInstruction" name="listeningInstruction">
                    <div class="form">
                        <h4 class="mt-3 ml-3 mb-4">Writing Questions Instructions</h4>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Summarize Written</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="summarize_written" id="summarize_written" class="form-control " placeholder="Add Summarize Written instructions" value="{{ (isset($writingInstructions[0]))?$writingInstructions[0]:''}}">
                            <span class="error-msg" id="summarizeError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Essay Writing</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="essay_writing" id="essay_writing" class="form-control " placeholder="Add Essay Writing" value="{{ (isset($writingInstructions[1]))?$writingInstructions[1]:''}}">
                            <span class="error-msg" id="essayError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary writing-store-instructions" data-url="{{ route('superadmin-writing-questions-instructions') }}"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <form id="speakingInstruction" name="speakingInstruction">
                    <div class="form">
                        <h4 class="mt-3 ml-3 mb-4">Speaking Questions Instructions</h4>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Read Aloud</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" name="read_aloud" id="read_aloud" class="form-control " placeholder="Add Read Aloud instructions" value="{{ (isset($speakingInstructions[0]))?$speakingInstructions[0]:''}}">
                            <span class="error-msg" id="readAloudError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Repeat Sentence</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="repeat_sentence" id="repeat_sentence" class="form-control " placeholder="Add Repeat Sentence instructions" value="{{ (isset($speakingInstructions[1]))?$speakingInstructions[1]:''}}">
                                <span class="error-msg" id="repeatError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Describe Image</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="describe_image" id="describe_image" class="form-control " placeholder="Add Describe Image instructions" value="{{ (isset($speakingInstructions[2]))?$speakingInstructions[2]:''}}">
                                <span class="error-msg" id="describeError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Re-tell lecture</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="re_tell_lecture" id="re_tell_lecture" class="form-control " placeholder="Add Re-tell lecture instructions" value="{{ (isset($speakingInstructions[3]))?$speakingInstructions[3]:''}}">
                                <span class="error-msg" id="lectureError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Answer-short Question</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" name="answer_short_question" id="answer_short_question" class="form-control " placeholder="Add Answer-short Question instructions" value="{{ (isset($speakingInstructions[4]))?$speakingInstructions[4]:''}}">
                                <span class="error-msg" id="shortError"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary speaking-store-instructions" data-url="{{ route('superadmin-speaking-questions-instructions') }}"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       </div>
   </section>
</div>
@endsection
@section('js-hooks')
<script src="{{ asset('assets/js/superAdminSettings.js') }}" defer></script>
@endsection