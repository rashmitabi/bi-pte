<div class="row">  
  <div class="col-12 col-md-12 col-xl-12 col-sm-8 left">
    {!! Form::open(array('id'=>'userupdate','method'=>'POST','enctype' => 'multipart/form-data','class'=>'form mt-4 ml-3')) !!}    
      @if($user->role_id == 3)
        <input type="hidden" name="type" value="{{ $user->role_id }}" >
        <div class="form-group row">
          <div class="col-12">
            <div class="profile-img">
              @if($user->profile_image != '')
                <img src="{{ asset('assets/images/profile/'.$user->profile_image) }}" id="output">
              @else
                <img src="{{ asset('assets/images/profile-img-2.png') }}" id="output">
              @endif
            </div>
            <div class="edit-profile-btn">
              <a><input type="file" name="image" id="" onchange="readURL(event)" class="custom-file-input position-absolute"><i class="fas fa-pen icon"></i></a>
            </div>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">First Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="fname" id="fname" value="{{ $user->first_name }}" class="form-control " placeholder="Enter First Name">
            <span class="error-msg" id="fnameError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Last Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="lname" id="lname" value="{{ $user->last_name }}" class="form-control " placeholder="Enter Last Name">
            <span class="error-msg" id="lnameError"></span>
          </div>
        </div>   
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">User Name</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="uname" id="uname" value="{{ $user->name  }}" class="form-control " placeholder="Enter User Name">
            <span class="error-msg" id="unameError"></span>
          </div>
        </div>   
        
        <div class="form-group row mb-2">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Email</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control " placeholder="Enter Email id">
            <span class="error-msg" id="emailError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Date of Birth</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="dob" id="dob" value="{{ $user->date_of_birth }}" class="form-control " placeholder="Select Date of Birth">
            <span class="error-msg" id="dobError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Mobile Number</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="mobileno" id="mobileno" value="{{ $user->mobile_no }}" class="form-control " placeholder="Enter Mobile Number">
            <span class="error-msg" id="mobilenoError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
              <input type="checkbox" id="status" name="status" value="A" {{ ($user->status == 'A')?'checked':''}} /><label for="status">Toggle</label>
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
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Citizen</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="citizen" id="citizen" value="{{ $user->country_citizen }}" class="form-control " placeholder="Enter Country Citizen">
            <span class="error-msg" id="citizenError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Country Residence</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="residence" id="residence" value="{{ $user->country_residence }}" class="form-control " placeholder="Enter Country Residence">
            <span class="error-msg" id="residenceError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">State</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
              <select class="custom-select" name="state" id="sstate" class="form-control">
                @foreach(states() as $key => $state)
                  <option value="{{ $state }}" data-code="{{ $key }}" {{ ($user->state == $state)?'selected':''}}>{{ $state }}</option>
                @endforeach
              </select>
            <span class="error-msg" id="stateError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">State Code</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="state_code" id="sstate_code" value="{{ $user->state_code }}" class="form-control " placeholder="Enter State Code" readonly>
            <span class="error-msg" id="state_codeError"></span>
          </div>
        </div>
        <div class="form-group row">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">City</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="city" id="city" value="{{ $user->city }}" class="form-control " placeholder="Enter City">
            <span class="error-msg" id="cityError"></span>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Validity</label>
          <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" name="validity" id="svalidity" value="{{ date('Y-m-d', strtotime($user->validity)) }}" class="form-control " placeholder="Validity">
            <span class="error-msg" id="validityError"></span>
          </div>
        </div>  
      @endif
      <div class="form-group row mt-4">
        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
          <a href="{{ route('branchadmin-students.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
          <button  type="submit" class="btn btn-outline-primary user-update mr-2" data-id="{{ $user->id }}" id="submitabtn" data-url="{{ route('branchadmin-students-update', $user->id) }}"><i class="far fa-save save-icon"></i>Save Profile</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>