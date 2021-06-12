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
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="form mt-4 ml-3" action="{{ route('users.store')}}">
                  <div class="form-group row">
                      <label class="col-4 col-form-label ">Select Role</label>
                       <div class="col-7">
                          <select name="role" class="user-type custom-select">
                              @if(count($roles) > 0)
                                @foreach($roles as $role)
                                  @if(Auth::user()->role_id != $role->id)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                  @endif
                                 @endforeach
                              @endif
                           </select>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">First Name</label>
                      <div class="col-7">
                        <input type="text" name="fname" class="form-control " placeholder="Enter First Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Last Name</label>
                       <div class="col-7">
                          <input type="text" name="lname" class="form-control " placeholder="Enter Last Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Email</label>
                       <div class="col-7">
                          <input type="email" name="email" class="form-control " placeholder="Enter Email id">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">User Name</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter User Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Password</label>
                       <div class="col-7">
                       <input type="password" name="password" class="form-control" placeholder="**********">
                       <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Confirm Password</label>
                       <div class="col-7">
                       <input type="password" name="password" class="form-control" placeholder="**********">
                       <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Date of Birth</label>
                       <div class="col-7">
                          <input type="date" class="form-control " placeholder="Select Date of Birth">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Mobile Number</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Mobile Number">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Status</label>
                       <div class="col-7 toggle-switch">
                       <input type="checkbox" id="switch" /><label for="switch">Toggle</label>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Gender</label>
                       <div class="col-7">
                            <label for="rdo-8" class="btn-radio">
                                <input type="radio" id="rdo-8" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Male</span>
                            </label>
                            <label for="rdo-9" class="btn-radio">
                                <input type="radio" id="rdo-9" class="card_payment" name="payment_type" value="card_payment">
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
                      <label  class="col-4 col-form-label ">Country Citizen</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Country Citizen">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Country Residence</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Country Residence">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Validity</label>
                       <div class="col-7">
                          <input type="date" class="form-control " placeholder="Validity">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Profile Image</label>
                       <div class="col-7">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="customFile">
                               <label class="custom-file-label" for="customFile">Select Profile Image</label>
                           </div>
                      </div>
                   </div>
                   <div class="form-group row">
                       <div class="col-11 save-btn">
                         <button  type="button" class="btn btn-outline-primary"><i class="far fa-save save-icon"></i>Save User</button>
                      </div>
                   </div>
                </form>


                <!-- institude form -->
                <form class="form mt-4 ml-3">
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">User Name</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter User Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Institute Name</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Institute Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Email</label>
                       <div class="col-7">
                          <input type="email" class="form-control " placeholder="Enter Email id">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Password</label>
                       <div class="col-7">
                       <input type="password" name="password" class="form-control" placeholder="**********">
                       <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Confirm Password</label>
                       <div class="col-7">
                       <input type="password" name="password" class="form-control" placeholder="**********">
                       <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Country Phone Code</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Country Phone Code">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Phone Number</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Phone Number">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Status</label>
                      <div class="col-7 toggle-switch">
                       <input type="checkbox" id="switch-one" /><label for="switch-one">Toggle</label>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Subdomain</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Subdomain">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Domain</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter Domain">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Welcome Message</label>
                       <div class="col-7">
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Enter Welcome Message</textarea>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">City</label>
                       <div class="col-7">
                          <input type="text" class="form-control " placeholder="Enter City">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Logo Image</label>
                       <div class="col-7">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="customFile">
                               <label class="custom-file-label" for="customFile">Select Logo Image</label>
                           </div>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Banner Image</label>
                       <div class="col-7">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="customFile">
                               <label class="custom-file-label" for="customFile">Select Banner Image</label>
                           </div>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Validity</label>
                       <div class="col-7">
                          <input type="date" class="form-control " placeholder="Validity">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Show Super Admin Videos</label>
                       <div class="col-7">
                            <label for="rdo-4" class="btn-radio">
                                <input type="radio" id="rdo-4" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Yes</span>
                            </label>
                            <label for="rdo-5" class="btn-radio">
                                <input type="radio" id="rdo-5" class="card_payment" name="payment_type" value="card_payment">
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
                      <label  class="col-4 col-form-label ">Show Super Admin Predictions Files</label>
                       <div class="col-5">
                            <label for="rdo-3" class="btn-radio">
                                <input type="radio" id="rdo-3" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Yes</span>
                            </label>
                            <label for="rdo-6" class="btn-radio">
                                <input type="radio" id="rdo-6" class="card_payment" name="payment_type" value="card_payment">
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
                      <label  class="col-4 col-form-label ">Show Super Admin Practice Questions</label>
                       <div class="col-7">
                            <label for="rdo-2" class="btn-radio">
                                <input type="radio" id="rdo-2" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Yes</span>
                            </label>
                            <label for="rdo-7" class="btn-radio">
                                <input type="radio" id="rdo-7" class="card_payment" name="payment_type" value="card_payment">
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
                      <label  class="col-4 col-form-label ">Show Super Admin Predictions Tests</label>
                       <div class="col-7">
                            <label for="rdo-1" class="btn-radio">
                                <input type="radio" id="rdo-1" class="card_payment" name="payment_type" value="card_payment">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                   <circle cx="10" cy="10" r="9"></circle>
                                   <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                   <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span class="col-blue fw-500">Yes</span>
                            </label>
                            <label for="rdo-10" class="btn-radio">
                                <input type="radio" id="rdo-10" class="card_payment" name="payment_type" value="card_payment">
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
                       <div class="col-11 save-btn">
                         <button  type="button" class="btn btn-outline-primary"><i class="far fa-save save-icon"></i>Save User</button>
                      </div>
                   </div>
                </form>      
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