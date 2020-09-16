<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robot" content="index, follow">
    <meta name="googlebot" content="All, Follow, Index" />
    <meta name="description" content="BayarCepat Adalah Distributor & Server Pulsa h2h Termurah dan Terlengkap yang menyediakan berbagai produk. BUKAN CUMA ITU, BayarCepat juga aplikasi untuk melakukan transfer uang antar member dan bank." />
    <meta name="keywords" content="Distributor, Distributor Pulsa, Server Pulsa, Pulsa H2H, Pulsa Murah, distributor pulsa elektrik termurah dan terpercaya, jual pulsa via paypal, jual pulsa online, jual pulsa murah, jual kuota murah, jual token pln listrik murah, jual paket internet murah, jual voucher game murah" />
    <meta name="author" content="BayarCepat" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">
    <!--Core CSS -->
    {{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('stack-head')
    <style>
        body {
            width: 100% !important;
        }
        #select2-province, select {
            height: 40px;
            font-size: 1em;
            border-radius: 4%;
            border: solid #c9cbcd 1px;
        }
    </style>
</head>
<body class="is-fullwidth">

<div class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <span class="logo-text has-text-primary is-bold">{{ config('app.name') }}</span>
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

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Pembelian & Transaksi</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="{{ route('web.dashboard.prepaid.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-mobile-alt"></i></span>
                            <span>Order Prepaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.prepaid.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi Prepaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.postpaid.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-broadcast-tower"></i></span>
                            <span>Order Postpaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.postpaid.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi Postpaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.social-media-marketing.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-hashtag"></i></span>
                            <span>Order SMM Panel</span>
                        </a>
                        <a href="{{ route('web.dashboard.social-media-marketing.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi SMM Panel</span>
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Keuangan</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="{{ route('web.dashboard.send-money.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-paper-plane"></i></span>
                            <span>Kirim Uang</span>
                        </a>
                        <a href="{{ route('web.dashboard.send-money.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Pengiriman</span>
                        </a>
                        <a href="{{ route('web.dashboard.balance.deposit.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-money-bill"></i></span>
                            <span>Deposit Uang</span>
                        </a>
                        <a href="{{ route('web.dashboard.balance.deposit.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-coins"></i></span>
                            <span>Penarikan Uang</span>
                        </a>
                        <a href="#" class="navbar-item">
                            <span class="icon"><i class="fas fa-hashtag"></i></span>
                            <span>Riwayat Deposit & Penarikan</span>
                        </a>
                        <a href="#" class="navbar-item">
                            <span class="icon"><i class="fas fa-credit-card"></i></span>
                            <span>Rekening Bank</span>
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Pengaturan
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            Saldo Rp {{ auth()->user()->balance_number_format }}
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{ route('web.dashboard.profile.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-user-alt"></i></span>
                            <span>Profile</span>
                        </a>
                        <a class="navbar-item" href="{{ route('web.dashboard.pengaturan.index') }}">
                            <span class="icon"><i class="fas fa-store-alt"></i></span>
                            <span>Data Toko</span>
                        </a>
                        <a class="navbar-item" href="{{ route('web.dashboard.api.index') }}">
                            <span class="icon"><i class="fas fa-code"></i></span>
                            <span>Developer Api</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')
@inertia

<footer class="footer has-background-grey-dark">

    <div class="container has-text-centered">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="field">
                <button class="button is-primary is-rounded is-inverted">Logout</button>
            </div>
        </form>
        <hr>
        <p class="has-text-white">
            Copyright &copy; {{ env('APP_NAME') }} <br>
            Jika terjadi kesusahan atau butuh bantuan, silakan hubungi kami.
        </p>
    </div>
</footer>

<!-- Back To Top Button -->
<div id="backtotop"><a><i class="fas fa-angle-up"></i></a></div>

<script src="{{ asset('js/app.js') }}"></script>

<!-- Main js -->
<script src="{{ asset('js/functions.js') }}"></script>
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
