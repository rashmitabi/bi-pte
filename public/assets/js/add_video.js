$(document).ready(function() {
	$('#sections').change(function(){
		var id = $(this).val();
		$.ajax({
                type : 'POST',
                url : url,
                data : {"sec": id},
                success: function(result){
                    console.log(result);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                }
            });
	});
});