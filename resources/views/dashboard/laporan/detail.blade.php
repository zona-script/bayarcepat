@extends('layouts.dashboard')

@section('title', 'Detail Transaksi')

@section('content')
    <div class="hero is-white">
        <div class="hero-body has-text-centered">
            <p class="title is-3 has-text-primary">Detail Transaksi</p>
            <p class="subtitle">Rincian Transaksi anda untuk nomor transaksi {{ $transaction->id }}</p>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <div class="box">
                        <div class="field">
                            <label class="label">No Transaksi</label>
                            <input type="text" class="input" value="{{ $transaction->id }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Tipe Transaksi</label>
                            <input type="text" class="input" value="{{ $transaction->type_string }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Status Transaksi</label>
                            <input type="text" class="input" value="{{ $transaction->status_string }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Tanggal Transaksi</label>
                            <input type="text" class="input" value="{{ $transaction->date }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Jam Transaksi</label>
                            <input type="text" class="input" value="{{ $transaction->time }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="column is-8">
                    <div class="box">
                        @if ($transaction->type == \App\Enums\TransactionEnum::$typeProduct)
                            <div class="field">
                                <h3 class="title is-4">Informasi Produk</h3>
                            </div>
                            <div class="field">
                                <label class="label">Status Transaksi</label>
                                <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Telepon</label>
                                <input type="text" class="input" value="{{ $transaction->information['phone_number'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Provider</label>
                                <input type="text" class="input" value="{{ $transaction->information['product']['provider'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Operator</label>
                                <input type="text" class="input" value="{{ $transaction->information['product']['operator'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Deskripsi</label>
                                <input type="text" class="input" value="{{ $transaction->information['product']['description'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Harga</label>
                                <input type="text" class="input" value="{{ $transaction->information['product']['price'] }}" disabled>
                            </div>
                        @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayDeposit)
                            <div class="field">
                                <h3 class="title is-4">Informasi Bank Pembayaran</h3>
                            </div>
                            <div class="field">
                                <label class="label">Status Deposit</label>
                                <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Nama Bank</label>
                                <input type="text" class="input" value="{{ $transaction->information['bank']['bank_name'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Rekening Bank</label>
                                <input type="text" class="input" value="{{ $transaction->information['bank']['bank_account_number'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Nama Rekening Bank</label>
                                <input type="text" class="input" value="{{ $transaction->information['bank']['bank_account_name'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Nominal</label>
                                <input type="text" class="input" value="{{ $transaction->information['bank']['value'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Kode Unik</label>
                                <input type="text" class="input" value="{{ $transaction->information['bank']['value_unique'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Total Uang Harus Dikirim</label>
                                <input type="text" class="input" value="{{ $transaction->information['bank']['value_total'] }}" disabled>
                            </div>
                            <hr>
                            <div class="field">
                                <h3 class="title is-4">Informasi Bank Anda</h3>
                            </div>
                            <div class="field">
                                <div class="notification is-warning">
                                    Untuk menyelesaikan transaksi ini, Anda harus mengirim pembayaran dengan nomor rekening dibawah ini.
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Nama Bank</label>
                                <input type="text" class="input" value="{{ $transaction->information['user_bank']['bank_name'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Rekening Bank</label>
                                <input type="text" class="input" value="{{ $transaction->information['user_bank']['bank_account_number'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Nama Rekening Bank</label>
                                <input type="text" class="input" value="{{ $transaction->information['user_bank']['bank_account_name'] }}" disabled>
                            </div>
                        @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayPay)
                            <div class="field">
                                <h3 class="title is-4">Informasi Produk</h3>
                            </div>
                            <div class="field">
                                <label class="label">Status Transaksi</label>
                                <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Transaksi Pembelian</label>
                                <input type="text" class="input" value="{{ $transaction->information['id'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Telepon</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['phone_number'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Provider</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['provider'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Operator</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['operator'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Deskripsi</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['description'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Harga</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['price'] }}" disabled>
                            </div>
                        @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayRefund)
                            <div class="field">
                                <h3 class="title is-4">Informasi Produk</h3>
                            </div>
                            <div class="field">
                                <label class="label">Status Transaksi</label>
                                <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Transaksi Pembelian</label>
                                <input type="text" class="input" value="{{ $transaction->information['id'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">No Telepon</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['phone_number'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Provider</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['provider'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Operator</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['operator'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Deskripsi</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['description'] }}" disabled>
                            </div>
                            <div class="field">
                                <label class="label">Harga</label>
                                <input type="text" class="input" value="{{ $transaction->information['information']['product']['price'] }}" disabled>
                            </div>
                        @else

                        @endif
                    </div>


                    @if ($transaction->type == \App\Enums\TransactionEnum::$typeProduct)
                        <div class="box">
                            <div class="field">
                                <h3 class="title is-4">Update Transaksi</h3>
                                <table class="table table-bordered is-fullwidth">
                                    <thead>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>{{ \App\Enums\JavaH2HStatusEnum::make($transaction->message['data']['status']) }}</td>
                                    </tr>

                                    @foreach($transaction->callbackResponse as $response)
                                        <tr>
                                            <td>{{ ($loop->iteration + 1) }}</td>
                                            <td>{{ $response->created_at }}</td>
                                            <td>{{ \App\Enums\JavaH2HStatusEnum::make($response->data['status']) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
