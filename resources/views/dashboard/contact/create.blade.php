@extends('layouts.dashboard')

@section('title', 'Tambah Kontak')

@section('content')
    <div class="section">
        <div class="container">
            <form action="{{ route('web.dashboard.contact.store') }}" method="post">
                @csrf
                <div class="columns">
                    <div class="column is-6 is-offset-3">

                        <div class="box">
                            <h3 class="subtitle is-4">Informasi Kontak</h3>

                            <div class="field">
                                <label>Nama Kontak</label>
                                <p class="control has-icons-left">
                                    <input name="name" class="input" type="text" placeholder="Nama Nasabah"
                                           required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                </span>
                                </p>
                            </div>

                            <div class="field">
                                <label>Nomor Telepon</label>
                                <p class="control has-icons-left">
                                    <input name="phone_number" class="input" type="text"
                                           placeholder="Nomor Telepon" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-list-ol"></i>
                                </span>
                                </p>
                            </div>

                            <div class="field">
                                <label>Tipe Kontak</label>
                                <p class="control has-icons-left">
                                        <span class="select is-fullwidth">
                                            <select name="type" required>
                                                <option disabled>pilih tipe</option>
                                                  @foreach($types as $type)
                                                      <option value="{{ $type }}">{{ $type }}</option>
                                                  @endforeach
                                            </select>
                                        </span>
                                    <span class="icon is-small is-left">
                                            <i class="fas fa-globe"></i>
                                        </span>
                                </p>
                            </div>

                            <div class="field">
                                <label>Nomor Pelanggan / Nomor Telepon</label>
                                <p class="control has-icons-left">
                                    <input name="customer_number" class="input" type="text"
                                           placeholder="Nomor Pelanggan" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-list-ol"></i>
                                </span>
                                </p>
                                <p class="is-small">Isi dengan nomor telepon jika tipe adalah hp</p>
                            </div>

                            <div class="field">
                                <button class="button is-primary is-fullwidth">
                                    <span>Simpan Data</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
