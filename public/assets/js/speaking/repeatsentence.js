$(document).ready(function() {
    $('#frm-repeat-sentence').validate({ 
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
                required: "question is required"
            },
            'sample_ans[]': {
                required : "sample answer is required",
            }
        }
    });
});

