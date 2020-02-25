@extends('layouts.app')

@section('title', 'Harga Paket Internet Termurah')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Paket Internet Termurah</h1>
                <h2 class="subtitle"> Istilah “data” dalam dunia mobile melekat sebagai besarnya biaya yang harus dibayar dalam setiap paket internet di dalam ponsel pintar. Di Indonesia, perusahaan provider seluler menawarkan beragam paket biaya untuk menebus berapa besar data yang bisa dinikmati oleh para pengguna smartphone.</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    Paket data adalah salah sebuah layanan yang memungkinkan seseorang untuk dapat memiliki akses di dunia maya atau internet. Dengan mengaktifkan paket data internet pada smartphone, Anda dapat terhubung ke internet. Paket data internet menganut sistem prabayar. Untuk dapat mengakses internet menggunakan paket data internet, Anda perlu membelinya terlebih dahulu di counter ataupun toko online yang menawarkannya.
                    <br>
                    Harga dari setiap paket data internet juga cukup bervariasi. Tentunya, semakin baik kualitas jaringan serta kuantitas kuotanya, semakin mahal pula harga sebuah paket data internet. Untuk itu, jika menginginkan jaringan internet yang cepat dan kuota yang berlimpah, Anda perlu merogoh kocek yang cukup dalam untuk membeli paket data internet.
                </p>
                <p>
                    Harga paket data all operator yang tercantum dibawah ini adalah harga update real time langsung dari server.
                </p>
                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>
                <table class="table is-bordered is-fullwidth is-hoverable">
                    <tbody>
                    @foreach($contents as $key => $content)
                        <tr>
                            <td class="has-text-centered"><h3 class="subtitle is-5">Harga Paket Data Operator {{ $key }} Termurah</h3></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table is-bordered is-fullwidth is-striped is-hoverable">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px;">No</th>
                                        <th>Provider</th>
                                        <th>Deskripsi</th>
                                        <th>Code</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($content as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->provider_sub }}</td>
                                            <td>{{ $item->description }}</td>
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
                <p>Perkembangan internet memang selaras dengan pesatnya perkembangan teknologi di seluruh dunia. Dengan banyaknya inovasi yang terjadi di bidang teknologi, internet juga mengalami perkembangan yang cukup signifikan. Hal ini dibuktikan dengan perkembangan internet dari mulai GPRS, 3G, hingga 4G. Bahkan, di beberapa negara maju, internet 5G sudah mulai dipergunakan secara publik. Jadi, perkembangan teknologi internet juga turut berkembang seiring dengan munculnya inovasi di bidang tersebut.
<br>
                    Di Indonesia, teknologi internet yang cukup sering digunakan oleh penggunanya adalah GPRS, 3G, dan juga 4G. Masing-masing dari kategori generasi internet ini memiliki perbedaan yang cukup besar dalam hal kecepatan koneksi.
<br>
                    Untuk GPRS, kecepatan internetnya mampu mencapai 114 kbps, baik untuk kemampuan download maupun upload. Namun, kecepatan internet GPRS terbilang sangat rendah dibanding dengan generasi internet diatasnya. Untuk kecepatan internet 3G sendiri bisa mencapai puluhan kali dari kecepatan internet GPRS. Teknologi internet 3G ini pula laj yang telah banyak dipasang oleh operator seluler dalam negeri.
<br>
                    Diatas 3G masih ada teknologi internet 4G, yang mana kecepatan download dan uploadnya bisa mencapai 1 Gbps. Bisa dibayangkan, hanya berbeda beberapa tahun saja, kecepatan internet telah mengalami perkembangan yang cukup signifikan. Jadi, bisa dibayangkan perkembangan kecepatan internet di tahun-tahun yang akan datang.</p>
            </div>
        </div>
    </div>

@endsection
