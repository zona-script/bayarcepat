@extends('layouts.app')

@section('title', 'Paket Membership')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h2 class="title">Paket Membership, Pilih Paket Kesukaanmu</h2>
                <h3 class="subtitle">Pilih Paketmu dan mulai jualanmu, jangan pilih yang paling bagus kalau terendah juga bagus</h3>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="pricing-table">
                <div class="pricing-plan is-warning">
                    <div class="plan-header">Jeruk</div>
                    <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rp</span>0</span>/Bulan</div>
                    <div class="plan-items">
                        <div class="plan-item">Dipakai Untuk Pribadi, Keluarga, Bisnis.</div>
                        <div class="plan-item">Minimal Deposit Rp. 10.000</div>
                        <div class="plan-item">Tidak ada minimal transaksi bulanan </div>
                        <div class="plan-item">Banyak fitur yang bisa digunakan </div>
                        <div class="plan-item">Harga Paling Murah Seindonesia</div>
                        <div class="plan-item">Biaya pendaftaran GRATIS</div>
                        <div class="plan-item">Dapat Gabung di Komunitas</div>
                        <div class="plan-item">Akses Api H2H</div>
                        <div class="plan-item">Cetak Struk</div>
                        <div class="plan-item">White Label</div>
                        <div class="plan-item">Kirim Uang ke Semua Bank</div>
                        <div class="plan-item">Deposit Via Paypal</div>
                        <div class="plan-item">-</div>
                    </div>
                    <div class="plan-footer">
                        <a href="{{ route('register') }}" class="button is-fullwidth">Daftar</a>
                    </div>
                </div>

                <div class="pricing-plan">
                    <div class="plan-header">Semangka</div>
                    <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rp</span>50ribu</span>/bulan</div>
                    <div class="plan-items">
                        <div class="plan-item">Dipakai Untuk Pribadi, Keluarga, Bisnis.</div>
                        <div class="plan-item">Minimal Deposit Rp. 10.000</div>
                        <div class="plan-item">Tidak ada minimal transaksi bulanan </div>
                        <div class="plan-item">Banyak fitur yang bisa digunakan </div>
                        <div class="plan-item">Harga Paling Murah Seindonesia</div>
                        <div class="plan-item">Biaya pendaftaran GRATIS</div>
                        <div class="plan-item">Dapat Gabung di Komunitas</div>
                        <div class="plan-item">Akses Api H2H</div>
                        <div class="plan-item">Cetak Struk</div>
                        <div class="plan-item">White Label</div>
                        <div class="plan-item">Kirim Uang ke Semua Bank</div>
                        <div class="plan-item">Deposit Via Paypal</div>
                        <div class="plan-item">-</div>
                    </div>
                    <div class="plan-footer">
                        <a href="{{ route('register') }}" class="button is-fullwidth">Daftar</a>
                    </div>
                </div>

                <div class="pricing-plan is-danger is-active">
                    <div class="plan-header">Tomat</div>
                    <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency">Rp</span>55ribu</span>/bulan</div>
                    <div class="plan-items">
                        <div class="plan-item">Dipakai Untuk Pribadi, Keluarga, Bisnis.</div>
                        <div class="plan-item">Minimal Deposit Rp. 10.000</div>
                        <div class="plan-item">Tidak ada minimal transaksi bulanan </div>
                        <div class="plan-item">Banyak fitur yang bisa digunakan </div>
                        <div class="plan-item">Harga Paling Murah Seindonesia</div>
                        <div class="plan-item">Biaya pendaftaran GRATIS</div>
                        <div class="plan-item">Dapat Gabung di Komunitas</div>
                        <div class="plan-item">Akses Api H2H</div>
                        <div class="plan-item">Cetak Struk</div>
                        <div class="plan-item">White Label</div>
                        <div class="plan-item">Kirim Uang ke Semua Bank</div>
                        <div class="plan-item">Deposit Via Paypal</div>
                        <div class="plan-item">-</div>
                    </div>
                    <div class="plan-footer">
                        <a href="{{ route('register') }}" class="button is-fullwidth">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section is-medium has-background-danger">
        <div class="container">
            <div class="has-text-centered">
                <p class="title has-text-white">Bingung Pilih Paket Yang Mana?</p>
                <p class="subtitle has-text-white">Tenang, tulisan paket itu hanya becanda saja. <span class="has-text-weight-bold is-uppercase">DAFTAR DI {{ env('APP_NAME') }} ITU GRATIS</span>.</p>
                <p class="subtitle has-text-white">Nikmati semua fitur yang ada secara gratis, kalau fitur kurang tinggal ajukan ke kami & kami akan segera membuatkannya untuk anda.</p>
            </div>
        </div>
    </div>

@endsection
