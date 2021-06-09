<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/admin-custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/scss/admin-common.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/scss/admin-style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body>
<div class="">
   <header class="">
   @include('superadmin.header')
   </header>
   <div id="main" class="">
           @yield('content')
   </div>
   <footer class="">
       @include('superadmin.footer')
   </footer>
</div>
</body>
</html>