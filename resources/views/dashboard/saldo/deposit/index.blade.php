@extends('layouts.dashboard')

@section('title', 'Judul')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box has-text-centered">
                        <h3 class="subtitle is-4">Mau Deposit Lewat?</h3>
                        <div class="columns">
                            <div class="column is-6">
                                <a href="{{ route('web.dashboard.saldo.deposit.create', ['type' => 'bank']) }}" class="box has-text-centered">
                                    <span><i class="fas fa-university fa-2x"></i></span>
                                    <p>Rekening Bank</p>
                                </a>
                            </div>
                            <div class="column is-6">
                                <a href="{{ route('web.dashboard.saldo.deposit.create', ['type' => 'paypal']) }}" class="box has-text-centered">
                                    <span><i class="fab fa-paypal fa-2x"></i></span>
                                    <p>Paypal</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
