@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box">
                <div class="title">{{ __('Verifikasi Email anda') }}</div>

                <div class="subtitle">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Sebuah link verifikasi sudah dikirim ke email anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi. Jika Anda tidak menerima email,.') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="button is-primary">{{ __('Klik disini untuk meminta email verifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
