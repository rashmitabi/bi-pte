 var table = $('#users').DataTable({
      language: {
            search: '',
            searchPlaceholder: "Search by name, email & mobile number",
            "sLengthMenu": '<select name="users_length">'+
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
      ajax: url_users,
      columns: [
         {data: 'checkbox', name: 'checkbox'},
         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
         {data: 'module_name', name: 'module_name'},
         {data: 'module_slug', name: 'module_slug'},
         {data: 'status', name: 'status'},
         {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
   });
   $("#users_wrapper div.toolbar").html('Registered Users');


   $('#students').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by name, email & mobile number",
            "sLengthMenu": '<select name="students_length">'+
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
      ajax: url_students,
      columns: [
         {data: 'checkbox', name: 'checkbox'},
         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
         {data: 'module_name', name: 'module_name'},
         {data: 'module_slug', name: 'module_slug'},
         {data: 'status', name: 'status'},
         {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
    $("#students_wrapper div.toolbar").html('Registered Users');