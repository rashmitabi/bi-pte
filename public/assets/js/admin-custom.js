$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
      $('#content').toggleClass("full_content");
  });
});

$(document).ready(function() {
    $('#example').DataTable({
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
    $("div.toolbar").html('Manage Subscription');
} );

// $(document).ready(function(){
//     $("#sidebar").click(function(){
//       $(".content").addClass();
//     });
//     $("#sidebar").click(function(){
//       $(".content").removeClass();
//     });
//   });
