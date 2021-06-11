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
} );

// $(document).ready(function(){
//     $("#sidebar").click(function(){
//       $(".content").addClass();
//     });
//     $("#sidebar").click(function(){
//       $(".content").removeClass();
//     });
//   });


