@extends('layouts.app')

@section('title', 'Bisnis Pembayaran dan Keuangan Dalam Satu Genggaman')

@section('content')
    <div class="hero is-medium is-white hero-welcome">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1 has-text-primary">{{ config('app.name') }}</h1>
                <div class="columns">
                    <div class="column is-8 is-offset-2 has-text-centered">
                        <h2 class="subtitle is-4 is-uppercase">Dengan {{ config('app.name') }} cukup satu akun, dapat digunakan bertransaksi dengan ratusan server sekaligus</h2>
                    </div>
                </div>
                <p class="subtitle is-5 is-lower-alpha">Lupakan cara lama, mulai cara baru</p>

                {{--                <p class="subtitle is-5 is-uppercase">Buat Toko Anda <u class="has-text-weight-bold has-text-danger">Meningkat</u> Ke <u class="has-text-weight-bold has-text-info">Level Lebih Tinggi</u>.</p>--}}
                <div class="has-text-centered">
                    <a href="{{ route('register') }}" class="button is-primary is-outlined is-rounded is-medium">Mulai Berubah</a>
{{--                    <a href="{{ route('login') }}" class="button is-info is-rounded is-medium">Masuk</a>--}}
                </div>
{{--                @auth--}}
{{--                    <div class="section has-text-left">--}}
{{--                        <pembelian-component></pembelian-component>--}}
{{--                    </div>--}}
{{--                @endauth--}}
            </div>
        </div>
    </div>

    <div class="section hero-welcome-bottom">
        <div class="container">
            <div class="columns is-vcentered side-feature">
                <div class="column is-5 is-hidden-desktop is-hidden-tablet has-text-centered">
                    <figure class="image is-5by4">
                        <img src="{{ asset('images/undraw_Savings_dwkw.svg') }}" alt="">
                    </figure>
                </div>
                <div class="column is-7 has-text-centered-touch content">
                    <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Apa itu {{ env('APP_NAME') }}?</h3>
                    <p class="subtitle is-4">{{ env('APP_NAME') }} Adalah Marketplace Distributor & Server Pulsa H2H Termurah dan Terlengkap yang menyediakan berbagai produk (Prabayar & Pascabayar).</p>
                    <p class="title is-4">BUKAN CUMA ITU</p>
                    <p class="subtitle is-4">
                        {{ env('APP_NAME') }} bisa digunakan untuk melakukan transfer uang antar member, dari paypal ke bank, dari saldo ke semua bank, dan menyediakan jasa rekening bersama.
                    </p>
                </div>
                <div class="column is-5 is-hidden-touch">
                    <figure class="image is-5by4">
                        <img src="{{ asset('images/undraw_Savings_dwkw.svg') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-white is-medium">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="content has-text-centered">
                        <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Mengapa Memilih Kami?</h3>
                        <div class="columns">
                            <div class="column is-10 is-offset-1">
                                <p class="subtitle">
                                    Kami merupakan salah satu server pulsa elektrik termurah yang ada di Indonesia. Anda bisa bertransaksi melalui Website dan API untuk melakukan pengisian pulsa All Operator, Pembayaran PLN Prabayar, Voucher Game Online, Beli Paket kuota online dll
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-users fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Pendaftaran Gratis Dan Mudah</p>
                        <p>Tanpa biaya pendaftaran 100% Gratis, setelah mendaftar akun anda langsung aktif dan dapat melakukan deposit.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-procedures fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Transaksi 24 Jam</p>
                        <p>Jam berapapun masih bisa melakukan transaksi Pulsa, Paket Internet, Paket SMS, Token PLN, dan lain lain.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-coins fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Harga Terbaik dan Terpercaya</p>
                        <p>Kami melakukan inovasi, sehingga transaksi semakin lancar dengan harga paling pulsa dan paket internet murah.</p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-university fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Metode Pembayaran</p>
                        <p>Banyak pilihan untuk melakukan deposit, mulai dari bank, kartu debit, kartu kredit dan paypal. Kedepannya jelas akan bertambah.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-dolly fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Produk Paling Lengkap</p>
                        <p>Tersedia Produk yang lengkap, mulai dari Pulsa All Oprator, Paket Data, Token PLN, Saldo Ewallet, dll.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-shield-alt fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Transaksi Aman</p>
                        <p>{{ env('APP_NAME') }} menggunakan Secure Sockets Layer (SSL) dan TLS yang memastikan semua informasi terjaga dalam setiap transaksi.</p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4 is-offset-2">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fas fa-blog fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Jalur Trasanksi Online</p>
                        <p>Banyak pilihan untuk melakukan deposit, mulai dari bank, kartu debit, kartu kredit dan paypal. Kedepannya jelas akan bertambah.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box has-text-centered">
                        <p><span class="has-text-primary"><i class="fab fa-paypal fa-4x"></i></span></p>
                        <p class="has-text-weight-bold">Bayar Pakai Paypal</p>
                        <p>Anda bisa beli pulsa pakai paypal, beli kuota pakai paypal, beli token listrik pakai paypal, bahkan tukar paypal ke bank.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-light is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column has-text-centered">
                        <h3 class="title is-3 has-text-weight-bold">Bantuan (FAQ)</h3>
                        <p class="subtitle">Hal yang sering ditanyakan ?</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-6">
                        <div class="box">
                            <p class="has-text-weight-bold">Bagaimana menjadi agen di {{ env('APP_NAME') }}?</p>
                            <p>
                                Untuk menjadi agen di {{ env('APP_NAME') }} Pulsa cukup mudah, kami punya 3 cara mudah untuk memulai bisnis anda dengan cara mendaftar, Deposit dan Transaksi.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Sistem pembayaran apa yang digunakan di {{ env('APP_NAME') }}?</p>
                            <p>
                                Kami menerapkan sistem deposit yang di mana agen/member melakukan pengisian saldo untuk dapat bertransaksi pulsa, paket data, transfer uang di {{ env('APP_NAME') }}.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Jalur Transaksi apa yang digunakan?</p>
                            <p>Saat ini kami menyediakan jalur transaksi online (website) dan Transaksi via API.
                            </p>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="box">
                            <p class="has-text-weight-bold">Apakah transaksi di {{ env('APP_NAME') }} bisa 24 Jam?</p>
                            <p>
                                Benar, sistem kami dapat bekerja selama 24 jam non stop dan pengguna dapat melakukan aktivitas transaksi selama 24 jam.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Apa ada batasan jumlah saldo deposit di {{ env('APP_NAME') }}?</p>
                            <p>
                                Kami tidak membatasi jumlah deposit saldo anda, anda dapat melakukan deposit saldo sesuai keinginan anda. Tapi saran kami tidak lebih dari 10 Juta.
                            </p>
                        </div>
                        <div class="box">
                            <p class="has-text-weight-bold">Apakah {{ env('APP_NAME') }} Mendukung Paypal?</p>
                            <p>
                                Iya benar, anda bisa memakai paypal untuk melakukan deposit dan melakukan pembelian produk. Mulai dari pulsa lewat paypal, paket internet pakai paypal, dll.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="hero is-medium is-primary is-bold is-fullwidth">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h3 class="title is-3 has-text-weight-bold">Jangan Sampai Kalah Dengan Toko Saingan?</h3>
                <p class="subtitle">Rezeki emang sudah di atur, tapi usaha tidak akan membohongi hasil. Gunakan {{ config('app.name') }} agar omset meningkat?</p>
                <p>
                    <a href="{{ route('register') }}" class="button is-white is-rounded is-medium">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>

    <div class="section has-background-white is-fullwidth is-hidden">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h3 class="title is-3 has-text-weight-bold">Beli Pulsa di {{ env('APP_NAME')  }}: Mudah, Cepat, Tidak Ribet</h3>
                <div class="columns">
                    <div class="column is-10 is-offset-1 has-text-centered">
                        <div class="box subtitle">
                                Kehabisan pulsa? {{ env('APP_NAME')  }} menyediakan layanan isi ulang pulsa kapan saja dan dengan segala macam metode pembayaran, salah satunya adalah lewat paypal (pulsa paypal murah).
                                Tidak perlu lagi kesulitan online tengah malam karena layanan isi ulang pulsa di {{ env('APP_NAME')  }} aktif 24 jam dan support segala macam jenis pembayaran.
                                Isi ulang pulsa operator Telkomsel, Indosat, XL, Tri, Axis, Bolt, dan Smartfren dengan beragam nominal yang tersedia mulai dari 1.000 sampai 1.000.000, semua hadir untuk kemudahan anda membeli pulsa secara online.
                        </div>
                        <div class="box subtitle">
                            Kami mendukung berbagai jenis pembayaran untuk melakukan deposit. Kami mendukung metode pembayaran Bank, Kartu Debit, Kartu Kredit dan Paypal.
                        </div>
                        <div class="box subtitle">
                            Bukan pulsa yang anda cari?
                            Kami juga menyediakan berbagai macam layanan lainnya seperti isi ulang paket data untuk anda yang butuh kuota internet dengan harga murah, pembayaran BPJS, Pembayaran PLN, Voucher Wifi.
                            semua dengan proses yang sangat mudah, cepat, dan customer service yang aktif 24 jam.
                        </div>
                        <div class="box subtitle">
                            Kami mendukung paypal sepenuhnya. Anda bisa beli pulsa bayar paypal, untuk pembelian pulsa paypal kami menerima akun paypal verified dan akun paypal unverified.
                            Anda bisa beli pulsa bayar dengan paypal mulai dari nominal 1000 sampai 1 juta. Dengan adanya kami, diharapkan beli pulsa dengan paypal dan beli paketan dengan paypal menjadi lebih mudah.
                            Bukan cuma pulsa, anda bisa beli paket data dengan paypal, kuota internet dengan paypal, isi saldo gojek pakai paypal, isi saldo ovo pakai paypal, isi saldo dana dengan paypal, isi saldo linkaja lewat paypal, anda juga bisa beli token pln dengan PLN.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
