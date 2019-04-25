<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<!-- オプションのテーマ -->
<style>
：
</style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <div class="navbar-brand"">商品マスタメニュー</div>
  </div>
  <div id="navbar" class="collapse navbar-collapse">
  <ul class="nav navbar-nav">
    <li><a href="/search">検索・更新</a></li>
    <li><a href="/create">新規登録</a></li>
    <li><a href="/list">商品一覧</a></li>
    <li><a href="/listEloquent">商品一覧(エロクアント)</a></li>
  </ul>

  <!-- Right Side Of Navbar -->
  <ul class="nav navbar-nav navbar-right">
  <!-- Authentication Links -->
  @if (Auth::guest())
  <!--<li><a href="{{ url('/login') }}">Login</a></li>-->
  <li><a href="#">ようこそ {{Session::get('Staff_Name')}} さん。</a></li>
  <li><a href="{{ url('/registerStaff') }}">Register</a></li>
  <li><a href="{{ url('/signin') }}">Logout</a></li>

  @else
  <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
  {{ Auth::user()->name }} <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" role="menu">
  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
  </ul>
  </li>
  @endif
  </ul>

  </div>
  <!--/.nav-collapse -->
  </div>
</nav>

<div class="container" style="margin-top: 100px;">
@yield('content')
</div><!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
