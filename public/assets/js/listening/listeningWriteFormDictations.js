$(document).ready(function() {
    $('#form_dictations').validate({ 
        rules: {
            audio_q15: {
                required: true
            },
            correct_answers_q15: {
                required: true
            },
            audio_q16: {
                required: true
            },
            correct_answers_q16: {
                required: true
            },
            audio_q17: {
                required: true
            },
            correct_answers_q17: {
                required: true
            },
        },
        messages : {
            audio_q15: {
                required: "Audio is required"
            },
            correct_answers_q15: {
                required: "Correct answers is required"
            },
            audio_q16: {
                required: "Audio is required"
            },
            correct_answers_q16: {
                required: "Correct answers is required"
            },
            audio_q17: {
                required: "Audio is required"
            },
            correct_answers_q17: {
                required: "Correct answers is required"
            },
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