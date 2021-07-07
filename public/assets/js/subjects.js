$(document).ready(function() {
    //Subject Edit page data start
    $('body').on('click','.subject-edit',function(){
           var id = $(this).data('id');
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               data:{'id' : id},
               beforeSend: function(){
                   $('#subject-edit-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
               },
               success:function(data) {
                   $('#subject-edit-body').html(data.html);
               },
           });
   });
   //Subject Edit page data start
   //Subject update data start
   $('body').on('click','.subject-update',function(){
       var id = $(this).data('id');
       var apiUrl = $(this).data('url');
       $('#nameError').text('');
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
                  $('#nameError').text(response.responseJSON.errors.name);
               }
       });
   });
   //Subject update data end

   var table = $('#subjects').DataTable({
    language: {
        processing: 'Loading...',
       search: '',
       searchPlaceholder: 'Search by subject name',
       sLengthMenu: '<select name="module_length">'+
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
       {data: 'subject_name', name: 'subject_name'},
       {data: 'status', name: 'status'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    $("#subjects_wrapper div.toolbar").html('Subjects');
});