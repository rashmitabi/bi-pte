$(document).ready(function() {
    $('#frm-re-tell-lecture').validate({ 
        rules: {
            'question[]': {
                required: true
            },
            'image[]': {
                required: true
            },
            'sample_ans[]': {
                required: true,
            }
        },
        messages : {
            'question[]': {
                required: "question is required"
            },
            'image[]': {
                required: "image is required"
            },
            'sample_ans[]': {
                required : "sample answer is required",
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

function  uploadImage(){
    $('#upload-imageError').text('');
    $('#upload-image').val('');
    var apiUrl1 = $('#customFile_image').attr('data-url');
    var token1 = $('#customFile_image').attr('data-token');
   
    var file_data1 = $('#customFile_image').prop('files')[0];
   

    var form_data1 = new FormData();
    form_data1.append('image_file', file_data1);
    form_data1.append('_token', token1);

   
    $.ajax({
        url: apiUrl1,
        type:'POST',
        data: form_data1,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        beforeSend: function(){
           $('#upload-image').after('<div id="loader_div"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
        },
        success:function(data) {
           $("#loader_div").remove();
           $('#upload-image').val(data.html);
        },
        error: function(response) {
           console.log(response.responseJSON.errors.image_file);
           $("#loader_div").remove();
           $('#upload-imageError').text(response.responseJSON.errors.image_file);
        }
    });
    
} 




