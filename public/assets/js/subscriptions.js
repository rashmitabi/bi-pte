$(document).ready(function() {
    //Subscription Edit page data start
    $('body').on('click','.subscription-edit',function(){
           var id = $(this).data('id');
           var apiUrl = $(this).data('url');
           $.ajax({
               url: apiUrl,
               type:'GET',
               data:{'id' : id},
               beforeSend: function(){
                   $('#sub-edit-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
               },
               success:function(data) {
                   $('#sub-edit-body').html(data.html);
               },
           });
   });
   //Subscription Edit page data start
   //Subscription update data start
   $('body').on('click','.subscription-update',function(){
       var id = $(this).data('id');
       var apiUrl = $(this).data('url');
       $('#titleError').text('');
       $('#descriptionError').text('');
       $('#roleidError').text('');
       $('#studentsAllowedError').text('');
       $('#monthlyPriceError').text('');
       $('#quarterlyPriceError').text('');
       $('#halfyearlyPriceError').text('');
       $('#annuallyPriceError').text('');
       $('#whiteLabellingPriceError').text('');
       $('#mockTestsError').text('');
       $('#practiceTestsError').text('');
       $('#practiceQuestionsError').text('');
       $('#videosError').text('');
       $('#predictionFilesError').text('');
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
                   $('#titleError').text(response.responseJSON.errors.title);
                   $('#descriptionError').text(response.responseJSON.errors.description);
                   $('#roleidError').text(response.responseJSON.errors.role_id);
                   $('#studentsAllowedError').text(response.responseJSON.errors.students_allowed);
                   $('#monthlyPriceError').text(response.responseJSON.errors.monthly_price);
                   $('#quarterlyPriceError').text(response.responseJSON.errors.quarterly_price);
                   $('#halfyearlyPriceError').text(response.responseJSON.errors.halfyearly_price);
                   $('#annuallyPriceError').text(response.responseJSON.errors.annually_price);
                   $('#whiteLabellingPriceError').text(response.responseJSON.errors.white_labelling_price);
                   $('#mockTestsError').text(response.responseJSON.errors.mock_tests);
                   $('#practiceTestsError').text(response.responseJSON.errors.practice_tests);
                   $('#practiceQuestionsError').text(response.responseJSON.errors.practice_questions);
                   $('#videosError').text(response.responseJSON.errors.videos);
                   $('#predictionFilesError').text(response.responseJSON.errors.prediction_files);
                   $('#statusError').text(response.responseJSON.errors.status);
               }
       });
   });
   //Subscription update data end
   var table = $('#subscription').DataTable({
    language: {
       search: '',
       searchPlaceholder: 'Search by Subscription title, monthly price, created date, status',
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
       {data: 'title', name: 'title'},
       {data: 'monthly_price', name: 'monthly_price'},
       {data: 'quarterly_price', name: 'quarterly_price'},
       {data: 'halfyearly_price', name: 'halfyearly_price'},
       {data: 'annually_price', name: 'annually_price'},
       {data: 'white_labelling_price', name: 'white_labelling_price'},
       {data: 'students_allowed', name:'students_allowed'},
       {data: 'mock_tests', name:'mock_tests'},
       {data: 'practice_tests', name:'practice_tests'},
       {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    $("#subscription_wrapper div.toolbar").html('Manage Subscription');
});