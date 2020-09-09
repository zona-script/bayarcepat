<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <style>
        .button {
            background-color:#44c767;
            border-radius:4px;
            border:1px solid #18ab29;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-size:17px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0 1px 0 #2f6627;
        }
        .button:hover {
            background-color:#5cbf2a;
        }
        .button:active {
            position:relative;
            top:1px;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #fffff1">
<div style="">
    <img src="{{ asset('/images/unnamed.png') }}" style="width: 260px">
</div>
<hr>
<div style="padding-top: 10px; padding-bottom: 10px; padding-left:10px; padding-right: 10px">
    @yield('content')
</div>
<div style="text-align: center; border-top-color: black; border-top-width: 1px; border-top-style: solid" class="center">
    <div class="content has-text-centered">
        <p class="is-small are-small"><strong>Perhatian: </strong> <br>
            E-mail ini (termasuk seluruh lampirannya, bila ada) hanya ditujukan kepada penerima yang tercantum di atas.
            Jika Anda bukan penerima yang dituju, maka Anda tidak diperkenankan untuk memanfaatkan, menyebarkan, mendistribusikan, atau menggandakan e-mail ini beserta seluruh lampirannya.
        </p>
        <p>
            &copy; 2020 {{ config('app.name') }}
        </p>
    </div>
</div>
</body>
</html>
