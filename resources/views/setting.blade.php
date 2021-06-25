@extends('layouts.appSuperAdmin')
@section('content')
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
                <div class="form">
                    <h4 class="mt-3 ml-3">Setting</h4>
                   <div class="form-group row mt-4">
                        <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Set Currency</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                           <select class="user-type" name="type">
                              <option selected>Select Currency</option>
                              <option value="2" >Dollar</option>
                              <option value="3" >Rupees</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                       <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Admin Email Address</label>
                       <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                           <input type="text" name="name" value="" class="form-control " placeholder="Enter Email Address">
                       </div>
                    </div>
                    <div class="form-group row">
                       <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Customer Email Address</label>
                       <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                           <input type="text" name="name" value="" class="form-control " placeholder="Enter Email Address">
                       </div>
                    </div>
                </div>
            </div>
       </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <div class="form">
                    <h4 class="mt-3 ml-3 mb-4">Change Password</h4>
                    <div class="form-group row">
                       <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">New Password</label>
                       <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                           <input type="password" name="name" value="" class="form-control " placeholder="***********">
                       </div>
                    </div>
                    <div class="form-group row">
                       <label  class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label ">Confirm Password</label>
                       <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                           <input type="password" name="name" value="" class="form-control " placeholder="**************">
                       </div>
                    </div>
                </div>
            </div>
       </div>
   </section>
</div>
@endsection