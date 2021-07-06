$(document).ready(function() {
    //Prediction Edit page data start
    $(document).on('change', '#sections', function(){
    var id = $(this).val();
    var json = $('#types').data('json');
    var data = json[id];
    var html = '';
    $(data).each(function(i, type){
      html += "<option value='"+type.id+"'>"+type.name+"</option>";
    });
    $('#types').html(html).selectpicker('refresh');
  });

  

    $('body').on('click','.file-edit',function(){
           var id = $(this).data('id');
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               data:{'id' : id},
               beforeSend: function(){
                   $('#file-edit-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
               },
               success:function(data) {
                   $('#file-edit-body').html(data.html);
                   $('#sections').selectpicker();
                   $('#types').selectpicker();
               },
           });
   });
   //Prediction Edit page data start

   $(document).on('change', '#customFile', function(){
      var file = $('#customFile').prop('files')[0];
      //console.log(file);
      $('#filename').val(file.name);
      $('#filetype').val(file.type);
      $('#filesize').val(file.size);
   });
   //Prediction update data start
   $('body').on('click','.file-update',function(){
    //console.log(file);
    //console.log($('form').serialize());
       var id = $(this).data('id');
       var apiUrl = $(this).data('url');
       $('#titleError').text('');
       $('#descriptionError').text('');
       $('#fileError').text('');
       $('#sectionError').text('');
       $('#typeError').text('');
       $.ajax({
           url: apiUrl,
           type:'PATCH',
           enctype: 'multipart/form-data',
           data: $('form').serialize(),
           success:function(data) {
               if(data == 1){
                   setTimeout(function(){
                       location.reload();
                   }, 2000);
               }
           },
           error: function(response) {
            console.log(response.responseJSON.errors);
                  $('#titleError').text(response.responseJSON.errors.title);
                  $('#descriptionError').text(response.responseJSON.errors.description);
                  $('#fileError').text(response.responseJSON.errors.file);
                  $('#sectionError').text(response.responseJSON.errors.section_id);
                  $('#typeError').text(response.responseJSON.errors.design_id);
               }
       });
   });
   //Prediction update data end

   var table = $('#prediction').DataTable({
    language: {
       search: '',
       searchPlaceholder: 'Search by video title, section, type, date and status',
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
       {data: 'title', name: 'title'},
       {data: 'link', name: 'link'},
       {data: 'type', name: 'type'},
       {data: 'created by', name: 'created by'},
       {data: 'created date', name: 'created date'},
       {data: 'status', name: 'status'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    $("#prediction_wrapper div.toolbar").html('Prediction Files');
});