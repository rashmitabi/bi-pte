@if ($message = Session::get('success'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
<?php Session::forget('success');?>
@endif
@if ($message = Session::get('error'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
<?php Session::forget('error');?>
@endif
@if ($message = Session::get('warning'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
<?php Session::forget('warning');?>
@endif
@if ($message = Session::get('info'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
<?php Session::forget('info');?>
@endif

