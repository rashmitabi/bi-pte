$(document).ready(function() {
	$('#sections').change(function(){
		var id = $(this).val();
		var json = $('#types').data('json');
		var data = json[id];
		var html = '';
		$(data).each(function(i, type){
			html += "<option value='"+type.id+"'>"+type.name+"</option>";
		});
		$('#types').html(html).selectpicker('refresh');
	});

	if($('#sections').val() != ''){
		var id = $('#sections').val();
		var jsondata = $('#types').data('json');
		var typedata = jsondata[id];
		var typehtml = '';
		$(typedata).each(function(i, type){
			typehtml += "<option value='"+type.id+"'>"+type.name+"</option>";
		});
		$('#types').html(typehtml).selectpicker('refresh');
	}

	
});