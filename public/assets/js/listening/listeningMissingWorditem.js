$(document).ready(function() {
    $('#missing_word').validate({ 
        rules: {
            audio_q11: {
                required: true
            },
            choice_1_q11: {
                required: true
            },
            choice_2_q11: {
                required: true
            },
            choice_3_q11: {
                required: true
            },
            choice_4_q11: {
                required: true
            },
            correct_answers_q11: {
                required: true
            },
            audio_q12: {
                required: true
            },
            choice_1_q12: {
                required: true
            },
            choice_2_q12: {
                required: true
            },
            choice_3_q12: {
                required: true
            },
            choice_4_q12: {
                required: true
            },
            correct_answers_q12: {
                required: true
            },
        },
        messages : {
            audio_q11: {
                required: "Audio is required"
            },
            choice_1_q11: {
                required: "Choice is required"
            },
            choice_2_q11: {
                required: "Choice is required"
            },
            choice_3_q11: {
                required: "Choice is required"
            },
            choice_4_q11: {
                required: "Choice is required"
            },
            correct_answers_q11: {
                required: "Correct Answer is required"
            },
            audio_q12: {
                required: "Audio is required"
            },
            choice_1_q12: {
                required: "Choice is required"
            },
            choice_2_q12: {
                required: "Choice is required"
            },
            choice_3_q12: {
                required: "Choice is required"
            },
            choice_4_q12: {
                required: "Choice is required"
            },
            correct_answers_q12: {
                required: "Correct answer is required"
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