@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Roles</h1>
            </div>
            <div class="col-12 col-md-12 col-xl-4 col-sm-4 right">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New Role</button>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->

                <table id="role" class="table table-striped table-bordered dt-responsive nowrap common"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>User Role</th>
                            <th>Permissions</th>
                            <th>Total Users</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Institute</td>
                            <td>Add Test,Add Videos,Take Test,View Videos</td>
                            <td>2</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target=""><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Institute</td>
                            <td>Add Test,Add Videos,Take Test</td>
                            <td>10</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target=""><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Institute</td>
                            <td>Add Test,Add Videos,Take Test</td>
                            <td>10</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target=""><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Students</td>
                            <td>Take Test,View Videos</td>
                            <td>30</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target=""><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Students</td>
                            <td>Take Test,View Videos</td>
                            <td>30</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target=""><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action bg-danger"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection