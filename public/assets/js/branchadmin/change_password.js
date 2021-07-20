$(document).ready(function() {
    /*branchadmin change password*/
    $(".change-password").click(function(e){ 
        e.preventDefault();        
        $('#passwordError').text('');        
        $('#confirmPass').text('');        
        var url = $(this).attr("data-url");
        var password = $("input[name=password]").val();
        var confirm_password = $("input[name=confirm_password]").val();
        $.ajax({
          type:'POST',
          url :url,
          data:{_token:CSRF_TOKEN,password:password,confirm_password:confirm_password},
          success:function(data){
            if(data == 1){
              window.location.reload();
            }                
           },
           error: function(response) {
              $('#passwordError').text(response.responseJSON.errors.password);
              $('#confirmPass').text(response.responseJSON.errors.confirm_password);
            }
        });

    });

});