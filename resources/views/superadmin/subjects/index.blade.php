@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Subject</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('subjects.create')}}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Subject</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <table id="subjects" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Subject Name</th>
                            <th>Status</th>
                            <!-- <th>Total Test</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editsubjects" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="subject-edit-body">
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('subjects.index') }}";
</script>
<script src="{{ asset('assets/js/subjects.js') }}" defer></script>
@endsection