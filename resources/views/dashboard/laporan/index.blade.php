@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="hero is-white">
        <div class="hero-body has-text-centered">
            <p class="title is-3 has-text-primary">Laporan</p>
            <p class="subtitle">Berisi semua informasi mengenai semua Transaksi anda</p>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    <div class="box">
                        <div class="field">
                            <label class="label">Kategori Transaksi</label>
                            <p class="control has-icons-left">
                                <span class="select is-fullwidth">
                                    <select>
                                        <option disabled>Pilih Kategori</option>
                                        <option>Pembelian</option>
                                        <option>Saldo</option>
                                    </select>
                                </span>
                                <span class="icon is-small is-left">
                                        <i class="fas fa-globe"></i>
                                    </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Status Transaksi</label>
                            <p class="control has-icons-left">
                                    <span class="select is-fullwidth">
                                        <select>
                                            <option selected>semua status</option>
                                            <option>Selesai</option>
                                            <option>Proses</option>
                                            <option>Batal</option>
                                         </select>
                                    </span>
                                <span class="icon is-small is-left">
                                        <i class="fas fa-globe"></i>
                                    </span>
                            </p>
                        </div>
                        <div class="field">
                            <div class="control">
                                <a href="" class="button is-primary is-fullwidth">Filter Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    @foreach($transactions as $transaction)
                        <a class="box" href="{{ route('web.dashboard.riwayat.show', $transaction->id) }}">
                            <div class="content">
                                <p>
                                    <span
                                        class="has-text-weight-bold has-text-black">{{ $transaction->type_string }}</span>
                                    @if ($transaction->status == \App\Enums\TransactionEnum::$statusSuccess)
                                        <span class="tag is-success">{{ $transaction->status_string }}</span>
                                    @elseif($transaction->status == \App\Enums\TransactionEnum::$statusFailed
    || $transaction->status == \App\Enums\TransactionEnum::$statusRefund
    || $transaction->status == \App\Enums\TransactionEnum::$statusCancel)
                                        <span class="tag is-danger">{{ $transaction->status_string }}</span>
                                    @else
                                        <span class="tag is-secondary">{{ $transaction->status_string }}</span>
                                    @endif
                                    <br>

                                    @if ($transaction->type == \App\Enums\TransactionEnum::$typeProduct)
                                        Anda membeli produk {{ $transaction->information['product']['description'] }}
                                        sebesar
                                        Rp {{ $transaction->information['product']['price'] }}
                                    @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayWithdrawal)
                                        Anda mengajukan penarikan
                                        ke {{ $transaction->information['user_bank']['bank_name']}} sebesar
                                        Rp {{ $transaction->information['bank_amount_money'] }}
                                    @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayPay)
                                        Pembayaran untuk transaksi nomor {{ $transaction->information['id']}},
{{--                                        berupa {{ $transaction->information['information']['product']['operator']}}--}}
                                        sebesar
                                        Rp {{ $transaction->information['information']['product']['price']}}
                                    @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayRefund)
                                        Pengembalian uang untuk transaksi nomor {{ $transaction->information['id']}},
                                        berupa {{ $transaction->information['information']['product']['operator']}}
                                        sebesar
                                        Rp {{ $transaction->information['information']['product']['price']}}
                                    @else
                                        Deskripsi tidak tersedia.
                                    @endif

                                    <br>
                                    <span
                                        class="has-text-weight-light">Waktu Transaksi {{ $transaction->created_at }}</span>
                                </p>
                            </div>
                        </a>
                    @endforeach

                    <div class="">
                        <div class="field">
                            <div class="control">
                                <a href="" class="button is-primary is-fullwidth">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="notification is-warning">
                        <strong>Informasi: </strong> <br>
                        Gunakan menu sorting untuk mencari informasi lebih mudah.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
