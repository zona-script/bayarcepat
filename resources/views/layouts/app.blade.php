<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robot" content="index, follow">
    <meta name="googlebot" content="All, Follow, Index" />
    <meta name="description" content="BayarCepat Adalah Distributor & Server Pulsa h2h Termurah dan Terlengkap yang menyediakan berbagai produk. BUKAN CUMA ITU, BayarCepat juga aplikasi untuk melakukan transfer uang antar member dan bank." />
    <meta name="keywords" content="Distributor, Distributor Pulsa, Server Pulsa, Pulsa H2H, Pulsa Murah, distributor pulsa elektrik termurah dan terpercaya, jual pulsa via paypal, jual pulsa online, jual pulsa murah, jual kuota murah, jual token pln listrik murah, jual paket internet murah, jual voucher game murah" />
    <meta name="author" content="BayarCepat" />
    <meta property="business:contact_data:street_address" content="RT.003/RW.001, Ds.Ngambeg, Kec.Pucuk, Surabaya, Jawa Timur" />
    <meta property="business:contact_data:locality" content="Lamongan" />
    <meta property="business:contact_data:postal_code" content="62257" />
    <meta property="business:contact_data:country_name" content="Indonesia" />
    <meta property="business:contact_data:email" content="bayarcepat@dibumi.com" />
    <meta property="business:contact_data:phone_number" content="+6285607100255" />
    <meta property="business:contact_data:website" content="https://bayarcepat.com" />

    <!--Core CSS -->
{{--    <link rel="stylesheet" href="{{ asset('css/library-bundle.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/main.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}

    <style>
        .pad-top-navbar {
            padding-top: 70px;
        }
    </style>
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
            <div class="navbar-end">
                <a class="navbar-item" href="{{ route('web.pages.produk') }}">
                    Produk & Harga
                </a>
                <a class="navbar-item" href="">
                    Jadi Reseller
                </a>
                <a class="navbar-item" href="{{ route('web.pages.tentang-kami') }}">
                    Panduan
                </a>
                <a class="navbar-item" href="{{ route('web.pages.tentang-kami') }}">
                    Hubungi Kami
                </a>
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

{{--@if(\Illuminate\Support\Facades\Request::route()->getName() != 'web.index')--}}
{{--<div style="padding-top: 110px"></div>--}}
{{--@endif--}}
{{--<div style="padding-top: 70px"></div>--}}
{{--<div class="pad-top-navbar"></div>--}}

<div id="app">
    @yield('content')
</div>

<footer class="footer has-background-grey-dark">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <h4 class="title is-3 is-bold has-text-primary">{{ env('APP_NAME') }}</h4>
                <p class="footer-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices in risus sed fermentum.
                </p>
                <div class="socials">
                    <a><i class="fab fa-instagram"></i></a>
                    <a><i class="fab fa-facebook"></i></a>
                    <a><i class="fab fa-pinterest"></i></a>
                    <a><i class="fab fa-medium"></i></a>
                </div>
            </div>
            <div class="column is-2 is-offset-1">
                <ul class="footer-menu">
                    <li><a href="">Produk & Harga</a></li>
                    <li><a href="">Komunitas</a></li>
                    <li><a href="">Server H2H</a></li>
                    <li><a href="">Metode Pembayaran</a></li>
                    <li><a href="">Dokumentasi Api</a></li>
                </ul>
            </div>
            <div class="column is-2">
                <ul class="footer-menu">
                    <li><a href="">Tentang Kami</a></li>
                    <li><a href="">Hubungi Kami</a></li>
                    <li><a href="{{ route('web.pages.syarat-dan-ketentuan') }}">Syarat dan Ketentuan</a></li>
                    <li><a href="{{ route('web.pages.policy-privacy') }}">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="column is-5">
                <h4 class="title is-5 has-text-weight-bold has-text-white">Unduh Aplikasi</h4>
                <div class="columns">
                    <div class="column"><p class="has-text-white">Masih dalam proses pembuatan</p></div>
                </div>
            </div>
        </div>
        <hr>
        <div class="has-text-centered has-text-white">
            <p>
                &copy; 2020 {{ env('APP_NAME') }}
            </p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('js/functions.js') }}"></script>--}}
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
