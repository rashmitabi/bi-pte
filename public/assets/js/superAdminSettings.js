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
        
        $('#adminEmailError').text('');

        $('#customerEmailError').text('');

        $('#companyInvoiceError').text('');

        $('#companyGstError').text('');

        $('#hsnCodeError').text('');

        $('#stgstError').text('');

        $('#cgstError').text('');

        $('#igstError').text('');

        //$('#signatureError').text('');

        var url                     = $(this).attr("data-url");

        var currency                = $("#currency").val();

        var admin_email_address     = $("input[name=admin_email_address]").val();

        var customer_email_address  = $("input[name=customer_email_address]").val();

        var company_invoice_address = $("#company_invoice_address").val();

        var company_gst_number      = $("input[name=company_gst_number]").val();

        var hsn_code                = $("input[name=hsn_code]").val();

        var stgst                   = $("input[name=stgst]").val();

        var cgst                    = $("input[name=cgst]").val();

        var igst                    = $("input[name=igst]").val();

        //var digital_signature       = $('#digital_signature').prop('files')[0];

        //console.log(digital_signature);
        $.ajax({

            type:'POST',
 
            url :url,
 
            data:{  _token:CSRF_TOKEN,
                    currency                :currency,
                    admin_email_address     :admin_email_address,
                    customer_email_address  :customer_email_address,
                    company_invoice_address :company_invoice_address,
                    company_gst_number      :company_gst_number,
                    hsn_code                :hsn_code,
                    stgst                   :stgst,
                    cgst                    :cgst,
                    igst                    :igst
                },
            success:function(data){
                 window.location.reload();
            },
            error: function(response) {
                 $('#currencyError').text(response.responseJSON.errors.currency);
                 $('#adminEmailError').text(response.responseJSON.errors.admin_email_address);
                 $('#customerEmailError').text(response.responseJSON.errors.customer_email_address);
                 $('#companyInvoiceError').text(response.responseJSON.errors.company_invoice_address);
                 $('#companyGstError').text(response.responseJSON.errors.company_gst_number);
                 $('#hsnCodeError').text(response.responseJSON.errors.hsn_code);
                 $('#stgstError').text(response.responseJSON.errors.stgst);
                 $('#cgstError').text(response.responseJSON.errors.cgst);
                 $('#igstError').text(response.responseJSON.errors.igst);
                 //$('#signatureError').text(response.responseJSON.errors.digital_signature);
             }
        });
    });
});