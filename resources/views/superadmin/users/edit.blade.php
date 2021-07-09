<div class="row">
  <div class="col-12">
    <div class="profile-img">
      @if($user->profile_image != '')
        <img src="{{ asset('assets/images/profile/'.$user->profile_image) }}">
      @else
        <img src="{{ asset('assets/images/profile-img-2.png') }}">
      @endif
    </div>
    <div class="edit-profile-btn">
      <a><i class="fas fa-pen icon"></i></a>
    </div>
  </div>
  <div class="col-12 col-md-12 col-xl-12 col-sm-8 left">
    {!! Form::open(array('id'=>'userupdate','method'=>'POST','enctype' => 'multipart/form-data','class'=>'form mt-4 ml-3')) !!}
      @if($user->role_id == 3)
        <input type="hidden" name="type" value="{{ $user->role_id }}" >
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Branch Admin</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="" name="branch_admin" id="branch_admin">
              @foreach($admins as $admin)
                <option value="{{ $admin->id }}" {{ ($user->parent_user_id == $admin->id)?'selected':'' }}>{{ isset($admin->institue->institute_name)?$admin->institue->institute_name:'' }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">First Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="fname" id="fname" value="{{ $user->first_name }}" class="form-control " placeholder="Enter First Name">
            <span class="error-msg" id="fnameError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Last Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="lname" id="lname" value="{{ $user->last_name }}" class="form-control " placeholder="Enter Last Name">
            <span class="error-msg" id="lnameError"></span>
          </div>
        </div>   
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">User Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="uname" id="uname" value="{{ $user->name  }}" class="form-control " placeholder="Enter User Name">
            <span class="error-msg" id="unameError"></span>
          </div>
        </div>   
        
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" name="semail" id="semail" value="{{ $user->email }}" class="form-control " placeholder="Enter Email id">
            <span class="error-msg" id="semailError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Date of Birth</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="date" name="dob" id="dob" value="{{ $user->date_of_birth }}" class="form-control " placeholder="Select Date of Birth">
            <span class="error-msg" id="dobError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Mobile Number</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="mobileno" id="mobileno" value="{{ $user->mobile_no }}" class="form-control " placeholder="Enter Mobile Number">
            <span class="error-msg" id="mobilenoError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Status</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="custom-select" name="sstatus" id="sstatus">
              <option value="P" {{ ($user->status == 'P')?'selected':'' }}>Pending</option>
              <option value="A"  {{ ($user->status == 'A')?'selected':'' }}>Active</option>
              <option value="R"  {{ ($user->status == 'R')?'selected':'' }}>Reject</option>
            </select>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Gender</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="rdo-8" class="btn-radio">
              <input type="radio" id="rdo-8" class="card_payment" name="gender" value="M" {{ ($user->gender == 'M')?'checked':'' }}>
              <svg width="20px" height="20px" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="9"></circle>
                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
              </svg>
              <span class="col-blue fw-500">Male</span>
            </label>
            <label for="rdo-9" class="btn-radio">
              <input type="radio" id="rdo-9" class="card_payment" name="gender" value="F" {{ ($user->gender == 'F')?'checked':'' }}>
              <svg width="20px" height="20px" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="9"></circle>
                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
              </svg>
              <span class="col-blue fw-500">Female</span>
            </label>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Citizen</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="scitizen" id="scitizen" value="{{ $user->country_citizen }}" class="form-control " placeholder="Enter Country Citizen">
            <span class="error-msg" id="scitizenError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Residence</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="sresidence" id="sresidence" value="{{ $user->country_residence }}" class="form-control " placeholder="Enter Country Residence">
            <span class="error-msg" id="sresidenceError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
              <select name="sstate" id="sstate" class="form-control">
                @foreach(states() as $key => $state)
                  <option value="{{ $state }}" data-code="{{ $key }}" {{ ($user->state == $state)?'selected':''}}>{{ $state }}</option>
                @endforeach
              </select>
            <span class="error-msg" id="sstateError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State Code</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="sstate_code" id="sstate_code" value="{{ $user->state_code }}" class="form-control " placeholder="Enter State Code" readonly>
            <span class="error-msg" id="sstate_codeError"></span>
          </div>
        </div>
        <!-- <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">GSTIN</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="sgstin" id="sgstin" value="{{ $user->gstin }}" class="form-control " placeholder="Enter State Code">
            <span class="error-msg" id="sgstinError"></span>
          </div>
        </div> -->
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Validity</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="date" name="svalidity" id="svalidity" value="{{ date('Y-m-d', strtotime($user->validity)) }}" class="form-control " placeholder="Validity">
            <span class="error-msg" id="svalidityError"></span>
          </div>
        </div>  
      @endif

      @if($user->role_id == 2)
        <input type="hidden" name="type" value="{{ $user->role_id }}" >
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">User Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="iuname" id="iuname" value="{{ $user->name }}" class="form-control " placeholder="Enter User Name">
            <span class="error-msg" id="iunameError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Institute Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="iname" id="iname" value="{{ isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}" class="form-control " placeholder="Enter Institute Name">
            <span class="error-msg" id="inameError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" name="iemail" id="iemail" value="{{ $user->email }}" class="form-control " placeholder="Enter Email id">
            <span class="error-msg" id="iemailError"></span>
          </div>
        </div>
       
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Phone Code</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="country_code" id="country_code" value="{{ isset($user->institue->country_phone_code) ? $user->institue->country_phone_code : '' }}" class="form-control " placeholder="Enter Country Phone Code">
            <span class="error-msg" id="country_codeError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Phone Number</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="phone_no" id="phone_no" value="{{ isset($user->institue->phone_number) ? $user->institue->phone_number : '' }}" class="form-control " placeholder="Enter Phone Number">
            <span class="error-msg" id="phone_noError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="custom-select" id="status" name="status">
              <option value="P" {{ ( $user->status == 'P')?'selected':'' }}>Pending</option>
              <option value="A"  {{ ( $user->status == 'A')?'selected':'' }}>Active</option>
              <option value="R"  {{ ( $user->status == 'R')?'selected':'' }}>Reject</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Allowed Student</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="students_allowed" id="students_allowed" value="{{ isset($user->institue->students_allowed) ? $user->institue->students_allowed : 0 }}" class="form-control " placeholder="Enter Allowed Student">
            <span class="error-msg" id="students_allowedError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Subdomain</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="subdomain" id="subdomain" value="{{ isset($user->institue->sub_domain) ? $user->institue->sub_domain : '' }}" class="form-control " placeholder="Enter Subdomain">
            <span class="error-msg" id="subdomainError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Domain</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="domain" id="domain" value="{{ isset($user->institue->domain) ? $user->institue->domain : '' }}" class="form-control " placeholder="Enter Domain">
            <span class="error-msg" id="domainError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Welcome Message</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <textarea name="welcome_msg" id="welcome_msg"  class="form-control"  rows="3">{{ isset($user->institue->welcome_message) ? $user->institue->welcome_message : '' }}</textarea>
            <span class="error-msg" id="welcome_msgError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select name="istate" id="istate">
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
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">GSTIN</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="igstin" id="igstin" value="{{ $user->gstin }}" class="form-control " placeholder="Enter State Code">
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
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Validity</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="date" name="validity" id="validity" value="{{ date('Y-m-d',strtotime($user->validity)) }}" class="form-control " placeholder="Validity">
            <span class="error-msg" id="validityError"></span>
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
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Show Super Admin Practice Questions</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="rdo-2" class="btn-radio">
              <input type="radio" id="rdo-2" class="card_payment" name="admin_practice_question" value="Y" {{ (isset($user->institue->show_practice_questions)? (($user->institue->show_practice_questions == "Y") ? 'checked' : '') : '') }} >
              <svg width="20px" height="20px" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="9"></circle>
                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
              </svg>
              <span class="col-blue fw-500">Yes</span>
            </label>
            <label for="rdo-7" class="btn-radio">
              <input type="radio" id="rdo-7" class="card_payment" name="admin_practice_question" value="N" {{ (isset($user->institue->show_practice_questions)? (($user->institue->show_practice_questions == "N") ? 'checked' : '') : '') }}>
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
      @endif

      <div class="form-group row mt-4">
        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
          <a href="{{ route('users.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
          <button  type="button" class="btn btn-outline-primary user-update mr-2" data-id="{{ $user->id }}" id="submitabtn" data-url="{{ route('users.update', $user->id) }}"><i class="far fa-save save-icon"></i>Save Profile</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>