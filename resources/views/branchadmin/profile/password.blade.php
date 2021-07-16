@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
      <div class="row mx-0 align-items-center">
           <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
                <h1 class="title mb-4">Change Password</h1>
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
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label required">New Password</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="password" name="password" id="password" class="form-control " placeholder="***********">
                            <span class="error-msg" id="passwordError"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label required">Confirm Password</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control " placeholder="**************">
                            <span class="error-msg" id="confirmPass"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary change-password" data-url="{{ route('branchadmin-change-password') }}"><i
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
<script src="{{ asset('assets/js/branchadmin/profile.js') }}" defer></script>
@endsection