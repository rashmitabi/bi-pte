@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
      <div class="row mx-0 align-items-center">
           <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
                <h1 class="title mb-4">Edit profile</h1>
           </div>
       </div>
   </section>

   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                {!! Form::open(array('id' => 'profileupdate', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'form mt-4 ml-3')) !!}    
                <div class="form-group row">
                  <div class="col-12">
                    <div class="profile-img">
                      @if($user->profile_image != '')
                        <img src="{{ asset('assets/images/profile/'.$user->profile_image) }}" id="output" width="150">
                      @else
                        <img src="{{ asset('assets/images/profile-img-2.png') }}" id="output" width="150">
                      @endif
                    </div>
                    <div class="edit-profile-btn">
                      <a><input type="file" name="iimage" id="" onchange="readURL(event)" class="custom-file-input position-absolute"><i class="fas fa-pen icon"></i></a>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">User Name</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="iuname" id="iuname" value="{{ $user->name }}" class="form-control " placeholder="Enter User Name">
                    <span class="error-msg" id="iunameError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Institute Name</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="iname" id="iname" value="{{ isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}" class="form-control " placeholder="Enter Institute Name">
                    <span class="error-msg" id="inameError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Email</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="email" name="iemail" id="iemail" value="{{ $user->email }}" class="form-control " placeholder="Enter Email id">
                    <span class="error-msg" id="iemailError"></span>
                  </div>
                </div>
               
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Phone Code</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="country_code" id="country_code" value="{{ isset($user->institue->country_phone_code) ? $user->institue->country_phone_code : '' }}" class="form-control " placeholder="Enter Country Phone Code">
                    <span class="error-msg" id="country_codeError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Phone Number</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="phone_no" id="phone_no" value="{{ isset($user->institue->phone_number) ? $user->institue->phone_number : '' }}" class="form-control " placeholder="Enter Phone Number">
                    <span class="error-msg" id="phone_noError"></span>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Subdomain</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="subdomain" id="subdomain" value="{{ isset($user->institue->sub_domain) ? $user->institue->sub_domain : '' }}" class="form-control " placeholder="Enter Subdomain">
                    <span class="error-msg" id="subdomainError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Domain</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="domain" id="domain" value="{{ isset($user->institue->domain) ? $user->institue->domain : '' }}" class="form-control " placeholder="Enter Domain">
                    <span class="error-msg" id="domainError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Welcome Message</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <textarea name="welcome_msg" id="welcome_msg"  class="form-control"  rows="3">{{ isset($user->institue->welcome_message) ? $user->institue->welcome_message : '' }}</textarea>
                    <span class="error-msg" id="welcome_msgError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">State</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <select class="custom-select" name="istate" id="istate">
                          @foreach(states() as $key => $state)
                            <option value="{{ $state }}" data-code="{{ $key }}" {{ ($user->state == $state)?'selected':''}}>{{ $state }}</option>
                          @endforeach
                    </select>
                    <span class="error-msg" id="istateError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State Code</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="istate_code" id="istate_code" value="{{ $user->state_code }}" class="form-control " placeholder="Enter State Code" readonly>
                    <span class="error-msg" id="istate_codeError"></span>
                  </div>
                </div>
                <div class="form-group row">
                      <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">City</label>
                      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                        <input type="text" name="icity" id="icity" value="{{ $user->city }}" class="form-control " placeholder="Enter City">
                        <span class="error-msg" id="icityError"></span>
                      </div>
                    </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">GSTIN</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <input type="text" name="igstin" id="igstin" value="{{ $user->gstin }}" class="form-control " placeholder="Enter GSTIN">
                    <span class="error-msg" id="igstinError"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Logo Image</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <div class="custom-file">
                      <input type="file" name="logo" id="logo" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Select Logo Image</label>
                      @if($user->institue->logo != '')
                        <img src="{{ asset('assets/images/institute/'.$user->institue->logo) }}" style="width:50px;height: 50px">
                      @endif
                      <span class="error-msg" id="logoError"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Banner Image</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <div class="custom-file">
                      <input type="file" name="banner" id="banner"  class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Select Banner Image</label>
                      @if($user->institue->banner_image != '')
                        <img src="{{ asset('assets/images/institute/'.$user->institue->banner_image) }}" style="width:50px;height: 50px">
                      @endif
                      <span class="error-msg" id="bannerError"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Show Super Admin Videos</label>
                  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                    <label for="rdo-4" class="btn-radio">
                      <input type="radio" id="rdo-4" class="card_payment" name="admin_video" value="Y" {{ (isset($user->institue->show_admin_videos)? (($user->institue->show_admin_videos == "Y") ? 'checked' : '') : '') }} >
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span class="col-blue fw-500">Yes</span>
                    </label>
                    <label for="rdo-5" class="btn-radio">
                      <input type="radio" id="rdo-5" class="card_payment" name="admin_video" value="N" {{ (isset($user->institue->show_admin_videos)? (($user->institue->show_admin_videos == "N") ? 'checked' : '') : '') }}>
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
                      <input type="radio" id="rdo-3" class="card_payment" name="admin_prediction_file" value="Y" {{ (isset($user->institue->show_admin_files)? (($user->institue->show_admin_files == "Y") ? 'checked' : '') : '') }}>
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span class="col-blue fw-500">Yes</span>
                    </label>
                    <label for="rdo-6" class="btn-radio">
                      <input type="radio" id="rdo-6" class="card_payment" name="admin_prediction_file" value="N" {{ (isset($user->institue->show_admin_files)? (($user->institue->show_admin_files == "N") ? 'checked' : '') : '') }} >
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
                      <input type="radio" id="rdo-1" class="card_payment" name="admin_test" value="Y" {{ (isset($user->institue->show_admin_tests)? (($user->institue->show_admin_tests == "Y") ? 'checked' : '') : '') }} >
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span class="col-blue fw-500">Yes</span>
                    </label>
                    <label for="rdo-10" class="btn-radio">
                      <input type="radio" id="rdo-10" class="card_payment" name="admin_test" value="N" {{ (isset($user->institue->show_admin_tests)? (($user->institue->show_admin_tests == "N") ? 'checked' : '') : '') }}>
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span class="col-blue fw-500">No</span>
                    </label>
                  </div>
                </div>    
                <div class="form-group row mt-4">
                    <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                      <a href="{{ route('branchadmin-profile.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
                      <button  type="submit" class="btn btn-outline-primary profile-update mr-2" data-url = "{{ route('branchadmin-updateprofile') }}">
                        <i class="far fa-save save-icon"></i>Save Profile
                      </button>
                    </div>
                </div>        
                {!! Form::close() !!}
            </div>
       </div>
   </section>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript" src="{{ asset('assets/js/branchadmin/profile.js') }}" defer></script>
@endsection