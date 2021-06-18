@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
    <div class="row mx-0 align-items-center">
      <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
        <h1 class="title mb-4">Manage User</h1>
      </div>
      <div class="col-12 col-md-12 col-xl-4 col-sm-4 right">
        <a href="{{ route('users.create') }}"><button type="button" class="btn btn-primary" ><i class="fas fa-plus-circle mr-1"></i> New
              User</button>
        </a>
      </div>
    </div>
  </section>
  <section class="top-title-button remove-main-margin mb-3">
    <div class="row mx-0 align-items-center">
      <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
        <div class="tab">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Institute</a>
              <a class="nav-item nav-link" id="nav-student-tab" data-toggle="tab" href="#nav-student" role="tab" aria-controls="nav-student" aria-selected="false" >Students</a>
            </div>
          </nav>
          <div class="tab-content white-bg" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <table id="users" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th> <input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"> </th>
                        <th>Sr No</th>
                        <th>Institute Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">
              <table id="students" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th> <input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"> </th>
                        <th>Sr No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 



  <!-- Modal -->
  <div class="modal fade" id="mocktest" tabindex="-1" 
      aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header pb-3 bg-light">
          <h5 class="mt-1">Assign Mock Tests</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form">
            <div class="form-check form-check-inline common-heading">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Select All</label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">Tests</label>
            </div>
            <div class="form-check form-check-inline">
              <label for="rdo-1" class="btn-radio">
                <input type="radio" id="rdo-1" class="card_payment" name="payment_type" value="card_payment">
                <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                </svg>
                <span class="col-blue fw-500">Select 10</span>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label for="rdo-2" class="btn-radio">
                <input type="radio" id="rdo-2" class="card_payment" name="payment_type" value="card_payment">
                <svg width="20px" height="20px" viewBox="0 0 20 20">
                  <circle cx="10" cy="10" r="9"></circle>
                  <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                  <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                </svg>
                <span class="col-blue fw-500">Select 20</span>
              </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="rdo-3" class="btn-radio">
                      <input type="radio" id="rdo-3" class="card_payment" name="payment_type" value="card_payment">
                           <svg width="20px" height="20px" viewBox="0 0 20 20">
                               <circle cx="10" cy="10" r="9"></circle>
                               <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                               <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                           </svg>
                           <span class="col-blue fw-500">Select 30</span>
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="rdo-4" class="btn-radio">
                      <input type="radio" id="rdo-4" class="card_payment" name="payment_type" value="card_payment">
                           <svg width="20px" height="20px" viewBox="0 0 20 20">
                               <circle cx="10" cy="10" r="9"></circle>
                               <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                               <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                           </svg>
                           <span class="col-blue fw-500">Select 40</span>
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="rdo-5" class="btn-radio">
                      <input type="radio" id="rdo-5" class="card_payment" name="payment_type" value="card_payment">
                           <svg width="20px" height="20px" viewBox="0 0 20 20">
                               <circle cx="10" cy="10" r="9"></circle>
                               <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                               <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                           </svg>
                           <span class="col-blue fw-500">Select 50</span>
               </label>
            </div>
            <div class="common-wrap"></div>
            <div class="test-series">
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check1">
                  <label class="form-check-label" for="example1">Test 01</label>
               </div>
               <div class="form-check form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check2">
                  <label class="form-check-label" for="example2">Test 02</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check3">
                  <label class="form-check-label" for="example3">Test 03</label>
               </div>
               <div class="form-check form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check4">
                  <label class="form-check-label" for="example4">Test 04</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 05</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 06</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 07</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 08</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 09</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 10</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 11</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 12</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 13</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 14</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 15</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 16</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 17</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 18</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 19</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 20</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 21</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 22</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 23</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 24</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 25</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 26</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 27</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 28</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 29</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 30</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 31</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 32</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 33</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 34</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 35</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 36</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 37</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 38</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 39</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 40</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 41</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 42</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 43</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 44</label>
               </div>
               <div class="form-check  form-check-inline ">
                  <input type="checkbox" class="form-check-input" id="Check5">
                  <label class="form-check-label" for="example5">Test 45</label>
               </div>
               <div class="form-group row">
                   <div class="col-11 assign-btn">
                         <button type="button" class="btn btn-outline-primary"><i class="far fa-save save-icon"></i>Assign Tests</button>
                   </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    

    <!-- set Password modal -->
    <div class="modal fade" id="setpassword" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
          <div class="modal-header pb-3">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body" id="password-set-body">
            
          </div>
        </div>
      </div>
    </div>
    
    <!-- users detail modal  -->
    <div class="modal fade" id="userdetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered w-70">
            <div class="modal-content">
                <div class="modal-header pb-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                          <div class="col-12">
                             <div class="profile-img">
                                  <img src="{{ asset('assets/images/profile-img-2.png') }}">
                              </div>
                          </div>
                      <div class="col-12 mt-3 modal-form">
                       <form class="user-form">
                           <div class="form-group row">
                               <label class="col-sm-4 col-form-label">First Name</label>
                               <div class=" form-input col-sm-7">
                                  <input type="text" class="form-control" placeholder="AnkitKumar">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-sm-4 col-form-label">Last Name</label>
                                 <div class=" form-input col-sm-7">
                                      <input type="text" class="form-control" placeholder="Jain">
                                  </div>
                           </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class=" form-input col-sm-8">
                                <input type="email" class="form-control" placeholder="Ankitkumar30557@Gmail.Com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">UserName</label>
                                <div class=" form-input col-sm-7">
                                    <input type="Phone" class="form-control" placeholder="AnkitKumar">
                                </div>
                           </div>
                           <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date of Birth</label>
                                <div class=" form-input col-sm-7">
                                    <input type="Phone" class="form-control" placeholder="26/5/1988">
                                </div>
                           </div>
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Mobile Number</label>
                                    <div class=" form-input col-sm-7">
                                        <input type="email" class="form-control" placeholder="9988774774">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Status</label>
                                    <div class=" form-input col-sm-7">
                                        <input type="email" class="form-control" placeholder="Active">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Country Citizen</label>
                                    <div class=" form-input col-sm-7">
                                        <input type="email" class="form-control" placeholder="India">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Country Residence</label>
                                    <div class=" form-input col-sm-7">
                                        <input type="email" class="form-control" placeholder="India">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Validity</label>
                                    <div class=" form-input col-sm-7">
                                        <input type="email" class="form-control" placeholder="23/6/2021">
                                    </div>
                            </div>
                            <div class="form-group row">
                                   <div class="col-11 btn mt-2">
                                       <button  type="button" class="btn delete-btn btn-outline-primary"><i class="fas fa-trash icon"></i>Delete</button>
                                       <button  type="button" class="btn edit-btn btn-outline-primary"><i class="fas fa-pen icon"></i>Edit</button>
                                       <button  type="button" class="btn shield-btn btn-outline-primary"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class="icon"></a></i>Block</button>
                                   </div>
                            </div>
                     </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit User modal -->
    <div class="modal fade" id="editdetail" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header pb-3">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body" id="edit-user-body"></div>
        </div>
      </div>
    </div>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url_users = "{{ route('users.index', 'type=I') }}";
  var url_students = "{{ route('users.index', 'type=S') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/users.js') }}" defer></script>
@endsection