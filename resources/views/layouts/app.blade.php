<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="Baranyai Máté" />
    <meta name="description" content="Fotone" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163588271-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163588271-1');
    </script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('logo/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('logo/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-config" content="{{ asset('logo/browserconfig.xml') }}" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Open Graph -->
    <meta property="og:title" content="Fotone" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ asset('logo/og.png') }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://fotone.baranyaimate.net" />
</head>

<body>

    @include('cookieConsent::index')

    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <img src="{{ asset('svg/logo.svg') }}" alt="{{ config('app.name') }}" width="30" height="30" class="d-inline-block align-top">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mt-2 mt-md-0">
                            <a class="nav-link rounded px-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded px-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                    @endguest
                    @auth
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item mt-2 mt-md-0">
                            <a class="nav-link rounded px-2" href="{{ route('profile.show', Auth::user()->id) }}">
                                Profile
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link rounded px-2" href="{{ route('upload') }}">
                                New Post
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link rounded px-2" href="{{ route('chat') }}">
                                Chat
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link rounded px-2" href="{{ route('profile.edit', Auth::user()->id) }}">
                                Settings
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link rounded px-2" href="{{ route('listUsers') }}">
                                Users
                            </a>
                        </div>

                        <div class="dropdown-divider"></div>

                        <div class="nav-item">
                            <a id="nav-logout" class="nav-link rounded px-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
