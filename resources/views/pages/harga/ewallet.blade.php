@extends('layouts.app')

@section('title', 'Harga Saldo Gojek, Dana, Ovo, Ojek Online, dan LinkAja')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Saldo Gojek, Dana, Ovo, Ojek Online, dan LinkAja</h1>
                <h2 class="subtitle"></h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    Masuknya teknologi tidak bisa dipungkiri mempengaruhi berbagai segi kehidupan manusia. Termasuk dalam hal jual beli atau penggunaan uang tunai.
                    <br>
                    Jika kita perhatikan, di Indonesia bermunculan banyak layanan keuangan berbasis digital dan ini termasuk e-wallet. Dengan layanan ini Anda bisa melakukan transaksi untuk berbagai keperluan dengan saldo yang ada pada e-wallet.
                    <br>
                    Di kota-kota besar, terutama Jakarta, layanan ini umum digunakan banyak orang terutama mereka yang berada dalam usia produktif. Alasan utama mereka menggunakan e-wallet adalah karena praktis.
                    <br>
                    Mereka tidak perlu menyiapkan uang tunai saat bertransaksi. Sedangkan bagi penjual, mereka tidak perlu repot menyediakan kembalian karena pembayaran pasti dilakukan dengan nominal yang sesua
                </p>
                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>
                <table class="table is-bordered is-fullwidth is-hoverable">
                    <tbody>
                    @foreach($contents as $key => $content)
                        <tr>
                            <td class="has-text-centered"><h3 class="subtitle is-5">Harga Saldo {{ $key }}</h3></td>
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
