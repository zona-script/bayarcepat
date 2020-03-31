@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="box">
                        <div class="field">
                            <label>Link Refferal</label>
                            <input class="input" type="text" value="{{ config('app.url') }}/?ref={{auth()->id()}}" disabled>
                        </div>
                        <div class="field columns is-mobile">
                            <div class="column is-4">
                                <button class="button is-fullwidth is-link">Facebook</button>
                            </div>
                            <div class="column is-4">
                                <button class="button is-fullwidth is-success">Email</button>
                            </div>
                            <div class="column is-4">
                                <button class="button is-fullwidth is-light">Copy Link</button>
                            </div>
                        </div>
                        <div class="field">
                            <p>Kamu akan dapat bonus sebesar 10 Rupiah setiap transaksi, dari pengguna baru yang mendaftar menggunakan link refferal kamu.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="field">
                            <p class="title is-4">Daftar Refferal</p>
                        </div>
                        <div class="table-container">
                            <table class="table is-fullwidth is-striped is-bordered is-hoverable">
                                <thead>
                                <tr>
                                    <th style="width: 20px">#</th>
                                    <th>Username</th>
                                    <th>Waktu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($refferals as $refferal)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        <td>{{ $refferal->refferal->username }}</td>
                                        <td>{{ $refferal->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stack-foot')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    {{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">--}}

    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>--}}

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable( {
                fixedHeader: true
            } );
        });
    </script>
@endpush
