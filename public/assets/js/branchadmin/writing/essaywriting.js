$(document).ready(function() {
     $('#frm-essay-writting').validate({ 
        ignore: [],
        debug: false,
        rules: {
            essay_title1:{
                required: function() 
                {
                    return CKEDITOR.instances.essay_title1.updateElement();
                }
            },
            sample_essay1:{
                required: function() 
                {
                    return CKEDITOR.instances.sample_essay1.updateElement();
                }
            }
        },
        messages : {
            essay_title1: {
                required: "Paragraph is required"
            },
            sample_essay1:{
                required: "Sample essay is required"
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
                    // $('#head').text(result.status);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //alert(xhr.status);
                    //alert(thrownError);
                }
            });
        }
    }); 
   
});