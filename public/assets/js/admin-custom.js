$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
      $('#content').toggleClass("full_content");
  });
});

$(document).ready(function() {
    $('#subscription').DataTable({
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
    $("#subscription_wrapper div.toolbar").html('Manage Subscription');

    $('#device').DataTable({
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
    });
    $("#device_wrapper div.toolbar").html('Manage Device');

    $('#users').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by name, email & mobile number",
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
    $("#users_wrapper div.toolbar").html('Registered Users');

    $('#students').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by name, email & mobile number",
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
    $("#students_wrapper div.toolbar").html('Registered Users');
    $("#device_wrapper div.toolbar").html('Manage Device Log');  
    
    $('#email').DataTable({
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
    $("#email_wrapper div.toolbar").html('Email Template');  

    $('#vouchers').DataTable({
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
    $("#vouchers_wrapper div.toolbar").html('Vouchers');  

    $('#prediction').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by file title, created by, created date",
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
    $("#prediction_wrapper div.toolbar").html('Manage Prediction Files');  

    $('#videos').DataTable({
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
    $("#videos_wrapper div.toolbar").html('Manage Videos'); 

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

    $('#subjects').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by subject name",
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
    $("#subjects_wrapper div.toolbar").html('Manage Subject'); 

    $('#transactions').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by user  name, user role, amount, subscription package, status",
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
    $("#transactions_wrapper div.toolbar").html('Transactions');

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
    });
    $("#certificates_wrapper div.toolbar").html('Certificate'); 

    $('#practice_test').DataTable({
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
    $("#practice_test_wrapper div.toolbar").html('Manage Test'); 

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
} );

// $(document).ready(function(){
//     $("#sidebar").click(function(){
//       $(".content").addClass();
//     });
//     $("#sidebar").click(function(){
//       $(".content").removeClass();
//     });
//   });


