@extends('layouts.app')

@section('title', 'Produk & Layanan')

@section('content')
    <div class="hero is-medium is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2">Produk Kami</h1>
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
                    <a class="box has-text-centered">
                        <span>
                            <img src="data:image/png;base64,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"/>
                        </span>
                        <p class="subtitle">Marketplace Prabayar</p>
                        <p>Pulsa Reguler, E-Money & Ewallet, Ojek Online, Paket Internet, PLN, Voucher Game, Pulsa Transfer, Telepon dan SMS, Pulsa Mancanegara.</p>
                    </a>
                </div>
                <div class="column is-4">
                    <a class="box has-text-centered">
                        <span>
                            <img src="data:image/png;base64,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"/>
                        </span>
                        <p class="subtitle">Marketplace Pascabayar</p>
                        <p>PLN Pascabayar, PDAM, HP Pascabayar, Internet Pascabayar (Speedy, CBN, TelkomPSTN), BPJS Kesehatan, Multifinance (Kredit Motor).</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--
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

    -->
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
