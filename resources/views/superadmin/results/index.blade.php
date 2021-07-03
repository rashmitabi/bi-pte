@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
 
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Test Results</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="results" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>Test Name</th>
                            <th>Test Type</th>
                            <th>Test Subject</th>
                            <th>Total Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="testresults" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-width">
            <div class="modal-content body-bg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body common-wrap" id="result-edit-body">
                    
                </div>
           </div>
       </div>
</div>
@endsection



@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('results.index') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/testresults.js') }}" defer></script>
@endsection
