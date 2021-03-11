<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <link href="{{ asset('assets/bootstrap-4.2.1-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
          integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md  navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">На главную</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="btn btn-outline-light" href="{{ route('comments.index') }}">{{ __('Комментарии') }}</a>
                <a class="btn btn-outline-light" href="{{ route('users.index') }}">{{ __('Пользователи') }}</a>
            </li>
        </ul>

    </div>
</nav>
<main role="main" class="container">
    @yield('content')
</main>
<script src="{{asset('assets/jquery/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-4.2.1-dist/js/bootstrap.min.js')}}"></script>
</body>
</html>