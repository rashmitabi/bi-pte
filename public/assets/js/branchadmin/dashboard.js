$(document).ready(function() {
    var sctx = document.getElementById('userSession').getContext('2d');
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
    });

    $('body').on('click', '#nearToExpireSub', function(){
      $('#expiredSub').removeClass('active');
      $(this).addClass('active');     
      $('#expired_wrapper').css('display', 'none'); 
      $('#near-to-expire_wrapper').css('display', 'block');
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
 
    $("#from_date").datepicker({
      todayHighlight: true,
      format:'yyyy-mm-dd'
  });
  $("#to_date").datepicker({
      todayHighlight: true,
      format:'yyyy-mm-dd'
  });
});