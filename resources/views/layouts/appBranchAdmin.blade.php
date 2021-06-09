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
    @yield('css-hooks')
</head>
<body>
	<div class="container">
	   	<header class="row">
	   		@include('branchadmin.header')
	   	</header>
	   	@include('branchadmin.sidebar')
	   	<div id="main" class="row">
	        @yield('content')
	   	</div>
	   	<footer class="row">
	       	@include('branchadmin.footer')
	   	</footer>
	</div>
	@yield('js-hooks')
</body>
</html>