@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
      <div class="row mx-0">
           <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 col-header">
                <div class="px-4 pt-0 pb-4 bg-banner" style="
                @if($user->institue->banner_image != '')
                background-image: url({{ asset('assets/images/institute/'.$user->institue->banner_image) }});
                @endif
                ">
                    <div class="media profile-header">
                        <div class="profile">
                          @if($user->institue->logo != '')
                            <img src="{{ asset('assets/images/institute/'.$user->institue->logo) }}" width="130" class="rounded mb-2 img-thumbnail">
                          @endif
                        </div>
                        <div class="profile ">
                          @if($user->profile_image != '')
                            <img src="{{ asset('assets/images/profile/'.$user->profile_image) }}" width="130" class="rounded mb-2 img-thumbnail">
                          @else
                            <img src="{{ asset('assets/images/profile-img-2.png') }}" width="130" class="rounded mb-2 img-thumbnail">
                          @endif
                        </div>
                    </div>  
                </div>
                <button>
                  <a href="{{ route('branchadmin-editprofile') }}" class="btn edit-btn btn-dark">
                  Edit profile
                  </a>
                </button>
           </div>
       </div>
   </section>
   <section>
       <div class="row">
           <div class="col-12 col-md-12 col-xl-12 col-sm-8">
               <div class="profile-detail">
               <form>
                    <div class="form-group row">
                       <label for="staticEmail" class="col-sm-6 col-form-label">Institute Name</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{isset($user->institue->institute_name) ? $user->institue->institute_name : '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">Email</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">UserName</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->name }}">
                        </div>
                    </div> 
                    <div class="form-group row">  
                        <label for="staticEmail" class="col-sm-6 col-form-label">Mobile Number</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->mobile_no }}">
                        </div>
                    </div> 
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Status</label>
                        <div class="col-sm-6">
                          @if($user->status == "A")
                          @php $status = 'Active' @endphp
                          @elseif($user->status == "R")
                          @php $status = 'Rejected' @endphp 
                          @else 
                          @php $status = 'Pending' @endphp 
                          @endif
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value='{{$status}}'>
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">GSTIN</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->gstin }}">
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">City</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->city }}">
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">State and State Code</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->state }} - {{ $user->state_code }}">
                        </div>
                    </div> 
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Country Citizen</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->country_citizen }}">
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Domain</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->institue->domain }}">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label"> Sub Domain</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->institue->sub_domain }}">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Welcome Message</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->institue->welcome_message }}">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Show Superadmin Video</label>
                        <div class="col-sm-6">
                          <!-- <input type="text" readonly class="form-control-plaintext" style="display: flex; float: left; width: 7%;" id="staticEmail" value=""> -->
                          @if ($user->institue->show_admin_videos == 'Y')
                          <i class="fas fa-check check-icon"></i>
                          @else
                          <i class="fas fa-times cancel-icon"></i>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Show Superadmin Prediction Files</label>
                        <div class="col-sm-6">                        
                          @if ($user->institue->show_admin_files == 'Y')
                          <i class="fas fa-check check-icon"></i>
                          @else
                          <i class="fas fa-times cancel-icon"></i>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Show Superadmin Tests</label>
                        <div class="col-sm-6">
                          @if ($user->institue->show_admin_tests == 'Y')
                          <i class="fas fa-check check-icon"></i>
                          @else
                          <i class="fas fa-times cancel-icon"></i>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row">  
                        <label for="staticEmail" class="col-sm-6 col-form-label">Number of students allowed</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->institue->students_allowed }}">
                        </div>
                    </div>
                </form>
               </div>
           </div>
       </div>
   </section>
</div>
@endsection