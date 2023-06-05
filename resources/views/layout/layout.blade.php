<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script type='text/javascript' src='/javascripts/jquery.tipsy.js'></script>
  <title>Zhihu</title>
</head>
<body class="z-mode--dark">
  @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
  @endif
  @yield('content')
</body>
</html>