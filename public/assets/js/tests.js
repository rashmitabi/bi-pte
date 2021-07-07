$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*Tests Edit page data start*/
    $('body').on('click','.test-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl, 
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#test-edit-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
            },
            success:function(data) {
                $('#test-edit-body').html(data.html);
            },
        });
    });
    /*Tests Edit page data start*/

    /*Tests update data start*/
    $('body').on('click','.test-update',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $('#typeError').text('');
        $('#nameError').text('');
        $('#subjectError').text('');
        $('#imageError').text('');
        var test_type   = $("#type :selected").val();
        var test_name   = $("input[name=test_name]").val();
        var test_subject= $("#subject :selected").val();
        $.ajax({
            url: apiUrl,
            type:'PATCH',
            data: {_token:CSRF_TOKEN,test_name:test_name,subject:test_subject,type:test_type},
            success:function(data) {
                if(data == 1){
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
                }
            },
            error: function(response) {
                //console.log(response.responseJSON.errors.name);
                    $('#typeError').text(response.responseJSON.errors.type);
                    $('#nameError').text(response.responseJSON.errors.test_name);
                    $('#subjectError').text(response.responseJSON.errors.subject);
                    $('#imageError').text(response.responseJSON.errors.image);
                }
        });
    });

    /*datatable practice test start*/
    var table = $('#practice_test').DataTable({
    language: {
       search: '',
       searchPlaceholder: 'Search by test name, subject, status',
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
    ajax: practiceUrl,
    columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex'},
       {data: 'test_name', name: 'test_name'},
       {data: 'subject', name: 'subject'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    /*datatable practice test end*/

    /*datatable mock test start*/
    var table = $('#mock_test').DataTable({
        language: {
           search: '',
           searchPlaceholder: 'Search by test name, subject, status',
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
        ajax: mockUrl,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'test_name', name: 'test_name'},
           {data: 'subject', name: 'subject'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    /*datatable mock test end*/
    $("#practice_test_wrapper div.toolbar").html('Manage Test');

});