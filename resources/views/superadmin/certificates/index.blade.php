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
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
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
                <div class="modal-body">
                    <form class="form mt-4">
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Listening</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Speaking</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Reading</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Writing</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Grammer</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Oral Fluency</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Pronunciation</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Spelling</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Vacabulary</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Written Discourse</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Overall Score</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                                <button type="button" class="btn btn-outline-primary"><i
                                        class="far fa-save save-icon"></i>Save Certificate</button>
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
  var url="{{ route('certificates.index') }}";
</script>
<script src="{{ asset('assets/js/certificates.js') }}" defer></script>
@endsection