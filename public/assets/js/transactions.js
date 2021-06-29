$(document).ready(function() {

    $('body').on('click','.download_invoice',function(){
        //var id = $(this).attr('data-id');
        var apiUrl = $(this).attr('data-url');
        $.ajax({
               url: apiUrl,
               type:'GET',
               success:function(data) {
                   console.log(data);
               },
           });
    });


    $('#transactions').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by user name, role, amount, subscription package, status",
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
           {data: 'role', name: 'role'},
           {data: 'amount', name: 'amount'},
           {data: 'package', name: 'package'},
           {data: 'voucher', name: 'voucher'},
           {data: 'method', name: 'method'},
           {data: 'transaction_id', name: 'transaction_id'},
           {data: 'created', name: 'created'},
           {data: 'status', name: 'status'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $("#transactions_wrapper div.toolbar").html('Transactions');

});