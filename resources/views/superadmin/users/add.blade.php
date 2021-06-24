@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
    <div class="row mx-0 align-items-center">
      <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
        <h1 class="title mb-4">Add New User</h1>
      </div>
    </div>
  </section>

  <section class="top-title-button white-bg remove-main-margin mb-3">
    <div class="row mx-0 align-items-center">
      <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
         {!! Form::open(array('route' => 'users.store','method'=>'POST','enctype' => 'multipart/form-data','class'=>'form mt-4 ml-3')) !!}
          <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Role</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
              <select class="user-type" name="type">
                <option selected>Select User Type</option>
                <option value="2" >Branch Admin</option>
                <option value="3" >Student</option>
              </select>
            </div>
          </div>

          <div id="student" style="display: none;">
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">First Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="fname" value="{{ old('fname') }}" class="form-control " placeholder="Enter First Name">
                @if($errors->has('fname'))
                  <span class="error-msg">{{$errors->first('fname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Last Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="lname" value="{{ old('lname') }}" class="form-control " placeholder="Enter Last Name">
                @if($errors->has('lname'))
                  <span class="error-msg">{{$errors->first('lname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">User Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="uname" value="{{old('uname')}}" class="form-control " placeholder="Enter User Name">
                @if($errors->has('uname'))
                  <span class="error-msg">{{$errors->first('uname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="email" name="semail" value="{{old('semail')}}" class="form-control " placeholder="Enter Email id">
                @if($errors->has('semail'))
                  <span class="error-msg">{{$errors->first('semail')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Date of Birth</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="date" name="dob" value="{{ old('dob') }}" class="form-control " placeholder="Select Date of Birth">
                @if($errors->has('dob'))
                  <span class="error-msg">{{$errors->first('dob')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Mobile Number</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="mobileno" value="{{ old('mobileno') }}" class="form-control " placeholder="Enter Mobile Number">
                @if($errors->has('mobileno'))
                  <span class="error-msg">{{$errors->first('mobileno')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Status</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="custom-select" name="sstatus">
                  <option value="P" {{ (old('sstatus') == 'P')?'checked':'' }}>Pending</option>
                  <option value="A"  {{ (old('sstatus') == 'A')?'checked':'' }}>Active</option>
                  <option value="R"  {{ (old('sstatus') == 'R')?'checked':'' }}>Reject</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Gender</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <label for="rdo-8" class="btn-radio">
                  <input type="radio" id="rdo-8" class="card_payment" name="gender" value="M" checked="true" {{ (old('gender') == 'M')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">Male</span>
                </label>
                <label for="rdo-9" class="btn-radio">
                  <input type="radio" id="rdo-9" class="card_payment" name="gender" value="F" {{ (old('gender') == 'F')?'checked':'' }}>
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
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Citizen</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="scitizen" value="{{ old('scitizen') }}" class="form-control " placeholder="Enter Country Citizen">
                @if($errors->has('scitizen'))
                  <span class="error-msg">{{$errors->first('scitizen')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Residence</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="sresidence" value="{{ old('sresidence') }}" class="form-control " placeholder="Enter Country Residence">
                @if($errors->has('sresidence'))
                  <span class="error-msg">{{$errors->first('sresidence')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Validity</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="date" name="svalidity" value="{{ old('svalidity') }}" class="form-control " placeholder="Validity">
                @if($errors->has('svalidity'))
                  <span class="error-msg">{{$errors->first('svalidity')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Profile Image</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <div class="custom-file">
                  <input type="file" name="simage" value="{{ old('simage') }}" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Select Profile Image</label>
                  @if($errors->has('simage'))
                    <span class="error-msg">{{$errors->first('simage')}}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>


          <div id="breanchadmin" style="display: none;">
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">User Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="iuname" value="{{ old('iuname') }}" class="form-control " placeholder="Enter User Name">
                @if($errors->has('iuname'))
                  <span class="error-msg">{{$errors->first('iuname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Institute Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="iname" value="{{ old('iname') }}" class="form-control " placeholder="Enter Institute Name">
                @if($errors->has('iname'))
                  <span class="error-msg">{{$errors->first('iname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="email" name="iemail" value="{{ old('iemail') }}" class="form-control " placeholder="Enter Email id">
                @if($errors->has('iemail'))
                  <span class="error-msg">{{$errors->first('iemail')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Phone Code</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="country_code" value="{{ old('country_code') }}" class="form-control " placeholder="Enter Country Phone Code">
                @if($errors->has('country_code'))
                  <span class="error-msg">{{$errors->first('country_code')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Phone Number</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="phone_no" value="{{ old('phone_no') }}" class="form-control " placeholder="Enter Phone Number">
                @if($errors->has('phone_no'))
                  <span class="error-msg">{{$errors->first('phone_no')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="custom-select" name="status">
                  <option value="P" {{ (old('status') == 'P')?'selected':'' }}>Pending</option>
                  <option value="A"  {{ (old('status') == 'A')?'selected':'' }}>Active</option>
                  <option value="R"  {{ (old('status') == 'R')?'selected':'' }}>Reject</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Allowed Student</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="students_allowed" value="{{ old('students_allowed') }}" class="form-control " placeholder="Enter Allowed Student">
                @if($errors->has('students_allowed'))
                  <span class="error-msg">{{$errors->first('students_allowed')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Subdomain</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="subdomain" value="{{ old('subdomain') }}" class="form-control " placeholder="Enter Subdomain">
                @if($errors->has('subdomain'))
                  <span class="error-msg">{{$errors->first('subdomain')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Domain</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="domain" value="{{ old('domain') }}" class="form-control " placeholder="Enter Domain">
                @if($errors->has('domain'))
                  <span class="error-msg">{{$errors->first('domain')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Welcome Message</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <textarea name="welcome_msg" class="form-control"  rows="3" placeholder="Enter Welcome Message">{{ old('welcome_msg') }}</textarea>
                @if($errors->has('welcome_msg'))
                  <span class="error-msg">{{$errors->first('welcome_msg')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">City</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="city" value="{{ old('city') }}" class="form-control " placeholder="Enter City">
                @if($errors->has('city'))
                  <span class="error-msg">{{$errors->first('city')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Logo Image</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <div class="custom-file">
                  <input type="file" name="logo" value="{{ old('logo') }}" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Select Logo Image</label>
                  @if($errors->has('logo'))
                    <span class="error-msg">{{$errors->first('logo')}}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Banner Image</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <div class="custom-file">
                  <input type="file" name="banner" value="{{ old('banner') }}" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Select Banner Image</label>
                  @if($errors->has('banner'))
                    <span class="error-msg">{{$errors->first('banner')}}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Validity</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="date" name="validity" value="{{ old('validity') }}" class="form-control " placeholder="Validity">
                @if($errors->has('validity'))
                  <span class="error-msg">{{$errors->first('validity')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Show Super Admin Videos</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <label for="rdo-4" class="btn-radio">
                  <input type="radio" id="rdo-4" class="card_payment" name="admin_video" value="Y"  {{ (old('admin_video') == 'Y')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">Yes</span>
                </label>
                <label for="rdo-5" class="btn-radio">
                  <input type="radio" id="rdo-5" class="card_payment" name="admin_video" value="N" checked="true" {{ (old('admin_video') == 'N')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">No</span>
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Show Super Admin Predictions Files</label>
              <div class="col-5">
                <label for="rdo-3" class="btn-radio">
                  <input type="radio" id="rdo-3" class="card_payment" name="admin_prediction_file" value="Y"  {{ (old('admin_prediction_file') == 'Y')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">Yes</span>
                </label>
                <label for="rdo-6" class="btn-radio">
                  <input type="radio" id="rdo-6" class="card_payment" name="admin_prediction_file" value="N" checked="true" {{ (old('admin_prediction_file') == 'N')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">No</span>
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Show Super Admin Practice Questions</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <label for="rdo-2" class="btn-radio">
                  <input type="radio" id="rdo-2" class="card_payment" name="admin_practice_question" value="Y"  {{ (old('admin_practice_question') == 'Y')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">Yes</span>
                </label>
                <label for="rdo-7" class="btn-radio">
                  <input type="radio" id="rdo-7" class="card_payment" name="admin_practice_question" value="N" checked="true" {{ (old('admin_practice_question') == 'N')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">No</span>
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Show Super Admin Tests</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <label for="rdo-1" class="btn-radio">
                  <input type="radio" id="rdo-1" class="card_payment" name="admin_test" value="Y"  {{ (old('admin_test') == 'Y')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">Yes</span>
                </label>
                <label for="rdo-10" class="btn-radio">
                  <input type="radio" id="rdo-10" class="card_payment" name="admin_test" value="N" checked="true" {{ (old('admin_test') == 'N')?'checked':'' }}>
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">No</span>
                </label>
              </div>
            </div>
          </div>
          
          <div class="form-group row">
            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
              <button  type="submit" class="btn btn-outline-primary"><i class="far fa-save save-icon"></i>Save User</button>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </section>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url_users = "{{ route('users.index', 'type=I') }}";
  var url_students = "{{ route('users.index', 'type=S') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/users.js') }}" defer></script>
@endsection