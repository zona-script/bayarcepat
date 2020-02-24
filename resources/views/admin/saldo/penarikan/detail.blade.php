@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')
    <div class="hero is-white">
        <div class="hero-body has-text-centered">
            <p class="title is-3 has-text-primary">Deposit Saldo</p>
            <p class="subtitle">Daftar Deposit Transaksi No {{ $transaction->id }}</p>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6">

                    <div class="box">
                        <div class="field">
                            <h3 class="subtitle">User</h3>
                        </div>
                        <div class="field">
                            <label class="label">User ID</label>
                            <input class="input" type="text" value="{{ $transaction->user->id }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Nama User</label>
                            <input class="input" type="text" value="{{ $transaction->user->name }}" disabled>
                        </div>
                    </div>

                    <div class="box">
                        <div class="field">
                            <h3 class="subtitle">Bank Pengirim</h3>
                        </div>
                        <div class="field">
                            <label class="label">Bank Name</label>
                            <input class="input" type="text" value="{{ $transaction->information['user_bank']['bank_name'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Bank Account Name</label>
                            <input class="input" type="text" value="{{ $transaction->information['user_bank']['bank_account_name'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Bank Account Number</label>
                            <input class="input" type="text" value="{{ $transaction->information['user_bank']['bank_account_number'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Note</label>
                            <textarea class="textarea" disabled>{{ isset($transaction->information['user_bank']['note']) ? $transaction->information['user_bank']['note'] : 'kosong'  }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="column is-6">

                    <div class="box">
                        <div class="field">
                            <h3 class="subtitle">Bank Tujuan</h3>
                        </div>
                        <div class="field">
                            <label class="label">No Transaksi</label>
                            <input class="input" type="text" value="{{ $transaction->id }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Bank Name</label>
                            <input class="input" type="text" value="{{ $transaction->information['bank']['bank_name'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Bank Account Name</label>
                            <input class="input" type="text" value="{{ $transaction->information['bank']['bank_account_name'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Bank Account Number</label>
                            <input class="input" type="text" value="{{ $transaction->information['bank']['bank_account_number'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Jumlah</label>
                            <input class="input" type="text" value="{{ $transaction->information['bank']['value'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Jumlah Unique</label>
                            <input class="input" type="text" value="{{ $transaction->information['bank']['value_unique'] }}" disabled>
                        </div>
                        <div class="field">
                            <label class="label">Jumlah Total</label>
                            <input class="input" type="text" value="{{ $transaction->information['bank']['value_total'] }}" disabled>
                        </div>
                    </div>

                    <div class="box">
                        <h3 class="subtitle">Konfirmasi</h3>
                        <form action="{{ route('web.admin.saldo.deposit.update', $transaction->id) }}" method="post">
                            @csrf
                            <div class="field">
                                <label class="label">Status Transaksi</label>
                                <input type="text" class="input" value="{{ $transaction->status_string }}" disabled>
                            </div>
                            @if ($transaction->status != \App\Enums\TransactionEnum::$statusSuccess)
                                <div class="field">
                                    <button class="button is-primary is-fullwidth">Konfirmasi Transaksi</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
