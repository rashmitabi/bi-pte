$(document).ready(function(){

    $('body').on('click', '.generate_certificate', function(){
        var user_id = $(this).data('user');
        var test_id = $(this).data('test');
        var apiUrl = $(this).data('url');
           // $.ajax({
           //     url: apiUrl,
           //     type:'GET',
           //     data:{'id' : id},
           //     beforeSend: function(){
           //         $('#subject-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
           //     },
           //     success:function(data) {
           //         $('#subject-edit-body').html(data.html);
           //     },
           // });
    });

    $('#certificates').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by student name, test name",
            "sLengthMenu": '<select>'+
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
           {data: 'test_name', name: 'test_name'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $("#certificates_wrapper div.toolbar").html('Certificates'); 

});