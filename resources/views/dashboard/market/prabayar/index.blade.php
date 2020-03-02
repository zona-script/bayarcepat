@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <form action="{{ route('web.dashboard.market.prabayar.store') }}" method="post">
                        @csrf
                        <market-prabayar></market-prabayar>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
