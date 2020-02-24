@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')
    <div class="hero is-white">
        <div class="hero-body has-text-centered">
            <p class="title is-3 has-text-primary">Deposit Saldo</p>
            <p class="subtitle">Daftar Deposit Terbaru</p>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    @foreach($transactions as $transaction)
                        <a class="box" href="{{ route('web.admin.saldo.deposit.show', $transaction->id) }}">
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
                                      Deposit {{ $transaction->information['bank']['value_total'] }}  dari {{ $transaction->information['bank']['bank_name'] }}
                                    ({{ $transaction->information['bank']['bank_account_name'] }}) ke {{ $transaction->information['user_bank']['bank_name'] }}
                                    ({{ $transaction->information['user_bank']['bank_account_name'] }})

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
            </div>
        </div>
    </div>

@endsection
