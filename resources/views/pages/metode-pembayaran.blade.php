@extends('layouts.app')

@section('title', 'Metode Pembayaran')

@section('content')

    <div class="hero is-medium">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2 has-text-primary">Metode Pembayaran</h1>
                <h2 class="subtitle is-3">Metode pembayaran yang bisa anda gunakan di {{ env('APP_NAME') }}</h2>
            </div>
            <div class="section">
                <div class="container has-text-centered">
                    <div class="columns">
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <span>
                                <i class="fas fa-university fa-3x"></i>
                                </span>
                                <p class="subtitle">Transfer Bank (Mandiri, Bri)</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <span>
                                <i class="fab fa-paypal fa-3x"></i>
                                </span>
                                <p class="subtitle">Paypal (Unverified & Verified)</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="box has-text-centered">
                                <span>
                                <i class="fas fa-credit-card fa-3x"></i>
                                </span>
                                <p class="subtitle">Kartu Kredit (Lewat Paypal)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
