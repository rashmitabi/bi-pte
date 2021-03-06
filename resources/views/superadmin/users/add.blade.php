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
      <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
         {!! Form::open(array('route' => 'users.store','method'=>'POST','enctype' => 'multipart/form-data','class'=>'form mt-4 ml-3')) !!}
          <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Role</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
              <select  class="custom-select usertype_form" id="type" name="type">
                <option selected disabled>Select User Type</option>
                <option value="2" {{ (old('type') == '2')?'selected':''}}>Branch Admin</option>
                <option value="3" {{ (old('type') == '3')?'selected':''}}>Student</option>
              </select>
            </div>
          </div>
          @php
            $type = old('type');
            if(isset($type) && $type != '')
            {
                $finalbtn = "";
                if($type == 3)
                {
                  $studentblock = "";
                  $branchblock  = "display:none;";
                }
                else
                {
                  $branchblock = "";
                  $studentblock  = "display:none;";
                }
            }
            else
            {
                $studentblock = "display:none;";
                $branchblock  = "display:none;";
                $finalbtn     = "display:none";
            }
          @endphp
          <div id="student" style="{{ $studentblock }}">
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Branch Admin</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="custom-select" name="branch_admin" id="branch_admin">
                  <option value selected disabled>Select Branch Admin</option>
                  @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ (old('branch_admin') == $admin->id)?'selected':''}} >{{ isset($admin->institue->institute_name)?$admin->institue->institute_name:'' }}</option>
                  @endforeach
                </select>
                 @if($errors->has('branch_admin'))
                  <span class="error-msg">{{$errors->first('branch_admin')}}</span>
                @endif
              </div>
            </div>
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
                <input type="text" name="uname" value="{{old('uname')}}" data-id="" data-action="store" data-unique-type="username" data-url="{{ route('superadmin-check-unique-validation') }}" class="form-control unique-susername" placeholder="Enter User Name">
                @if($errors->has('uname'))
                  <span class="error-msg" id="suname-unique-msg2">{{$errors->first('uname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Email</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="email" name="semail" value="{{old('semail')}}" data-id="" data-action="store" data-unique-type="email" data-url="{{ route('superadmin-check-unique-validation') }}" class="form-control unique-semail" placeholder="Enter Email id">
                @if($errors->has('semail'))
                  <span class="error-msg" id="semail-unique-msg2">{{$errors->first('semail')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Password</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="password" name="spassword" value="{{ old('spassword') }}" class="form-control" placeholder="Enter Password">
                @if($errors->has('spassword'))
                  <span class="error-msg">{{$errors->first('spassword')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Confirm Password</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="password" name="confirm_spassword" value="{{ old('confirm_spassword') }}" class="form-control" placeholder="Enter Confirm Password">
                @if($errors->has('confirm_spassword'))
                  <span class="error-msg">{{$errors->first('confirm_spassword')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Date of Birth</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="dob" id="dob" value="{{ old('dob') }}" class="form-control " placeholder="Select Date of Birth">
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
                  <input type="checkbox" id="sstatus" name="sstatus" value="A" {{ (old('sstatus') == 'A')?'selected':''}} /><label for="sstatus">Toggle</label>
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
                <input type="text" name="scitizen" value="{{ old('scitizen') }}" class="form-control " placeholder="Enter Country Citizen">
                @if($errors->has('scitizen'))
                  <span class="error-msg">{{$errors->first('scitizen')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Residence</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="sresidence" value="{{ old('sresidence') }}" class="form-control " placeholder="Enter Country Residence">
                @if($errors->has('sresidence'))
                  <span class="error-msg">{{$errors->first('sresidence')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">State</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="custom-select" class="form-control" name="sstate" id="sstate">
                    <option selected disabled>Select State</option>
                    @foreach(states() as $key => $state)
                      <option value="{{ $state }}" data-code="{{ $key }}" {{ (old('sstate') == $state)?'selected':''}}>{{ $state }}</option>
                    @endforeach
                </select>
                @if($errors->has('sstate'))
                  <span class="error-msg">{{$errors->first('sstate')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State Code</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="sstate_code" id="sstate_code" value="{{ old('sstate_code') }}" class="form-control " placeholder="Enter State Code" readonly>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">GSTIN</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="sgstin" value="{{ old('sgstin') }}" class="form-control " placeholder="Enter GST NO">
                @if($errors->has('sgstin'))
                  <span class="error-msg">{{$errors->first('sgstin')}}</span>
                @endif
              </div>
            </div> -->
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">City</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="scity" id="scity" value="{{ old('scity') }}" class="form-control " placeholder="Enter City">
                @if($errors->has('scity'))
                  <span class="error-msg">{{$errors->first('scity')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Validity</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="svalidity" id="svalidity" value="{{ old('svalidity') }}" class="form-control " placeholder="Validity">
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


          <div id="breanchadmin" style="{{ $branchblock }}">
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">User Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="iuname" value="{{ old('iuname') }}" data-id="" data-action="store" data-unique-type="username" data-url="{{ route('superadmin-check-unique-validation') }}" class="form-control unique-iusername" placeholder="Enter User Name">
                @if($errors->has('iuname'))
                  <span class="error-msg" id="iuname-unique-msg2">{{$errors->first('iuname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Institute Name</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="iname" value="{{ old('iname') }}" class="form-control " placeholder="Enter Institute Name">
                @if($errors->has('iname'))
                  <span class="error-msg" >{{$errors->first('iname')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Email</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="email" name="iemail" value="{{ old('iemail') }}" data-id="" class="form-control unique-iemail" data-action="store" data-unique-type="email" data-url="{{ route('superadmin-check-unique-validation') }}"  placeholder="Enter Email id">
                @if($errors->has('iemail'))
                  <span class="error-msg" id="iemail-unique-msg2">{{$errors->first('iemail')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Password</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="password" name="ipassword" value="{{ old('ipassword') }}" class="form-control" placeholder="Enter Password">
                @if($errors->has('ipassword'))
                  <span class="error-msg">{{$errors->first('ipassword')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Confirm Password</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="password" name="confirm_ipassword" value="{{ old('confirm_ipassword') }}" class="form-control" placeholder="Enter Confirm Password">
                @if($errors->has('confirm_ipassword'))
                  <span class="error-msg">{{$errors->first('confirm_ipassword')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Phone Code</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="country_code" value="{{ old('country_code') }}" class="form-control " placeholder="Enter Country Phone Code">
                @if($errors->has('country_code'))
                  <span class="error-msg">{{$errors->first('country_code')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Phone Number</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="phone_no" value="{{ old('phone_no') }}" class="form-control " placeholder="Enter Phone Number">
                @if($errors->has('phone_no'))
                  <span class="error-msg">{{$errors->first('phone_no')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                  <input type="checkbox" id="istatus" name="istatus" value="A" {{ (old('istatus') == 'A')?'selected':''}} /><label for="istatus">Toggle</label>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Subdomain</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="subdomain" value="{{ old('subdomain') }}" class="form-control " placeholder="Enter Subdomain">
                @if($errors->has('subdomain'))
                  <span class="error-msg">{{$errors->first('subdomain')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Domain</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="domain" value="{{ old('domain') }}" class="form-control " placeholder="Enter Domain">
                @if($errors->has('domain'))
                  <span class="error-msg">{{$errors->first('domain')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Welcome Message</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <textarea name="welcome_msg" class="form-control"  rows="3" placeholder="Enter Welcome Message">{{ old('welcome_msg') }}</textarea>
                @if($errors->has('welcome_msg'))
                  <span class="error-msg">{{$errors->first('welcome_msg')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">State</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="custom-select" class="form-control" name="istate" id="istate">
                  <option selected disabled>Select State</option>
                  @foreach(states() as $key => $state)
                    <option value="{{ $state }}" data-code="{{ $key }}" {{ (old('sstate') == $state)?'selected':''}}>{{ $state }}</option>
                  @endforeach
                </select>
                @if($errors->has('istate'))
                  <span class="error-msg">{{$errors->first('istate')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State Code</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="istate_code" id="istate_code" value="{{ old('istate_code') }}" class="form-control " placeholder="Enter State Code" readonly>
                @if($errors->has('istate_code'))
                  <span class="error-msg">{{$errors->first('istate_code')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">City</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="icity" id="icity" value="{{ old('icity') }}" class="form-control " placeholder="Enter City">
                @if($errors->has('icity'))
                  <span class="error-msg">{{$errors->first('icity')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">GSTIN</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="igstin" value="{{ old('igstin') }}" class="form-control " placeholder="Enter GST NO">
                @if($errors->has('igstin'))
                  <span class="error-msg">{{$errors->first('igstin')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Profile Image</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <div class="custom-file">
                  <input type="file" name="bimage" value="{{ old('bimage') }}" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Select Profile Image</label>
                  @if($errors->has('bimage'))
                    <span class="error-msg">{{$errors->first('bimage')}}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Logo Image</label>
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
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Banner Image</label>
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
              <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Validity</label>
              <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" name="validity" id="ivalidity" value="{{ old('validity') }}" class="form-control " placeholder="Validity">
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
            <!-- <div class="form-group row">
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
            </div> -->
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
          
          <div class="form-group row finalsubmit" style="{{ $finalbtn }}">
            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
              <a href="{{ route('users.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
              <button  type="submit" class="btn btn-outline-primary mr-2 final-button"><i class="far fa-save save-icon"></i>Save User</button>
              
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