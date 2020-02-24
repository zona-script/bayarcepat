@extends('layouts.app')

@section('title', 'Harga Pulsa Reguler dan Pulsa Transfer')

@section('content')
    <div class="hero is-white">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Harga Pulsa Reguler dan Pulsa Transfer</h1>
                <h2 class="subtitle">Pulsa reguler adalah pulsa yang menambah masa aktif, sedangkan pulsa transfer tidak menambah masa aktif.</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="content">
                <p>
                    Harga pulsa elektrik all operator yang tercantum dibawah ini adalah harga update real time langsung dari server.
                </p>
                <p class="has-text-centered">
                    Update pada {{ \Illuminate\Support\Carbon::now()->toDateTimeString() }}
                </p>

                @foreach($contents as $key => $ctn)
                    <h2>Harga {{ $key }} Termurah SeIndonesia</h2>
                    <table class="table is-bordered is-fullwidth is-hoverable">
                        <tbody>
                        @foreach($ctn as $key => $content)
                            <tr>
                                <td class="has-text-centered"><h3 class="subtitle is-5">Harga Pulsa Operator {{ $key }}</h3></td>
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
                @endforeach
            </div>
        </div>
    </div>

@endsection
