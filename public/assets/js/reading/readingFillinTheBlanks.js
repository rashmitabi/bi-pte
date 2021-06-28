function addQuestionColumn()
{
    console.log("hello");
    var link = document.querySelector('.add-icon');
        if (link) {
            var target = link.getAttribute('data-id');
            console.log(target);
        }
    var number = parseInt(target)+parseInt(1);
    var ansLabel = 'Ans Options';
    var ansId    = 'ans_options'+number;

    var correctLabel = 'Correct Options';
    var correctId    = 'correct_options'+number;

    var html = '';

    var html =  "<div class='form-group mb-3 row'>"
                    +"<label class='col-3 col-form-label custom-label '>"+ansLabel+"</label>"
                    +"<div class='col-7 p-0'>"
                        +"<input type='text' class='form-control ' name='"+ansId+"' id='"+ansId+"' placeholder='Whole,Total,Very,Open'>"
                    +"</div>"
                +"</div>"
                +"<div class='form-group mb-3 row'>"
                    +"<label class='col-3 col-form-label custom-label'>"+correctLabel+"</label>"
                    +"<div class='col-7 p-0'>"
                        +"<input type='text' class='form-control ' name='"+correctId+"' id='"+correctId+"' placeholder='Whole'>"
                    +"</div>"
                    +"<div class='add-icon' onclick='addQuestionColumn()' data-id='"+number+"'>"
                        +"<a><i class='fas fa-plus'></i></a>"
                    +"</div>"
                +"</div>";
    $("#mainbox").append(html);
    $('#re_order').validate();
    $("#"+ansId).rules( "add", {
        required: true,
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
$(document).ready(function() {
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
                required: true
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
                required: "Ans Options is required"
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