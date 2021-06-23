$(document).ready(function() {
	$('#sections').change(function(){
		var id = $(this).val();
		var json = $('#types').data('json');
		var data = json[id];
		var html = '';
		$(data).each(function(i, type){
			html += "<option value='"+type.id+"'>"+type.name+"</option>";
		});
		$('#types').html(html).selectpicker('refresh');;
	});
});