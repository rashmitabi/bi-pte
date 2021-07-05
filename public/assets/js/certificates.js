$(document).ready(function(){

    $('body').on('click', '.generate_certificate', function(){
        var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               beforeSend: function(){
                   $('#certificate-edit-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
               },
               success:function(data) {
                   $('#certificate-edit-body').html(data.html);
               },
           });
    });

    $('body').on('click', '#add_certificate', function(){
         var apiUrl = $(this).data('url');
         $(this).attr('disabled', 'disabled');
         $.ajax({
             url: apiUrl,
             type:'POST',   
             data: $('form').serialize(),          
             success:function(data) {
                if(data == 1){
                   setTimeout(function(){
                       location.reload();
                   }, 2000);
                }
             },             
             error: function(response) {
                $('#add_certificate').removeAttr('disabled');
                $('#scoreError').text(response.responseJSON.errors.score);
                $('#speakingError').text(response.responseJSON.errors.speaking);
                $('#listeningError').text(response.responseJSON.errors.listening);
                $('#readingError').text(response.responseJSON.errors.reading);
                $('#writingError').text(response.responseJSON.errors.writing);
                $('#grammarError').text(response.responseJSON.errors.grammar);
                $('#pronunciationError').text(response.responseJSON.errors.pronunciation);
                $('#vocabularyError').text(response.responseJSON.errors.vocabulary);
                $('#oral_fluencyError').text(response.responseJSON.errors.oral_fluency);
                $('#spellingError').text(response.responseJSON.errors.spelling);
                $('#written_discourseError').text(response.responseJSON.errors.written_discourse);
             }
         });
    });

    $('body').on('blur', '#certificateScore input', function(){
      var url = $('#update_url').val();
      $.ajax({
         url: url,
         type:'POST',   
         data: $('form#certificateScore').serialize(),          
         success:function(response) {
            var result = response.data;
            $('input[name="grammar"]').val(result.grammar);
            $('input[name="oral_fluency"]').val(result.oral_fluency);
            $('input[name="pronunciation"]').val(result.pronunciation);
            $('input[name="spelling"]').val(result.spelling);
            $('input[name="vocabulary"]').val(result.vocabulary);
            $('input[name="written_discourse"]').val(result.written_disclosure);
            $('input[name="score"]').val(result.overall);
         }, 
         error: function(response) {
            console.log(response);
          }
      });
    });

    $('#certificates').DataTable({
        language: {
            search: '',
            searchPlaceholder: "Search by student name, test name",
            "sLengthMenu": '<select>'+
                '<option value="10">10 Per Page</option>'+
                '<option value="20">20 Per Page</option>'+
                '<option value="30">30 Per Page</option>'+
                '<option value="40">40 Per Page</option>'+
                '<option value="50">50 Per Page</option>'+
                '<option value="-1">All</option>'+
                '</select>', 
            paginate: {
                next: '<i class="fas fa-chevron-right"></i>', // or '→'
                previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'<'col-sm-12 col-md-12'p>>",
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'username', name: 'username'},
           {data: 'test_name', name: 'test_name'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $("#certificates_wrapper div.toolbar").html('Certificates'); 

});