@extends('layouts.dashboard')
@section('title', 'Postpaid')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Riwayat Postpaid (Pasca bayar)
                </h1>
                <h2 class="subtitle">
                    Riwayat Pembelian produk pascabayar
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <dashboard-postpaid-history-index></dashboard-postpaid-history-index>
        </div>
    </div>
    </div>
@endsection
