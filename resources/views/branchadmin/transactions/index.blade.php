@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 left">
                <h1 class="title mb-4">My Payments</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="transactions" class="table table-striped table-bordered dt-responsive wrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Subscription Package</th>
                            <th>Amount</th>
                            <th>Voucher Code</th>
                            <th>Payment Method</th>                            
                            <th>Transaction Id</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        </div>
    </section>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('branchadmin-transactions.index') }}";
</script>
<script src="{{ asset('assets/js/institute_payments.js') }}" defer></script>
@endsection