@extends('layouts.dashboard')

@section('title', 'Kirim Uang')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Kirim Uang
                </h1>
                <h2 class="subtitle">
                    Anda dapat melakukan pengiriman uang kepada sesama member dengan jumlah tanpa batas.
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <send-money-index></send-money-index>
        </div>
    </div>
@endsection
