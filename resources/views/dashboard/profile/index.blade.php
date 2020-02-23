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
                                <input class="input" type="text" value="{{ auth()->user()->name }}">
                                <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" value="{{ auth()->user()->username }}">
                                <span class="icon is-small is-left">
                              <i class="fas fa-user-secret"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left">
                                <input class="input" type="email" value="{{ auth()->user()->email }}">
                                <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Tentang Saya</label>
                            <div class="control">
                                <textarea class="textarea">{{ auth()->user()->bio }}</textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Alamat Saya</label>
                            <div class="control">
                                <textarea class="textarea">{{ auth()->user()->address }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h3 class="subtitle">Ganti Password</h3>
                    <div class="box">
                        <div class="field">
                            <label class="label">Password Baru</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Text input" value="bulma">
                                <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Ulangi Password</label>
                            <div class="control has-icons-left">
                                <input class="input" type="email" placeholder="Email input" value="hello@">
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
                    <hr>
                    <div class="box">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary is-outlined is-fullwidth">Keluar (Log Out)</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
