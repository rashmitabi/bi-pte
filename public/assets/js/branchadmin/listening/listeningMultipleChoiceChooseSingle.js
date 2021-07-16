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
function uploadAduio(){
    $('#upload-audioError').text('');
    $('#upload-audio').val('');
    var apiUrl2 = $('#customFile_audio123').data('url');
    var token2 = $('#customFile_audio123').data('token');

    var file_data2 = $('#customFile_audio123').prop('files')[0];
    var form_data2 = new FormData();
    form_data2.append('audio_file', file_data2);
    form_data2.append('_token', token2);
   
    $.ajax({
        url: apiUrl2,
        type:'POST',
        data: form_data2,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        beforeSend: function(){
           $('#upload-audio').after('<div id="loader_div"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
        },
        success:function(data) {
           $("#loader_div").remove();
           $('#upload-audio').val(data.html);
        },
        error: function(response) {
           console.log(response.responseJSON.errors.audio_file);
           $("#loader_div").remove();
           $('#upload-audioError').text(response.responseJSON.errors.audio_file);
        }
    });
    
} 