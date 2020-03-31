@extends('layouts.app')

@section('title', 'Harga Token PLN Termurah')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Market Prabayar</h1>
                <h2 class="subtitle">Harga dari semua produk prabayar di marketplace</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <price-market-pricing></price-market-pricing>
        </div>
    </div>
@endsection
@push('stack-foot')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
