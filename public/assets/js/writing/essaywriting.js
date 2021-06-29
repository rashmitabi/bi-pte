$(document).ready(function() {
    
    $('#frm-essay-writting').validate({ 
        ignore: [],
        debug: false,
        rules: {
            editor14:{
                required: function() 
                {
                    return CKEDITOR.instances.editor14.updateElement();
                }
            },
            editor15:{
                required: function() 
                {
                    return CKEDITOR.instances.editor15.updateElement();
                }
            }
        },
        messages : {
            editor14: {
                required: "paragraph is required"
            },
            editor15: {
                required: "paragraph is required"
            }
        },
        submitHandler: function(form) {
            console.log(section_id);
        }
    });
});