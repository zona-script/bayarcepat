@extends('layouts.app')

@section('title', 'Harga Voucher Wifi Termurah')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Voucher Wifi Termurah</h1>
                <h2 class="subtitle">Wireless Access Point atau yang sering disebut AP merupakan alat yang digunakan untuk memancarkan signal WiFi dan menjadikan area disekitarnya menjadi hotspot sehingga perangkat dengan fitur WiFi bisa tersambung ke internet melalui hotspot yang kamu buat.</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    Sedang nongkrong di tempat umum tapi lupa bawa modem? Ada koneksi WiFi ID tapi kamu belum terdaftar? Atau kuota WiFi ID kamu sudah habis tapi belum diisi? Gak tahu cara beli voucher WiFI ID dan cara daftar WiFi ID di mana? Jangan khawatir karena sekarang, kamu bisa membeli paket streaming dari akses WiFi ID secara online. Nggak perlu bingung lagi untuk beli paket streaming dari akses WiFi ID.
                </p>
                <p>

                </p>
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
                            <td>{{ $item->description }}</td>
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
