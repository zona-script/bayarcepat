<!DOCTYPE html>
<html lang="id" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robot" content="index, follow">
    <meta name="googlebot" content="All, Follow, Index" />
    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('sass/app.css') }}">
    @stack('stack-head')
    <style>
        .is-dashed {
            border: dashed 2px #e3e3e3;
            padding: 0 10px 10px 10px;
            margin-bottom: 30px;
        }
        .is-dashed-no-mp {
            border: dashed 2px #e3e3e3;
        }
    </style>
</head>
<body class="is-fullwidth">
<div class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <h1 class="title is-4 has-text-primary is-uppercase">
                    <svg width="20" height="20" id="face-i-d" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8,21H4a1,1,0,0,1-1-1V16" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M16,21h4a1,1,0,0,0,1-1V16" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M3,16v4a1,1,0,0,0,1,1H8" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M3,8V4A1,1,0,0,1,4,3H8" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M21,8V4a1,1,0,0,0-1-1H16" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path d="M12,7v3c0,1,0,3-2,3M8,9V7m8,2V7M8,16a6.08,6.08,0,0,0,8,0" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                    <span class="has-text-dark">BayarCepat</span>
                </h1>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end has-text-left">
                @guest
                    <div class="navbar-item">
                        <a href="{{ route('login') }}" class="button is-primary is-rounded">
                            Masuk
                        </a>
                    </div>
                    <div class="navbar-item">
                        <a href="{{ route('register') }}" class="button is-primary is-outlined is-rounded">
                            Daftar
                        </a>
                    </div>
                @endguest
                @auth
                    <div class="navbar-item">
                        <a href="{{ route('web.dashboard.index') }}" class="button is-primary is-rounded">
                            Dashboard
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

@if (isset($slot))
    {{ $slot }}
@endif

<div id="app">
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <div class="has-text-centered">
            <p>
                &copy; 2020 {{ config('app.name') }}
            </p>
        </div>
    </div>
</footer>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
@stack('stack-foot')
<!--Pages-->
</body>
</html>
