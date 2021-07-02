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
    var correctLabel   = "Correct Options";
    var correctId      = "correct_options"+number;
    console.log(number);
    console.log(correctId);
    var ansOptionHtml = "<div class='form-group mb-3 row'>"
                            +"<label class='col-3 col-form-label custom-label'>"+ansOptionLabel+"</label>"
                            +"<div class='col-12 col-md-7 col-xl-7 col-sm-12 p-0'>"
                                +"<input type='text' class='form-control' name='"+ansOptionId+"' id='"+ansOptionId+"' placeholder='Which of the Following Are True Statements?'>"
                            +"</div>"
                            +"<div class='plus-icon' onclick='addQuestionColumn()' data-qid='"+alpha+"' data-aid='"+number+"'>"
                                +"<a><i class='fas fa-plus'></i></a>"
                            +"</div>"
                        +"</div>";
    var correctOptionHtml = "<div class='form-group mb-3 row'>"
                                +"<label class='col-3 col-form-label custom-label'>"+correctLabel+"</label>"
                                +"<div class='col-12 col-md-7 col-xl-7 col-sm-12 p-0'>"
                                    +"<input type='text' class='form-control ' name='"+correctId+"' id='"+correctId+"' placeholder='it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.'>"
                                +"</div>"
                            +"</div>";
    $(".plus-icon").remove();
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
$(document).ready(function() {
    $('#re_order').validate({ 
        rules: {
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
            correct_options1:{
                required: true
            },
            correct_options2:{
                required: true
            },
            correct_options3:{
                required: true
            },
            correct_options4:{
                required: true
            },
            correct_options5:{
                required: true
            }
        },
        messages : {
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
            correct_options1: {
                required: "Correct options is required"
            },
            correct_options2: {
                required: "Correct options is required"
            },
            correct_options3: {
                required: "Correct options is required"
            },
            correct_options4: {
                required: "Correct options is required"
            },
            correct_options5: {
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