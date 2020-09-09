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
    <meta property="business:contact_data:street_address" content="RT.003/RW.001, Ds.Ngambeg, Kec.Pucuk, Lamongan, Jawa Timur" />
    <meta property="business:contact_data:locality" content="Lamongan" />
    <meta property="business:contact_data:postal_code" content="62257" />
    <meta property="business:contact_data:country_name" content="Indonesia" />
    <meta property="business:contact_data:email" content="bayarcepat@dibumi.com" />
    <meta property="business:contact_data:phone_number" content="+6285607100255" />
    <meta property="business:contact_data:website" content="https://bayarcepat.com" />

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
                        <span class="has-text-black">Kelola</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="" class="navbar-item">
                            Kelola User
                        </a>
                        <a class="navbar-item">
                            Kelola Bank
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Produk</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="" class="navbar-item">
                            Kelola Prepaid
                        </a>
                        <a class="navbar-item">
                            Kelola Postpaid
                        </a>
                        <a class="navbar-item">
                            Kelola Panel Provider
                        </a>
                        <a href="{{ route('web.admin.social-media-marketing.home.index') }}" class="navbar-item">
                            Kelola SMM
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Transaksi</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="" class="navbar-item">
                            Transaksi Prepaid
                        </a>
                        <a class="navbar-item">
                            Transaksi Postpaid
                        </a>
                        <a class="navbar-item">
                            Transaksi Panel
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Wallet</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="" class="navbar-item">
                            Widthdrawal (tarik tunai)
                        </a>
                        <a class="navbar-item">
                            Deposit
                        </a>
                        <a class="navbar-item">
                            Transfer Sesama Member
                        </a>
                    </div>
                </div>

                <a class="navbar-item" href="">
                    Bantuan
                </a>

                <a class="navbar-item" href="">
                    Statistik
                </a>
            </div>
        </div>
    </div>
</div>



@include('partials.notification')
@include('partials.erros')

<div class="section">
    <div class="container">
        <div id="app">
            @yield('content')
        </div>
    </div>
</div>

<!-- Back To Top Button -->
<div id="backtotop"><a><i class="fas fa-angle-up"></i></a></div>

<script src="{{ asset('js/admin.js') }}"></script>

<!-- Main js -->
<script src="{{ asset('js/functions.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>

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
