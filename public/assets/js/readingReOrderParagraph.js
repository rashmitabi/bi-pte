function addQuestionColumn()
{
    console.log("hello");
    var alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    var link = document.querySelector('.plus-icon');
        if (link) {
            var target = link.getAttribute('data-id');
            console.log(target);
        }
    var letterPosition = alphabet.indexOf(target)+1;
    var number = alphabet[letterPosition];
    //console.log(number);
    var ans_option_label = "Ans Options "+number;
    var ans_option_id = "ans_options_"+number;
    var ans_placeholder = "Which of the Following Are True Statements?";

    var html = '';
    console.log(number);
    var html = "<div class='form-group mb-3 row '>"
                    +"<label class='col-3 col-form-label custom-label'>"+ans_option_label+"</label>"
                    +"<div class='col-8 p-0'>"
                        +"<input type='text' class='form-control' name='"+ans_option_id+"' id='"+ans_option_id+"' placeholder='"+ans_placeholder+"'>"
                    +"</div>"
                    +"<div class='plus-icon' onclick='addQuestionColumn()' data-id='"+number+"'>"
                        +"<a><i class='fas fa-plus'></i></a>"
                    +"</div>"
                +"</div>";
    $(".plus-icon").remove();
    $(".finalAnswer").before(html);
    $('#fill_in_blanks').validate();
    $("#"+ans_option_id).rules( "add", {
        required: true,
        messages: {
          required: ans_option_label+" is required",
        }
      });
      $("#slug").val(number);
}
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