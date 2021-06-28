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