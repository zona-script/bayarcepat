@extends('layouts.app')

@section('title', 'Harga Postpaid (Pascabayar) Termurah')

@section('content')
    <div class="hero is-medium is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2">Produk Postpaid (Pascabayar)</h1>
                <h2 class="subtitle is-3">Harga produk dari layanan postpaid atau pascabayar</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>*) Semua harga terakhir update pada {{ date('d-m-Y') }} jam {{ date("h:i") }}</p>

                @foreach ($products as $key => $brands)
                    <div class="has-text-centered">
                        <h3 class="subtitle">Harga {{ $key }}</h3>
                    </div>
                    <div class="table-container">
                        <table class="table is-bordered">
                            <thead>
                            <tr>
                                <td colspan="5"><strong class="title is-6">Harga {{ $key }} Termurah</strong></td>
                            </tr>
                            <tr>
                                <td style="width: 140px">BRAND</td>
                                <td>NAMA</td>
                                <td style="width: 120px">STATUS</td>
                                <td style="width: 120px">ADMIN</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($brands as $product)
                                <tr>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td><span class="tag is-primary">Tersedia</span></td>
                                    <td><span class="has-text-weight-bold">{{ $product->admin }}</span></td>
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
