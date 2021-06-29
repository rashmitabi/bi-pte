$(document).ready(function() {
    /*superadmin change password*/
    $(".change-password").click(function(e){
        
        e.preventDefault();
        
        $('#passwordError').text('');
        
        $('#confirmPass').text('');
        
        var url      = $(this).attr("data-url");

        var password = $("input[name=password]").val();

        var confirm_password = $("input[name=confirm_password]").val();

        $.ajax({

           type:'POST',

           url :url,

           data:{_token:CSRF_TOKEN,password:password,confirm_password:confirm_password},

           success:function(data){
                window.location.reload();
           },
           error: function(response) {
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#confirmPass').text(response.responseJSON.errors.confirm_password);
            }
        });

    });

    /*superadmin settings save and update*/
    $(".save-setting").click(function(e){
        
        e.preventDefault();
        
        $('#currencyError').text('');
        
        $('#adminEmail').text('');

        $('#customerEmail').text('');
        
        var url                     = $(this).attr("data-url");

        var currency                = $("#currency").val();

        var admin_email_address     = $("input[name=admin_email_address]").val();

        var customer_email_address  = $("input[name=customer_email_address]").val();


        $.ajax({

            type:'POST',
 
            url :url,
 
            data:{  _token:CSRF_TOKEN,
                    currency:currency,
                    admin_email_address:admin_email_address,
                    customer_email_address:customer_email_address
                },
            success:function(data){
                 window.location.reload();
            },
            error: function(response) {
                 $('#currencyError').text(response.responseJSON.errors.currency);
                 $('#adminEmail').text(response.responseJSON.errors.admin_email_address);
                 $('#customerEmail').text(response.responseJSON.errors.customer_email_address);
             }
        });
    });
});