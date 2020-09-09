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
            <div class="box has-text-centered">
                <h3>TIDAK ADA BIAYA MENJADI MEMBER, SEMUANYA DIJAMIN 100% GRATIS DENGAN SEMUA FITUR YANG TERSEDIA</h3>
            </div>
            <div class="pricing-table">
                <div class="pricing-plan is-warning">
                    <div class="plan-header">Paket Sukses</div>
                    <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rp</span>0</span>/Tahun</div>
                    <div class="plan-items">
                        <div class="plan-item">Dapat Menjual Semua Produk prepaid, postpain & social media marketing</div>
                        <div class="plan-item">Dapat dipakai Untuk Pribadi, Keluarga, dan Bisnis</div>
                        <div class="plan-item">Minimal Deposit Rp. 10.000</div>
                        <div class="plan-item">Tidak ada minimal transaksi bulanan</div>
                        <div class="plan-item">Harga Paling Murah Seindonesia</div>
                        <div class="plan-item">Biaya pendaftaran GRATIS</div>
                        <div class="plan-item">Dapat Gabung di Komunitas</div>
                        <div class="plan-item">Akses Api H2H</div>
                        <div class="plan-item">Cetak Struk (comming soon)</div>
                        <div class="plan-item">White Label</div>
                        <div class="plan-item">Gratis Website dengan nama toko kamu (comming soon)</div>
                        <div class="plan-item">Gratis Aplikasi dengan nama toko kamu (comming soon)</div>
                        <div class="plan-item">Kirim Uang ke Semua Bank (comming soon)</div>
                        <div class="plan-item">Deposit Lewat Bank, Toko Retail (comming soon) dan Paypal</div>
                        <div class="plan-item">-</div>
                    </div>
                    <div class="plan-footer">
                        <a href="{{ route('register') }}" class="button is-fullwidth">Daftar Sekarang</a>
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
