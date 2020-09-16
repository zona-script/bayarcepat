<div class="navbar is-white" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <span class="logo-text has-text-primary is-bold">{{ config('app.name') }}</span>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end has-text-left">
                <a class="navbar-item" href="{{ route('web.dashboard.index') }}">
                    Dashboard
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Pembelian & Transaksi</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="{{ route('web.dashboard.prepaid.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-mobile-alt"></i></span>
                            <span>Order Prepaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.prepaid.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi Prepaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.postpaid.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-broadcast-tower"></i></span>
                            <span>Order Postpaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.postpaid.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi Postpaid</span>
                        </a>
                        <a href="{{ route('web.dashboard.social-media-marketing.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-hashtag"></i></span>
                            <span>Order SMM Panel</span>
                        </a>
                        <a href="{{ route('web.dashboard.social-media-marketing.history') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Transaksi SMM Panel</span>
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="has-text-black">Keuangan</span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="{{ route('web.dashboard.send-money.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-paper-plane"></i></span>
                            <span>Kirim Uang</span>
                        </a>
                        <a href="{{ route('web.dashboard.send-money.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-history"></i></span>
                            <span>Riwayat Pengiriman</span>
                        </a>
                        <a href="{{ route('web.dashboard.balance.deposit.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-money-bill"></i></span>
                            <span>Deposit Uang</span>
                        </a>
                        <a href="{{ route('web.dashboard.balance.deposit.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-coins"></i></span>
                            <span>Penarikan Uang</span>
                        </a>
                        <a href="#" class="navbar-item">
                            <span class="icon"><i class="fas fa-hashtag"></i></span>
                            <span>Riwayat Deposit & Penarikan</span>
                        </a>
                        <a href="#" class="navbar-item">
                            <span class="icon"><i class="fas fa-credit-card"></i></span>
                            <span>Rekening Bank</span>
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Pengaturan
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            Saldo Rp {{ auth()->user()->balance_number_format }}
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{ route('web.dashboard.profile.index') }}" class="navbar-item">
                            <span class="icon"><i class="fas fa-user-alt"></i></span>
                            <span>Profile</span>
                        </a>
                        <a class="navbar-item" href="{{ route('web.dashboard.pengaturan.index') }}">
                            <span class="icon"><i class="fas fa-store-alt"></i></span>
                            <span>Data Toko</span>
                        </a>
                        <a class="navbar-item" href="{{ route('web.dashboard.api.index') }}">
                            <span class="icon"><i class="fas fa-code"></i></span>
                            <span>Developer Api</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
