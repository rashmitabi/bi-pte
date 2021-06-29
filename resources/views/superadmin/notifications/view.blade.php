@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Notification Details</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <a href="{{ route('superadmin-notifications') }}">
                <button type="button" class="btn btn-primary">
                    Back</button>
                </a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <tr>
                        <td>Title</td>
                        <td>{{ $notification->title }}</td>
                    </tr>
                    <tr>
                        <td>Body</td>
                        <td>{{ $notification->body }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js-hooks')

@endsection