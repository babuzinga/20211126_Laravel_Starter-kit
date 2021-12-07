<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
  <title>@yield('title')</title>
</head>
<body>
<!-- https://getbootstrap.com/docs/5.1/examples/ -->
<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="https://laravel.com/docs/8.x/" target="_blank"
       class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="fs-4">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
      @auth
      <li class="nav-item"><a href="{{ route('task.list') }}"
                              class="nav-link {{ (request()->is('tasks')) ? 'active' : '' }}"
                              aria-current="page">Tasks</a></li>
      <li class="nav-item"><a href="{{ route('user.home') }}"
                              class="nav-link">Home</a></li>
      <li class="nav-item"><a href="{{ route('user.logout') }}"
                              class="nav-link">Logout</a></li>
      @else
      <li class="nav-item"><a href="{{ route('user.register') }}"
                              class="nav-link {{ (request()->is('register')) ? 'active' : '' }}">Register</a></li>
      <li class="nav-item"><a href="{{ route('user.login') }}"
                              class="nav-link {{ (request()->is('login')) ? 'active' : '' }}">Login</a></li>
      @endauth
    </ul>
  </header>
</div>

<section class="container py-3">
  @yield('content')
</section>
</body>
</html>