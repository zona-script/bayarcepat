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
                <div class="tags are-medium">
                    @foreach ($products as $key => $brands)
                        <a href="#{{ md5($key) }}" class="tag is-primary is-medium">{{ $key }}</a>
                    @endforeach
                </div>
                <div class="is-dashed">
                    <ul>
                        <li>
                            Semua harga di update pada {{ date('d-m-Y') }} jam {{ date("h:i") }}.
                        </li>
                        <li>Harga yang ditampilkan adalah harga paling murah.</li>
                    </ul>
                </div>
                @foreach ($products as $key => $brands)
                    <div id="{{ md5($key) }}"></div>
                    <div class="has-text-centered">
                        <h3 class="subtitle is-uppercase">Harga {{ $key }}</h3>
                    </div>
                    <div class="table-container">
                        <table class="table is-hoverable">
                            <thead>
                            <tr>
                                <td colspan="5"><strong class="title is-6 is-uppercase">Harga {{ $key }} Termurah</strong></td>
                            </tr>
                            <tr class="has-text-weight-light">
                                <td>NAMA PRODUK</td>
                                <td style="width: 120px">STATUS</td>
                                <td style="width: 120px">ADMIN</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($brands as $product)
                                <tr>
                                    <td>({{ $product->brand }}) {{ $product->product_name }}</td>
                                    <td><span class="tag is-primary">Tersedia</span></td>
                                    <td><span class="has-text-weight-bold">{{ number_format_rupiah($product->admin) }}</span></td>
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
