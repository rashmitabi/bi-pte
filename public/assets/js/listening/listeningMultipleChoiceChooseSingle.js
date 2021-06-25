$(document).ready(function() {
    $('#listen_multiple_choice').validate({ 
        rules: {
            question_q9: {
                required: true
            },
            audio_q9: {
                required: true
            },
            choice_1_q9: {
                required: true
            },
            choice_2_q9: {
                required: true
            },
            choice_3_q9: {
                required: true
            },
            choice_4_q9: {
                required: true
            },
            correct_answers_q9: {
                required: true
            },
            question_q10: {
                required: true
            },
            audio_q10: {
                required: true
            },
            choice_1_q10: {
                required: true
            },
            choice_2_q10: {
                required: true
            },
            choice_3_q10: {
                required: true
            },
            choice_4_q10: {
                required: true
            },
            correct_answers_q10: {
                required: true
            },
        },
        messages : {
            question_q9: {
                required: "Question is required"
            },
            audio_q9: {
                required: "Audio is required"
            },
            choice_1_q9: {
                required: "Choice is required"
            },
            choice_2_q9: {
                required: "Choice is required"
            },
            choice_3_q9: {
                required: "Choice is required"
            },
            choice_4_q9: {
                required: "Choice is required"
            },
            correct_answers_q9: {
                required: "Correct Answer is required"
            },
            question_q10: {
                required: "Question is required"
            },
            audio_q10: {
                required: "Audio is required"
            },
            choice_1_q10: {
                required: "Choice is required"
            },
            choice_2_q10: {
                required: "Choice is required"
            },
            choice_3_q10: {
                required: "Choice is required"
            },
            choice_4_q10: {
                required: "Choice is required"
            },
            correct_answers_q10: {
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