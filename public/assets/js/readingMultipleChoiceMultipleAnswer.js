$(document).ready(function() {
    $('#mutli_choice').validate({ 
        rules: {
            editor1:{
                required: true
            },
            options_title: {
                required: true
            },
        },
        messages : {
            editor1: {
                required: "description is required"
            },
            options_title: {
                required: "options title is required"
            }
        },
        submitHandler: function(form) {
            console.log(section_id);
            $.ajax({
                type : 'POST',
                url : url,
                data : $('form').serialize(),
                success: function(result){
                    console.log(result);
                    $('#head').text(result.status);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //alert(xhr.status);
                    //alert(thrownError);
                }
            });
        }
    });
});