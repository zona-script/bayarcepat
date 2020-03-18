<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ env('APP_NAME') }} - @yield('title')</title>
{{--    <link rel="icon" type="image/png" href="favicon.png"/>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Core CSS -->
{{--    <link rel="stylesheet" href="{{ asset('css/library-bundle.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/main.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}

    <!-- Fonts -->
{{--    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">--}}
    @stack('stack-head')
</head>
<body>
<div class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <span class="logo-text has-text-primary is-bold">{{ env('APP_NAME') }}</span>
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
                <a class="navbar-item" href="{{ route('web.dashboard.index') }}">
                    Dashboard
                </a>

{{--                <a class="navbar-item" href="{{ route('web.dashboard.transaksi.index') }}">--}}
{{--                    Tambah Transaksi--}}
{{--                </a>--}}

{{--                <a class="navbar-item" href="{{ route('web.dashboard.market.index') }}">--}}
{{--                    Market Place--}}
{{--                </a>--}}

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Market Place
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('web.dashboard.market.prabayar.index') }}">
                            Market Prepaid / Prabayar
                        </a>
                        <a class="navbar-item" href="{{ route('web.dashboard.market.pascabayar.index') }}">
                            Market Postpaid / Pascabayar
                        </a>
                    </div>
                </div>

                <a class="navbar-item" href="{{ route('web.dashboard.kirim-uang.index') }}">
                    Kirim Uang
                </a>

{{--                <a class="navbar-item" href="{{ route('web.dashboard.cetak-struk.index') }}">--}}
{{--                    Cetak Struk--}}
{{--                </a>--}}

                <a class="navbar-item" href="{{ route('web.dashboard.riwayat.index') }}">
                    Laporan
                </a>

{{--                <a class="navbar-item" href="{{ route('web.dashboard.api.index') }}">--}}
{{--                    Api--}}
{{--                </a>--}}

                <a class="navbar-item" href="{{ route('web.dashboard.pengaturan.index') }}">
                    Pengaturan
                </a>

                <div class="navbar-item">
                    <a href="{{ route('web.dashboard.profile.index') }}" class="button is-primary is-rounded is-outlined">
                        <span class="icon">
                            <i class="far fa-user"></i>
                        </span>
                        <span>Profile</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div style="padding-top: 52px"></div>--}}
{{--<div style="padding-top: 72px"></div>--}}

<div class="columns">
    <div class="column is-6 is-offset-3">
        @include('partials.notification')
        @include('partials.erros')
    </div>
</div>

<div id="app">
    @yield('content')
</div>

<footer class="footer has-background-grey-dark">
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="container has-text-centered">

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="field">
                        <button class="button is-white is-outlined">Keluar Akun (Log Out)</button>
                    </div>
                </form>

                <hr>
                <p class="has-text-white">
                    Copyright &copy; {{ env('APP_NAME') }} <br>
                    Jika terjadi kesusahan atau butuh bantuan, silakan hubungi kami.
                    <br>
                    Anda dapat menghubungi kami di facebook group [bayarcepat], telegram ['bayarcepat], whatsapp [bayarcepat], email bayarcepat@dibumi.com
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Back To Top Button -->
<div id="backtotop"><a><i class="fas fa-angle-up"></i></a></div>

<script src="{{ asset('js/app.js') }}"></script>

<!-- Concatenated plugins -->
{{--<script src="{{ asset('js/library-bundle.js') }}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>--}}
{{--<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>--}}

<!--Data-->

<!-- Main js -->
<script src="{{ asset('js/functions.js') }}"></script>
{{--<script src="{{ asset('js/main.js') }}"></script>--}}

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
