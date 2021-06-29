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
                <form action="" name="settings" id="settings">
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
                        <!-- <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Digital Signature</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">                              
                                <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="digital_signature" id="digital_signature">
                                    <label class="custom-file-label" for="customFile">Select file</label>
                                </div>
                                <span class="error-msg" id="signatureError"></span>
                            </div>
                        </div> -->
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
</div>
@endsection
@section('js-hooks')
<script src="{{ asset('assets/js/superAdminSettings.js') }}" defer></script>
@endsection