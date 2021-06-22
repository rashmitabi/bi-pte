<div class="row">
  <div class="col-12">
    <div class="profile-img">
      <img src="{{ asset('assets/images/profile-img-2.png') }}">
    </div>
    <div class="edit-profile-btn">
      <a><i class="fas fa-pen icon"></i></a>
    </div>
  </div>
  <div class="col-12 col-md-12 col-xl-12 col-sm-8 left">
    <form class="form mt-5 ml-5">
      @csrf
      @if($user->role_id == 3)
        <input type="hidden" name="type" value="{{ $user->role_id }}" >
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">First Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="fname" value="{{ $user->first_name }}" class="form-control " placeholder="Enter First Name">
            <span class="error-msg" id="fnameError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Last Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="lname" value="{{ $user->last_name }}" class="form-control " placeholder="Enter Last Name">
            <span class="error-msg" id="lnameError"></span>
          </div>
        </div>   
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">User Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="uname" value="{{ $user->name  }}" class="form-control " placeholder="Enter User Name">
            <span class="error-msg" id="unameError"></span>
          </div>
        </div>   
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Password</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="password" name="password" class="form-control password" placeholder="Password">
            <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
            <span class="error-msg" id="passwordError"></span>
          </div>
        </div>  
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Confirm Password</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="password" name="confirm_password" class="form-control confirm_password" placeholder="Confirm Password">
            <i class="far fa-eye-slash lock-icon cpassword-icon" onclick="confirm_password()"></i>
            <span class="error-msg" id="confirm_passwordError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" name="semail" value="{{ $user->email }}" class="form-control " placeholder="Enter Email id">
            <span class="error-msg" id="semailError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Date of Birth</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="date" name="dob" value="{{ $user->date_of_birth }}" class="form-control " placeholder="Select Date of Birth">
            <span class="error-msg" id="dobError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Mobile Number</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="mobileno" value="{{ $user->mobile_no }}" class="form-control " placeholder="Enter Mobile Number">
            <span class="error-msg" id="mobilenoError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Status</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="custom-select" name="sstatus">
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
            <input type="text" name="scitizen" value="{{ $user->country_citizen }}" class="form-control " placeholder="Enter Country Citizen">
            <span class="error-msg" id="scitizenError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Residence</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="sresidence" value="{{ $user->country_residence }}" class="form-control " placeholder="Enter Country Residence">
            <span class="error-msg" id="sresidenceError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Validity</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="date" name="svalidity" value="{{ date('Y-m-d', strtotime($user->validity)) }}" class="form-control " placeholder="Validity">
            <span class="error-msg" id="svalidityError"></span>
          </div>
        </div>  
      @endif

      @if($user->role_id == 2)
        <input type="hidden" name="type" value="{{ $user->role_id }}" >
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">User Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="iuname" value="{{ $user->name }}" class="form-control " placeholder="Enter User Name">
            <span class="error-msg" id="iunameError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Institute Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="iname" value="{{ isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}" class="form-control " placeholder="Enter Institute Name">
            <span class="error-msg" id="inameError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" name="iemail" value="{{ $user->email }}" class="form-control " placeholder="Enter Email id">
            <span class="error-msg" id="iemailError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Password</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="password" name="ipassword" class="form-control password" placeholder="Password">
            <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
            <span class="error-msg" id="ipasswordError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Confirm Password</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="password" name="iconfirm_password" class="form-control cpassword-icon" placeholder="Confirm Password">
            <i class="far fa-eye-slash lock-icon cpassword-icon" onclick="password()"></i>
            <span class="error-msg" id="iconfirm_passwordError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Country Phone Code</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="country_code" value="{{ isset($user->institue->country_phone_code) ? $user->institue->country_phone_code : '' }}" class="form-control " placeholder="Enter Country Phone Code">
            <span class="error-msg" id="country_codeError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Phone Number</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="phone_no" value="{{ isset($user->institue->phone_number) ? $user->institue->phone_number : '' }}" class="form-control " placeholder="Enter Phone Number">
            <span class="error-msg" id="phone_noError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="custom-select" name="status">
              <option value="P" {{ ( $user->status == 'P')?'selected':'' }}>Pending</option>
              <option value="A"  {{ ( $user->status == 'A')?'selected':'' }}>Active</option>
              <option value="R"  {{ ( $user->status == 'R')?'selected':'' }}>Reject</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Allowed Student</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="students_allowed" value="{{ isset($user->institue->students_allowed) ? $user->institue->students_allowed : 0 }}" class="form-control " placeholder="Enter Allowed Student">
            <span class="error-msg" id="students_allowedError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Subdomain</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="subdomain" value="{{ isset($user->institue->sub_domain) ? $user->institue->sub_domain : '' }}" class="form-control " placeholder="Enter Subdomain">
            <span class="error-msg" id="subdomainError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Domain</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="domain" value="{{ isset($user->institue->domain) ? $user->institue->domain : '' }}" class="form-control " placeholder="Enter Domain">
            <span class="error-msg" id="domainError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Welcome Message</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <textarea name="welcome_msg"  class="form-control"  rows="3">{{ isset($user->institue->welcome_message) ? $user->institue->welcome_message : '' }}</textarea>
            <span class="error-msg" id="welcome_msgError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">City</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="city" value="{{ $user->country_citizen }}" class="form-control " placeholder="Enter City">
            <span class="error-msg" id="cityError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Logo Image</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <div class="custom-file">
              <input type="file" name="logo" value="{{ isset($user->institue->logo) ? $user->institue->logo : '' }}" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Select Logo Image</label>
              <span class="error-msg" id="logoError"></span>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Banner Image</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <div class="custom-file">
              <input type="file" name="banner" value="{{ isset($user->institue->banner_image) ? $user->institue->banner_image : '' }}" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Select Banner Image</label>
              <span class="error-msg" id="bannerError"></span>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Validity</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="date" name="validity" value="{{ date('Y-m-d',strtotime($user->validity)) }}" class="form-control " placeholder="Validity">
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

      
    </form>
  </div>
</div>