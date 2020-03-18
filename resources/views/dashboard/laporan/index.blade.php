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
                        <td>Nominal</td>
                        <td>Status</td>
                        <td>Waktu</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('web.dashboard.riwayat.show', $transaction->id) }}">{{ $transaction->type_string }}</a> </td>
                            <td>Rp {{ money_format_rupiah(optional($transaction)->value) }}</td>
                            <td>
                                @if ($transaction->status == \App\Enums\TransactionEnum::$statusSuccess)
                                    <span class="tag is-success">
                                @elseif($transaction->status == \App\Enums\TransactionEnum::$statusFailed || $transaction->status == \App\Enums\TransactionEnum::$statusRefund || $transaction->status == \App\Enums\TransactionEnum::$statusCancel)
                                    <span class="tag is-danger">
                                @else
                                    <span class="tag is-secondary">
                                @endif
                                    {{ $transaction->status_string }}
                                    </span>
                            </td>
                            <td>{{ $transaction->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
