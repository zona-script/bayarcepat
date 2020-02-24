@extends('layouts.app')

@section('title', 'Harga Token PLN Termurah')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Token PLN Termurah</h1>
                <h2 class="subtitle"></h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    Tahun 2012 silam PLN mulai memperkenalkan sistem pembayaran listrik prabayar token dengan program Listrik Pintar. Awalnya Listrik Pintar ini khusus untuk masyarakat NTB (Nusa Tenggara Barat) kemudian dikembangkan kembali agar bisa dinikmati masyarakat di seluruh Indonesia. Sama seperti pembelian saldo pulsa telepon pra bayar, Anda tinggal membeli token listrik dengan jumlah saldo yang Anda inginkan baru Anda bisa menggunakan fasilitas listrik di tempat tinggal Anda.
                </p>
                <p>
                    Harga token PLN yang ditawarkan {{ env('APP_NAME') }} termasuk sangat competitive dan disini Anda akan mendapatkan token pln termurah dibandingkan dengan kompetitor kami.
                </p>
                <p>Jauhkan diri Anda dari kegelapan yang merasuki dan melahap ketakutan Anda dengan cara membeli voucher listrik sebelum padam lampu! </p>

                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>
                <h3 class="subtitle is-5">Harga Token PLN Termurah </h3>
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
                    @foreach($contents as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->provider_sub }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
