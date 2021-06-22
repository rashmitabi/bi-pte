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
    var ans_placeholder = "Whole,Total,Very,Open";

    var correct_option_label = "Correct Options "+newNumber;
    var correct_option_id    = "correct_option"+newNumber;
    var correct_placeholder  = "Whole";
    var html = '';
    console.log(newNumber);
    var html = "<div class='col-11 mt-2 ml-3 white-bg common-col'>"
                    +"<div class='form-group mb-3 row'>"
                        +"<label class='col-3 col-form-label custom-label'>"+ans_option_label+"</label>"
                        +"<div class='col-7 p-0'>"
                            +"<input type='text' class='form-control' name='"+ans_option_id+"' id='"+ans_option_id+"' placeholder='"+ans_placeholder+"'>"
                        +"</div>"
                    +"</div>"
                    +"<div class='form-group mb-3 row  btn-click'>"
                        +"<label class='col-3 col-form-label custom-label'>"+correct_option_label+"</label>"
                        +"<div class='col-7 p-0'>"
                            +"<input type='text' class='form-control' name='"+correct_option_id+"' id='"+correct_option_id+"' placeholder='"+correct_placeholder+"'>"
                        +"</div>"
                        +"<div class='add-icon' onclick='addQuestionColumn()' data-id='"+newNumber+"'>"
                            +"<a><i class='fas fa-plus'></i></a>"
                        +"</div>"
                    +"</div>"
                +"</div>";
    $(".add-icon").remove();
    $("#fill_in_blanks .white-bg:last").after(html);
    $('#fill_in_blanks').validate();

    $("#"+ans_option_id).rules( "add", {
        required: true,
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
                required: "Ans Option 1 is required"
            },
            ans_options2: {
                required: "Ans Option 2 is required"
            },
            ans_options3: {
                required: "Ans Option 3 is required"
            },
            ans_options4: {
                required: "Ans Option 4 is required"
            },
            ans_options5: {
                required: "Ans Option 5 is required"
            },
            ans_options6: {
                required: "Ans Option 6 is required"
            },
            ans_options7: {
                required: "Ans Option 7 is required"
            },
            ans_options8: {
                required: "Ans Option 8 is required"
            },
            correct_option1: {
                required: "Correct option 1 is required"
            },
            correct_option2: {
                required: "Correct option 2 is required"
            },
            correct_option3: {
                required: "Correct option 3 is required"
            },
            correct_option4: {
                required: "Correct option 4 is required"
            },
            correct_option5: {
                required: "Correct option 5 is required"
            },
            correct_option6: {
                required: "Correct option 6 is required"
            },
            correct_option7: {
                required: "Correct option 7 is required"
            },
            correct_option8: {
                required: "Correct option 8 is required"
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
    // $(".add-icon").click(function(){
            
    // });
    
});