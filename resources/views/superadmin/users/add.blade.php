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
         {!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'form mt-4 ml-3')) !!}
          <div class="form-group row">
            <label class="col-4 col-form-label ">Select Role</label>
            <div class="col-7">
              <select class="user-type custom-select" name="type">
                <option selected>Select User Type</option>
                <option value="2" >Branch Admin</option>
                <option value="3" >Student</option>
               
              </select>
            </div>
          </div>
          <div id="student" style="display: none">
            <div class="form-group row">
              <label  class="col-4 col-form-label ">First Name</label>
              <div class="col-7">
                <input type="text" name="fname" value="{{ old('fname') }}" class="form-control " placeholder="Enter First Name">
                @if($errors->has('fname'))
                  <span class="error-msg">{{$errors->first('fname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-4 col-form-label ">Last Name</label>
              <div class="col-7">
                <input type="text" name="lname" value="{{ old('lname') }}" class="form-control " placeholder="Enter Last Name">
                @if($errors->has('lname'))
                  <span class="error-msg">{{$errors->first('lname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">User Name</label>
              <div class="col-7">
                <input type="text" name="uname" value="{{old('uname')}}" class="form-control " placeholder="Enter User Name">
                @if($errors->has('uname'))
                  <span class="error-msg">{{$errors->first('uname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-4 col-form-label ">Password</label>
              <div class="col-7">
                <input type="password" name="password" class="form-control password" placeholder="Password">
                <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                @if($errors->has('password'))
                  <span class="error-msg">{{$errors->first('password')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Confirm Password</label>
              <div class="col-7">
                <input type="password" name="confirm_password" class="form-control confirm_password" placeholder="Confirm Password">
                <i class="far fa-eye-slash lock-icon cpassword-icon" onclick="confirm_password()"></i>
                @if($errors->has('confirm_password'))
                  <span class="error-msg">{{$errors->first('confirm_password')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-4 col-form-label ">Email</label>
              <div class="col-7">
                <input type="email" name="semail" value="{{old('semail')}}" class="form-control " placeholder="Enter Email id">
                @if($errors->has('semail'))
                  <span class="error-msg">{{$errors->first('semail')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Date of Birth</label>
              <div class="col-7">
                <input type="date" name="dob" value="{{ old('dob') }}" class="form-control " placeholder="Select Date of Birth">
                @if($errors->has('dob'))
                  <span class="error-msg">{{$errors->first('dob')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Mobile Number</label>
              <div class="col-7">
                <input type="text" name="mobileno" class="form-control " placeholder="Enter Mobile Number">
                @if($errors->has('mobileno'))
                  <span class="error-msg">{{$errors->first('mobileno')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-4 col-form-label ">Select Status</label>
              <div class="col-7">
                <select class="custom-select" name="sstatus">
                  <option value="P" {{ (old('sstatus') == 'P')?'checked':'' }}>Pending</option>
                  <option value="A"  {{ (old('sstatus') == 'A')?'checked':'' }}>Active</option>
                  <option value="R"  {{ (old('sstatus') == 'R')?'checked':'' }}>Reject</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Gender</label>
              <div class="col-7">
                <label for="rdo-8" class="btn-radio">
                  <input type="radio" id="rdo-8" class="card_payment" name="gender" value="M" checked="true">
                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                  </svg>
                  <span class="col-blue fw-500">Male</span>
                </label>
                <label for="rdo-9" class="btn-radio">
                  <input type="radio" id="rdo-9" class="card_payment" name="gender" value="F">
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
                <input type="text" name="scitizen" value="{{ old('scitizen') }}" class="form-control " placeholder="Enter Country Citizen">
                @if($errors->has('scitizen'))
                  <span class="error-msg">{{$errors->first('scitizen')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Country Residence</label>
              <div class="col-7">
                <input type="text" name="sresidence" value="{{ old('sresidence') }}" class="form-control " placeholder="Enter Country Residence">
                @if($errors->has('sresidence'))
                  <span class="error-msg">{{$errors->first('sresidence')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Validity</label>
              <div class="col-7">
                <input type="date" name="svalidity" value="{{ old('svalidity') }}" class="form-control " placeholder="Validity">
                @if($errors->has('svalidity'))
                  <span class="error-msg">{{$errors->first('svalidity')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-4 col-form-label ">Profile Image</label>
              <div class="col-7">
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
          <div class="form-group row">
            <div class="col-11 save-btn">
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