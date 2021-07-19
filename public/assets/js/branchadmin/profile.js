$(document).ready(function(){
	$('body').on('change',"#istate", function(){
	    var state_code = $('option:selected', this).attr('data-code');
	    //console.log(state_code);
	    $("#istate_code").val(state_code);
  	});
});