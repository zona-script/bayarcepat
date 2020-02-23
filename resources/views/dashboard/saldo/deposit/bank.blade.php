@extends('layouts.dashboard')

@section('title', 'Bank')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">

                    <div class="box">
                        <h3 class="subtitle is-4">Pengajuan Deposit Lewat Bank</h3>

                        <div class="field">
                            <label>Jumlah Uang (Rp)</label>
                            <p class="control has-icons-left">
                                <input class="input" type="number" placeholder="Jumlah uang">
                                <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <label>Metode Pembayaran</label>

                            <p class="control has-icons-left">
                                    <span class="select is-fullwidth">
                                          <select>
                                              <option>Bank Bri</option>
                                              <option>Bank Mandiri</option>
                                              <option>Jenius</option>
                                              <option>Paypal</option>
                                          </select>
                                    </span>
                                <span class="icon is-small is-left">
                                        <i class="fas fa-globe"></i>
                                    </span>
                            </p>
                        </div>
                        <div class="field">
                            <label>Catatan (optional)</label>
                            <p class="control">
                                    <textarea name="note" class="textarea" placeholder="Notes (optiona)">
                                    </textarea>
                            </p>
                        </div>
                        <hr>

                        <div class="notification is-warning">
                            Anda harus mentransfer dengan nomor rekening dibawah ini.
                            Silakan isi nomor rekening anda yang nantinya anda gunakan untuk mentransfer.
                        </div>
                        <div class="field">
                            <label>Nama Bank</label>
                            <p class="control has-icons-left">
                                <input name="user_bank_name" class="input" type="text" placeholder="Jumlah uang">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-coins"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label>Nomor Rekening</label>
                            <p class="control has-icons-left">
                                <input name="user_bank_account_number" class="input" type="number" placeholder="Jumlah uang">
                                <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label>Nama Rekening Bank (nama nasabah)</label>
                            <p class="control has-icons-left">
                                <input name="user_bank_account_name" class="input" type="text" placeholder="Jumlah uang">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-coins"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <button class="button is-primary is-fullwidth">
                                <span>Deposit Saldo</span>
                            </button>
                        </div>
                    </div>


                    <div class="box">
                        <h3 class="subtitle is-4">Pembayaran</h3>
                        <p>Silakan lakukan pembayaran ke Rekening Bank BRI di bawah ini:</p>
                        <br>
                        <p>
                            <img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/1280px-BANK_BRI_logo.svg.png"
                                style="max-width: 128px"></p>
                        <table class="table is-fullwidth">
                            <tr>
                                <td>A/N</td>
                                <td>:</td>
                                <td>PT. Urun Dana Usaha</td>
                            </tr>
                            <tr>
                                <td>Norek</td>
                                <td>:</td>
                                <td>8212-2121-1212-2121</td>
                            </tr>
                            <tr>
                                <td>Sebesar</td>
                                <td>:</td>
                                <td>Rp 1.000.981 (harus sama persis)</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="has-text-centered title is-2">Rp 1.000.981</td>
                            </tr>
                        </table>

                        <div class="field">
                            <button class="button is-primary is-fullwidth">
                                            <span class="icon">
                                                <i class="fas fa-money-bill-alt"></i>
                                            </span>
                                <span>Konfirmasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
