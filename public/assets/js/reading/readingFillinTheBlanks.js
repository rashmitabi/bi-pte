function addQuestionColumn()
{
    console.log("hello");
    var link = document.querySelector('.add-icon');
        if (link) {
            var target = link.getAttribute('data-id');
            console.log(target);
        }
    var number = parseInt(target)+parseInt(1);
    var ansLabel = 'Ans Options '+number;
    var ansId    = 'ans_options'+number;

    var correctLabel = 'Correct Options '+number;
    var correctId    = 'correct_options'+number;

    var html = '';

    var html =  "<div class='col-11 mt-2 ml-3 white-bg common-col mainbox"+number+"'>"
                    +"<div class='form-group mb-3 row'>"
                        +"<label class='col-3 col-form-label custom-label '>"+ansLabel+"</label>"
                        +"<div class='col-7 p-0'>"
                            +"<input type='text' class='form-control ' name='"+ansId+"' id='"+ansId+"' placeholder='Whole,Total,Very,Open'>"
                        +"</div>"
                    +"</div>"
                    +"<div class='form-group mb-3 row subbox"+number+"'>"
                        +"<label class='col-3 col-form-label custom-label'>"+correctLabel+"</label>"
                        +"<div class='col-7 p-0'>"
                            +"<input type='text' class='form-control ' name='"+correctId+"' id='"+correctId+"' placeholder='Whole'>"
                        +"</div>"
                        +"<div class='add-icon' onclick='addQuestionColumn()' data-id='"+number+"'>"
                            +"<a><i class='fas fa-plus'></i></a>"
                        +"</div>"
                        +"<div class='minus-icon' onclick='minusQuestionColumn()' data-id='"+number+"'>"
                            +"<a><i class='fas fa-minus'></i></a>"
                        +"</div>"
                    +"</div>";
                +"</div>";
    $(".add-icon").remove();
    $(".minus-icon").remove();
    $(".mainbox"+target).after(html);
    $('#re_order').validate();
    $("#"+ansId).rules( "add", {
        required: true,
        comma:true,
        messages: {
          required: ansLabel+" is required",
        }
      });
    $("#"+correctId).rules( "add", {
        required: true,
        messages: {
            required: correctLabel+" is required",
        }
    });
    $("#slug").val(number);
}
function minusQuestionColumn()
{
    var link = document.querySelector('.minus-icon');
        if (link) {
            var target = link.getAttribute('data-id');
            console.log(target);
        }
    var number = parseInt(target)-parseInt(1);
    var plus_html = '';
    var minus_html = '';

    var ansId        = 'ans_options'+target;
    var correctId    = 'correct_options'+target;

    plus_html = "<div class='add-icon' onclick='addQuestionColumn()' data-id='"+number+"'>"
                    +"<a><i class='fas fa-plus'></i></a>"
                +"</div>";
    minus_html = "<div class='minus-icon' onclick='minusQuestionColumn()' data-id='"+number+"'>"
                    +"<a><i class='fas fa-minus'></i></a>"
                +"</div>";

    $(ansId).rules("remove", "required");
    $(ansId).rules("remove","comma");
    $(correctId).rules("remove", "required");
    
    $(".mainbox"+target).remove();

    if(number == '1'){
        $(".subbox"+number).append(plus_html);
    }else{
        $(".subbox"+number).append(plus_html);
        $(".subbox"+number).append(minus_html);
    }
    $("#slug").val(number);
}
$(document).ready(function() {
    $.validator.addMethod("comma", function (value, element) {
        return this.optional(element) || /^.*[^,]$/.test(value);
    }, "Please specify value with comma");
    $('#fill_in_blanks').validate({ 
        ignore: [],
        debug: false,
        rules: {
            editor2:{
                required: function() 
                {
                    return CKEDITOR.instances.editor2.updateElement();
                }
            },
            ans_options1:{
                required: true,
                comma:true
            },
            correct_options1:{
                required: true
            }
        },
        messages : {
            editor2: {
                required: "paragraph is required"
            },
            ans_options1: {
                required: "Ans Options 1 is required"
            },
            correct_options1: {
                required: "Correct options 1 is required"
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