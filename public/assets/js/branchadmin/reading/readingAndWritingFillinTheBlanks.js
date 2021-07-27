function addQuestionColumn()
{
    console.log("hello");
    var link = document.querySelector('.add-icon');
        if (link) {
            var target = link.getAttribute('data-id');
            console.log(target);
        }
    var number = target;
    var newNumber = parseInt(number)+parseInt(1);
    var ans_option_label = "Ans Options "+newNumber;
    var ans_option_id = "ans_options"+newNumber;
    var ans_placeholder = "Please Enter options"+newNumber+" like Whole,Total,Very,Open";

    var correct_option_label = "Correct Options "+newNumber;
    var correct_option_id    = "correct_option"+newNumber;
    var correct_placeholder  = "Please Enter Correct options"+newNumber;
    var html = '';
    console.log(newNumber);
    var html = "<div class='col-11 mt-2 ml-3 white-bg common-col dynamicblock"+newNumber+"'>"
                    +"<div class='form-group mb-3 row'>"
                        +"<label class='col-3 col-form-label custom-label'>"+ans_option_label+"</label>"
                        +"<div class='col-7 p-0'>"
                            +"<input type='text' class='form-control' name='"+ans_option_id+"' id='"+ans_option_id+"' placeholder='"+ans_placeholder+"'>"
                        +"</div>"
                    +"</div>"
                    +"<div class='form-group mb-3 row  btn-click subblock"+newNumber+"'>"
                        +"<label class='col-3 col-form-label custom-label'>"+correct_option_label+"</label>"
                        +"<div class='col-7 p-0'>"
                            +"<input type='text' class='form-control' name='"+correct_option_id+"' id='"+correct_option_id+"' placeholder='"+correct_placeholder+"'>"
                        +"</div>"
                        +"<div class='minus-icon-common' onclick='minusQuestionColumn()' data-id='"+newNumber+"'>"
                            +"<a><i class='fas fa-minus'></i></a>"
                        +"</div>"
                        +"<div class='add-icon' onclick='addQuestionColumn()' data-id='"+newNumber+"'>"
                            +"<a><i class='fas fa-plus'></i></a>"
                        +"</div>"
                    +"</div>"
                +"</div>";
    $(".add-icon").remove();
    $(".minus-icon-common").remove();
    $("#fill_in_blanks .white-bg:last").after(html);
    $('#fill_in_blanks').validate();

    $("#"+ans_option_id).rules( "add", {
        required: true,
        comma: true,
        messages: {
          required: ans_option_label+" is required",
        }
      });
      $("#"+correct_option_id).rules( "add", {
        required: true,
        messages: {
          required: correct_option_label+" is required",
        }
      });
      $("#slug").val(newNumber);
}
function minusQuestionColumn()
{
    console.log("hello");
    var link = document.querySelector('.minus-icon-common');
        if (link) {
            var target = link.getAttribute('data-id');
            console.log(target);
        }
    var ans_option_id = "ans_options"+target;
    var correct_option_id    = "correct_option"+target;
    var prv_number = parseInt(target)-parseInt(1);
    
    var plus_html = '';
    var minus_html = '';
    plus_html = "<div class='add-icon' onclick='addQuestionColumn()' data-id='"+prv_number+"'>"
                    +"<a><i class='fas fa-plus'></i></a>"
                    +"</div>";
    minus_html = "<div class='minus-icon-common' onclick='minusQuestionColumn()' data-id='"+prv_number+"'>"
                    +"<a><i class='fas fa-minus'></i></a>"
                +"</div>";
    
    $(ans_option_id).rules("remove", "required");
    $(ans_option_id).rules("remove", "comma");
    $(correct_option_id).rules("remove", "required");
    $(".dynamicblock"+target).remove();
    if(prv_number == '1'){
        $(".subblock"+prv_number).append(plus_html);
    }else{
        $(".subblock"+prv_number).append(minus_html);
        $(".subblock"+prv_number).append(plus_html);
    }
    $("#slug").val(prv_number);
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
    $.validator.addMethod("comma", function (value, element) {
        return this.optional(element) || /^.*[^,]$/.test(value);
    }, "Please specify value with comma");
    $('#fill_in_blanks').validate({
        ignore: [],
        debug: false,
        rules: {
            editor:{
                required: function() 
                {
                    return CKEDITOR.instances.editor.updateElement();
                }
            },
            ans_options1: {
                required: true,
                comma: true
            },
            correct_option1: {
                required: true
            },
        },
        messages : {
            editor:{
                required: "Paragraph is required"
            },
            ans_options1: {
                required: "Ans Option 1 is required"
            },
            correct_option1: {
                required: "Correct option 1 is required"
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