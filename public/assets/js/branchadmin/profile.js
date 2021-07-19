$(document).ready(function(){
	$('body').on('change',"#istate", function(){
	    var state_code = $('option:selected', this).attr('data-code');
	    //console.log(state_code);
	    $("#istate_code").val(state_code);
  	});

  	//user  update data start
  $('body').on('submit','#profileupdate',function(e){
    e.preventDefault();
    var apiUrl = $(this).find('.profile-update').data('url');
    $('#iunameError').text('');
    $('#inameError').text('');
    $('#iemailError').text('');
    $('#ipasswordError').text('');
    $('#iconfirm_passwordError').text('');
    $('#country_codeError').text('');
    $('#phone_noError').text('');
    $('#subdomainError').text('');
    $('#domainError').text('');
    $('#welcome_msgError').text('');
    $('#istateError').text('');
    $('#istate_codeError').text('');
    $('#icityError').text('');
    
    $('#igstinError').text('');
    $('#logoError').text('');
    $('#bannerError').text('');


    $.ajax({
      url: apiUrl,
      type:'POST',
      enctype: 'multipart/form-data',
      data: new FormData(this),
      processData: false,
      contentType: false,
      success:function(data) {
        if(data == 1){
          setTimeout(function(){
            location.reload();
          }, 2000);
        }
      },
      error: function(response) {
      	$('#iunameError').text(response.responseJSON.errors.iuname);
        $('#inameError').text(response.responseJSON.errors.iname);
        $('#iemailError').text(response.responseJSON.errors.iemail);
        $('#country_codeError').text(response.responseJSON.errors.country_code);
        $('#phone_noError').text(response.responseJSON.errors.phone_no);
        $('#subdomainError').text(response.responseJSON.errors.subdomain);
        $('#domainError').text(response.responseJSON.errors.domain);
        $('#welcome_msgError').text(response.responseJSON.errors.welcome_msg);
        $('#istateError').text(response.responseJSON.errors.istate);
        $('#istate_codeError').text(response.responseJSON.errors.istate_code);
        $('#icityError').text(response.responseJSON.errors.icity);        
        $('#igstinError').text(response.responseJSON.errors.igstin);
        $('#logoError').text(response.responseJSON.errors.logo);
        $('#bannerError').text(response.responseJSON.errors.banner);
      }
    });
  });
});