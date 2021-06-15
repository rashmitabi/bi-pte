$(document).ready(function() {
    //Subscription Edit page data start
    $('body').on('click','.vouchers-edit',function(){
           var id = $(this).data('id');
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               data:{'id' : id},
               beforeSend: function(){
                   $('#voucher-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
               },
               success:function(data) {
                   $('#voucher-edit-body').html(data.html);
               },
           });
   });
   //Subscription Edit page data start
   //Subscription update data start
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
   //Subscription update data end
});