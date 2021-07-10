@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 left">
                <h1 class="title mb-4">Manage Devices Log</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
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
                    
                </table>
            </div>
        </div>
    </section>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('device.index') }}";
</script>
<script src="{{ asset('assets/js/deviceLogs.js') }}" defer></script>
@endsection