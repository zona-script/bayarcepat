@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <h3 class="subtitle is-3">Detail Riwayat Transaksi</h3>
                    <div class="table-container">
                        <table class="table is-fullwidth is-hoverable">
                            <tr>
                                <td style="width: 200px">No Transaksi</td>
                                <td style="width: 10px">:</td>
                                <td>{{ $trxWallet->id }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ $trxWallet->created_at_raw['day'] }} {{ $trxWallet->created_at_raw['month_name'] }} {{ $trxWallet->created_at_raw['year'] }}</td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>:</td>
                                <td>{{ $trxWallet->created_at_raw['time'] }}</td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>:</td>
                                <td>{{ $trxWallet->type }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $trxWallet->status }}</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td>{{ $trxWallet->note }}</td>
                            </tr>
                            @if (!blank($trxWallet->note_from_server))
                                <tr>
                                    <td>Pesan dari Server</td>
                                    <td>:</td>
                                    <td>{{ $trxWaller->note_from_server }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>

                        <table class="table is-fullwidth is-hoverable">
                            <tr>
                                <td style="width: 200px">Jumlah</td>
                                <td style="width: 10px">:</td>
                                <td>{{ $trxWallet->amount }}</td>
                            </tr>
                            <tr>
                                <td>Kode Unik</td>
                                <td>:</td>
                                <td>{{ $trxWallet->unique_code }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Total</td>
                                <td>:</td>
                                <td class="has-text-weight-bold">{{ $trxWallet->total_amount }}</td>
                            </tr>
                        </table>

                        <hr>
                        <div class="field is-dashed">

                            <table class="table is-fullwidth is-hoverable">
                                <tr>
                                    <td colspan="3">
                                        Tujuan Transfer
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 200px">Nama Bank</td>
                                    <td style="width: 10px">:</td>
                                    <td>{{ $trxWallet->bank['bank_master']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Atas Nama (A/N)</td>
                                    <td>:</td>
                                    <td>{{ $trxWallet->bank['bank_account_name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>:</td>
                                    <td>{{ $trxWallet->bank['bank_account_number'] }}</td>
                                </tr>
                            </table>
                            <p>Pastikan anda melakukan transfer pada tujuan nomor diatas, bukan nomor lain.</p>
                        </div>
                        <hr>
                        <table class="table is-fullwidth is-hoverable">
                            <tr>
                                <td colspan="3">
                                    Transfer Harus Menggunakan Rekening
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 200px">Nama Bank</td>
                                <td style="width: 10px">:</td>
                                <td>{{ $userBankMaster->name }}</td>
                            </tr>
                            <tr>
                                <td>Atas Nama (A/N)</td>
                                <td>:</td>
                                <td>{{ $trxWallet->user_bank['bank_account_name'] }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>:</td>
                                <td>{{ $trxWallet->user_bank['bank_account_number'] }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stack-foot')
@endpush
