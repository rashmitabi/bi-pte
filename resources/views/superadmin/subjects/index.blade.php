@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Subject</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('subjects.create')}}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Subject</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="subjects" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Subject Name</th>
                            <th>Status</th>
                            <th>Total Test</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>IELTS</td>
                            <td>Active</td>
                            <td>5</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editsubjects"><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>IELTS</td>
                            <td>Active</td>
                            <td>5</td>
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
                            <td>IELTS</td>
                            <td>Active</td>
                            <td>5</td>
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
                            <td>IELTS</td>
                            <td>Active</td>
                            <td>5</td>
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
    <div class="modal fade" id="editsubjects" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form mt-4" method="post">
                        <div class="form-group row">
                            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Subject Name</label>
                            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                                <input type="text" class="form-control " name="title" placeholder="Enter Subject Name">
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