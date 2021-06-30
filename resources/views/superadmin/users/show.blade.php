<div class="row">
  <div class="col-12">
    <div class="profile-img">
      @if($user->profile_image != '')
        <img src="{{ asset('assets/images/profile/'.$user->profile_image) }}">
      @else
        <img src="{{ asset('assets/images/profile-img-2.png') }}">
      @endif
    </div>
  </div>
  <div class="col-12 mt-3 modal-form">
    <form class="user-form">
      @if($user->role_id == 3)
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">First Name</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" placeholder="{{ $user->first_name }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Last Name</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" placeholder="{{ $user->last_name }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Email</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->email }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">UserName</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="Phone" class="form-control" placeholder="{{ $user->name  }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Date of Birth</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="Phone" class="form-control" placeholder="{{ $user->date_of_birth }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Mobile Number</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->mobile_no }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Status</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            @if($user->status == "A")
              <input type="email" class="form-control" placeholder="Active">
            @elseif($user->status == "R")
              <input type="email" class="form-control" placeholder="Reject">
            @else
              <input type="email" class="form-control" placeholder="Pending">
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">State</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->state_code }}-{{ $user->state }}">
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">GSTIN</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->gstin }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Citizen</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->country_citizen }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Residence</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->country_residence }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Validity</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->validity }}">
          </div>
        </div>
      @endif

      @if($user->role_id == 2)
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Institute Name</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" placeholder="{{isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Email</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->email }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">UserName</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="Phone" class="form-control" placeholder="{{ $user->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Mobile Number</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->mobile_no }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Status</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            @if($user->status == "A")
              <input type="email" class="form-control" placeholder="Active">
            @elseif($user->status == "R")
              <input type="email" class="form-control" placeholder="Reject">
            @else
              <input type="email" class="form-control" placeholder="Pending">
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">State</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->state_code }}-{{ $user->state }}">
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">GSTIN</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->gstin }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Citizen</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->country_citizen }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Residence</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->country_residence }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Validity</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control" placeholder="{{ $user->validity }}">
          </div>
        </div>
      @endif
      <div class="form-group row">
        <div class="col-12 col-md-12 col-xl-11 col-sm-12 btn mt-2">
          <button  type="button" class="btn delete-btn btn-outline-primary"><i class="fas fa-trash icon"></i>Delete</button>
          <button  type="button" class="btn edit-btn btn-outline-primary"><i class="fas fa-pen icon"></i>Edit</button>
          <button  type="button" class="btn shield-btn btn-outline-primary"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class="icon"></a></i>Block</button>
        </div>
      </div>
    </form>
  </div>
</div>
                