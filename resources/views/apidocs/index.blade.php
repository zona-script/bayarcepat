<x-app-layout title="Api Documentation">
    <div class="columns">
        <div class="column is-3 has-background-light pt-6 pl-6" style="max-height: 100vh; overflow-y: scroll;position: sticky; top: 0">
            <aside class="menu">
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a>Overview</a></li>
                    <li><a>Persiapan</a></li>
                    <li><a>Login</a></li>
                </ul>
                <p class="menu-label">
                    Produk & Transaksi
                </p>
                <ul class="menu-list">
                    <li>
                        <a class="has-text-weight-light">Prabayar / Prepaid</a>
                        <ul>
                            <li><a>Daftar Produk Prepaid</a></li>
                            <li><a>Pembelian Produk</a></li>
                            <li><a>Status Pembelian</a></li>
                            <li><a>Riwayat Pembelian</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-text-weight-light">Pascabayar / Postpaid</a>
                        <ul>
                            <li><a>Daftar Produk Postpaid</a></li>
                            <li><a>Cek Tagihan</a></li>
                            <li><a>Bayar Tagihan</a></li>
                            <li><a>Status Pembayaran</a></li>
                            <li><a>Riwayat Pembelian</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-text-weight-light">Social Media Marketing</a>
                        <ul>
                            <li><a>Daftar Layanan SMM</a></li>
                            <li><a>Pembelian Layanan</a></li>
                            <li><a>Status Pembelian</a></li>
                            <li><a>Riwayat Pembelian</a></li>
                        </ul>
                    </li>
                </ul>

                <p class="menu-label">
                    Keuangan
                </p>

                <ul class="menu-list">
                    <li><a>Cek Saldo</a></li>
                    <li>
                        <a>Pengiriman Uang</a>
                        <ul>
                            <li><a>Melakukan Transfer</a></li>
                            <li><a>Status Transfer</a></li>
                            <li><a>Riwayat Transfer</a></li>
                        </ul>
                        <a>Deposit</a>
                        <ul>
                            <li><a>Membuat Deposit</a></li>
                            <li><a>Status Deposit</a></li>
                            <li><a>Riwayat Deposit</a></li>
                        </ul>
                        <a>Penarikan Uang</a>
                        <ul>
                            <li><a>Membuat Penarikan Uang</a></li>
                            <li><a>Status Penarkan Uang</a></li>
                            <li><a>Riwayat Penarikan Uang</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="column">
            <div class="container py-6 pl-2 pr-4">
                <div class="content">
                    <div class="box">
                        @include('apidocs.docs.general.overview')
                    </div>
                    <div class="box">
                        @include('apidocs.docs.general.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
