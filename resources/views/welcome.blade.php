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

    <x-bulma.level></x-bulma.level>

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
