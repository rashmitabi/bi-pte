function setPriceLabel(){
    var p1 = $( ".voucher-type option:selected" ).val()
    if(p1 != '')
    {
        console.log(p1);
        if(p1 == 'P'){
            $(".voucher-price-label").text("Percentage Price");
        }else{
            $(".voucher-price-label").text("Fixed Price");
        }
    }
}
$(document).ready(function() {
    setPriceLabel();
    //Vouchers Edit page data start
    $('body').on('click','.vouchers-edit',function(){
           var id = $(this).data('id');
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               data:{'id' : id},
               beforeSend: function(){
                   $('#voucher-edit-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
               },
               success:function(data) {
                   $('#voucher-edit-body').html(data.html);
               },
           });
   });
   //Vouchers Edit page data start
   //Vouchers update data start
   $('body').on('click','.voucher-update',function(){
       var id = $(this).data('id');
       var apiUrl = $(this).data('url');
       $('#nameError').text('');
       $('#codeError').text('');
       $('#roleIdError').text('');
       $('#voucherTypeError').text('');
       $('#voucherPriceError').text('');
       $('#validTillError').text('');
       $('#statusError').text('');
       $.ajax({
           url: apiUrl,
           type:'PATCH',
           data: $('form').serialize(),
           success:function(data) {
               if(data == 1){
                   setTimeout(function(){
                       location.reload();
                   }, 2000);
               }
           },
           error: function(response) {
               console.log(response.responseJSON.errors.name);
                   $('#nameError').text(response.responseJSON.errors.name);
                   $('#codeError').text(response.responseJSON.errors.code);
                   $('#roleIdError').text(response.responseJSON.errors.role_id);
                   $('#voucherTypeError').text(response.responseJSON.errors.voucher_type);
                   $('#voucherPriceError').text(response.responseJSON.errors.voucher_price);
                   $('#validTillError').text(response.responseJSON.errors.valid_till);
                   $('#statusError').text(response.responseJSON.errors.status);
               }
       });
   });
   //Vouchers update data end

   //voucher price label change start
   $('body').on('change','.voucher-type',function(){
        var value = $(this).val();
        if(value == 'P'){
            $(".voucher-price-label").text("Percentage Price");
        }else{
            $(".voucher-price-label").text("Fixed Price");
        }
    });
   //voucher price label change end
   var table = $('#vouchers').DataTable({
    language: {
       search: '',
       searchPlaceholder: 'Search by vouchers name, code, created date, status',
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
       {data: 'name', name: 'name'},
       {data: 'code', name: 'code'},
       {data: 'discount_type', name:'discount_type'},
       {data: 'discount_price', name:'discount_price'},
       {data:'created_at',name:'created_at'},
       {data:'valid_till',name:'valid_till'},
       {data: 'status', name: 'status'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    $("#vouchers_wrapper div.toolbar").html('Vouchers');
});