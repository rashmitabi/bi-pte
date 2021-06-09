@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New User</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="user-form mt-4 ml-3">
                  <div class="form-group row">
                      <label class="col-4 col-form-label ">Select Role</label>
                       <div class="col-7">
                          <select class="user-type custom-select">
                              <option selected>Select User Type</option>
                              <option value="1">Student</option>
                              <option value="2">Institute</option>
                           </select>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">First Name</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter First Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Last Name</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Last Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Email</label>
                       <div class="col-7">
                          <input type="email" class="form-control " placeholder="Enter Email id">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">User Name</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter User Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Password</label>
                       <div class="col-7">
                       <input type="password" name="password" class="form-control" placeholder="**********"> 
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Confirm Password</label>
                       <div class="col-7">
                       <input type="password" name="password" class="form-control" placeholder="**********"> 
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Date of Birth</label>
                       <div class="col-7">
                          <input type="date" class="form-control " placeholder="Select Date of Birth">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Mobile Number</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Mobile Number">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Status</label>
                       <div class="col-7">
                      
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Gender</label>
                       <div class="col-7">
                            <label for="rdo-8" class="btn-radio">
                                <input type="radio" id="rdo-8" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Male</span>
                            </label>
                            <label for="rdo-9" class="btn-radio">
                                <input type="radio" id="rdo-9" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Female</span>
                            </label>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Country Citizen</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Country Citizen">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Country Residence</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Country Residence">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Validity</label>
                       <div class="col-7">
                          <input type="date" class="form-control " placeholder="Validity">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Profile Image</label>
                       <div class="col-7">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="customFile">
                               <label class="custom-file-label" for="customFile">Select Profile Image</label>
                           </div>
                      </div>
                   </div>
                   <div class="form-group row">
                       <div class="col-11 save-user-btn">
                         <button type="button" class="btn btn-outline-primary">Save User</button>
                      </div>
                   </div>
                </form>   
            </div>
        </div>
    </section>
</div>
@endsection