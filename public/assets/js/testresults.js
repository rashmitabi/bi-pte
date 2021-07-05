var table = $('#results').DataTable({
      language: {
         search: '',
         searchPlaceholder: 'Search by test results name, created date, status',
         "sLengthMenu": '<select name="results_length">'+
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
         {data: 'test_type', name: 'test_type'},
         {data: 'subject', name: 'subject'},
         {data: 'score', name: 'score'},
         {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
   });
   $("#results_wrapper div.toolbar").html('Manage Test Results');


   // 
   $(document).ready(function() {
    //Role Edit page data start
   $('body').on('click','.results-edit',function(){
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               beforeSend: function(){
                   $('#result-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
               },
               success:function(data) {
                   $('#result-edit-body').html(data.html);
                   $('.progress-pie-chart').each(function(){
                      var $ppc = $(this),
                      percent = parseInt($ppc.data('percent')),
                        deg = 360*percent/90;
                      if (percent > 50) {
                        $ppc.addClass('gt-50');
                      }
                      $(this).find('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
                      $(this).find('.ppc-percents span').html(percent);
                   });
               },
           }); 
   });
   //Role Edit page data start
});