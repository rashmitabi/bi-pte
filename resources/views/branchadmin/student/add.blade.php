@extends('layouts.appBranchAdmin')

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
      <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
         {!! Form::open(array('route' => 'branchadmin-students.store','method'=>'POST','enctype' => 'multipart/form-data','class'=>'form mt-4 ml-3')) !!}
          <div id="student">
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">First Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="fname" value="{{ old('fname') }}" class="form-control " placeholder="Enter First Name">
                @if($errors->has('fname'))
                  <span class="error-msg">{{$errors->first('fname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Last Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="lname" value="{{ old('lname') }}" class="form-control " placeholder="Enter Last Name">
                @if($errors->has('lname'))
                  <span class="error-msg">{{$errors->first('lname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">User Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="uname" value="{{old('uname')}}" data-id="" data-action="store" data-unique-type="username" data-url="{{ route('branchadmin-check-unique-validation') }}" class="form-control unique-susername" placeholder="Enter User Name">
                  <span class="error-msg unameError">{{($errors->first('uname') != '')?$errors->first('uname'):''}}</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Email</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="email" name="email" value="{{old('email')}}" data-id="" data-action="store" data-unique-type="email" data-url="{{ route('branchadmin-check-unique-validation') }}" class="form-control unique-semail" placeholder="Enter Email id">
                  <span class="error-msg emailError">{{($errors->first('email') != '')?$errors->first('email'):''}}</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Password</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="password" name="password"  class="form-control" placeholder="Enter Password">
                @if($errors->has('password'))
                  <span class="error-msg">{{$errors->first('password')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Confirm Password</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="password" name="confirm_password"  class="form-control" placeholder="Enter Confirm Password">
                @if($errors->has('confirm_password'))
                  <span class="error-msg">{{$errors->first('confirm_password')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Date of Birth</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="dob" id="dob" value="{{ old('dob') }}" class="form-control " placeholder="Select Date of Birth" autocomplete="off">
                @if($errors->has('dob'))
                  <span class="error-msg">{{$errors->first('dob')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Mobile Number</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="mobileno" value="{{ old('mobileno') }}" class="form-control " placeholder="Enter Mobile Number">
                @if($errors->has('mobileno'))
                  <span class="error-msg">{{$errors->first('mobileno')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                  <input type="checkbox" id="status" name="status" value="A" {{ (old('status') == 'A')?'selected':''}} /><label for="status">Toggle</label>
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
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Citizen</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="citizen" value="{{ old('citizen') }}" class="form-control " placeholder="Enter Country Citizen">
                @if($errors->has('citizen'))
                  <span class="error-msg">{{$errors->first('citizen')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Residence</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="residence" value="{{ old('residence') }}" class="form-control " placeholder="Enter Country Residence">
                @if($errors->has('residence'))
                  <span class="error-msg">{{$errors->first('residence')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">State</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="custom-select" class="form-control" name="state" id="sstate">
                    <option selected disabled>Select State</option>
                    @foreach(states() as $key => $state)
                      <option value="{{ $state }}" data-code="{{ $key }}" {{ (old('state') == $state)?'selected':''}}>{{ $state }}</option>
                    @endforeach
                </select>
                @if($errors->has('state'))
                  <span class="error-msg">{{$errors->first('state')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State Code</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="state_code" id="sstate_code" value="{{ old('state_code') }}" class="form-control " placeholder="Enter State Code" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">City</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="city" id="city" value="{{ old('city') }}" class="form-control " placeholder="Enter City">
                @if($errors->has('city'))
                  <span class="error-msg">{{$errors->first('city')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Validity</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="validity" id="svalidity" value="{{ old('validity') }}" class="form-control " placeholder="Validity" autocomplete="off">
                @if($errors->has('validity'))
                  <span class="error-msg">{{$errors->first('validity')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Profile Image</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <div class="custom-file">
                  <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Select Profile Image</label>
                  @if($errors->has('image'))
                    <span class="error-msg">{{$errors->first('image')}}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>          
          <div class="form-group row finalsubmit">
            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
              <a href="{{ route('branchadmin-students.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
              <button  type="submit" class="btn btn-outline-primary mr-2 final-button"><i class="far fa-save save-icon"></i>Save Student</button>
              
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </section>
</div>
@endsection
@section('js-hooks')
<script>

  var url_students = '';
</script>
<script type="text/javascript" src="{{ asset('assets/js/branchadmin/users.js') }}" defer></script>
@endsection