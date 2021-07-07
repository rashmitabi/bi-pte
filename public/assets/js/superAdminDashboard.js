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

    $('#near-to-expire_wrapper').css('display', 'none');

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

});