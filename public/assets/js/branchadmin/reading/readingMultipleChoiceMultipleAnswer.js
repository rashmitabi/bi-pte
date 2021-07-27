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
    var html = "<div class='form-group mb-3 row question-block"+number+"'>"
                    +"<label class='col-3 col-form-label custom-label'>"+ans_option_label+"</label>"
                    +"<div class='col-12 col-md-7 col-xl-7 col-sm-12 p-0'>"
                        +"<input type='text' class='form-control' name='"+ans_option_id+"' id='"+ans_option_id+"' placeholder='"+ans_placeholder+"'>"
                    +"</div>"
                    +"<div class='minus-icon' onclick='removeQuestionColumn()' data-id='"+number+"'>"
                        +"<a><i class='fas fa-minus'></i></a>"
                    +"</div>"
                    +"<div class='plus-icon' onclick='addQuestionColumn()' data-id='"+number+"'>"
                        +"<a><i class='fas fa-plus'></i></a>"
                    +"</div>"
                +"</div>";
    $(".minus-icon").remove();
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
function removeQuestionColumn(){
    //console.log("hello");
    var alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    var link = document.querySelector('.plus-icon');
        if (link) {
            var target = link.getAttribute('data-id');
            //console.log(target);
        }
    var letterPosition = alphabet.indexOf(target)-1;
    var number = alphabet[letterPosition];
    //var plus_html = '';
    console.log(number);
    console.log(target);
    var plus_html =     "<div class='plus-icon' onclick='addQuestionColumn()' data-id='"+number+"'>"
                            +"<a><i class='fas fa-plus'></i></a>"
                        +"</div>";
    
        minus_html = "<div class='minus-icon' onclick='removeQuestionColumn()' data-id='"+number+"'>"
                        +"<a><i class='fas fa-minus'></i></a>"
                    +"</div>";
    
    $("#ans_options_"+target).rules("remove", "required");
    $(".question-block"+target).remove();
    if(number == 'A'){
        $(".question-block"+number).append(plus_html);
    }else{
        $(".question-block"+number).append(minus_html);
        $(".question-block"+number).append(plus_html);
    }
    $("#slug").val(number);
}
$(document).ready(function() {
    if(btnClass == 'Yes'){
        $(':input[type="submit"]').prop('disabled', true);
        $('.minus-icon-common').css('display','none');
        $('.add-icon').css('display','none');
        $('.minus-icon').css('display','none');
        $('.plus-icon').css('display','none');
        $(':input[type="text"]').prop('readonly', true);
    }
    $.validator.addMethod("coreectmatch", function (value, element) {
        return this.optional(element) || /^.*[^@@]$/.test(value);
    }, "Please specify value with @@");
    $('#mutli_choice').validate({ 
        ignore: [],
        debug: false,
        rules: {
            editor1:{
                required: function() 
                {
                    return CKEDITOR.instances.editor1.updateElement();
                }
            },
            options_title: {
                required: true
            },
            ans_options_A:{
                required: true
            },
            correct_options:{
                required: true,
                coreectmatch:true
            }
        },
        messages : {
            editor1: {
                required: "Paragraph is required"
            },
            options_title: {
                required: "options title is required"
            },
            ans_options_A: {
                required: "Ans Options A is required"
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