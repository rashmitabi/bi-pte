@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Subscription</h1>
            </div>
            <div class="col-12 col-md-12 col-xl-4 col-sm-4 right">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    Subscription</button>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                            <td>action</td>
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
                            <td>action</td>
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
                            <td>action</td>
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
                            <td>action</td>
                        </tr>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection