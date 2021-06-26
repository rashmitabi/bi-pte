$(document).ready(function() {
    $('#hightlight_words').validate({ 
        rules: {
            audio13: {
                required: true
            },
            editor13: {
                required: true,
                minlength:3
            },
            correct_ans13: {
                required: true
            },
            audio14: {
                required: true
            },
            editor14: {
                required: true,
                minlength:3
            },
            correct_ans14: {
                required: true
            },
        },
        messages : {
            audio13: {
                required: "Audio is required"
            },
            editor13: {
                required : "paragraph is required",
                minlength: "paragraph is required"
            },
            correct_ans13: {
                required: "Correct answers is required"
            },
            audio14: {
                required: "Audio is required"
            },
            editor14: {
                required: "paragraph is required",
                minlength: "paragraph is required"
            },
            correct_ans14: {
                required: "Correct answers is required"
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