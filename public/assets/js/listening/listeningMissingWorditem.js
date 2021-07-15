$(document).ready(function() {
    $('#missing_word').validate({ 
        rules: {
            audio_q11: {
                required: true
            },
            choice_1_q11: {
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