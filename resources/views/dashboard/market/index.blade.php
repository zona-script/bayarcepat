@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box has-text-centered">
                        <h3 class="subtitle is-4">Mau ke Marketplace Apa?</h3>
                        <div class="columns">
                            <div class="column is-6">
                                <a href="{{ route('web.dashboard.market.prabayar.index') }}" class="box has-text-centered">
                                    <span><i class="fas fa-piggy-bank fa-2x"></i></span>
                                    <p>Prabayar</p>
                                </a>
                            </div>
                            <div class="column is-6">
                                <a href="{{ route('web.dashboard.market.pascabayar.index') }}" class="box has-text-centered">
                                    <span><i class="fas fa-university fa-2x"></i></span>
                                    <p>Pascabayar</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
