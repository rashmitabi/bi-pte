$(document).ready(function() {
    $('#mutli_choice').validate({ 
        rules: {
            editor1:{
                required: true
            },
            options_title: {
                required: true
            },
            ans_options_A:{
                required: true
            },
            ans_options_B:{
                required: true
            },
            ans_options_C:{
                required: true
            },
            ans_options_D:{
                required: true
            },
            ans_options_E:{
                required: true
            },
            correct_options:{
                required: true
            }
        },
        messages : {
            editor1: {
                required: "description is required"
            },
            options_title: {
                required: "options title is required"
            },
            ans_options_A: {
                required: "Ans Options A is required"
            },
            ans_options_B: {
                required: "Ans Options B is required"
            },
            ans_options_C: {
                required: "Ans Options C is required"
            },
            ans_options_D: {
                required: "Ans Options D is required"
            },
            ans_options_E: {
                required: "Ans Options E is required"
            },
            correct_options: {
                required: "Correct Options is required"
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