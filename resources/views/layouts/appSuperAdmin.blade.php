<?php 
$currentPageURL = URL::current();
$pageArray = explode('/', $currentPageURL);
$pageActive = isset($pageArray[4]) ? $pageArray[4] : 'dashboard';
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>@yield('title', 'PTE Project')</title>
		<meta charset="utf-8">
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	    <meta content="ie=edge" http-equiv="x-ua-compatible">
	    <meta content="template language" name="keywords">
	    <meta content="" name="author">
	    <meta content="" name="description">
	    <meta content="width=device-width, initial-scale=1" name="viewport">
	    <link href="favicon.png" rel="shortcut icon">
	    <!-- Scripts -->
	    <script src="{{ asset('js/app.js') }}" defer></script>
	    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}" defer></script>
	    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	
	    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" defer></script>
	    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" defer></script>
	    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}" defer></script>
	    <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}" defer></script>
	    <!-- <script src="{{ asset('assets/js/ckeditor.js') }}" defer></script> -->
		<!-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>   -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
	    <script src="{{ asset('assets/js/admin-custom.js') }}" defer></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" defer></script>
		  <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
	    <!-- Fonts -->
	    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	    <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet">

	    <!-- Styles -->
	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/scss/admin-common.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/scss/admin-style.css') }}" rel="stylesheet">

	    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/css/jquery-confirm.css') }}" rel="stylesheet">

	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	      rel="stylesheet">
		  <style>
		  		.error-msg{
					  color:red;
				  }
				.error{
					color:red;
				}
		  </style>
	    @yield('css-hooks')
	</head>
	<body>
		<div id="app">
			<!-- start top bar -->
		    @include('superadmin.header')
		    <!-- end top bar --> 
		    <div class="wrapper">
			    <!-- start side bar -->
			    @include('superadmin.sidebar')
			    <!-- end side bar -->
		    
		        @yield('content')
		    </div>
		</div>
		<script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script>
		@include('superadmin.deleteModel')
		@include('superadmin.alert')
		<script type="text/javascript">
    		var DATE = "{{ date('d-m-Y') }}";
    		var current_page_url = "<?php echo URL::current(); ?>";
    		var current_page_fullurl = "<?php echo URL::full(); ?>";
    		var CSRF_TOKEN= "{{ csrf_token() }}";
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#notify-box").click(function(){
  					$(".dropdown-toggle-wrap").toggle();
				});
				$("#profile-box").click(function(){
  					$(".logout-dropdown").toggle();
				});
			});
		</script>
		@yield('js-hooks')
	</body>
</html>