@extends('layouts.app')

@section('title', 'Harga Giftcard Playstore dan Itunes Termurah')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Giftcard Playstore dan Itunes Termurah</h1>
                <h2 class="subtitle">Beli Kode Voucher Google Play dan kode voucher itunes termurah</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                   <b> Kode Voucher Google Play</b> <br>
○ Satu tempat untuk segala bentuk hiburan: Film, buku, majalah, atau aplikasi dan game Android terbaru—semua tersedia di Google Play.
                    <br>
○ Kapan saja, dimana saja: Akses film dan lainnya di perangkat Android, iPhone dan iPad, Chromecast, serta browser web Anda.
                    <br>
○ Belanja dengan cepat dan fleksibel: Tak perlu kartu kredit untuk menukarkan kode voucher Google Play, dan masa berlaku saldo Anda tidak ada batasnya. Beli untuk orang terdekat atau hadiahkan kepada diri Anda sendiri.
<br>
Beli Kode Voucher Google Play! Bayar menggunakan GoPay, OVO, Dana, Indosat, Tri, XL, Bank Transfer, Indomaret, Alfamart, Kredivo, dan Kartu Kredit.
Ini adalah cara tercepat untuk beli Google Gift Card! Tanpa registrasi ataupun login, Google Gift Card akan dikirim langsung melalui email Anda setelah Anda menyelesaikan pembayaran.
                </p>
                <p>
                    <b>Tentang iTunes:</b> <br>
                    iTunes merupakan sebuah media player yang bisa diakses di beragam perangkat Apple, seperti iPod, iPod Touch, iPhone, dan iPad. Tidak hanya itu, kamu juga dapat mengakses iTunes melalui perangkat Mac dan PC. Nikmati beragam konten mulai dari musik, film dan acara televisi dengan instan melalui iTunes.
                </p>
                <p>
                    Harga gift card yang tercantum dibawah ini adalah harga update real time langsung dari server.
                </p>
                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>
                <table class="table is-bordered is-fullwidth is-hoverable">
                    <tbody>
                    @foreach($contents as $key => $content)
                        <tr>
                            <td class="has-text-centered"><h3 class="subtitle is-5">Harga Gift Card {{ $key }}</h3></td>
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
