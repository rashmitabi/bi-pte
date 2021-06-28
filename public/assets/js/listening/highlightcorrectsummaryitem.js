$(document).ready(function() {
    $('#frm-highlight-correct-summary-item').validate({ 
        rules: {
            'audio[]': {
                required: true,
            },
            'choice_1[]': {
                required: true
            },
            'choice_2[]': {
                required: true
            },
            'choice_3[]': {
                required: true
            },
            'choice_4[]': {
                required: true
            },
            'correct_ans[]': {
                required: true,
            }
        },
        messages : {
            'audio[]': {
                required: "audio is required"
            },
            'choice_1[]': {
                required: "choice 1 is required"
            },
            'choice_2[]': {
                required: "choice 2 is required"
            },
            'choice_3[]': {
                required: "choice 3 is required"
            },
            'choice_4[]': {
                required: "choice 4 is required"
            },
            'correct_ans[]': {
                required : "correct answer is required",
            }
        },
        
    });
});

function uploadAduio(){
    $('#upload-audioError').text('');
    $('#upload-audio').val('');
    var apiUrl2 = $('#customFile_audio').data('url');
    var token2 = $('#customFile_audio').data('token');

    var file_data2 = $('#customFile_audio').prop('files')[0];
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




