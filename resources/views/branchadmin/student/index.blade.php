@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
    <div class="row mx-0 align-items-center">
      <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
        <h1 class="title mb-4">Manage User</h1>
      </div>
      @if(checkPermission('add_student'))
      <div class="col-12 col-md-12 col-xl-4 col-12 col-md-5 col-xl-4 col-sm-12 right">
        <a href="{{ route('branchadmin-students.create') }}"><button type="button" class="btn btn-primary" ><i class="fas fa-plus-circle mr-1"></i> New
              User</button>
        </a>
      </div>
      @endif
    </div>
  </section>
  <section class="top-title-button white-bg remove-main-margin mb-3">
    <div class="row mx-0 align-items-center">
      <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
          <table id="students" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th> <input type="checkbox" class="form-check-input position-relative ml-0" id="checkedAllStudent"> </th>
                        <th>Sr No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Taken Test</th>
                        <th>Action</th>
                    </tr>
                </thead>
          </table>
    </div>
  </section> 

  <!-- Modal -->
  <div class="modal fade" id="result" tabindex="-1" 
      aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header pb-3 bg-light">
          <h5 class="mt-1">Test Results</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body" id="test-results-body">
          
        </div>
      </div>
    </div>
  </div>

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
        <div class="modal-body" id="assign-mock-test-body">
          
        </div>
      </div>
    </div>
  </div>
    

  <div class="modal fade" id="practisetest" tabindex="-1" 
      aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header pb-3 bg-light">
          <h5 class="mt-1">Assign Practise Tests</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body" id="prectice-test-body">
          
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
    
    <!--set user status block and unblock -->
    <div class="modal fade" id="setuserstatus" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
          <div class="modal-header pb-3">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body" id="user-status-update">
              
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
          <div class="modal-body" id="show-user-body"></div>
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

    <div class="modal fade" id="userSendEmail" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header pb-3">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body" id="show-send-email-body"></div>
        </div>
      </div>
    </div>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url_users = "";  
  var permission = "{{checkPermission('manage_student')}}";
  var url_students = "{{ route('branchadmin-students.index') }}";
  var password_url_route = "{{ route('branchadmin-students-showpassword', 'all') }}";
  var change_status_get_model = "{{ route('branchadmin-students-getstatus') }}";
  var change_send_email_get_model = "{{ route('branchadmin-students-getsendemail') }}";
  var change_status_url_route = "{{ route('branchadmin-students-changestatus', 'all') }}";
  var get_multiple_assign_test = "{{ route('branchadmin-students-get-multiple-assign-test') }}";
  var student_export_url_route = "{{ route('branchadmin-students-export') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/branchadmin/users.js') }}" defer></script>
@endsection 