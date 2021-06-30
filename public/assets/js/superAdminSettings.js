$(document).ready(function() {
    /*superadmin change password*/
    $(".change-password").click(function(e){
        
        e.preventDefault();
        
        $('#passwordError').text('');
        
        $('#confirmPass').text('');
        
        var url      = $(this).attr("data-url");

        var password = $("input[name=password]").val();

        var confirm_password = $("input[name=confirm_password]").val();

        $.ajax({

           type:'POST',

           url :url,

           data:{_token:CSRF_TOKEN,password:password,confirm_password:confirm_password},

           success:function(data){
                window.location.reload();
           },
           error: function(response) {
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#confirmPass').text(response.responseJSON.errors.confirm_password);
            }
        });

    });

    /*superadmin settings save and update*/
    $(".save-setting").click(function(e){
        
        e.preventDefault();
        
        $('#currencyError').text('');
        
        $('#adminEmailError').text('');

        $('#customerEmailError').text('');

        $('#companyNameError').text('');

        $('#companyMobileError').text('');

        $('#companyAddressError').text('');

        $('#companyInvoiceError').text('');

        $('#companyGstError').text('');

        $('#hsnCodeError').text('');

        $('#stgstError').text('');

        $('#cgstError').text('');

        $('#igstError').text('');

        $('#signatureError').text('');

        var url                     = $(this).attr("data-url");

        var currency                = $("#currency").val();

        var admin_email_address     = $("input[name=admin_email_address]").val();

        var customer_email_address  = $("input[name=customer_email_address]").val();

        var company_name            = $("input[name=company_name]").val();

        var company_mobile_number   = $("input[name=company_mobile_number]").val();

        var company_address         = $("#company_address").val();

        var company_invoice_address = $("#company_invoice_address").val();

        var company_gst_number      = $("input[name=company_gst_number]").val();

        var hsn_code                = $("input[name=hsn_code]").val();

        var stgst                   = $("input[name=stgst]").val();

        var cgst                    = $("input[name=cgst]").val();

        var igst                    = $("input[name=igst]").val();

        var digital_signature       = $('#digital_signature')[0].files;

        var setting = new FormData();
            setting.append('_token',CSRF_TOKEN);
            setting.append('currency',currency);
            setting.append('admin_email_address',admin_email_address);
            setting.append('customer_email_address',customer_email_address);
            setting.append('company_name',company_name);
            setting.append('company_mobile_number',company_mobile_number);
            setting.append('company_address',company_address);
            setting.append('company_invoice_address',company_invoice_address);
            setting.append('company_gst_number',company_gst_number);
            setting.append('hsn_code',hsn_code);
            setting.append('stgst',stgst);
            setting.append('cgst',cgst);
            setting.append('igst',igst);
        if(digital_signature.length > 0 ){
            setting.append('digital_signature',digital_signature[0]);
        }
        console.log(digital_signature);
        $.ajax({

            type:'POST',
            
            url :url,
            
            contentType: false,

            processData: false,

            data:setting,

            success:function(data){
                 window.location.reload();
            },
            error: function(response) {
                 $('#currencyError').text(response.responseJSON.errors.currency);
                 $('#adminEmailError').text(response.responseJSON.errors.admin_email_address);
                 $('#customerEmailError').text(response.responseJSON.errors.customer_email_address);
                 $('#companyNameError').text(response.responseJSON.errors.company_name);
                 $('#companyMobileError').text(response.responseJSON.errors.company_mobile_number);
                 $('#companyAddressError').text(response.responseJSON.errors.company_address);
                 $('#companyInvoiceError').text(response.responseJSON.errors.company_invoice_address);
                 $('#companyGstError').text(response.responseJSON.errors.company_gst_number);
                 $('#hsnCodeError').text(response.responseJSON.errors.hsn_code);
                 $('#stgstError').text(response.responseJSON.errors.stgst);
                 $('#cgstError').text(response.responseJSON.errors.cgst);
                 $('#igstError').text(response.responseJSON.errors.igst);
                 $('#signatureError').text(response.responseJSON.errors.digital_signature);
             }
        });
    });

    /*superadmin store and update reading questions instructions*/
    $(".reading-store-instructions").click(function(e){
        
        e.preventDefault();
        
        $('#fillInTheBlanksError').text('');
        
        $('#multipleChoiceChooseMultipleAnswersError').text('');

        $('#reOrderParagraphsError').text('');

        $('#readingFillinBlanksError').text('');

        $('#multipleChoiceChooseSingleError').text('');

        var url                     = $(this).attr("data-url");

        var reading_writing_fill_in_the_blanks      = $("input[name=reading_writing_fill_in_the_blanks]").val();

        var multiple_choice_choose_multiple_answers = $("input[name=multiple_choice_choose_multiple_answers]").val();

        var re_order_paragraphs                     = $("input[name=re_order_paragraphs]").val();

        var reading_fill_in_the_blanks              = $("input[name=reading_fill_in_the_blanks]").val();

        var multiple_choice_choose_single_answers   = $("input[name=multiple_choice_choose_single_answers]").val();

        $.ajax({

           type:'POST',

           url :url,

           data:{
                    _token                                  :CSRF_TOKEN,
                    reading_writing_fill_in_the_blanks      :reading_writing_fill_in_the_blanks,
                    multiple_choice_choose_multiple_answers :multiple_choice_choose_multiple_answers,
                    re_order_paragraphs                     :re_order_paragraphs,
                    reading_fill_in_the_blanks              :reading_fill_in_the_blanks,
                    multiple_choice_choose_single_answers   :multiple_choice_choose_single_answers
                },
           success:function(data){
                window.location.reload();
           },
           error: function(response) {
                $('#fillInTheBlanksError').text(response.responseJSON.errors.reading_writing_fill_in_the_blanks);
                $('#multipleChoiceChooseMultipleAnswersError').text(response.responseJSON.errors.multiple_choice_choose_multiple_answers);
                $('#reOrderParagraphsError').text(response.responseJSON.errors.re_order_paragraphs);
                $('#readingFillinBlanksError').text(response.responseJSON.errors.reading_fill_in_the_blanks);
                $('#multipleChoiceChooseSingleError').text(response.responseJSON.errors.multiple_choice_choose_single_answers);
            }
        });

    });

    /*superadmin store and update listening questions instructions*/
    $(".listening-store-instructions").click(function(e){
        
        e.preventDefault();
        
        $('#summerizeSpokemError').text('');
        
        $('#chooseMultipleAnswersError').text('');

        $('#fillInBlanksError').text('');

        $('#highlightCorrectError').text('');

        $('#multipleChoiceChooseSingleItemError').text('');

        $('#selectMissingWordItemError').text('');

        $('#highlightIncorrectError').text('');

        $('#writeFormError').text('');


        var url                                         = $(this).attr("data-url");

        var summarize_spoken_item                       = $("input[name=summarize_spoken_item]").val();

        var choose_multiple_answers_item                = $("input[name=choose_multiple_answers_item]").val();

        var fill_in_the_blanks                          = $("input[name=fill_in_the_blanks]").val();

        var highlight_correct_summary_item              = $("input[name=highlight_correct_summary_item]").val();

        var multiple_choice_choose_single_answers_item  = $("input[name=multiple_choice_choose_single_answers_item]").val();

        var select_missing_word_item                    = $("input[name=select_missing_word_item]").val();

        var highlight_incorrect_word                    = $("input[name=highlight_incorrect_word]").val();

        var write_form_dictations                       = $("input[name=write_form_dictations]").val();

        $.ajax({

           type:'POST',

           url :url,

           data:{
                    _token                                      :CSRF_TOKEN,
                    summarize_spoken_item                       :summarize_spoken_item,
                    choose_multiple_answers_item                :choose_multiple_answers_item,
                    fill_in_the_blanks                          :fill_in_the_blanks,
                    highlight_correct_summary_item              :highlight_correct_summary_item,
                    multiple_choice_choose_single_answers_item  :multiple_choice_choose_single_answers_item,
                    select_missing_word_item                    :select_missing_word_item,  
                    highlight_incorrect_word                    :highlight_incorrect_word,
                    write_form_dictations                       :write_form_dictations
                },
           success:function(data){
                window.location.reload();
           },
           error: function(response) {
                $('#summerizeSpokemError').text(response.responseJSON.errors.summarize_spoken_item);
                $('#chooseMultipleAnswersError').text(response.responseJSON.errors.choose_multiple_answers_item);
                $('#fillInBlanksError').text(response.responseJSON.errors.fill_in_the_blanks);
                $('#highlightCorrectError').text(response.responseJSON.errors.highlight_correct_summary_item);
                $('#multipleChoiceChooseSingleItemError').text(response.responseJSON.errors.multiple_choice_choose_single_answers_item);
                $('#selectMissingWordItemError').text(response.responseJSON.errors.select_missing_word_item);
                $('#highlightIncorrectError').text(response.responseJSON.errors.highlight_incorrect_word);
                $('#writeFormError').text(response.responseJSON.errors.write_form_dictations);
            }
        });

    });

    /*superadmin store and update writing questions instructions*/
    $(".writing-store-instructions").click(function(e){
        
        e.preventDefault();
        
        $('#summarizeError').text('');
        
        $('#essayError').text('');

        var url                 = $(this).attr("data-url");

        var summarize_written   = $("input[name=summarize_written]").val();

        var essay_writing       = $("input[name=essay_writing]").val();

        $.ajax({

           type:'POST',

           url :url,

           data:{
                    _token              :CSRF_TOKEN,
                    summarize_written   :summarize_written,
                    essay_writing       :essay_writing
                },
           success:function(data){
                window.location.reload();
           },
           error: function(response) {
                $('#summarizeError').text(response.responseJSON.errors.summarize_written);
                $('#essayError').text(response.responseJSON.errors.essay_writing);
            }
        });

    });

    /*superadmin store and update speaking questions instructions*/
    $(".speaking-store-instructions").click(function(e){
        
        e.preventDefault();
        
        $('#readAloudError').text('');
        
        $('#repeatError').text('');

        $('#describeError').text('');

        $('#lectureError').text('');

        $('#shortError').text('');

        var url                 = $(this).attr("data-url");

        var read_aloud          = $("input[name=read_aloud]").val();

        var repeat_sentence     = $("input[name=repeat_sentence]").val();

        var describe_image      = $("input[name=describe_image]").val();

        var re_tell_lecture     = $("input[name=re_tell_lecture]").val();

        var answer_short_question = $("input[name=answer_short_question]").val();
        $.ajax({

           type:'POST',

           url :url,

           data:{
                    _token              :CSRF_TOKEN,
                    read_aloud          :read_aloud,
                    repeat_sentence     :repeat_sentence,
                    describe_image      :describe_image,
                    re_tell_lecture     :re_tell_lecture,
                    answer_short_question:answer_short_question
                },
           success:function(data){
                window.location.reload();
           },
           error: function(response) {
                $('#readAloudError').text(response.responseJSON.errors.read_aloud);
                $('#repeatError').text(response.responseJSON.errors.repeat_sentence);
                $('#describeError').text(response.responseJSON.errors.describe_image);
                $('#lectureError').text(response.responseJSON.errors.re_tell_lecture);
                $('#shortError').text(response.responseJSON.errors.answer_short_question);
            }
        });

    });
});