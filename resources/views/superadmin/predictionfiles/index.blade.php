@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Prediction Files</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('predictionfiles.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New Prediction
                    Files</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="prediction" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Prediction File Title</th>
                            <th>Prediction File URL</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Answer Short Question December Prediction-1</td>
                            <td>Https://Australianacademy.S3.Ap-South-1.Amazonaws.Com/ANSWER SHORT QUESTION DECEMBER
                                PREDICTION-02-12-2020.Docx</td>
                            <td>23/01/2021</td>
                            <td>Super Admin</td>
                            <td>Active</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editprediction"><a
                                            href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Answer Short Question December Prediction-1</td>
                            <td>Https://Australianacademy.S3.Ap-South-1.Amazonaws.Com/ANSWER SHORT QUESTION DECEMBER
                                PREDICTION-02-12-2020.Docx</td>
                            <td>23/01/2021</td>
                            <td>Super Admin</td>
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
                            <td>Answer Short Question December Prediction-1</td>
                            <td>Https://Australianacademy.S3.Ap-South-1.Amazonaws.Com/ANSWER SHORT QUESTION DECEMBER
                                PREDICTION-02-12-2020.Docx</td>
                            <td>23/01/2021</td>
                            <td>Super Admin</td>
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
                            <td>Answer Short Question December Prediction-1</td>
                            <td>Https://Australianacademy.S3.Ap-South-1.Amazonaws.Com/ANSWER SHORT QUESTION DECEMBER
                                PREDICTION-02-12-2020.Docx</td>
                            <td>23/01/2021</td>
                            <td>Super Admin</td>
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
    <div class="modal fade" id="editprediction" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form mt-4 ml-3" method="post">
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Prediction File Title</label>
                            <div class="col-8">
                                <input type="text" class="form-control "name="title" placeholder="Enter Prediction File Title">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label  class="col-4 col-form-label ">Upload Prediction File</label>
                        <div class="col-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Please Upload Prediction File</label>
                            </div>
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label ">Status</label>
                            <div class="col-8 toggle-switch">
                                <input type="checkbox" id="status" name="status" value="Y" /><label for="status">Status</label>
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