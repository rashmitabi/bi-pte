@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                @if(checkPermission('manage_video'))
                <h1 class="title mb-4">Manage Videos</h1>
                @else
                <h1 class="title mb-4">Videos</h1>
                @endif
            </div>
            @if(checkPermission('add_video'))
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('branchadmin-videos.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Videos</button>
                </a>
            </div>
            @endif
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="videos" class="table table-striped table-bordered dt-responsive wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Video Title</th>
                            <th>Video Link</th>
                            <th>Type</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            @if(checkPermission('manage_video'))
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editvideos" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="video-edit-body">
                    Please wait.....
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('branchadmin-videos.index') }}";
  var permission = "{{ checkPermission('manage_video') }}";
</script>
<script src="{{ asset('assets/js/branchadmin/videos.js') }}" defer></script>
@endsection