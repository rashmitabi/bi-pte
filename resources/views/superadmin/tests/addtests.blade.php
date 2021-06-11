@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Test</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="form mt-4 ml-3" method="post" action="{{ route('subscription.store')}}">
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Test Type</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="role_id">
                                <option selected disabled>Select Test Type</option>
                                <option value="1">Student</option>
                                <option value="2">Institute</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Test Name</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="students_allowed"
                                placeholder="Enter Test Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Subject</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="role_id">
                                <option selected disabled>Select Subject Type</option>
                                <option value="1">Student</option>
                                <option value="2">Institute</option>
                            </select>
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