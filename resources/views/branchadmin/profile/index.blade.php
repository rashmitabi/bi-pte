@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
      <div class="row mx-0 align-items-center">
           <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
                <h1 class="title mb-4">My profile</h1>
           </div>
       </div>
   </section>

   <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12">
              <div class="profile-img">
                @if($user->profile_image != '')
                  <img src="{{ asset('assets/images/profile/'.$user->profile_image) }}" width="150">
                @else
                  <img src="{{ asset('assets/images/profile-img-2.png') }}">
                @endif
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Institute Name</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Email</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->email }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">UserName</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->name }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Mobile Number</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->mobile_no }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Status</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  @if($user->status == "A")
                    <label class="label" for="">Active</label>
                  @elseif($user->status == "R")
                    <label class="label" for="">Reject</label>
                  @else
                    <label class="label" for="">Pending</label>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">State</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->state }}-{{ $user->state_code }}</label>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">GSTIN</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->gstin }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Country Citizen</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->country_citizen }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Domain</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->domain }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Sub Domain</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->sub_domain }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Welcome Message</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->welcome_message }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Show Superadmin videos</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->show_admin_videos }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Show Superadmin Prediction Files</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->show_admin_files }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Show Superadmin Tests</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->show_admin_tests }}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-5 col-xl-5 col-sm-12 col-form-label">Number of students allowed</label>
                <div class=" form-input col-12 col-md-7 col-xl-7 col-sm-12">
                  <label class="label" for="">{{ $user->institue->students_allowed }}</label>
                </div>
              </div>
          </div>
        </div>
    </section>
</div>
@endsection
