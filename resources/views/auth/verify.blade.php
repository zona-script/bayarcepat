@extends('layouts.dashboard')
@section('title', 'Verifikasi email')
@section('content')
    <div class="section">

        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    @if (session('resent'))
                        <div class="notification is-success" role="alert">
                            {{ __('Sebuah link verifikasi baru, berhasil dikirim ke email anda') }} ({{ auth()->user()->email }}).
                        </div>
                    @endif
                    <div class="box">
                        <div class="title">{{ __('Verifikasi Email anda') }}</div>

                        <div class="subtitle">
                            <div class="field">
                                <p>
                                    {{ __('Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi. Jika Anda tidak menerima email, silakan klik tombol dibawha ini.') }}

                                </p>
                            </div>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="field">
                                    <button type="submit" class="button is-primary is-fullwidth">{{ __('Klik disini untuk meminta email verifikasi') }}</button>.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
