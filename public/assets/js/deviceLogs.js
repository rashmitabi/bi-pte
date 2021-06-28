$(document).ready(function() {
   //Device logs datatable
   var table = $('#device').DataTable({
    language: {
       search: '',
       searchPlaceholder: 'Search by device user name, browser name, ip address, status',
       "sLengthMenu": '<select name="module_length">'+
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
    ajax: url,
    columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex'},
       {data: 'username', name: 'username'},
       {data: 'browsername', name: 'browsername'},
       {data:'ip_address',name:'ip_address'},
       {data: 'devicename', name: 'devicename'},
       {data: 'status', name: 'status'},
       {data: 'logintime', name: 'logintime'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    $("#device_wrapper div.toolbar").html('Manage Device Log');
});