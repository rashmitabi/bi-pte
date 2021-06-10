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
                <form class="form">
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Subscription Title</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Enter Subscription Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Description</label>
                        <div class="col-7">
                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                rows="3">Enter Description</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Role</label>
                        <div class="col-7">
                            <select class="user-type custom-select">
                                <option selected>Select User Type</option>
                                <option value="1">Student</option>
                                <option value="2">Institute</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Number Of Students Allowed</label>
                        <div class="col-7">
                            <input type="email" class="form-control " placeholder="Enter Number Of Students Allowed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Monthly Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Enter Monthly Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Quarterly Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Enter Quarterly Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Half Yearly Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Enter Half Yearly Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Annually Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Enter Annually Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">White Labelling Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="White Labelling Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Mock Tests</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Number Of Mock Tests Allowed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Practice Tests</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Number Of Practice Tests Allowed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Can Add Videos?</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="video" /><label for="video">Toggle</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Can Add Prediction Files?</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="files" /><label for="files">Toggle</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Status</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="status" /><label for="status">Toggle</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-11 save-btn">
                            <button type="button" class="btn btn-outline-primary"><i
                                    class="far fa-save save-icon"></i>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection