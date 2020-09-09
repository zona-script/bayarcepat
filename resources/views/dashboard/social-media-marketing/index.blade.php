@extends('layouts.dashboard')
@section('title', 'Postpaid')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Social Media Marketing
                </h1>
                <h2 class="subtitle">
                    Facebook, Twitter, Shopee, Tokopedia, dll.
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <div class="notification is-warning">
                            Informasi Penting: <br>
                            Semua order akan dilakukan pengecekan secara manual oleh admin, sehingga order kemungkinan akan terlambat hingga beberapa saat.
                            Untuk langsung menjalankan orderan tanpa perlu pengecekan oleh admin, saat order silakan centang "Paksa untuk dijalankan sekarang".
                        </div>
                    </div>
                    <dashboard-social-media-marketing-index></dashboard-social-media-marketing-index>
                </div>
            </div>
        </div>

        <br>
        <div class="container">
            <div id="petunjuk_order"></div>
            <div class="content">
                <h6 class="subtitle is-6">Langkah-langkah membuat pesanan baru:</h6>
                <ul>
                    <li>Pilih salah satu Kategori.</li>
                    <li>Pilih salah satu Layanan yang ingin dipesan.</li>
                    <li>Masukkan Target pesanan sesuai layanan, username/link.</li>
                    <li>Masukkan Jumlah Pesanan yang diinginkan.</li>
                    <li>Klik Submit untuk membuat pesanan baru</li>
                </ul>
                <h6 class="subtitle is-6">Ketentuan membuat pesanan baru:</h6>
                <ul>
                    <li>Silahkan membuat pesanan sesuai langkah-langkah diatas.</li>
                    <li>Jika ingin membuat pesanan dengan<br>
                        Target yang sama dengan pesanan yang sudah pernah dipesan sebelumnya, mohon menunggu sampai pesanan sebelumnya selesai diproses.<br>
                        Jika terjadi kesalahan / mendapatkan pesan gagal yang kurang jelas, silahkan hubungi Admin untuk informasi lebih lanjut.</li>
                    <li><span class="has-text-danger">Jangan memasukkan orderan yang sama jika orderan sebelumnya belum selesai</span>. </li>
                    <li><span class="has-text-danger">Jangan memasukkan orderan yang sama di panel lain jika orderan di {{ config('app.name') }} belum selesai.</span></li>
                    <li>Jangan mengganti username atau menghapus link target saat sudah order. </li>
                    <li>Orderan yang sudah masuk tidak dapat di cancel / refund manual, seluruh proses orderan dikerjakan secara otomatis oleh server.</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
@endsection
