function addQuestionColumn()
{
    console.log("hello");
    var alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    var link = document.querySelector('.plus-icon');
        if (link) {
            var target = link.getAttribute('data-qid');
            var anstarget = link.getAttribute('data-aid');
            console.log(target);
        }
    var letterPosition = alphabet.indexOf(target)+1;
    var alpha = alphabet[letterPosition];
    var number = parseInt(anstarget)+parseInt(1);
    
    var ansOptionHtml = '';
    var correctOptionHtml = '';

    var ansOptionLabel = "Ans Options "+alpha;
    var ansOptionId    = "ans_options_"+alpha;
    
    //correct_options5
    var correctLabel   = "Correct Options "+number;
    var correctId      = "correct_options"+number;
    console.log(number);
    console.log(correctId);
    var ansOptionHtml = "<div class='form-group mb-3 row dynamicblock"+alpha+"'>"
                            +"<label class='col-3 col-form-label custom-label'>"+ansOptionLabel+"</label>"
                            +"<div class='col-12 col-md-7 col-xl-7 col-sm-12 p-0'>"
                                +"<input type='text' class='form-control' name='"+ansOptionId+"' id='"+ansOptionId+"' placeholder='Which of the Following Are True Statements?'>"
                            +"</div>"
                            +"<div class='minus-icon' onclick='minusQuestionColumn()' data-qid='"+alpha+"' data-aid='"+number+"'>"
                                +"<a><i class='fas fa-minus'></i></a>"
                            +"</div>"
                            +"<div class='plus-icon' onclick='addQuestionColumn()' data-qid='"+alpha+"' data-aid='"+number+"'>"
                                +"<a><i class='fas fa-plus'></i></a>"
                            +"</div>"
                        +"</div>";
    var correctOptionHtml = "<div class='form-group mb-3 row dynamicblock"+number+"'>"
                                +"<label class='col-3 col-form-label custom-label'>"+correctLabel+"</label>"
                                +"<div class='col-12 col-md-7 col-xl-7 col-sm-12 p-0'>"
                                    +"<input type='text' class='form-control ' name='"+correctId+"' id='"+correctId+"' placeholder='it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.'>"
                                +"</div>"
                            +"</div>";
    $(".plus-icon").remove();
    $(".minus-icon").remove();
    $("#answerBlog").append(ansOptionHtml);
    $("#correctBlog").append(correctOptionHtml);
    //$("#re_order .white-bg:last").after(correctOptionHtml);
    $('#re_order').validate();
    $("#"+ansOptionId).rules( "add", {
        required: true,
        messages: {
          required: ansOptionLabel+" is required",
        }
      });
    $("#"+correctId).rules( "add", {
        required: true,
        messages: {
            required: correctLabel+" is required",
        }
    });
    $("#numberSlug").val(number);
    $("#alphaSlug").val(alpha);
}
function minusQuestionColumn()
{
    console.log("hello");
    var alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    var link = document.querySelector('.minus-icon');
        if (link) {
            var target = link.getAttribute('data-qid');
            var anstarget = link.getAttribute('data-aid');
            console.log(target);
            console.log(anstarget);
        }
    var letterPosition = alphabet.indexOf(target)-1;
    var alpha = alphabet[letterPosition];
    var number = parseInt(anstarget)-parseInt(1);

    var ansOptionId    = "ans_options_"+target;
    var correctId      = "correct_options"+anstarget;

    var plus_html = '';
    var minus_html = '';
   
    minus_html = "<div class='minus-icon' onclick='minusQuestionColumn()' data-qid='"+alpha+"' data-aid='"+number+"'>"
                    +"<a><i class='fas fa-minus'></i></a>"
                +"</div>";
    plus_html = "<div class='plus-icon' onclick='addQuestionColumn()' data-qid='"+alpha+"' data-aid='"+number+"'>"
                    +"<a><i class='fas fa-plus'></i></a>"
                +"</div>";
    
    $(ansOptionId).rules("remove", "required");
    $(correctId).rules("remove", "required");

    $(".dynamicblock"+target).remove();
    $(".dynamicblock"+anstarget).remove();

    if(alpha == 'A'){
        $(".dynamicblock"+alpha).append(plus_html);
    }else{
        $(".dynamicblock"+alpha).append(minus_html);
        $(".dynamicblock"+alpha).append(plus_html);
    }
    $("#numberSlug").val(number);
    $("#alphaSlug").val(alpha);
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
    $('#re_order').validate({ 
        rules: {
            ans_options_A:{
                required: true
            },
            correct_options1:{
                required: true
            },
        },
        messages : {
            ans_options_A: {
                required: "Ans Options A is required"
            },
            correct_options1: {
                required: "Correct options is required"
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