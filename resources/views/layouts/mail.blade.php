<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar is-mobile">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ env('APP_URL') }}">
            <h1 class="title has-text-primary is-uppercase">{{ env('APP_NAME') }}</h1>
        </a>
    </div>

    <div class="navbar-end is-hidden-mobile">
        <a class="navbar-item" href="{{ env('APP_NAME') }}">
            Kunjungi WEB
        </a>
    </div>
</nav>
<div class="hero is-primary has-text-centered">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-3">{{ env('APP_NAME') }}</h1>
        </div>
    </div>
</div>
<div class="content">
    <ol type="1">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="A">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="a">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="I">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="i">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
</div>
<div id="app">
    @yield('content')
</div>
<div class="section has-background-warning">
    <h3 class="subtitle is-3">Peringatan</h3>
    <p>Email ini hanya ditujukan kepada [NAMA ORANG] dengan alamat email [alamat email]. Jika anda buka [NAMA ORANG] dan bukan pemilik email [alamat email] maka anda tidak diperkenankan untuk membaca atau membuka email ini.</p>
</div>
<footer class="footer has-background-grey-dark">
    <div class="container">
        <div class="has-text-centered has-text-white">
            <p>
                &copy; 2020 {{ env('APP_NAME') }}
            </p>
            <p>Anda mendapatkan email ini karena anda member dari {{ env('APP_NAME') }}</p>
        </div>
    </div>
</footer>
</body>
</html>
