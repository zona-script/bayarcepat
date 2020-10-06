@extends('layouts.app')

@section('title', 'Bisnis Pembayaran dan Keuangan Dalam Satu Genggaman')

@section('content')
    <div class="hero is-fullheight-with-navbar is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column has-text-centered-touch has-text-justify">
                        <h1 class="title is-1">Platform digital untuk solusi bisnis kamu</h1>
                        <h2 class="subtitle is-4">Cukup satu akun, dapat digunakan untuk transaksi ribuan produk dari ratusan server sekaligus. </h2>
                        <div class="is-hidden-desktop">
                            <a href="{{ route('register') }}" class="button is-white is-rounded is-medium">Mendaftar</a>
                        </div>
                        <div class="buttons is-hidden-touch">
                            <a href="{{ route('register') }}" class="button is-white is-rounded is-medium">Mendaftar</a>
                            <a href="{{ route('register') }}" class="button is-primary is-light is-rounded is-outlined is-medium">Masuk</a>
                        </div>
                    </div>
                    <div class="column has-text-centered is-hidden-touch">
                        <p>
                            <img src="{{ asset('images/undraw_Mobile_pay_re_sjb8.svg')  }}" alt="BayarCepat Payments" style="width: 480px">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="title is-1">1,506</p>
                    <p class="heading">Pengguna Bergabung</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title is-1">600K+</p>
                    <p class="heading">Transaksi Berhasil</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title is-1">2361+</p>
                    <p class="heading">Produk Tersedia</p>
                </div>
            </div>
        </nav>
    </div>
    <div class="section has-background-light">
        <div class="container has-text-centered">
            <div class="columns is-vcentered">
                <div class="column is-offset-2 is-8">
                    <h3 class="title is-2">Apa itu <span class="has-text-primary">{{ config('app.name') }}</span>?</h3>
                    <p></p>
                    <p class="subtitle is-4 has-text-centered">
                        Marketplace + Distributtor H2H + Aggregator <br>
                        Kami menjual produk prabayar, pascabayar, ataupun layanan Social Media Marketing.
                    </p>
{{--                    <iframe width="100%" height="320" src="https://www.youtube.com/embed/u2C-Uihwdts" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="is-dashed-no-mp"></iframe>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-white">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-2 is-8">
                    <div class="content">
                        <div class="has-text-centered">
                            <h3 class="title is-2 is-bold is-capitalized">Kenapa Harus <span class="has-text-primary">{{ config('app.name') }}</span>?</h3>
                            <p></p>
                            <p class="subtitle">
                                {{ config('app.name') }} berusaha memberikan yang terbaik untuk semua produk & layanan, serta melibatkan penjual & pembeli dalam pengambilan keputusan.
                            </p>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="columns is-vcentered">
                <div class="column is-offset-1 is-10">
                    <div class="columns">
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Produk Paling Lengkap</p>
                                <p>Tersedia ribuan Produk dengan harga yang beragam, kebebasan memilih harga adalah hak segala pengguna kami</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Metode Pembayaran</p>
                                <p>Banyak pilihan untuk melakukan deposit, mulai dari bank, kartu debit, kartu kredit dan paypal. Kedepannya jelas akan bertambah.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <p>
                                    <img src="data:image/png;base64,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"/>
                                </p>
                                <p class="has-text-weight-bold">Transaksi Aman</p>
                                <p>{{ config('app.name') }} menggunakan Secure Sockets Layer (SSL) dan TLS yang memastikan semua informasi terjaga dalam setiap transaksi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-white">
        <div class="container">
            <div class="content has-text-centered">
                <h3 class="subtitle is-2 is-capitalized">Apa kata pelanggan?</h3>
                <div class="columns">
                    <div class="column is-10 is-offset-1">
                        <p class="subtitle is-4">
                            Ribuan pelanggan telah bergabung. Mulai dari Toko Tradision/kelontong, Konter Pulsa, Toko Retail, Perusahaan, dan banyak lagi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                @for ($i = 0; $i < 3; $i++)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">John Smith</p>
                                        <p class="subtitle is-6">Founder, Indonesian Buzzer</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus nec iaculis mauris.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus nec iaculis mauris.
                                    <br>
                                    <time datetime="2016-1-1">11:09 - 1 Juli 2020</time>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="hero is-medium is-light is-fullwidth" style="background: url('{{ asset('images/app-footer.svg') }}'); background-repeat: no-repeat; background-position: bottom">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box has-text-centered is-dashed">
                        <br>
                        <h3 class="title is-1 has-text-black">Mendaftar Sekarang</h3>
                        <p class="subtitle is 2 has-text-black-ter">Gabung bersama kami, sama seperti pedagang lainnya & raih keuntungan dari penjual ulang produk</p>
                        <p>
                            <a href="{{ route('register') }}" class="button is-primary is-rounded is-medium">Daftar Sekarang</a>
                        </p>
                        <br>
                        <p>hati hati penipuan, pendaftaran tidak dikenakan biaya</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section has-background-white is-fullwidth is-hidden">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h3 class="title is-3 has-text-weight-bold">Beli Pulsa di {{ config('app.name')  }}: Mudah, Cepat, Tidak Ribet</h3>
                <div class="columns">
                    <div class="column is-10 is-offset-1 has-text-centered">
                        <div class="box subtitle">
                                Kehabisan pulsa? {{ config('app.name')  }} menyediakan layanan isi ulang pulsa kapan saja dan dengan segala macam metode pembayaran, salah satunya adalah lewat paypal (pulsa paypal murah).
                                Tidak perlu lagi kesulitan online tengah malam karena layanan isi ulang pulsa di {{ config('app.name')  }} aktif 24 jam dan support segala macam jenis pembayaran.
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

    <div class="modal" id="notification-modal">
{{--    <div class="modal is-active" id="notification-modal">--}}
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Pemberitahuan</p>
                <button class="delete" aria-label="close" onclick="closeNotificationModal()"></button>
            </header>
            <section class="modal-card-body">
                <p class="subtitle">
                    {{ config('app.name') }} bukanlah aplikasi untuk peminjaman uang online,
                    bukan aplikasi jasa cicilan, bukan aplikasi investasi, bukan aplikasi p2p lending, bukan aplikasi urun dana, bukan aplikasi kredit online.
                </p>

                <p class="subtitle">
                    Pendaftaran member di website ini adalah gratis, alias tanpa di pungut biaya apapun.
                </p>

                <p class="subtitle">
                    Sampai saat ini semua transaksi hanya lewat web www.bayarcepat.com dan belum ada aplikasi mobile (dalam proses pembuatan).
                </p>
            </section>
            <footer class="modal-card-foot has-text-right">
                <button class="button is-primary" onclick="closeNotificationModal()">Tutup Pemberitahuan</button>
            </footer>
        </div>
    </div>
@endsection
@push('stack-foot')
    <script>
        // Warning before leaving the page (back button, or outgoinglink)
        // window.onbeforeunload = function() {
        //     return "Apakah anda yakin ingin menutup?";
        // }
        function closeNotificationModal() {
            var element = document.getElementById("notification-modal");
            element.classList.remove("is-active");
        }
    </script>
@endpush
