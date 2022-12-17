<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Task Management</title>
  <link href="{{ asset('css/app.css') }}" type="text/css" />
</head>
<body>
  <div class="container">
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>