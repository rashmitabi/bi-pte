@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Subscription</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Subscription</button>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                @if ($message = Session::get('success'))
                    <p>{{$message}}</p>
                @endif
                <?php Session::forget('success');?>
                @if ($message = Session::get('error'))
                    <p>{{$message}}</p>
                @endif
                <?php Session::forget('error');?>
                <table id="subscription" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Subscription Name</th>
                            <th>Monthly Price</th>
                            <th>Quarterly Price</th>
                            <th>Half Yearly Price</th>
                            <th>Yearly Price</th>
                            <th>White Label Price</th>
                            <th>Students Allowed</th>
                            <th>Mock Test Allowed</th>
                            <th>Practice Test Allowed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Subscription 1</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>30</td>
                            <td>20</td>
                            <td>15</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal"
                                            data-target="#editsubscription"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Subscription 1</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>30</td>
                            <td>20</td>
                            <td>15</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield red"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Subscription 1</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>30</td>
                            <td>20</td>
                            <td>15</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Subscription 1</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>30</td>
                            <td>20</td>
                            <td>15</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editsubscription" tabindex="-1" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form mt-4">
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Subscription Title</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Enter Subscription Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Description</label>
                            <div class="col-8">
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">Enter Description</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Select Role</label>
                            <div class="col-8">
                                <select class="user-type custom-select">
                                    <option selected>Select User Type</option>
                                    <option value="1">Student</option>
                                    <option value="2">Institute</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Number Of Students Allowed</label>
                            <div class="col-8">
                                <input type="email" class="form-control "
                                    placeholder="Enter Number Of Students Allowed">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Monthly Price</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Enter Monthly Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Quarterly Price</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Enter Quarterly Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Half Yearly Price</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Enter Half Yearly Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Annually Price</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Enter Annually Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">White Labelling Price</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="White Labelling Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Mock Tests</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Number Of Mock Tests Allowed">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Practice Tests</label>
                            <div class="col-8">
                                <input type="text" class="form-control " placeholder="Number Of Practice Tests Allowed">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Can Add Videos?</label>
                            <div class="col-8 toggle-switch">
                                <input type="checkbox" id="video" /><label for="video">Toggle</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Can Add Prediction Files?</label>
                            <div class="col-8 toggle-switch">
                                <input type="checkbox" id="files" /><label for="files">Toggle</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Status</label>
                            <div class="col-8 toggle-switch">
                                <input type="checkbox" id="status" /><label for="status">Toggle</label>
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