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
      @php
        $validity = \Carbon\Carbon::parse($user->validity)->format('d-m-Y');
      @endphp

      @if($user->role_id == 3)
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">First Name</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label >{{ $user->first_name }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Last Name</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->last_name }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-2 col-sm-12 col-form-label">Email</label>
          <div class=" form-input col-12 col-md-7 col-xl-10 col-sm-12">
            <label for="">{{ $user->email }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">UserName</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->name  }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Date of Birth</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->date_of_birth }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Mobile Number</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->mobile_no }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Status</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            @if($user->status == "A")
              <label for="">Active</label>
            @elseif($user->status == "R")
              <label for="">Reject</label>
            @else
              <label for="">Pending</label>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">State</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->state }}-{{ $user->state_code }}</label>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">GSTIN</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->gstin }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Citizen</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->country_citizen }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Residence</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->country_residence }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Validity</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $validity }}</label>
          </div>
        </div>
      @endif

      @if($user->role_id == 2)
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Institute Name</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-2 col-sm-12 col-form-label">Email</label>
          <div class=" form-input col-12 col-md-7 col-xl-10 col-sm-12">
            <label for="">{{ $user->email }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">UserName</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->name }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Mobile Number</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->mobile_no }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Status</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            @if($user->status == "A")
              <label for="">Active</label>
            @elseif($user->status == "R")
              <label for="">Reject</label>
            @else
              <label for="">Pending</label>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">State</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->state }}-{{ $user->state_code }}</label>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">GSTIN</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->gstin }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Country Citizen</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $user->country_citizen }}</label>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Validity</label>
          <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
            <label for="">{{ $validity }}</label>
          </div>
        </div>
      @endif
      <div class="form-group row">
        <div class="col-12 col-md-12 col-xl-11 col-sm-12 btn mt-2">
          <button  type="button" class="btn delete-btn btn-outline-primary delete_modal" data-toggle="modal" data-target="#delete_modal" data-url="{{ route('users.destroy', $user->id) }}" data-id="{{ $user->id }}" style="    min-width: auto;"><i class="fas fa-trash icon"></i>Delete</button>
          <button  type="button" data-toggle="modal" data-target="#editdetail" class="btn edit-btn btn-outline-primary user-edit" data-id="{{ $user->id }}" data-url="{{ route('users.edit',$user->id) }}" data-md="yes" style="    min-width: auto;"><i class="fas fa-pen icon"></i>Edit</button>
            @if($user->status == 'A')
                <a href="{{ route('superadmin-user-changestatus',$user->id) }}"><button  type="button" class="btn shield-btn btn-outline-primary" style="min-width: auto;"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class="icon"></i>Block</button></a>
            @else
            <a href="{{ route('superadmin-user-changestatus',$user->id) }}"><button  type="button" class="btn btn-success" style="min-width: auto;"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class="icon"></i>Unblock</button></a>
            @endif
                        
        </div>
      </div>
    </form>
  </div>
</div>
                