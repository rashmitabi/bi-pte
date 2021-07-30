@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Email Template</h1>
            </div>
            @if(checkPermission('add_email_templates'))
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('branchadmin-email.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New Email Template</button>
                </a>
            </div>
            @endif
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->

                <table id="email" class="table table-striped table-bordered dt-responsive nowrap common"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Template Name</th>
                            <th>Email Subject</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editemail" tabindex="-1" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="email-edit-body">
                  <form class="form mt-4 ml-3">
                     <div class="form-group row">
                           <label class="col-4 col-form-label ">Template Name</label>
                           <div class="col-8">
                              <input type="text" class="form-control " placeholder="Enter Subscription Title">
                           </div>
                     </div>
                     <div class="form-group row">
                           <label class="col-4 col-form-label ">Email Subject</label>
                           <div class="col-8">
                              <input type="email" class="form-control " placeholder="Enter Email Subject">
                           </div>
                     </div>

                     <div class="form-group row">
                           <label class="col-12 col-form-label pt-0">Email Body</label>
                           <div class="col-12">
                              <textarea name="editor23" id="editor23"></textarea>
                           </div>
                     </div>

                     <div class="form-group row">
                           <label class="col-4 col-form-label ">Status</label>
                           <div class="col-7 toggle-switch">
                              <input type="checkbox" id="files" /><label for="files">Status</label>
                           </div>
                     </div>

                     <div class="form-group row">
                           <div class="col-12 save-btn">
                              <button type="button" class="btn btn-outline-primary"><i
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
  var url="{{ route('branchadmin-email.index') }}";
</script>
<script src="{{ asset('assets/js/emailTemplates.js') }}" defer></script>
@endsection