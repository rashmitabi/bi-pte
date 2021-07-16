$(document).ready(function() {
    $.validator.addMethod("comma", function (value, element) {
        return this.optional(element) || /^.*[^,]$/.test(value);
    }, "Please specify value with comma");
    $('#frm-repeat-sentence').validate({ 
        rules: {
            'question[]': {
                required: true,
                comma : true
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



