<style>
.jconfirm .jconfirm-box div.jconfirm-content-pane .jconfirm-content{
	color: green;
	font-weight: 600;
}
</style>
@if ($message = Session::get('success'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
{{ Session::forget('success'); }}
@endif
@if ($message = Session::get('error'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
{{ Session::forget('error'); }}
@endif
@if ($message = Session::get('warning'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
{{ Session::forget('warning'); }}
@endif
@if ($message = Session::get('info'))
<script type="text/javascript">
	$.alert({
		title: '',
		content: '{{$message}}'
	});
</script>
{{ Session::forget('info'); }}
@endif

