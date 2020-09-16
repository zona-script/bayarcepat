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
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Produk & Layanan
                    </a>

                    <div class="navbar-dropdown">
                        <a href="{{ route('web.pages.products.prepaid') }}" class="navbar-item">
                            Produk Prabayar (Prepaid)
                        </a>
                        <a href="{{ route('web.pages.products.postpaid') }}" class="navbar-item">
                            Produk Pascabayar (Postpaid)
                        </a>
                        <a href="{{ route('web.pages.products.smm') }}" class="navbar-item">
                            Produk Social Media & Marketing
                        </a>
                    </div>
                </div>
                <a class="navbar-item" href="{{ route('web.pages.membership') }}">
                    Membership
                </a>
                <a class="navbar-item" href="#">
                    Panduan
                </a>
                <a class="navbar-item" href="{{ route('web.pages.hubungi-kami') }}">
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

<div id="app">
    @yield('content')
</div>

<footer class="footer has-background-black">
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                <h4 class="title is-3 is-bold has-text-primary">{{ config('app.name') }}</h4>
                <p class="footer-text has-text-justified">
                    kami adalah Marketplace Distributor H2H produk digital dan non digital. Anda bisa membeli produk, kirim uang antar bank, kirim uang dari paypal, dan masih banyak lagi.
                </p>
                <div class="socials">
                    <a><span class="has-text-light"><i class="fab fa-instagram"></i></span></a>
                    <a><i class="fab fa-facebook"></i></a>
                    <a><i class="fab fa-pinterest"></i></a>
                    <a><i class="fab fa-medium"></i></a>
                </div>
            </div>
            <div class="column is-3">
                <h4 class="title is-5 has-text-weight-bold has-text-white">Produk & Layanan</h4>
                <ul class="footer-menu">
                    <li><a href="#">Produk Prepaid (Prabayar)</a></li>
                    <li><a href="#">Produk Postpaid (Pascabayar)</a></li>
                    <li><a href="#">Produk Social Media & Marketing</a></li>
                    <li><a href="#">Dokumentasi Api</a></li>
                </ul>
            </div>
            <div class="column is-3">
                <h4 class="title is-5 has-text-weight-bold has-text-white">Tentang Kami</h4>
                <ul class="footer-menu">
                    <li><a href="{{ route('web.pages.tentang-kami') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('web.pages.hubungi-kami') }}">Hubungi Kami</a></li>
                    <li><a href="{{ route('web.pages.syarat-dan-ketentuan') }}">Syarat dan Ketentuan</a></li>
                    <li><a href="{{ route('web.pages.policy-privacy') }}">Kebijakan Privasi</a></li>
                    <li><a href="https://www.facebook.com/groups/515510122483803/">Komunitas</a></li>
                    <li><a href="{{ route('web.pages.payment-method') }}">Metode Pembayaran</a></li>
                </ul>
            </div>
            <div class="column is-2">
                <h4 class="title is-5 has-text-weight-bold has-text-white">Unduh Aplikasi</h4>
                <div class="columns">
                    <div class="column"><p class="has-text-white">Masih dalam proses pembuatan</p></div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6 is-dashed">
                <div class="container has-text-left has-text-white">
                    <p class="has-text-danger">PERINGATAN !!!</p>
                    <p class="is-uppercase">
                        HATI HATI PENIPUAN ATAS NAMA {{ config('app.name') }}
                        <br>
                        <u class="has-text-justified">
                            Kami bukan aplikasi untuk peminjaman uang online, bukan aplikasi jasa cicilan, bukan aplikasi investasi, bukan aplikasi p2p lending, bukan aplikasi urun dana, bukan aplikasi kredit online.
                        </u>
                    </p>
                </div>
            </div>
            <div class="column is-6">
                <div class="container has-text-left has-text-white">
                    <p>HUBUNGI KAMI</p>
                    <p>
                        <span class="icon has-text-white">
  <i class="fas fa-map-marker-alt"></i>
</span>
                        <span>jl. gebang wetan no.23B Gebang Putih, Sukolilo, Surabaya (60117).</span>
                    </p>
                    <p>
                        <span class="icon has-text-white">
  <i class="fas fa-phone"></i>
</span>
                        <span>+62856xxxxxxxx</span>
                    </p>
                    <p>
                        <span class="icon has-text-white">
  <i class="fas fa-envelope"></i>
</span>
                        <span>bayarcepat@dibumi.com</span>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="has-text-centered has-text-white">
            <p>
                &copy; 2020 {{ config('app.name') }}
            </p>
            <p>Dibangun dengan sepenuh <span class="has-text-danger"><i class="fas fa-heart"></i></span> di Indonesia</p>
        </div>
    </div>
</footer>

{{--@auth--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--@endauth--}}
{{--<script src="{{ asset('js/functions.js') }}"></script>--}}
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
