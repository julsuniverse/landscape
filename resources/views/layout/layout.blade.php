<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('build/js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('build/css/app.css') }}" rel="stylesheet">
</head>
<body class="text-center">
<div class="cover-container d-flex w-500 h-100 p-3 mx-auto flex-column" id="app">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Find landscape</h3>
        </div>
    </header>

    @yield('content')

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>author: Julia Grabovskaya</p>
        </div>
    </footer>
</div>
<div id="spinner">
    <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div>
</body>
</html>