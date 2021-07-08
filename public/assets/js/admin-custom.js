$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
      $('#content').toggleClass("full_content");
  });
});

$(document).ready(function() {
    //use for multiple select option
    //$('select').selectpicker();

    //Use for ckeditor than add .ckeditor class in textarea
    $(".ckeditor").each(function(_, ckeditor) {

        var editor = CKEDITOR.instances[name];
        for(name in CKEDITOR.instances)
        {
            CKEDITOR.instances[name].destroy();
            CKEDITOR.replace(name);
        }
        
    }); 
    
    /*$('#subscription').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by subscription name, price, created date, status, type",
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
    });
    $("#subscription_wrapper div.toolbar").html('Manage Subscription');*/

    /*$('#device').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by browser name, user name",
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
    });*/
    //$("#device_wrapper div.toolbar").html('Manage Device Log');

//     $('#users').DataTable({
//         language: {
//             search: '',
//             searchPlaceholder: "Search by name, email & mobile number",
//             "sLengthMenu": '<select>'+
//                 '<option value="10">10 Per Page</option>'+
//                 '<option value="20">20 Per Page</option>'+
//                 '<option value="30">30 Per Page</option>'+
//                 '<option value="40">40 Per Page</option>'+
//                 '<option value="50">50 Per Page</option>'+
//                 '<option value="-1">All</option>'+
//                 '</select>',
//             paginate: {
//                 next: '<i class="fas fa-chevron-right"></i>', // or '→'
//                 previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
//             }
//         },
//         "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-3 top-search'f><'col-sm-12 col-md-4 header_filter'><'col-sm-12 col-md-3 top-pagination'l>>" +
//         "<'row'<'col-sm-12't>>" +
//         "<'row'<'col-sm-12 col-md-12'p>>",
//     });
//     $("#users_wrapper div.toolbar").html('Registered Users');
//     $('<div class="pull-right">' +
//       '<select class="form-control">'+
//       '<option value="volvo">Send Email</option>'+
//       '<option value="saab">Change Password</option>'+
//       '<option value="opel">BLock/unblock Users</option>'+
//       '<option value="opel">Export Users</option>'+
//       '<option value="opel">Assign Practice Tests</option>'+
//       '<option value="opel">Assign Mock Tests</option>'+
//       '</select>' +
//       '</div>').appendTo("#users_wrapper .header_filter");

// $(".dataTables_filter label").addClass("pull-right");

    // $('#students').DataTable({
    //     language: {
    //         search: '',
    //         searchPlaceholder: "Search by name, email & mobile number",
    //         "sLengthMenu": '<select>'+
    //             '<option value="10">10 Per Page</option>'+
    //             '<option value="20">20 Per Page</option>'+
    //             '<option value="30">30 Per Page</option>'+
    //             '<option value="40">40 Per Page</option>'+
    //             '<option value="50">50 Per Page</option>'+
    //             '<option value="-1">All</option>'+
    //             '</select>',
    //         paginate: {
    //             next: '<i class="fas fa-chevron-right"></i>', // or '→'
    //             previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
    //         }
    //     },
    //     "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
    //     "<'row'<'col-sm-12't>>" +
    //     "<'row'<'col-sm-12 col-md-12'p>>",
    // });
    // $("#students_wrapper div.toolbar").html('Registered Users');
    // $("#device_wrapper div.toolbar").html('Manage Device Log');  
    
    /*$('#email').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by template  name, email subject, created date, status",
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
    });
    $("#email_wrapper div.toolbar").html('Email Template');*/  

    /*$('#vouchers').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by voucher name, voucher type, discount price, created date, expiry date",
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
    });
    $("#vouchers_wrapper div.toolbar").html('Vouchers');*/

       
    $('#questions').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by video title, created by, date",
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
    });
    $("#questions_wrapper div.toolbar").html('Practice Questions'); 

        /*$('#practice_test').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by test name, test subject",
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
    });
    $("#practice_test_wrapper div.toolbar").html('Manage Test');*/

    // $('#results').DataTable({
    //     language: {
    //         search: '',
    //         searchPlaceholder: "Search by test name, test subject,test type,user name",
    //         "sLengthMenu": '<select>'+
    //             '<option value="10">10 Per Page</option>'+
    //             '<option value="20">20 Per Page</option>'+
    //             '<option value="30">30 Per Page</option>'+
    //             '<option value="40">40 Per Page</option>'+
    //             '<option value="50">50 Per Page</option>'+
    //             '<option value="-1">All</option>'+
    //             '</select>', 
    //         paginate: {
    //             next: '<i class="fas fa-chevron-right"></i>', // or '→'
    //             previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
    //         }
    //     }, 
    //     "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
    //     "<'row'<'col-sm-12't>>" +
    //     "<'row'<'col-sm-12 col-md-12'p>>",
    // });
    // $("#results_wrapper div.toolbar").html('Manage Test Results'); 


    $('#activitylog').DataTable({
        language: {
            
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
    });
    $("#activitylog_wrapper div.toolbar").html(''); 

    $('#transaction').DataTable({
        language: {
            
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
    });
    $("#transaction_wrapper div.toolbar").html(''); 

    $('#institute').DataTable({
        language: {
            
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
    });
    $("#institute_wrapper div.toolbar").html(''); 

    $('#near-to-expire').DataTable({
        language: {
            
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
    });
    $("#near-to-expire_wrapper div.toolbar").html(''); 

    $('#expired').DataTable({
        language: {
            
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
    });
    $("#expired_wrapper div.toolbar").html(''); 

    $('#ranking').DataTable({
        language: {
            
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
    });
    $("#ranking_wrapper div.toolbar").html(''); 

    // $('#managemodule').DataTable({
    //     language: {
    //         search: '',
    //         searchPlaceholder: "Search by module name",
    //         "sLengthMenu": '<select>'+
    //             '<option value="10">10 Per Page</option>'+
    //             '<option value="20">20 Per Page</option>'+
    //             '<option value="30">30 Per Page</option>'+
    //             '<option value="40">40 Per Page</option>'+
    //             '<option value="50">50 Per Page</option>'+
    //             '<option value="-1">All</option>'+
    //             '</select>',
    //         paginate: {
    //             next: '<i class="fas fa-chevron-right"></i>', // or '→'
    //             previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
    //         }
    //     },
    //     "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
    //     "<'row'<'col-sm-12't>>" +
    //     "<'row'<'col-sm-12 col-md-12'p>>",
    // });
    // $("#managemodule_wrapper div.toolbar").html('Manage Module');  
    
    // $('#role').DataTable({
    //     language: {
    //         search: '',
    //         searchPlaceholder: "Search by role",
    //         "sLengthMenu": '<select>'+
    //             '<option value="10">10 Per Page</option>'+
    //             '<option value="20">20 Per Page</option>'+
    //             '<option value="30">30 Per Page</option>'+
    //             '<option value="40">40 Per Page</option>'+
    //             '<option value="50">50 Per Page</option>'+
    //             '<option value="-1">All</option>'+
    //             '</select>',
    //         paginate: {
    //             next: '<i class="fas fa-chevron-right"></i>', // or '→'
    //             previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
    //         }
    //     },
    //     "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
    //     "<'row'<'col-sm-12't>>" +
    //     "<'row'<'col-sm-12 col-md-12'p>>",
    // });
    // $("#role_wrapper div.toolbar").html('Manage Role');  

//     ClassicEditor
// 		.create( document.querySelector( '#editor' ), {
// 			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            
// 		} )
// 		.then( editor => {
// 			window.editor = editor;
//             config.extraPlugins = 'sourcedialog';
// config.removePlugins = 'sourcearea';

// 		} )
// 		.catch( err => {
// 			console.error( err.stack );
// 		} );

    $("#editor").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var title = $(this).data('title');
        var token = CSRF_TOKEN;
        if($(this).data('title')){
            $('body').find('.remove-record-model span.module_title').text(title);
        }
        $(".remove-record-model").attr("action",url);        
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor1").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });



    $("#editor2").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor3").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor4").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor5").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor6").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor7").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor8").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor9").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor10").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor11").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor12").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor13").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor14").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });


    $("#editor15").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor16").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor17").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor18").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor19").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });

    $("#editor20").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $('body').on('click','.subscription-edit',function(){
        var id = $(this).data('id');
        var apiUrl = $(this).data('url');
        $.ajax({
            url: apiUrl,
            type:'GET',
            data:{'id' : id},
            beforeSend: function(){
                $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
                $('#sub-edit-body').html(data.html);
            },
        });
    });


    $("#editor21").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End
    $("#editor22").each(function(_, ckeditor) {
        CKEDITOR.replace(ckeditor);
    });
    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    //Delete Model for SuperAdmin End

    $("#email_wrapper div.toolbar").html('Email Template');
    //Delete Model for SuperAdmin start
    $('body').on('click','.delete_modal',function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var token = CSRF_TOKEN;
        $(".remove-record-model").attr("action",url);
        $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
        $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
    });
    $('.remove-data-from-delete-form').click(function() {
      $('body').find('.remove-record-model').find( "input" ).remove();
    });
    $('.modal').click(function() {
      // $('body').find('.remove-record-model').find( "input" ).remove();
    });
    ////Delete Model for SuperAdmin End

    $("form").on("change", ".custom-file-input", function(){ 
        $(this).parent(".custom-file").attr("data-text", $(this).val().replace(/.*(\/|\\)/, '') );
        $(this).next('.custom-file-label').text('');
    });
});

// $(document).ready(function(){
//     $("#sidebar").click(function(){
//       $(".content").addClass();
//     });
//     $("#sidebar").click(function(){
//       $(".content").removeClass();
//     });
//   });

//progress bar
/*$(function(){
  var $ppc = $('.progress-pie-chart'),
    percent = parseInt($ppc.data('percent')),
    deg = 360*percent/100;
  if (percent > 50) {
    $ppc.addClass('gt-50');
  }
  $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
  $('.ppc-percents span').html(percent+'%');
});


$(function(){
    var $ppc1 = $('.progress-pie-chart1'),
      percent = parseInt($ppc1.data('percent')),
      deg = 360*percent/100;
    if (percent > 50) {
      $ppc1.addClass('gt-50');
    }
    $('.ppc-progress-fill1').css('transform','rotate('+ deg +'deg)');
    $('.ppc-percents1 span').html(percent+'%');
  });
  
  $(function(){
    var $ppc2 = $('.progress-pie-chart2'),
      percent = parseInt($ppc2.data('percent')),
      deg = 360*percent/100;
    if (percent > 50) {
      $ppc2.addClass('gt-50');
    }
    $('.ppc-progress-fill2').css('transform','rotate('+ deg +'deg)');
    $('.ppc-percents2 span').html(percent+'%');
  });
  

  $(function(){
    var $ppc3 = $('.progress-pie-chart3'),
      percent = parseInt($ppc3.data('percent')),
      deg = 360*percent/100;
    if (percent > 50) {
      $ppc3.addClass('gt-50');
    }
    $('.ppc-progress-fill3').css('transform','rotate('+ deg +'deg)');
    $('.ppc-percents3 span').html(percent+'%');
  });
  */