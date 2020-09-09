@extends('layouts.dashboard')
@section('title', 'SMM Panel')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Social Media Marketing
                </h1>
                <h2 class="subtitle">
                    Riwayat Pembelian Produk Social Media Marketing
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <dashboard-social-media-marketing-history-index></dashboard-social-media-marketing-history-index>
        </div>
    </div>
    </div>
@endsection
