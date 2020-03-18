@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box">
                        <div class="columns">
                            <div class="column is-2 has-text-centered is-horizontal-center">
                                <div class='is-flex is-horizontal-center'>
                                    <figure class="image is-64x64 has-text-centered">
                                        <img class="is-rounded" src="{{ auth()->user()->photo_profile ? auth()->user()->photo_profile : asset('images/default.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="column is-10">
                                <p class="subtitle">
                                    Halo, {{ auth()->user()->name }}
                                </p>
                                <p>Saldo Anda</p>
                                <p class="subtitle">
                                    Rp {{ auth()->user()->balance_number_format }}
                                </p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <div class="control">
                                        <a href="{{ route('web.dashboard.saldo.tarik.create') }}"
                                           class="button is-primary is-fullwidth">
                                            <span class="icon">
                                                <i class="fas fa-coins"></i>
                                            </span>
                                            <span>Tarik Saldo</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <div class="control">
                                        <a href="{{ route('web.dashboard.saldo.deposit.index') }}"
                                           class="button is-primary is-fullwidth">
                                            <span class="icon">
                                                <i class="fas fa-money-check-alt"></i>
                                            </span>
                                            <span>Deposit Saldo</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                <a href="{{ route('web.dashboard.market.index') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-phone fa-3x"></i>
                                </span>
                                    <p class="subtitle">Marketplace</p>
                                </a>
                            </div>
                            <div class="column">
                                <a href="{{ route('web.dashboard.kirim-uang.index') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-piggy-bank fa-3x"></i>
                                </span>
                                    <p class="subtitle">Kirim Uang</p>
                                </a>
                            </div>
                            <div class="column">
                                <a href="{{ route('web.dashboard.riwayat.index') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-clock fa-3x"></i>
                                </span>
                                    <p class="subtitle">Laporan</p>
                                </a>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <a href="{{ route('web.dashboard.transaksi.index') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-print fa-3x"></i>
                                </span>
                                    <p class="subtitle">Cetak Struk</p>
                                </a>
                            </div>
                            <div class="column">
                                <a href="{{ route('web.dashboard.kirim-uang.index') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-tools fa-3x"></i>
                                </span>
                                    <p class="subtitle">Pengaturan</p>
                                </a>
                            </div>
                            <div class="column">
                                <a href="{{ route('web.dashboard.riwayat.index') }}" class="box has-text-centered">
                                <span>
                                <i class="fas fa-book fa-3x"></i>
                                </span>
                                    <p class="subtitle">Panduan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (blank(\Illuminate\Support\Facades\Auth::user()->complete_identity))
        <form action="{{ route('web.dashboard.update') }}" method="post">
            @csrf

            @push('stack-head')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
            @endpush
            @push('stack-foot')
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#select2-province').select2();
                        $('#select2-cities').select2();
                    });
                </script>
            @endpush
            <div class="section">
                <div class="container">
                    <div class="notification is-warning">Wajib masukan data yang benar, karena data tidak bisa dirubah.</div>
                    <div class="box">
                        <h3 class="subtitle is-4">Lengkapi Akun Anda</h3>
                        <div class="columns">
                            <div class="column is-4">
                                <div class="field">
                                    <label class="label">Name Lengkap</label>
                                    <div class="control has-icons-left">
                                        <input name="full_name" class="input" type="text" value="{{ auth()->user()->name }}" disabled>
                                        <span class="icon is-small is-left">
                                      <i class="fas fa-user"></i>
                                    </span>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">No Telepon</label>
                                    <div class="control has-icons-left">
                                        <input name="phone_number" class="input" type="text" placeholder="nomor telepon (08xxxxxxxxxx)" required>
                                        <span class="icon is-small is-left">
                                      <i class="fas fa-phone"></i>
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
                                        <input class="input" type="email" value="{{ auth()->user()->email }} }}" disabled>
                                        <span class="icon is-small is-left">
                                      <i class="fas fa-envelope"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="field">
                                    <label class="label">Warga Negara</label>
                                    <div class="control has-icons-left">
                                        <div class="select is-fullwidth">
                                            <select name="country" required>
                                                <option value="indonesia">Indonesia</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Provinsi</label>
                                    <div class="control">
                                        <div class="">
                                            <select style="width: 100%" name="province" id="select2-province" required>
                                                @foreach($provinces as $province)
                                                    <option value="{{ collect($province)['nama'] }}">{{ collect($province)['nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Kota</label>
                                    <div class="control">
                                        <div class="is-fullwidth">
                                            <select style="width: 100%" name="cities" id="select2-cities" required>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Kode Pos</label>
                                    <div class="control has-icons-left">
                                        <input name="postal_code" class="input" type="text" placeholder="masukan kode pos" required>
                                        <span class="icon is-small is-left">
                              <i class="fas fa-mail-bulk"></i>
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">

                                <div class="field">
                                    <label class="label">Alamat lengkap</label>
                                    <div class="control">
                                        <textarea name="address" class="textarea" placeholder="Tulis alamat lengkap anda" required></textarea>
                                    </div>
                                </div>


                                <div class="field">
                                    <label class="label">Tentang Saya (Bio)</label>
                                    <div class="control">
                                        <textarea name="about_me" class="textarea" placeholder="Jelaskan tentang kamu" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth">Simpan Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

{{--    @if (!blank(blank(\Illuminate\Support\Facades\Auth::user()->complete_identity)))--}}
{{--        <form action="{{ route('web.dashboard.verified') }}" method="post">--}}
{{--            @csrf--}}
{{--            <div class="section">--}}
{{--                <div class="container">--}}
{{--                    <div class="box">--}}
{{--                        <h3 class="subtitle is-4">Verifikasi Akun</h3>--}}
{{--                        <div class="columns">--}}
{{--                            <div class="column">--}}
{{--                                <div class="field">--}}
{{--                                    <label class="label">Foto Anda (Foto Asli)</label>--}}
{{--                                    <input class="input" type="file" name="photo_profile">--}}
{{--                                    <p class="has-text-weight-light">Hanya mendukung format jpeg,jpg,png,gif.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="column">--}}
{{--                                <div class="field">--}}
{{--                                    <label class="label">Upload Foto KTP</label>--}}
{{--                                    <input class="input" type="file" name="photo_ktp">--}}
{{--                                    <p class="has-text-weight-light">Hanya mendukung format jpeg,jpg,png,gif.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="column">--}}
{{--                                <div class="field">--}}
{{--                                    <label class="label">Upload Foto Selfie dengan KTP</label>--}}
{{--                                    <input class="input" type="file" name="photo_selfie_with_ktp">--}}
{{--                                    <p class="has-text-weight-light">Hanya mendukung format jpeg,jpg,png,gif.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="field">--}}
{{--                            <div class="control">--}}
{{--                                <button class="button is-primary is-fullwidth">Verifikasi Data</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    @endif--}}
@endsection
