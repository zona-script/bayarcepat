@extends('layouts.app')

@section('title', 'Jual Social Media Marketing Termurah')

@section('content')
    <div class="hero is-medium is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2">Produk Social Media Marketing</h1>
                <h2 class="subtitle is-3">Harga produk dari layanan Social Media Marketing Panel</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    *) Semua harga terakhir update pada {{ date('d-m-Y') }} jam {{ date("h:i") }}
                    <br>
                </p>
                <ul>
                    <li>Min = jumlah order paling sedikit yang bisa dilakukan pada setiap order.</li>
                    <li>Max = jumlah order paling banyak yang bisa dilakukan untuk satu target tertentu.</li>
                    <li>Price = harga yang berlaku untuk setiap 1000.</li>
                </ul>

                @if (blank($products))
                    <h3 class="title is-primary">SAAT INI PRODUK MASIH KOSONG</h3>
                @endif

                @foreach ($products as $key => $category)
                    <h3 class="subtitle">Harga Layanan {{ $category['name'] }}</h3>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>NAMA PRODUK</td>
                                <td>MIN</td>
                                <td>MAX</td>
                                <td style="width: 120px">STATUS</td>
                                <td style="width: 180px">HARGA (per 1000)</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($category['products'] as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->min }}</td>
                                    <td>{{ $product->max }}</td>
                                    <td><span class="tag is-primary">Tersedia</span></td>
                                    <td><span class="has-text-weight-bold">{{ $product->price }}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>


@endsection
