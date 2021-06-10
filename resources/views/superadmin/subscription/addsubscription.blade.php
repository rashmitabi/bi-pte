@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add Subscription</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="form" method="post" action="{{ route('subscription.store')}}">
                {!! Form::open(array('route' => 'subscription.store','method'=>'POST','class'=>'form')) !!}
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Subscription Title</label>
                        <div class="col-7">
                            <input type="text" class="form-control "name="title" placeholder="Enter Subscription Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Description</label>
                        <div class="col-7">
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                rows="3">Enter Description</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Role</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="role_id">
                                <option selected disabled>Select User Type</option>
                                <option value="1">Student</option>
                                <option value="2">Institute</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Number Of Students Allowed</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="students_allowed" placeholder="Enter Number Of Students Allowed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Monthly Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="monthly_price" placeholder="Enter Monthly Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Quarterly Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="quarterly_price" placeholder="Enter Quarterly Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Half Yearly Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="halfyearly_price" placeholder="Enter Half Yearly Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Annually Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="annually_price" placeholder="Enter Annually Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">White Labelling Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="white_labelling_price" placeholder="White Labelling Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Mock Tests</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="mock_tests" placeholder="Number Of Mock Tests Allowed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Practice Tests</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="practice_tests" placeholder="Number Of Practice Tests Allowed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Can Add Videos?</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="video" name="videos" value="Y" /><label for="video">Toggle</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Can Add Prediction Files?</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="files" name="prediction_files" value="Y" /><label for="files">Toggle</label>
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
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</div>
@endsection