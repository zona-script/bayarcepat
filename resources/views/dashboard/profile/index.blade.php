@extends('layouts.dashboard')

@section('title', 'Aplikasi Sosial dan Edukasi')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">

                    <div class="box">

                        <div class='is-flex is-horizontal-center'>
                            <figure class="image is-128x128 has-text-centered">
                                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
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
                            <label class="label">Tentang Saya</label>
                            <div class="control">
                                <textarea class="textarea" disabled>{{ auth()->user()->bio }}</textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Alamat Saya</label>
                            <div class="control">
                                <textarea class="textarea" disabled>{{ auth()->user()->address }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="box">
                        <div class="field">
                            <h3 class="subtitle">Ganti Password</h3>
                        </div>
                        <div class="field">
                            <label class="label">Password Baru</label>
                            <div class="control has-icons-left">
                                <input name="password" class="input" type="password" placeholder="password">
                                <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Ulangi Password</label>
                            <div class="control has-icons-left">
                                <input name="password_confirm" class="input" type="password" placeholder="password">
                                <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth">Ganti Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
