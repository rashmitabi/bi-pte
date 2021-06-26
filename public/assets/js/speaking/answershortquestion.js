$(document).ready(function() {
    $('#frm-answer-short-question').validate({ 
        rules: {
            'question[]': {
                required: true
            },
            'image[]': {
                required: true
            },
            'sample_ans[]': {
                required: true,
            }
        },
        messages : {
            'question[]': {
                required: "question is required"
            },
            'image[]': {
                required: "image is required"
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

