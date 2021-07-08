@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 left">
                <h1 class="title mb-4">Certificate</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="certificates" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Student Name</th>
                            <th>Test Name</th>
                            <!-- <th>Attempted Date</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editcertificates" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Generate Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="certificate-edit-body">
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('certificates.index') }}";
</script>
<script src="{{ asset('assets/js/waitMe.min.js') }}"></script>
<script src="{{ asset('assets/js/certificates.js') }}" defer></script>
@endsection