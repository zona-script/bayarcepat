@extends('layouts.app')

@section('title', 'Harga Paket Nelfon dan SMS semua operator')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Paket Nelfon dan SMS semua operator</h1>
                <h2 class="subtitle">Kami menyediakan paket nelfon dan sms untuk semua operator di Indonesia.</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    Harga paket nelfon dan sms all operator yang tercantum dibawah ini adalah harga update real time langsung dari server.
                </p>
                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>
                <table class="table is-bordered is-fullwidth is-hoverable">
                    <tbody>
                    @foreach($contents as $key => $content)
                        <tr>
                            <td class="has-text-centered"><h3 class="subtitle is-5">Harga Paket Nelfon dan SMS Operator {{ $key }}</h3></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table is-bordered is-fullwidth is-striped is-hoverable">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px;">No</th>
                                        <th>Provider</th>
                                        <th>Code</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($content as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->provider_sub }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
