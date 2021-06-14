@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Module</h1>
            </div>
        </div>
    </section>
    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 left p-0">
                <table id="module" class="table table-striped table-bordered dt-responsive nowrap common"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></th>
                            <th>SR No</th>
                            <th>Module Name</th>
                            <th>Module Slug</th>
                            <th>Module status</th>
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
  var url="{{ route('modules.index') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/modules.js') }}" defer></script>
@endsection
