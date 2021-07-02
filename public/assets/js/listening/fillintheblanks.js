$(document).ready(function() {
    $('#frm-fill-in-the-blanks').validate({ 
        ignore: [],
        debug: false,
        rules: {
            audio1:{
                required: true
            },
            question1:{
                required: function() 
                {
                    return CKEDITOR.instances.question1.updateElement();
                }
            },
            correct_ans1:{
                required: true
            },
            audio2:{
                required: true
            },
            question2:{
                required: function() 
                {
                    return CKEDITOR.instances.question2.updateElement();
                }
            },
            correct_ans2:{
                required: true
            }
        },
        messages : {
            essay_title1: {
                required: "Paragraph is required"
            },
            question1:{
                required: "Question is required"
            },
            correct_ans1:{
                required: "Sample essay is required"
            },
            essay_title2: {
                required: "Paragraph is required"
            },
            question2:{
                required: "Question is required"
            },
            correct_ans2:{
                required: "Sample essay is required"
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
                    // $('#head').text(result.status);
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





