$(document).ready(function() {
    //Email Templates Edit page data start
    $('body').on('click','.email-edit',function(){
           var id = $(this).data('id');
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               data:{'id' : id},
               beforeSend: function(){
                   $('#email-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
               },
               success:function(data) {
                   $('#email-edit-body').html(data.html);
                   $("#editor23").each(function(_, ckeditor) {
                      CKEDITOR.replace(ckeditor);
                  });
               },
           });
   });
   //Email Templates Edit page data start
   //Email Templates update data start
   $('body').on('click','.email-update',function(){
       var id = $(this).data('id');
       var apiUrl = $(this).data('url');
       $('#nameError').text('');
       $('#subjectError').text('');
       $('#bodyError').text('');
       $('#statusError').text('');
       $.ajax({
           url: apiUrl,
           type:'PATCH',
           data: $('form').serialize(),
           success:function(data) {
               if(data == 1){
                   setTimeout(function(){
                       location.reload();
                   }, 2000);
               }
           },
           error: function(response) {
               console.log(response.responseJSON.errors.name);
                   $('#nameError').text(response.responseJSON.errors.name);
                   $('#subjectError').text(response.responseJSON.errors.subject);
                   $('#bodyError').text(response.responseJSON.errors.body);
                   $('#statusError').text(response.responseJSON.errors.status);
               }
       });
   });
   //Email Templates update data end
   var table = $('#email').DataTable({
    language: {
       search: '',
       searchPlaceholder: 'Search by template name, subject, created date, status',
       "sLengthMenu": '<select name="module_length">'+
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
       {data: 'name', name: 'name'},
       {data: 'subject', name: 'subject'},
       {data:'created_at',name:'created_at'},
       {data: 'status', name: 'status'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    $("#email_wrapper div.toolbar").html('Email Template');
});