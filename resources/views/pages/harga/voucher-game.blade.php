@extends('layouts.app')

@section('title', 'Harga Voucher Game')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Voucher Game</h1>
                <h2 class="subtitle">Beli Voucher Game Online Terbaru Mudah dengan Harga Murah</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>Sudah download game-nya dan bingung harus membeli voucher game online dimana? Mencari voucher game online fisik tapi nggak ketemu-ketemu? Tenang saja, {{ env('APP_NAME') }} punya solusinya. {{ env('APP_NAME') }} menjual voucher game online terlengkap mulai dari Steam Wallet, Garena, Lyto, Diamond Mobile Legends, Cash PB Garena, PS Plus membership, UniPin, PSN Money, Top Up AOV, dan masih banyak lagi. Nikmati juga Steam Summer Sale untuk pembelian game lebih hemat.</p>
                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>
                <table class="table is-bordered is-fullwidth is-hoverable">
                    <tbody>
                    @foreach($contents as $key => $content)
                        <tr>
                            <td class="has-text-centered"><h3 class="subtitle is-5">Harga Voucher Game {{ $key }}</h3></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table is-bordered is-fullwidth is-striped is-hoverable">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px;">No</th>
                                        <th>Provider</th>
                                        <th>Code</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($content as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->provider_sub }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
