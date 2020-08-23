@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <div class="box">
                        <div class="columns">
                            <div class="column is-10">
                                <p>Saldo Server JavaH2H</p>
                                <p class="subtitle">
                                    {{ \App\JavaH2H\JavaH2HBuilder::make()->getSaldo()['message'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('stack-head')
@endpush
