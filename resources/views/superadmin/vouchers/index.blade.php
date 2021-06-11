@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Vouchers</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Voucher</button>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="vouchers" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Voucher Name</th>
                            <th>Voucher Code</th>
                            <th>Discount Price</th>
                            <th>Voucher Type</th>
                            <th>Created Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Test Voucher 1</td>
                            <td>V1001</td>
                            <td>200</td>
                            <td>Institute</td>
                            <td>23/01/2021</td>
                            <td>23/01/2021</td>
                            <td>Active</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvouchers"><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Test Voucher 1</td>
                            <td>V1001</td>
                            <td>200</td>
                            <td>Institute</td>
                            <td>23/01/2021</td>
                            <td>23/01/2021</td>
                            <td>Active</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Test Voucher 1</td>
                            <td>V1001</td>
                            <td>200</td>
                            <td>Institute</td>
                            <td>23/01/2021</td>
                            <td>23/01/2021</td>
                            <td>Active</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Test Voucher 1</td>
                            <td>V1001</td>
                            <td>200</td>
                            <td>Institute</td>
                            <td>23/01/2021</td>
                            <td>23/01/2021</td>
                            <td>Active</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editvouchers" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form mt-4 ml-3" method="post" action="{{ route('subscription.store')}}">
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Voucher Name</label>
                            <div class="col-8">
                                <input type="text" class="form-control "name="title" placeholder="Enter Voucher Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Voucher Code</label>
                            <div class="col-8">
                                <input type="text" class="form-control "name="title" placeholder="Enter Voucher Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Voucher Type</label>
                            <div class="col-8">
                                <select class="user-type custom-select" name="role_id">
                                    <option selected disabled>Select Voucher Type</option>
                                    <option value="1">Student</option>
                                    <option value="2">Institute</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Voucher Price</label>
                            <div class="col-8">
                                <input type="text" class="form-control " name="students_allowed" placeholder="Enter Voucher Price">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-4 col-form-label ">Voucher Expiry Date</label>
                        <div class="col-8">
                            <input type="date" class="form-control " placeholder="Select Voucher Expiry Date">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Status</label>
                            <div class="col-8 toggle-switch">
                                <input type="checkbox" id="video" name="videos" value="Y" /><label for="video">Status</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 save-btn">
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