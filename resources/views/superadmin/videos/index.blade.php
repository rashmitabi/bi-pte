@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Videos</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('videos.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Videos</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="videos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Video Title</th>
                            <th>Section</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
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
                <div class="modal-body">
                    <form class="form mt-4 ml-3" method="post">
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Title</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control" name="title" placeholder="Video Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Link</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control" name="title" placeholder="Youtube Video Link">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                                <input type="checkbox" id="status" name="status" value="Y" /><label
                                    for="status">Status</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="submit" class="btn btn-outline-primary"><i
                                        class="far fa-save save-icon"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('videos.index') }}";
</script>
<script src="{{ asset('assets/js/videos.js') }}" defer></script>
@endsection