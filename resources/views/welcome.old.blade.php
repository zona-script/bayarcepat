@extends('layouts.app')

@section('title', 'Platform Gotong Royong Untuk UKM')

{{--        /*.hero-welcome {background: transparent url('/images/wave.svg'); background-repeat: no-repeat; background-attachment: scroll;background-position-y: bottom;}  .hero-welcome-bottom {background: transparent url('/images/wave-flip.svg');background-repeat: no-repeat;background-attachment: scroll;margin-top: -1px;}*/
--}}
@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h2 class="title">Kebijakan Privasi</h2>
                <h3 class="subtitle">kami tau bahwa privasi anda itu penting sekali</h3>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3 box">

                    <div class="tabs is-toggle is-fullwidth">
                        <ul>
                            <li class="is-active">
                                <a>
                                    <span class="icon is-small"><i class="fas fa-phone" aria-hidden="true"></i></span>
                                    <span>Pulsa</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fab fa-intercom" aria-hidden="true"></i></span>
                                    <span>Paket Data</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fab fa-intercom" aria-hidden="true"></i></span>
                                    <span>Nelfon & SMS</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fas fa-gamepad" aria-hidden="true"></i></span>
                                    <span>Voucher Game</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fas fa-gamepad" aria-hidden="true"></i></span>
                                    <span>Saldo Ojek Online</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fas fa-electrict" aria-hidden="true"></i></span>
                                    <span>PLN</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="icon is-small"><i class="fas fa-money-bill-alt" aria-hidden="true"></i></span>
                                    <span>Transfer Saldo</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3 box">
                    <div class="notification is-warning">
                        <p class="has-text-weight-bold">Informasi</p>
                        <p>Pastikan nomor telepon yang anda inputkan sudah benar, kesalahan input data berakibat pada pulsa masuk ke nomor orang lain.</p>
                    </div>
                    <div class="field">
                        <label class="label">Operator</label>
                        <div class="select is-fullwidth">
                            <select>
                                <option>Telkomsel</option>
                                <option>Indosat</option>
                                <option>XL</option>
                                <option>Smartfren</option>
                                <option>Axis</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nominal Pulsa</label>
                        <div class="select is-fullwidth">
                            <select>
                                <option>5000</option>
                                <option>10000</option>
                                <option>20000</option>
                                <option>25000</option>
                                <option>50000</option>
                                <option>100000</option>
                                <option>1000000</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">No Telepon</label>
                        <input class="input" type="text" placeholder="Nomor Telepon">
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Saldo Saat Ini</label>
                                <input class="input" type="text" value="Rp 1.000.000" disabled>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Harga yang harus dibayar</label>
                                <input class="input" type="text" value="Rp 0" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <button class="button is-primary is-fullwidth">Beli</button>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3 box">
                    <div class="notification is-warning">
                        <p class="has-text-weight-bold">Informasi</p>
                        <p>Mohon teliti nomor meter atau id PLN serta No telepon, pastikan data sudah benar. <br>
                            Kode voucher akan dikirim ke nomor telepon yang di masukan.</p>
                    </div>
                    <div class="field">
                        <label class="label">Nominal PLN</label>
                        <div class="select is-fullwidth">
                            <select>
                                <option>PLN 5000</option>
                                <option>PLN 10000</option>
                                <option>PLN 20000</option>
                                <option>PLN 25000</option>
                                <option>PLN 50000</option>
                                <option>PLN 100000</option>
                                <option>PLN 200000</option>
                                <option>PLN 500000</option>
                                <option>PLN 1000000</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nomor meter atau ID PLN</label>
                        <input class="input" type="text" placeholder="Nomor meter atau ID PLN Pelanggan">
                    </div>
                    <div class="field">
                        <label class="label">No Telepon</label>
                        <input class="input" type="text" placeholder="Nomor Telepon">
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Saldo Saat Ini</label>
                                <input class="input" type="text" value="Rp 1.000.000" disabled>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Harga yang harus dibayar</label>
                                <input class="input" type="text" value="Rp 0" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <button class="button is-primary is-fullwidth">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero is-fullwidth is-medium is-white">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered hero-caption">
                    <div class="column is-5 is-offset-1">
                        <img src="{{ asset('images/icon-hero-depan.svg') }}">
                    </div>
                    <div class="column is-5 is-offset-1">
                        <h1 class="title is-1 is-bold has-text-primary">
                            Selamat Datang
                        </h1>
                        <h2 class="title is-2 has-text-primary">
                            Ayo Gotong Royong Untuk Lebih Sukses
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered">
                <ul>
                    <li><img src="{{ asset('images/partners/gutwork.svg') }}" alt=""></li>
                    <li><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/1280px-BANK_BRI_logo.svg.png" alt=""></li>
                    <li><img src="https://www.google.com/logos/doodles/2015/googles-new-logo-5078286822539264.3-hp2x.gif" alt=""></li>
                    <li><img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png" alt="" style="max-width: 128px"></li>
                </ul>
            </div>
        </div>
        </div>
    </div>

    <div class="section is-medium">
        <div class="container">
            <div class="columns is-vcentered side-feature">
                <div class="column is-5 is-hidden-desktop is-hidden-tablet">
                    <figure class="image is-1by1">
                        <img src="{{ asset('images/undraw_Savings_dwkw.svg') }}" alt="">
                    </figure>
                </div>
                <div class="column is-7">
                    <h3 class="title is-2 is-bold is-title-reveal has-text-primary">Apa itu {{ getenv('APP_NAME') }}?</h3>
                    <p class="subtitle">{{ getenv('APP_NAME') }} Adalah Platform Urun Dana untuk Ekspansi Bisnis UMKM di Indonesia.</p>
                </div>
                <div class="column is-5 is-hidden-mobile">
                    <figure class="image is-5by4">
                        <img src="{{ asset('images/undraw_Savings_dwkw.svg') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="hero is-medium is-primary is-bold is-fullwidth">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column is-6">
                        <h3 class="title is-3 has-text-weight-bold">Menjadi Investor</h3>
                        <p class="subtitle">Pilih investasi yang bagus untuk anda, hanya perlu modal mulai dari 10rb saja</p>
                        <p>
                            <button class="button is-white is-rounded is-medium">Jadi Investor</button>
                        </p>
                    </div>
                    <div class="column is-6">
                        <h3 class="title is-3 has-text-weight-bold">Daftarkan Bisnis / Proyek</h3>
                        <p class="subtitle">Butuh modal untuk mengembangkan bisnis Anda? Kumpulkan modal hingga Rp 10M dalam waktu cepat.</p>
                        <p>
                            <button class="button is-white is-rounded is-medium">Daftarkan Bisnis</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
