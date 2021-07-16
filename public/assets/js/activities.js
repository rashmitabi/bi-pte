$(document).ready(function() {
    //Branchadmin Activity List
        var table = $('#activities').DataTable({
        language: {
           search: '',
           searchPlaceholder: 'Search by student,title,body...',
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
           {data: 'user', name: 'user'},
           {data: 'role', name: 'role'},
           {data: 'title', name: 'title'},
           {data: 'message', name: 'message'},
           {data: 'created date', name: 'created date'},
        ]
        });
        $("#activities_wrapper div.toolbar").html('All Activity Logs');
});
