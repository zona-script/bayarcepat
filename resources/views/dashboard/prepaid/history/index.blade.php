@extends('layouts.dashboard')
@section('title', 'Prepaid')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Riwayat Prepaid (Prabayar)
                </h1>
                <h2 class="subtitle">
                    Riwayat Pembelian Pulsa, Paket Data, PLN,
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <prepaid-history-index></prepaid-history-index>
        </div>
    </div>
    </div>
@endsection
