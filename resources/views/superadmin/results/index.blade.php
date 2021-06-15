@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Test Results</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="results" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>Test Name</th>
                            <th>Test Type</th>
                            <th>Test Subject</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection