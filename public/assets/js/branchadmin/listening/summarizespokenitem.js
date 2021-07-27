$(document).ready(function() {
    if(btnClass == 'Yes'){
        $(':input[type="submit"]').prop('disabled', true);
        $('.minus-icon-common').css('display','none');
        $('.add-icon').css('display','none');
        $('.minus-icon').css('display','none');
        $('.plus-icon').css('display','none');
        $(':input[type="text"]').prop('readonly', true);
    }
     $('#frm-summarize-spoken-item').validate({ 
        ignore: [],
        debug: false,
        rules: {
            question_audio1:{ 
                required: true
            },
            question_image1:{
                required: true
            },
            summary_script1:{
                required: function() 
                {
                    return CKEDITOR.instances.summary_script1.updateElement();
                }
            },
            sample_ans1:{
                required: function() 
                {
                    return CKEDITOR.instances.sample_ans1.updateElement();
                }
            },
            question_audio2:{ 
                required: true
            },
            question_image2:{
                required: true
            },
            summary_script2:{
                required: function() 
                {
                    return CKEDITOR.instances.summary_script2.updateElement();
                }
            },
            sample_ans2:{
                required: function() 
                {
                    return CKEDITOR.instances.sample_ans2.updateElement();
                }
            }
            
        },
        messages : {
            question_audio1: {
                required: "audio is required"
            },
            question_image1: {
                required: "images is required"
            },
            summary_script1: {
                required: "summary script is required"
            },
            sample_ans1: {
                required : "sample answer is required",
            },
            question_audio2: {
                required: "audio is required"
            },
            question_image2: {
                required: "images is required"
            },
            summary_script2: {
                required: "summary script is required"
            },
            sample_ans2: {
                required : "sample answer is required",
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

function  uploadImage(){
    $('#upload-imageError').text('');
    $('#upload-image').val('');
    var apiUrl1 = $('#customFile_image789').attr('data-url');
    var token1 = $('#customFile_image789').attr('data-token');
   
    var file_data1 = $('#customFile_image789').prop('files')[0];
   

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

