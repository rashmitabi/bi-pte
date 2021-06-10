@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left">
                <h1 class="title mb-4">Manage Devices Log</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->

                <table id="device" class="table table-striped table-bordered dt-responsive nowrap common"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>Browser Name</th>
                            <th>IP Address</th>
                            <th>Devices Name</th>
                            <th>Status</th>
                            <th>Login Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute</td>
                            <td>Microsoft Edge</td>
                            <td>123.201.234.106</td>
                            <td>Oppo Mobile</td>
                            <td>Active</td>
                            <td>20-JUN-2020 08:03 AM</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute</td>
                            <td>Microsoft Edge</td>
                            <td>123.201.234.106</td>
                            <td>Oppo Mobile</td>
                            <td>Active</td>
                            <td>20-JUN-2020 08:03 AM</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute</td>
                            <td>Microsoft Edge</td>
                            <td>123.201.234.106</td>
                            <td>Oppo Mobile</td>
                            <td>Active</td>
                            <td>20-JUN-2020 08:03 AM</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action shield"><a href="#"><img
                                                src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute</td>
                            <td>Microsoft Edge</td>
                            <td>123.201.234.106</td>
                            <td>Oppo Mobile</td>
                            <td>Active</td>
                            <td>20-JUN-2020 08:03 AM</td>
                            <td>
                                <ul class="actions-btns">
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