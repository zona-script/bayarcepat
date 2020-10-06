@extends('layouts.dashboard')

@section('title', 'Aplikasi Sosial dan Edukasi')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">

                    <div class="box">
                        <div class="has-text-centered">
                            <figure class="image is-128x128 container">
                                <img class="is-rounded" src="{{ auth()->user()->profile_photo_url }}">
                            </figure>
                        </div>

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" value="{{ auth()->user()->name }}" disabled>
                                <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" value="{{ auth()->user()->username }}" disabled>
                                <span class="icon is-small is-left">
                              <i class="fas fa-user-secret"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left">
                                <input class="input" type="email" value="{{ auth()->user()->email }}" disabled>
                                <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone</label>
                            <div class="control has-icons-left">
                                <input class="input" type="email" value="{{ auth()->user()->phone_number }}" disabled>
                                <span class="icon is-small is-left">
                              <i class="fas fa-phone"></i>
                            </span>
                            </div>
                        </div>
                    </div>


                    <div class="box">
                        <form action="{{ route('web.dashboard.profile.password.update') }}" method="post">

                            @csrf
                            <div class="field">
                                <h3 class="subtitle">Ubah Kata sandi</h3>

                                @foreach ($errors->all() as $error)
                                    <p class="has-text-danger">{{ $error }}</p>
                                @endforeach

                            </div>
                            <div class="field">
                                <label class="label">Kata sandi Sekarang</label>
                                <div class="control has-icons-left">
                                    <input name="current_password" class="input" type="password" placeholder="password lama">
                                    <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Kata sandi Baru</label>
                                <div class="control has-icons-left">
                                    <input name="new_password" class="input" type="password" placeholder="password baru">
                                    <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Ulangi Kata sandi Baru</label>
                                <div class="control has-icons-left">
                                    <input name="new_confirm_password" class="input" type="password" placeholder="ulangi password baru">
                                    <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="notification is-warning">
                                    <p>Setelah anda klik tombol "Ubah Kata Sandi", anda akan diminta untuk login kembali.</p>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary is-fullwidth">Ubah Kata Sandi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
