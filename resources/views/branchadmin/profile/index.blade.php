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
            </div>
        </div>
    </section>
</div>
@endsection
