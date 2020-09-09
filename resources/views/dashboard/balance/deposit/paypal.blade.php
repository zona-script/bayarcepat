@extends('layouts.dashboard')

@section('title', 'Paypal')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <form action="{{ route('web.dashboard.balance.deposit.store') }}" method="post">
                        @csrf
                        <input name="type" value="paypal" type="hidden">

                        <div class="box">
                            <h3 class="subtitle is-4">Pengajuan Lewat Paypal</h3>

                            <div class="field">
                                <label>Jumlah Uang (USD)</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="amount_money" type="number"  min="0.01" step="0.01" max="2500" value="00.00" >
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                                </p>
                            </div>

                            <div class="field">
                                <p>Kami memohon maaf, untuk penukaran dengan paypal akan dikenakan pajak untuk setiap dollarnya
                                    dengan nominal seperti yang ada di tabel di bawah. ini disebabkan karena biaya yang harus kami
                                    tanggung saat melakukan pengiriman uang dari paypal dan ke rekening yang kami gunakan (biaya jasa untuk kami adalah gratis).
                                </p>
                                <table class="table is-fullwidth">
                                    <tr>
                                        <td>Dari</td>
                                        <td>Sampai</td>
                                        <td>Pajak per $</td>
                                    </tr>
                                    <tr>
                                        <td>$1</td>
                                        <td>$10</td>
                                        <td>Rp 900</td>
                                    </tr>
                                    <tr>
                                        <td>$11</td>
                                        <td>$50</td>
                                        <td>Rp 850</td>
                                    </tr>
                                    <tr>
                                        <td>$51</td>
                                        <td>$150</td>
                                        <td>Rp 800</td>
                                    </tr>
                                    <tr>
                                        <td>$151</td>
                                        <td>$400</td>
                                        <td>Rp 750</td>
                                    </tr>
                                    <tr>
                                        <td>$401</td>
                                        <td>$600</td>
                                        <td>Rp 600</td>
                                    </tr>
                                    <tr>
                                        <td>$601</td>
                                        <td>$800</td>
                                        <td>Rp 500</td>
                                    </tr>
                                    <tr>
                                        <td>$801</td>
                                        <td>$1000</td>
                                        <td>Rp 400</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="has-text-centered">Kami tidak mengizinkan transfer diatas $1000.</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="field">
                                <label>Metode Pembayaran</label>
                                <p class="control has-icons-left">
                                    <span class="select is-fullwidth">
                                          <select name="bank_id">
                                              @foreach($banks as $bank)
                                                  <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                              @endforeach
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
                                <textarea name="note" class="textarea" placeholder="Notes (optional)">
                                </textarea>
                                </p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="field">
                                <h3 class="subtitle">Data Paypal Anda</h3>
                                <p>
                                    Silakan isi informasi paypal yang akan digunakan untuk mentransfer.
                                </p>
                            </div>
                            <div class="field">
                                <label>Nama Bank</label>
                                <p class="control has-icons-left">
                                    <input name="bank_name" class="input" type="text" value="paypal">
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-coins"></i>
                                </span>
                                </p>
                            </div>
                            <div class="field">
                                <label>Email Paypal Anda</label>
                                <p class="control has-icons-left">
                                    <input name="bank_account_number" class="input" type="text" placeholder="Email paypal anda">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                                </p>
                            </div>
                            <div class="field">
                                <label>Nama Paypal Anda</label>
                                <p class="control has-icons-left">
                                    <input name="bank_account_name" class="input" type="text" placeholder="Jumlah uang">
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-coins"></i>
                                </span>
                                </p>
                            </div>
                            <div class="notification is-warning">
                                Anda harus mentransfer dari informasi yang anda masukan.
                            </div>
                            <div class="field">
                                <button class="button is-primary is-fullwidth">
                                    <span>Deposit Saldo</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="box">
                        <h3 class="subtitle is-4">Pembayaran</h3>
                        <p>Silakan lakukan pembayaran ke paypal di bawah ini:</p>
                        <br>
                        <table class="table is-fullwidth">
                            <tr>
                                <td>A/N</td>
                                <td>:</td>
                                <td>Fatkul Nur Koirudin</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>rudi@dibumi.com</td>
                            </tr>
                            <tr>
                                <td>Tipe Pembayaran</td>
                                <td>:</td>
                                <td>wajib memilih <span class="tag is-primary">Personal / Keluarga</span> <br>
                                    Jika tidak maka akan dikenalan potongan sebesar %17 (aturan dari paypal).
                                </td>
                            </tr>
                            <tr>
                                <td>Catatan Pembayaran</td>
                                <td>:</td>
                                <td>Isi dengan angka <span class="tag is-primary">9812</span> <br>
                                Jika tidak di isi mengakibatkan transaksi tidak bisa menjadi otomatis, dan harus di periksa secara manual.
                                </td>
                            </tr>
                            <tr>
                                <td>Sebesar</td>
                                <td>:</td>
                                <td>USD 11.92 (wajib sama persis, jika tidak maka tidak bisa otomatis)</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="has-text-centered title is-2">USD 11.92</td>
                            </tr>
                        </table>

                        <div class="field">
                            <button class="button is-primary is-fullwidth">
                                <span>Konfirmasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
