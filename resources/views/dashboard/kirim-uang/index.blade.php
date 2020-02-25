@extends('layouts.dashboard')

@section('title', 'Kirim Uang')

@section('content')
    <div class="section">
        <div class="container">
            <money-send-money></money-send-money>
{{--            <hr>--}}
{{--            <div class="columns">--}}
{{--                <div class="column is-6 is-offset-3">--}}
{{--                    <div class="box has-text-centered">--}}
{{--                        <h3 class="subtitle is-4">Mau Kirim Uang Kemana?</h3>--}}
{{--                        <div class="columns">--}}
{{--                            <div class="column is-6">--}}
{{--                                <a class="box has-text-centered">--}}
{{--                                    <span><i class="fas fa-piggy-bank fa-2x"></i></span>--}}
{{--                                    <p>Sesama Member</p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="column is-6">--}}
{{--                                <a class="box has-text-centered">--}}
{{--                                    <span><i class="fas fa-university fa-2x"></i></span>--}}
{{--                                    <p>Rekening Bank</p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="columns">--}}
{{--                            <div class="column is-6">--}}
{{--                                <a class="box has-text-centered">--}}
{{--                                    <span><i class="fas fa-wallet fa-2x"></i></span>--}}
{{--                                    <p>E-Wallet</p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="column is-6">--}}
{{--                                <a class="box has-text-centered">--}}
{{--                                    <span><i class="fas fa-donate fa-2x"></i></span>--}}
{{--                                    <p>Donasi</p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="box">--}}
{{--                        <h3 class="subtitle is-4">Informasi Tujuan</h3>--}}
{{--                        <div class="field">--}}
{{--                            <label class="label">Username / No telepon</label>--}}
{{--                            <p class="control has-icons-left">--}}
{{--                                <input class="input" type="number" placeholder="Text input">--}}
{{--                                <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-user"></i>--}}
{{--                                </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <label class="label">Jumlah Uang (Rp)</label>--}}
{{--                            <p class="control has-icons-left">--}}
{{--                                <input class="input" type="number" placeholder="Text input">--}}
{{--                                <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-user"></i>--}}
{{--                                </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <label class="label">Deskripsi (tidak wajib di isi)</label>--}}
{{--                            <textarea class="textarea" placeholder="Tulis informasi pembayaran atau apapun.">--}}

{{--                            </textarea>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <button class="button is-primary is-fullwidth">--}}
{{--                                            <span class="icon">--}}
{{--                                                <i class="fas fa-plane"></i>--}}
{{--                                            </span>--}}
{{--                                <span>Kirim Uang</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="box">--}}
{{--                        <h3 class="subtitle is-4">Informasi Rekening</h3>--}}
{{--                        <div class="field">--}}
{{--                            <label class="label">Nama Nasabah / Pemilik Rekening</label>--}}
{{--                            <p class="control has-icons-left">--}}
{{--                                <input class="input" type="number" placeholder="Text input">--}}
{{--                                <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-user"></i>--}}
{{--                                </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <label class="label">Nomor Rekening</label>--}}
{{--                            <p class="control has-icons-left">--}}
{{--                                <input class="input" type="number" placeholder="Text input">--}}
{{--                                <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-user"></i>--}}
{{--                                </span>--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="columns">--}}
{{--                            <div class="column is-6">--}}
{{--                                <div class="field">--}}
{{--                                    <label class="label">Nama Bank</label>--}}
{{--                                    <p class="control has-icons-left">--}}
{{--                                    <span class="select is-fullwidth">--}}
{{--                                          <select>--}}
{{--                                            <option selected>Kategori</option>--}}
{{--                                              @for ($i = 0; $i < 10; $i++)--}}
{{--                                                  <option>Bank {{ $i }}</option>--}}
{{--                                              @endfor--}}
{{--                                          </select>--}}
{{--                                    </span>--}}
{{--                                        <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-globe"></i>--}}
{{--                                    </span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="column is-6">--}}
{{--                                <div class="field">--}}
{{--                                    <label class="label">Jumlah Uang (Rp)</label>--}}
{{--                                    <p class="control has-icons-left">--}}
{{--                                        <input class="input" type="number" placeholder="Text input">--}}
{{--                                        <span class="icon is-small is-left">--}}
{{--                                        <i class="fas fa-user"></i>--}}
{{--                                </span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <label class="label">Deskripsi (tidak wajib di isi)</label>--}}
{{--                            <textarea class="textarea" placeholder="Tulis informasi pembayaran atau apapun.">--}}

{{--                            </textarea>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <button class="button is-primary is-fullwidth">--}}
{{--                                            <span class="icon">--}}
{{--                                                <i class="fas fa-plane"></i>--}}
{{--                                            </span>--}}
{{--                                <span>Kirim Uang</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
