$(document).ready(function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var sctx = document.getElementById('userSession').getContext('2d');
    var months = $('#myChart').data('label');
    var count = $('#myChart').data('values');        
    var data = {
        labels: months,
        datasets: [{
          label: 'Subscriptions',
          data: count,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          backgroundColor:'rgb(75, 192, 192)',
          tension: 0.1
        }]
      };
        var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var sessionlabels = $('#userSession').data('label');
    var num = $('#userSession').data('values');
    const sessiondata = {
        labels: sessionlabels,
        datasets: [{
          label: 'Users',
          data: num,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          backgroundColor:'rgb(75, 192, 192)',
          tension: 0.1
        }]
      };
        var myChart = new Chart(sctx, {
        type: 'line',
        data: sessiondata,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    

    $('body').on('click', '#expiredSub', function(){
      $('#nearToExpireSub').removeClass('active');
      $(this).addClass('active');
      $('#near-to-expire_wrapper').css('display', 'none');
      $('#expired_wrapper').css('display', 'block');
      if($('#expired_wrapper').find('.dataTables_empty')){            
        $('#expired_wrapper').find('.dataTables_empty').attr('colspan', '6');
      }
    });

    $('body').on('click', '#nearToExpireSub', function(){
      $('#expiredSub').removeClass('active');
      $(this).addClass('active');     
      $('#expired_wrapper').css('display', 'none'); 
      $('#near-to-expire_wrapper').css('display', 'block');
      if($('#near-to-expire_wrapper').find('.dataTables_empty')){            
        $('#near-to-expire_wrapper').find('.dataTables_empty').attr('colspan', '6');
      }
    });

    $('#activitylog').DataTable({
        language: {
            paginate: {
              next: '<i class="fas fa-chevron-right"></i>', // or '→'
              previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
          "<'row'<'col-sm-12't>>" +
          "<'row'>",
        processing: true,
        serverSide: true,
        ajax: activityurl,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'subject', name: 'subject'},
           {data: 'created by', name: 'created by'},
           {data: 'created date', name: 'created date'},
        ]
    });
    $("#activitylog_wrapper div.toolbar").html(''); 

    $('#transaction').DataTable({
        language: {
            paginate: {
              next: '<i class="fas fa-chevron-right"></i>', // or '→'
              previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
        processing: true,
        serverSide: true,
        ajax: transactionurl,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'transaction_id', name: 'transaction_id'},
           {data: 'name', name: 'name'},
           {data: 'amount', name: 'amount'},
           {data: 'date', name: 'date'},
        ]
    });

    $("#transaction_wrapper div.toolbar").html(''); 

    $('#expired').DataTable({
        language: {
            paginate: {
              next: '<i class="fas fa-chevron-right"></i>', // or '→'
              previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
        processing: true,
        serverSide: true,
        ajax: expiredSubscriptionurl,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'name', name: 'name'},
           {data: 'status', name: 'status'},
           {data: 'price', name: 'price'},
           {data: 'institute', name: 'institute'},
           {data: 'date', name: 'date'},
        ]
    });
    $("#expired_wrapper div.toolbar").html(''); 

    $('#near-to-expire').DataTable({
        language: {
            paginate: {
              next: '<i class="fas fa-chevron-right"></i>', // or '→'
              previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
        processing: true,
        serverSide: true,
        ajax: neartoexpiresubscriptionurl,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'name', name: 'name'},
           {data: 'status', name: 'status'},
           {data: 'price', name: 'price'},
           {data: 'institute', name: 'institute'},
           {data: 'date', name: 'date'},
        ]
    });
    $("#near-to-expire_wrapper div.toolbar").html('');  
    $('#near-to-expire_wrapper').css('display', 'none'); 

    

    $('#ranking').DataTable({
        language: {
            paginate: {
              next: '<i class="fas fa-chevron-right"></i>', // or '→'
              previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        },  
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
        processing: true,
        serverSide: true,
        ajax: toprankinginstitutesurl,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'institute_name', name: 'institute_name'},
           {data: 'students', name: 'students'},
           {data: 'mobile', name: 'mobile'},
        ]
    });
    $("#ranking_wrapper div.toolbar").html(''); 
    $("#from_date").datepicker({
      todayHighlight: true,
      format:'yyyy-mm-dd'
  });
  $("#to_date").datepicker({
      todayHighlight: true,
      format:'yyyy-mm-dd'
  });

  $('#from_date, #to_date').change(function(){
     filterTransactions();
  });
});

function filterTransactions(){
  var from = $("#from_date").val();
  var to  = $("#to_date").val();
  $("#transaction").DataTable().destroy();
  $('#transaction').DataTable({
        language: {
            paginate: {
              next: '<i class="fas fa-chevron-right"></i>', // or '→'
              previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
            }
        }, 
        "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>>>" +
        "<'row'<'col-sm-12't>>" +
        "<'row'>",
        processing: true,
        serverSide: true,
        ajax: transactionurl+'?from='+from+'&to='+to,
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'transaction_id', name: 'transaction_id'},
           {data: 'name', name: 'name'},
           {data: 'amount', name: 'amount'},
           {data: 'date', name: 'date'},
        ]
    });
}