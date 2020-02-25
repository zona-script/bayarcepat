@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Tentang Kami</h1>
                <h2 class="subtitle">Apa itu bayarcepat.com?</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container content">
            <p>
                {{ env('APP_NAME') }}  Adalah Distributor & Server Pulsa h2h Termurah dan Terlengkap yang menyediakan berbagai produk.
                <br>
                BUKAN CUMA ITU
                <br>
                BayarCepat bisa digunakan untuk melakukan transfer uang antar member, dari paypal ke bank, dari saldo ke semua bank, dan jasa rekening bersama.
            </p>
            <p>
                {{ env('APP_NAME') }} adalah solusi keuangan terlengkap, anda bisa membeli produk, kirim uang antar bank, kirim uang dari paypal, dan masih banyak lagi.
            </p>
            <p>
               {{ env('APP_NAME') }} hadir untuk mempermudah anda.
            </p>
        </div>
    </div>
@endsection
