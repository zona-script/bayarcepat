@extends('layouts.app')

@section('title', 'Paket Membership')

@section('content')
    <div class="hero is-medium is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Paket Membership</h1>
                <h2 class="subtitle">Pendaftaran di {{ config('app.name') }} adalah gratis. 100% Bukan Omong kosong.</h2>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="pricing-table">
                        <div class="pricing-plan is-warning">
                            <div class="plan-header">Paket Sukses</div>
                            <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rp</span>0</span>/Tahun</div>
                            <div class="plan-items">
                                <div class="plan-item">Dapat Menjual Semua Produk</div>
                                <div class="plan-item">Dapat dipakai Untuk Pribadi, Keluarga, dan Bisnis</div>
                                <div class="plan-item">Minimal Deposit Rp. 10.000</div>
                                <div class="plan-item">Tidak ada minimal transaksi bulanan</div>
                                <div class="plan-item">Harga Produk Murah</div>
                                <div class="plan-item">Biaya pendaftaran GRATIS</div>
                                <div class="plan-item">Akses Api H2H  (comming soon)</div>
                                <div class="plan-item">Cetak Struk (comming soon)</div>
                                <div class="plan-item">White Label (comming soon)</div>
                                <div class="plan-item">Gratis Website dengan nama toko kamu (comming soon)</div>
                                <div class="plan-item">Gratis Aplikasi dengan nama toko kamu (comming soon)</div>
                                <div class="plan-item">Kirim Uang ke Semua Bank (comming soon)</div>
                                <div class="plan-item">Deposit Lewat Bank, Toko Retail dan Paypal  (comming soon)</div>
                                <div class="plan-item">-</div>
                            </div>
                            <div class="plan-footer">
                                <a href="{{ route('register') }}" class="button is-fullwidth">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section is-medium has-background-danger">
        <div class="container">
            <div class="has-text-centered">
                <p class="title has-text-white">100% Bukan Omong Kosong</p>
            </div>
        </div>
    </div>

@endsection
