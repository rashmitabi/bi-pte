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
                <a href="{{ route('roles.create') }}"><button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New Role</button></a>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
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
                </table>
            </div>
        </div>
    </section>

</div>
@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('roles.index') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/roles.js') }}" defer></script>
@endsection