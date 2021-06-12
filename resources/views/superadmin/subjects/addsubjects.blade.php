@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add Subject</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="form mt-4 ml-3" method="post">
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Subject Name</label>
                        <div class="col-7">
                            <input type="text" class="form-control "name="title" placeholder="Enter Subject Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Status</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="status" name="status" value="Y" /><label for="status">Toggle</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-11 save-btn">
                            <button type="submit" class="btn btn-outline-primary"><i
                                    class="far fa-save save-icon"></i>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection