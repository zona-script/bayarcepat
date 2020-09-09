@extends('layouts.dashboard')
@section('title', 'Prepaid')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Prepaid (Prabayar)
                </h1>
                <h2 class="subtitle">
                    Pulsa, Paket Data, PLN,
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <dashboard-prepaid-index></dashboard-prepaid-index>
        </div>
        </div>
    </div>
@endsection
