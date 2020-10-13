<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }}   @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robot" content="index, follow">
    <meta name="googlebot" content="All, Follow, Index" />
    <meta name="description" content="BayarCepat Adalah Distributor & Server Pulsa h2h Termurah dan Terlengkap yang menyediakan berbagai produk. BUKAN CUMA ITU, BayarCepat juga aplikasi untuk melakukan transfer uang antar member dan bank." />
    <meta name="keywords" content="Distributor, Distributor Pulsa, Server Pulsa, Pulsa H2H, Pulsa Murah, distributor pulsa elektrik termurah dan terpercaya, jual pulsa via paypal, jual pulsa online, jual pulsa murah, jual kuota murah, jual token pln listrik murah, jual paket internet murah, jual voucher game murah" />
    <meta name="author" content="BayarCepat" />
    <meta property="business:contact_data:street_address" content="RT.003/RW.001, Ds.Ngambeg, Kec.Pucuk, Lamongan, Jawa Timur" />
    <meta property="business:contact_data:locality" content="Lamongan" />
    <meta property="business:contact_data:postal_code" content="62257" />
    <meta property="business:contact_data:country_name" content="Indonesia" />
    <meta property="business:contact_data:email" content="bayarcepat@dibumi.com" />
    <meta property="business:contact_data:phone_number" content="+6285607100255" />
    <meta property="business:contact_data:website" content="https://bayarcepat.com" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
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

    <!-- use the latest vue-select release -->
    <script defer src="https://unpkg.com/vue-select@latest"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">

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
                        <hr class="navbar-divider">
                        <a href="{{ route('web.dashboard.postpaid.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-broadcast-tower"></i></span>
                            <span>Order Postpaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.postpaid.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi Postpaid</span>
                        </a>
                        <hr class="navbar-divider">
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
                        <a href="{{ route('web.dashboard.send-money.history.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Pengiriman</span>
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{ route('web.dashboard.balance.deposit.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-money-bill"></i></span>
                            <span>Deposit Uang</span>
                        </a>
                        <a href="{{ route('web.dashboard.balance.deposit.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-coins"></i></span>
                            <span>Penarikan Uang</span>
                        </a>
                        <a href="{{ route('web.dashboard.balance.history.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Deposit & Penarikan</span>
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{ route('web.dashboard.bank.index') }}" class="navbar-item">
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
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="navbar-item">
                                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                                <button>Logout</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.notification')
@include('partials.erros')


@yield('content')

@if (isset($slot))
    {{ $slot }}
@endif

@if (isset($page))
    @inertia
@endif

{{--<div id="app">--}}
{{--    @yield('content')--}}
{{--</div>--}}

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

<script src="{{ asset('js/app.js') }}"></script>

<!-- Concatenated plugins -->
{{--<script src="{{ asset('js/library-bundle.js') }}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>--}}
{{--<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>--}}

<!--Data-->

<!-- Main js -->
<script src="{{ asset('js/functions.js') }}"></script>
{{--<script src="{{ asset('js/main.js') }}"></script>--}}

{{--<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>--}}

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
<script>
    import Button from "../../js/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
