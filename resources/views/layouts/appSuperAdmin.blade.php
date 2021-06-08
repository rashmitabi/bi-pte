<!doctype html>
<html>
<head>
</head>
<body>
<div class="container">
   <header class="row">
   @include('superadmin.header')
   </header>
   <div id="main" class="row">
           @yield('content')
   </div>
   <footer class="row">
       @include('superadmin.footer')
   </footer>
</div>
</body>
</html>