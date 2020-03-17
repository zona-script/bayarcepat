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

            <div class="table-container">
                <table id="table_id" class="table is-fullwidth is-bordered">
                    <thead>
                    <tr>
                        <td style="width: 20px">#</td>
                        <td>Jenis Transaksi</td>
                        <td>Nomor Telepon</td>
                        <td>Status</td>
                        <td>Waktu</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('web.dashboard.riwayat.show', $transaction->id) }}">{{ $transaction->type_string }}</a> </td>
                            <td>{{ optional($transaction)->phone_number }}</td>
                            <td>
                                @if ($transaction->status == \App\Enums\TransactionEnum::$statusSuccess)
                                    <span class="tag is-success">
                                @elseif($transaction->status == \App\Enums\TransactionEnum::$statusFailed || $transaction->status == \App\Enums\TransactionEnum::$statusRefund || $transaction->status == \App\Enums\TransactionEnum::$statusCancel)
                                    <span class="tag is-danger">
                                @else
                                    <span class="tag is-secondary">
                                @endif
                                    {{ $transaction->status_string }}</span>
                            </td>
                            <td>{{ $transaction->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

{{--            <div class="columns">--}}
{{--                <div class="column is-3">--}}
{{--                    <div class="box">--}}
{{--                        <div class="field">--}}
{{--                            <label class="label">Kategori Transaksi</label>--}}
{{--                            <p class="control has-icons-left">--}}
{{--                                <span class="select is-fullwidth">--}}
{{--                                    <select>--}}
{{--                                        <option disabled>Pilih Kategori</option>--}}
{{--                                        <option>Pembelian</option>--}}
{{--                                        <option>Saldo</option>--}}
{{--                                    </select>--}}
{{--                                </span>--}}
{{--                                <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-globe"></i>--}}
{{--                                    </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="field">--}}
{{--                            <label class="label">Status Transaksi</label>--}}
{{--                            <p class="control has-icons-left">--}}
{{--                                    <span class="select is-fullwidth">--}}
{{--                                        <select>--}}
{{--                                            <option selected>semua status</option>--}}
{{--                                            <option>Selesai</option>--}}
{{--                                            <option>Proses</option>--}}
{{--                                            <option>Batal</option>--}}
{{--                                         </select>--}}
{{--                                    </span>--}}
{{--                                <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-globe"></i>--}}
{{--                                    </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="field">--}}
{{--                            <div class="control">--}}
{{--                                <a href="" class="button is-primary is-fullwidth">Filter Data</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="column is-9">--}}

{{--                    @foreach($transactions as $transaction)--}}
{{--                        <a class="box" href="{{ route('web.dashboard.riwayat.show', $transaction->id) }}">--}}
{{--                            <div class="content">--}}
{{--                                <p>--}}
{{--                                    <span--}}
{{--                                        class="has-text-weight-bold has-text-black">{{ $transaction->type_string }}</span>--}}
{{--                                    @if ($transaction->status == \App\Enums\TransactionEnum::$statusSuccess)--}}
{{--                                        <span class="tag is-success">{{ $transaction->status_string }}</span>--}}
{{--                                    @elseif($transaction->status == \App\Enums\TransactionEnum::$statusFailed--}}
{{--    || $transaction->status == \App\Enums\TransactionEnum::$statusRefund--}}
{{--    || $transaction->status == \App\Enums\TransactionEnum::$statusCancel)--}}
{{--                                        <span class="tag is-danger">{{ $transaction->status_string }}</span>--}}
{{--                                    @else--}}
{{--                                        <span class="tag is-secondary">{{ $transaction->status_string }}</span>--}}
{{--                                    @endif--}}
{{--                                    <br>--}}

{{--                                    @if ($transaction->type == \App\Enums\TransactionEnum::$typeProduct)--}}
{{--                                        Anda membeli produk {{ $transaction->information['product']['description'] }}--}}
{{--                                        sebesar--}}
{{--                                        Rp {{ $transaction->information['product']['price'] }}--}}
{{--                                    @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayWithdrawal)--}}
{{--                                        Anda mengajukan penarikan--}}
{{--                                        ke {{ $transaction->information['user_bank']['bank_name']}} sebesar--}}
{{--                                        Rp {{ $transaction->information['bank_amount_money'] }}--}}
{{--                                    @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayPay)--}}
{{--                                        Pembayaran untuk transaksi nomor {{ $transaction->information['id']}},--}}
{{--                                        berupa {{ $transaction->information['information']['product']['operator']}}--}}
{{--                                        sebesar--}}
{{--                                        Rp {{ $transaction->information['information']['product']['price']}}--}}
{{--                                    @elseif($transaction->type == \App\Enums\TransactionEnum::$typeBayarCepatPayRefund)--}}
{{--                                        Pengembalian uang untuk transaksi nomor {{ $transaction->information['id']}},--}}
{{--                                        berupa {{ $transaction->information['information']['product']['operator']}}--}}
{{--                                        sebesar--}}
{{--                                        Rp {{ $transaction->information['information']['product']['price']}}--}}
{{--                                    @else--}}
{{--                                        Deskripsi tidak tersedia.--}}
{{--                                    @endif--}}

{{--                                    <br>--}}
{{--                                    <span--}}
{{--                                        class="has-text-weight-light">Waktu Transaksi {{ $transaction->created_at }}</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}

{{--                    <div class="">--}}
{{--                        <div class="field">--}}
{{--                            <div class="control">--}}
{{--                                <a href="" class="button is-primary is-fullwidth">Selanjutnya</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}
        </div>
    </div>
@endsection

@push('stack-head')
    <style>
        table.dataTable.cell-border tbody th, table.dataTable.cell-border tbody td {
            border-top: 1px solid #dddddd;
            border-right: 1px solid #dddddd; }
        table.dataTable.cell-border tbody tr th:first-child,
        table.dataTable.cell-border tbody tr td:first-child {
            border-left: 1px solid #dddddd; }
        table.dataTable.cell-border tbody tr:first-child th,
        table.dataTable.cell-border tbody tr:first-child td {
            border-top: none; }
    </style>
@endpush
@push('stack-foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable( {
                fixedHeader: true
            } );
        });
    </script>
@endpush
