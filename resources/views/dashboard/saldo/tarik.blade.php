@extends('layouts.dashboard')

@section('title', 'Tarik uang')

@section('content')
    <div class="section">
        <div class="container">
            <form action="{{ route('web.dashboard.saldo.tarik.store') }}" method="post">
                @csrf
                <div class="columns">
                    <div class="column is-6 is-offset-3">

                        <div class="box">
                            <h3 class="subtitle is-4">Informasi Penarikan</h3>

                            <div class="field">
                                <label>Nama Nasabah</label>
                                <p class="control has-icons-left">
                                    <input name="bank_account_name" class="input" type="text" placeholder="Nama Nasabah" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                </span>
                                </p>
                            </div>

                            <div class="field">
                                <label>Nomor Rekening</label>
                                <p class="control has-icons-left">
                                    <input name="bank_account_number" class="input" type="text" placeholder="Nomor Rekening" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-list-ol"></i>
                                </span>
                                </p>
                            </div>

                            <div class="columns">
                                <div class="column is-6">
                                    <div class="field">
                                        <label>Nama Bank</label>
                                        <p class="control has-icons-left">
                                    <span class="select is-fullwidth">
                                          <select name="bank_name" required>
                                            <option disabled>pilih bank</option>
                                              @foreach($banks as $bank)
                                                  <option value="{{ $bank->label }}">{{ $bank->label }}</option>
                                              @endforeach
                                          </select>
                                    </span>
                                            <span class="icon is-small is-left">
                                        <i class="fas fa-university"></i>
                                    </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label>Jumlah Uang (Rp)</label>
                                        <p class="control has-icons-left">
                                            <input name="bank_amount_money" class="input" type="number" placeholder="Jumlah Uang" required>
                                            <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Catatan (optional)</label>
                                <p class="control">
                                    <textarea name="note" class="textarea" placeholder="Tulis catatan disini" >
                                    </textarea>
                                </p>
                            </div>

                            <div class="field">
                                <button class="button is-primary is-fullwidth">
                                    <span>Ajukan Penarikan Saldo</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
