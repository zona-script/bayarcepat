@extends('layouts.app')

@section('title', 'Harga Prepaid (Prabayar) Termurah')

@section('content')
    <div class="hero is-medium is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2">Produk Prabayar (Prepaid)</h1>
                <h2 class="subtitle is-3">Harga produk dari layanan prepaid atau prabayar</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <div class="tags are-medium">
                    @foreach ($products as $category)
                        <a href="#{{ $category['slug'] }}" class="tag is-primary is-medium">{{ $category['name'] }}</a>
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
                @foreach ($products as $category)
                    <div id="{{ $category['slug'] }}"></div>
                    <div class="has-text-centered">
                        <h3 class="subtitle">Harga {{ $category['name'] }}</h3>
                    </div>
                    @foreach ($category['products'] as $brands)
                        <div class="table-container">
                            <table class="table is-hoverable">
                                <thead>
                                <tr>
                                    <td colspan="4"><strong class="title is-6 is-capitalized">Harga {{ $category['name'] }} {{ $brands['name'] }} Termurah</strong></td>
                                </tr>
                                <tr class="has-text-weight-light">
                                    <td>NAMA</td>
                                    <td style="width: 120px">STATUS</td>
                                    <td style="width: 120px">HARGA</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $productsTemp = collect($brands['products'])
                                        ->groupBy('product_name')
                                        ->toArray();
                                ?>
                                @foreach ($productsTemp as $key => $item)
                                    <?php
                                    $product = collect($item)->sortBy('price')->values()->first();
                                    ?>
                                    <tr>
                                        <td>({{ $product->brand }}) {{ $product->product_name }}</td>
                                        <td><span class="tag is-primary">Tersedia</span></td>
                                        <td><span class="has-text-weight-bold">{{ number_format_rupiah($product->price) }}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    <hr>
                @endforeach
            </div>
        </div>
    </div>


@endsection
