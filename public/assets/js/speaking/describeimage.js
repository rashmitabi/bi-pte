$(document).ready(function() {
    $('#frm-describe-image').validate({ 
        rules: {
            'question[]': {
                required: true
            },
            'sample_ans[]': {
                required: true,
            }
        },
        messages : {
            'question[]': {
                required: "paragraph is required"
            },
            'sample_ans[]': {
                required : "sample answer is required",
            }
        },
        submitHandler: function(form) {
           alert("hii");
        }
    });
});

