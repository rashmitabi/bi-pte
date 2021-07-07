$(document).ready(function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var sctx = document.getElementById('userSession').getContext('2d');
    const labels = ['Jan','Fab','Mar','Apr','May','Jun'];
    const data = {
        labels: labels,
        datasets: [{
          label: 'My First Dataset',
          data: [65, 59, 80, 81, 56, 55, 40],
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
    const sessionlabels = ['9:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM'];
    const sessiondata = {
        labels: sessionlabels,
        datasets: [{
          label: 'My First Dataset',
          data: [65, 59, 80, 81, 56, 55, 40],
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

    $(document).on('click', '.expired-btn', function(){
      $('.near-expired').removeClass('active');
      $(this).addClass('active');
      $('#near-to-expire').hide();
      $('#expired').show();
    });

    $(document).on('click', '.near-expired', function(){
      $('.expired-btn').removeClass('active');
      $(this).addClass('active');     
      $('#expired').hide(); 
      $('#near-to-expire').show();
    });

});