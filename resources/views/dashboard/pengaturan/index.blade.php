@extends('layouts.dashboard')

@section('title', 'Aplikasi Sosial dan Edukasi')

@section('content')
    <div class="hero is-white">
        <div class="hero-body has-text-centered">
            <h3 class="title is-primary">Pengaturan Toko</h3>
            <h3 class="subtitle">Pengaturan Toko Digunakan Pada Struk Pembelian</h3>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">

                    <div class="box">
                        <div class="field">
                            <label class="label">Logo Toko</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Text input">
                                <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Nama Toko / Usahan Anda</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Text input">
                                <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">No Telepon</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Text input" value="bulma">
                                <span class="icon is-small is-left">
                              <i class="fas fa-user-secret"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Alamat</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Text input">
                                <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
