@extends('layouts.dashboard')

@section('title', 'Pengaturan Toko')

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

                    <form action="{{ route('web.dashboard.pengaturan.update') }}" method="post">
                        @csrf
                        <div class="box">
                            <div class="field">
                                <label class="label">Logo Toko</label>
                                <div class="control">
                                    <input name="store_logo" class="input" type="file" placeholder="Pilih foto" value="{{ old('store_logo', $user['store_logo']) }}">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Nama Toko / Usahan Anda</label>
                                <div class="control has-icons-left">
                                    <input name="store_name" class="input" type="text" placeholder="Nama Toko / Usaha" value="{{ old('store_name', $user['store_name']) }}">
                                    <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">No Telepon</label>
                                <div class="control has-icons-left">
                                    <input name="store_phone_number" class="input" type="text" placeholder="Nomor Telepon" value="{{ old('store_phone_number', $user['store_phone_number']) }}">
                                    <span class="icon is-small is-left">
                                  <i class="fas fa-user-secret"></i>
                                </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Alamat</label>
                                <div class="control has-icons-left">
                                    <textarea name="store_address" class="textarea" type="text" placeholder="Alamat">{{ old('store_address', $user['store_address']) }}</textarea>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary is-fullwidth">Update Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
