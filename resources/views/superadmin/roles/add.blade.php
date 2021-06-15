@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
                <h1 class="title mb-4">Add Role</h1>
            </div>
        </div>
    </section>
    <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="form mt-4 ml-3">
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Role Name</label>
                       <div class="col-8">
                          <input type="text" class="form-control " placeholder="Enter Role Name">
                      </div>
                   </div>
                   <div class="form-group row">
                      <label class="col-4 col-form-label ">Permissions</label>
                       <div class="col-8">
                          <select class="user-type custom-select">
                              <option selected>Select Permissions</option>
                              <option value="1">Add Test</option>
                              <option value="2">Add Videos</option>
                              <option value="2">Take Test</option>
                              <option value="2">View Videos</option>
                              <option value="2">Mock Test</option>
                              <option value="2">Practice Test</option>
                              <option value="2">Practice Question</option>
                              <option value="2">Add Predictions File</option>
                           </select>
                      </div>
                   </div>
                   <div class="form-group row">
                      <label  class="col-4 col-form-label ">Status</label>
                       <div class="col-8 toggle-switch">
                       <input type="checkbox" id="switch" /><label for="switch">Toggle</label>
                      </div>
                   </div>
                   <div class="form-group row">
                       <div class="col-12 save-btn">
                         <button  type="button" class="btn btn-outline-primary"><i class="far fa-save save-icon"></i>Save Role</button>
                      </div>
                   </div>
                </form>      
            </div>
        </div>
    </section>

</div>
@endsection