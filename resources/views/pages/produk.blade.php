@extends('layouts.app')

@section('title', 'Produk & Layanan')

@section('content')
    <div class="hero is-medium">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2 has-text-primary">Produk Kami</h1>
                <h2 class="subtitle is-3">Layanan yang bisa anda gunakan di {{ env('APP_NAME') }}</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container has-text-centered">

            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Marketplace</h3>
                    <p class="subtitle">Tersedia banyak sekali produk atau layanan yang bisa anda beli, mulai dari pulsa, paket data, bayar pln, pdam, dan lain sebagainya.</p>
                </div>
            </div>

            <div class="columns">
                <div class="column is-4 is-offset-2">
                    <a class="box has-text-centered" style="height: 230px">
                        <span>
                            <i class="fas fa-shopping-bag fa-3x"></i>
                        </span>
                        <p class="subtitle">Marketplace Prabayar</p>
                        <p>Pulsa Reguler, E-Money & Ewallet, Ojek Online, Paket Internet, PLN, Voucher Game, Pulsa Transfer, Telepon dan SMS, Pulsa Mancanegara.</p>
                    </a>
                </div>
                <div class="column is-4">
                    <a class="box has-text-centered" style="height: 230px">
                        <span>
                            <i class="fas fa-tv fa-3x"></i>
                        </span>
                        <p class="subtitle">Marketplace Pascabayar</p>
                        <p>PLN Pascabayar, PDAM, HP Pascabayar, Internet Pascabayar, BPJS Kesehatan, Multifinance (Kredit Motor & Asuransi Kesehatan).</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="columns is-vcentered side-feature">
                <div class="column is-5 is-hidden-desktop is-hidden-tablet">
                    <div class="container">
                        <figure class="image is-1by1">
                            <img src="{{ asset('images/undraw_Group_chat_unwm.svg') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="column is-7">
                    <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Beli Produk</h3>
                    <p class="subtitle">
                        Kami menyediakan banyak sekali produk, mulai dari paket internet, pulsa, voucher wifi, voucher game, saldo ewallet, PLN, dan lain sebagainya.
                        Harga produk dibawah ini adalah <u>harga dari server pribadi kami</u>, untuk marketplace harga jauh lebih menarik.</p>
                    <div class="columns">
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.pulsa') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-mobile-alt fa-3x"></i>
                                </span>
                                <p class="subtitle">Pulsa</p>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.pln') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-plug fa-3x"></i>
                                </span>
                                <p class="subtitle">Token PLN</p>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.paket-data') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-globe fa-3x"></i>
                                </span>
                                <p class="subtitle">Paket Data</p>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.wifi') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-wifi fa-3x"></i>
                                </span>
                                <p class="subtitle">Wifi</p>
                            </a>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.nelfon-sms') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-sms fa-3x"></i>
                                </span>
                                <p class="subtitle">Telepon</p>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.gift-card') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-gift fa-3x"></i>
                                </span>
                                <p class="subtitle">Gift Card</p>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.game-online') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-trophy fa-3x"></i>
                                </span>
                                <p class="subtitle">Game</p>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{ route('web.pages.produk.harga.ewallet') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-motorcycle fa-3x"></i>
                                </span>
                                <p class="subtitle">Ojek Online</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column is-5 is-hidden-mobile">
                    <div class="container">
                        <figure class="image is-5by4">
                            <img src="{{ asset('images/undraw_Group_chat_unwm.svg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="columns is-vcentered side-feature">
                <div class="column is-5 is-hidden-desktop is-hidden-tablet">
                    <div class="container">
                        <figure class="image is-1by1">
                            <img src="{{ asset('images/undraw_segmentation_uioo.svg') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="column is-5 is-hidden-mobile">
                    <div class="container">
                        <figure class="image is-5by4">
                            <img src="{{ asset('images/undraw_segmentation_uioo.svg') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="column is-7">
                    <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Kirim Uang & Tukar</h3>
                    <p class="subtitle">Anda bisa kirim uang suka suka kamu ke sesama member atau ke bank, anda juga bisa kirim uang dari paypal ke bank. Untuk kedepannya akan kami tambahkan sesuai permintaan anda.</p>
                    <div class="columns">
                        <div class="column is-6">
                            <a class="box has-text-centered">
                                <span>
                                <i class="fas fa-piggy-bank fa-3x"></i>
                                </span>
                                <p class="subtitle">Kirim Ke Sesama Member</p>
                            </a>
                        </div>
                        <div class="column is-6">
                            <a class="box has-text-centered">
                                <span>
                                <i class="fas fa-university fa-3x"></i>
                                </span>
                                <p class="subtitle">Kirim Ke Rekening Bank</p>
                            </a>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <a class="box has-text-centered">
                                <span>
                                <i class="fab fa-paypal fa-3x"></i>
                                </span>
                                <p class="subtitle">Dari Paypal ke Bank</p>
                            </a>
                        </div>
                        <div class="column is-6">
                            <a class="box has-text-centered">
                                <span>
                                <i class="fas fa-clock fa-3x"></i>
                                </span>
                                <p class="subtitle">Lainnya? tunggu aja</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section is-medium has-background-danger">
        <div class="container">
            <div class="has-text-centered">
                <p class="title has-text-white">Butuh Fitur Lainnya?</p>
                <p class="subtitle has-text-white">Berikan saran ke kami dan kami akan membuatkan permintaan anda sesegera mungkin.</p>
            </div>
        </div>
    </div>

@endsection
