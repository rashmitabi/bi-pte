$(document).ready(function() {
     $('#frm-read-aloud').validate({ 
        ignore: [],
        debug: false,
        rules: {
            editor1:{
                required: function() 
                {
                    return CKEDITOR.instances.editor1.updateElement();
                }
            },
            sample_ans1:{
                required: true
            },

            editor2:{
                required: function() 
                {
                    return CKEDITOR.instances.editor2.updateElement();
                }
            },
            sample_ans2:{
                required: true
            },

            editor3:{
                required: function() 
                {
                    return CKEDITOR.instances.editor3.updateElement();
                }
            },
            sample_ans3:{
                required: true
            },

            editor4:{
                required: function() 
                {
                    return CKEDITOR.instances.editor4.updateElement();
                }
            },
            sample_ans4:{
                required: true
            },

            editor5:{
                required: function() 
                {
                    return CKEDITOR.instances.editor5.updateElement();
                }
            },
            sample_ans5:{
                required: true
            },

            editor6:{
                required: function() 
                {
                    return CKEDITOR.instances.editor6.updateElement();
                }
            },
            sample_ans6:{
                required: true
            },
        },
        messages : {

            editor1: {
                required: "Paragraph1 is required"
            },
            sample_ans1: {
                required: "Sample Ans1 is required"
            },

            editor2: {
                required: "Paragraph2 is required"
            },
            sample_ans2: {
                required: "Sample Ans2 is required"
            },

            editor3: {
                required: "Paragraph3 is required"
            },
            sample_ans3: {
                required: "Sample Ans3 is required"
            },

            editor4: {
                required: "Paragraph4 is required"
            },
            sample_ans4: {
                required: "Sample Ans4 is required"
            },

            editor5: {
                required: "Paragraph5 is required"
            },
            sample_ans5: {
                required: "Sample Ans5 is required"
            },
            editor6: {
                required: "Paragraph6 is required"
            },
            sample_ans6: {
                required: "Sample Ans6 is required"
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

