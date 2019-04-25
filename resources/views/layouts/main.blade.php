<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
  	<div class="container-fluid">
  		<div class="navbar-header"></div>
  		<div class="collapse navbar-collapse" id="navbarEexample10">
        <p class="navbar-text navbar-right"><a href="{{ url('/registerStaff') }}">Register</a></p>
        <p class="navbar-text navbar-right"><a href="{{ url('/signin') }}">Login</a></p>
        <p class="navbar-text navbar-right">ようこそ <a href="#" class="navbar-link">{{Session::get('Staff_Name')}}</a> さん。</p>
  		</div>
  	</div>
  </nav>
  <div id="app">
      <main class="py-4">
          @yield('content')
      </main>
  </div>
</body>
</html>
