@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
   <section class="top-title-button mb-3">
      <div class="row mx-0 align-items-center">
         <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
             <h1 class="title mb-4">Manage Module</h1>
         </div>
         <div class="col-12 col-md-12 col-xl-4 col-sm-4 right">
             <button type="button" class="btn btn-primary" onclick="location.href ='{{ route('modules.create') }}'"><i class="fas fa-plus-circle mr-1"></i> New
                 Module</button>
         </div>
      </div>
   </section>
   <section class="top-title-button white-bg remove-main-margin mb-3">
      <div class="row mx-0 align-items-center">
         <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
            <table id="module" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
               <thead>
                  <tr>
                     <th> <input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"> </th>
                     <th>Sr No</th>
                     <th>Module Name</th>
                     <th>Module slug</th>
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
<script type="text/javascript">
   var table = $('#module').DataTable({
      language: {
         search: '',
         searchPlaceholder: 'Search by module name, slug, created date, status',
         "sLengthMenu": '<select name="subscription_length">'+
               '<option value="10">10 Per Page</option>'+
               '<option value="20">20 Per Page</option>'+
               '<option value="30">30 Per Page</option>'+
               '<option value="40">40 Per Page</option>'+
               '<option value="50">50 Per Page</option>'+
               '<option value="-1">All</option>'+
            '</select>',
         paginate: {
            next: '<i class="fas fa-chevron-right"></i>', // or '→'
            previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
         }
      },
      "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'<'col-sm-12 col-md-12'p>>",
      processing: true,
      serverSide: true,
      ajax: "{{ route('modules.index') }}",
      columns: [
         {data: 'checkbox', name: 'checkbox'},
         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
         {data: 'module_name', name: 'module_name'},
         {data: 'module_slug', name: 'module_slug'},
         {data: 'status', name: 'status'},
         {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
   });
   $("#module_wrapper div.toolbar").html('Manage Module');
</script>
@endsection
