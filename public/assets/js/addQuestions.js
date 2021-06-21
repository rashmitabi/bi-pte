$(document).ready(function() {
    $('#fill_in_blanks').validate({ 
        rules: {
            ans_options1: {
                required: true
            },
            ans_options2: {
                required: true
            },
            ans_options3: {
                required: true
            },
            ans_options4: {
                required: true
            },
            ans_options5: {
                required: true
            },
            ans_options6: {
                required: true
            },
            ans_options7: {
                required: true
            },
            ans_options8: {
                required: true
            },
            correct_option1: {
                required: true
            },
            correct_option2: {
                required: true
            },
            correct_option3: {
                required: true
            },
            correct_option4: {
                required: true
            },
            correct_option5: {
                required: true
            },
            correct_option6: {
                required: true
            },
            correct_option7: {
                required: true
            },
            correct_option8: {
                required: true
            },
        },
        messages : {
            ans_options1: {
                required: "Ans Option1 is required"
            },
            ans_options2: {
                required: "Ans Option2 is required"
            },
            ans_options3: {
                required: "Ans Option3 is required"
            },
            ans_options4: {
                required: "Ans Option4 is required"
            },
            ans_options5: {
                required: "Ans Option5 is required"
            },
            ans_options6: {
                required: "Ans Option6 is required"
            },
            ans_options7: {
                required: "Ans Option7 is required"
            },
            ans_options8: {
                required: "Ans Option8 is required"
            },
            correct_option1: {
                required: "Correct option1 is required"
            },
            correct_option2: {
                required: "Correct option2 is required"
            },
            correct_option3: {
                required: "Correct option3 is required"
            },
            correct_option4: {
                required: "Correct option4 is required"
            },
            correct_option5: {
                required: "Correct option5 is required"
            },
            correct_option6: {
                required: "Correct option6 is required"
            },
            correct_option7: {
                required: "Correct option7 is required"
            },
            correct_option8: {
                required: "Correct option8 is required"
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
    // $('#fill_in_blanks').submit(function (e) {
    //     e.preventDefault(); //**** to prevent normal form submission and page reload
    //     $("#fill_in_blanks").validate({
            
    //     });
    // });
});