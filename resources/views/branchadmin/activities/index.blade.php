@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">All Activities</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('branchadmin-dashboard') }}">
                <button type="button" class="btn btn-primary">
                    Dashboard</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="activities" class="table table-striped table-bordered dt-responsive wrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Student</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Date</th>
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
  var url="{{ route('branchadmin-activities.index') }}";
</script>
<script src="{{ asset('assets/js/branchadmin/activities.js') }}" defer></script>
@endsection