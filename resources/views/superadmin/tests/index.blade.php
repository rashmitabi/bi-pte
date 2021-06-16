@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Test</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New Test</button>
            </div>
        </div>
    </section>

    <section class="top-title-button mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <div class="tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-practice-tab" data-toggle="tab"
                                href="#nav-practice" role="tab" aria-controls="nav-practice"
                                aria-selected="true">Practice Test</a>
                            <a class="nav-item nav-link" id="nav-mock-tab" data-toggle="tab" href="#nav-mock" role="tab"
                                aria-controls="nav-mock" aria-selected="false">Mock Test</a>
                        </div>
                    </nav>
                    <div class="tab-content white-bg " id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-practice" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <table id="practice_test" class="table table-striped table-bordered dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Test Name</th>
                                        <th>Test Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Test2</td>
                                        <td>Subject2</td>
                                        <td>
                                            <ul class="actions-btns">
                                                <li class="action"><a href="#"><i class="fas fa-question"></i></a></li>
                                                <li class="action" data-toggle="modal" data-target="#edit"><a
                                                        href="#"><i class="fas fa-pen"></i></a></li>
                                                <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                                <li class="action shield"><a href="#"><img
                                                            src="{{ asset('assets/images/icons/blocked.svg') }}"
                                                            class=""></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Test2</td>
                                        <td>Subject2</td>
                                        <td>
                                            <ul class="actions-btns">
                                                <li class="action"><a href="#"><i class="fas fa-question"></i></a></li>
                                                <li class="action" data-toggle="modal" data-target="#editvideos"><a
                                                        href="#"><i class="fas fa-pen"></i></a></li>
                                                <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                                <li class="action shield"><a href="#"><img
                                                            src="{{ asset('assets/images/icons/blocked.svg') }}"
                                                            class=""></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Test2</td>
                                        <td>Subject2</td>
                                        <td>
                                            <ul class="actions-btns">
                                                <li class="action"><a href="#"><i class="fas fa-question"></i></a></li>
                                                <li class="action" data-toggle="modal" data-target="#editvideos"><a
                                                        href="#"><i class="fas fa-pen"></i></a></li>
                                                <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                                <li class="action shield"><a href="#"><img
                                                            src="{{ asset('assets/images/icons/blocked.svg') }}"
                                                            class=""></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Test2</td>
                                        <td>Subject2</td>
                                        <td>
                                            <ul class="actions-btns">
                                                <li class="action"><a href="#"><i class="fas fa-question"></i></a></li>
                                                <li class="action" data-toggle="modal" data-target="#editvideos"><a
                                                        href="#"><i class="fas fa-pen"></i></a></li>
                                                <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                                <li class="action shield"><a href="#"><img
                                                            src="{{ asset('assets/images/icons/blocked.svg') }}"
                                                            class=""></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                        <div class="tab-pane white-bg  fade" id="nav-mock" role="tabpanel"
                            aria-labelledby="nav-mock-tab">
                            asdad
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection


<!-- edit modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
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
        </div>
    </div>