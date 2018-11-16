<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('build/js/app.js') }}" defer></script>

    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('build/css/app.css') }}" rel="stylesheet">
</head>
<body class="text-center">
<div class="cover-container d-flex w-500 h-100 p-3 mx-auto flex-column" id="app">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Find landscape</h3>
            <nav class="nav nav-masthead justify-content-center">
                @guest
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ \Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </nav>
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