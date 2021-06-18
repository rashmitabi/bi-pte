@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 left">
                <h1 class="title mb-4">Transactions</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="transactions" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>User Role</th>
                            <th>Amount</th>
                            <th>Subscription Package</th>
                            <th>Voucher Code</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Transaction Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute </td>
                            <td>Institute</td>
                            <td>25000</td>
                            <td>Demo Package 3</td>
                            <td>Not Applied</td>
                            <td>Online Payment</td>
                            <td>Active</td>
                            <td>T1006</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute </td>
                            <td>Institute</td>
                            <td>25000</td>
                            <td>Demo Package 3</td>
                            <td>Not Applied</td>
                            <td>Online Payment</td>
                            <td>Active</td>
                            <td>T1006</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute </td>
                            <td>Institute</td>
                            <td>25000</td>
                            <td>Demo Package 3</td>
                            <td>Not Applied</td>
                            <td>Online Payment</td>
                            <td>Active</td>
                            <td>T1006</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Study Care Institute </td>
                            <td>Institute</td>
                            <td>25000</td>
                            <td>Demo Package 3</td>
                            <td>Not Applied</td>
                            <td>Online Payment</td>
                            <td>Active</td>
                            <td>T1006</td>
                        </tr>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection