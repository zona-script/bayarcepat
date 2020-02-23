@extends('layouts.dashboard')

@section('title', 'Judul')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box">
                        <h3 class="subtitle is-4">Cetak Struk</h3>
                        <div class="field">
                            <label class="label">Nomor Transaksi</label>
                            <p class="control has-icons-left">
                                <input class="input" type="number" placeholder="Text input">
                                <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <button class="button is-primary is-fullwidth">
                                <span>Cetak Struk</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
