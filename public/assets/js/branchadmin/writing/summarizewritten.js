$(document).ready(function() {
     $('#frm-summarize-written').validate({ 
        ignore: [],
        debug: false,
        rules: {
            editor1:{
                required: function() 
                {
                    return CKEDITOR.instances.editor1.updateElement();
                }
            },
            sample_editor1:{
                required: true
            },
            editor2:{
                required: function() 
                {
                    return CKEDITOR.instances.editor2.updateElement();
                }
            },
            sample_editor2:{
                required: true
            }
        },
        messages : {

            editor1: {
                required: "Paragraph1 is required"
            },
            sample_editor1: {
                required: "Sample Ans1 is required"
            },

            editor2: {
                required: "Paragraph2 is required"
            },
            sample_editor2: {
                required: "Sample Ans2 is required"
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