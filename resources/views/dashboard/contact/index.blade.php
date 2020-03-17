@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="box">
                        <div class="field">
                            <p class="title">Kontak</p>
                            <p class="subtitle">Daftar semua kontak, untuk transaksi cepat.</p>
                        </div>
                        <div class="field has-text-right">
                            <a class="button is-primary" href="{{ route('web.dashboard.contact.create') }}">Tambah Kontak</a>
                        </div>
                        <div class="table-container">
                            <table class="table is-fullwidth is-striped is-bordered is-hoverable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tipe</th>
                                    <th>Nomor Pelanggan</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>{{ $contact->type }}</td>
                                        <td>{{ $contact->customer_number }}</td>
                                        <td>
                                            <div class="columns">
                                                <div class="column is-6">
                                                    <a href="{{ route('web.dashboard.contact.edit', $contact->id) }}" class="button is-info is-fullwidth">Edit</a>
                                                </div>
                                                <div class="column is-6">
                                                    <form action="{{ route('web.dashboard.contact.destroy', $contact->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="button is-danger is-fullwidth" onclick="submitForm(event)">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
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
        // $(document).ready( function () {
        //     $('#table_id').DataTable( {
        //         fixedHeader: true
        //     } );
        // });

        function submitForm(event){
            var confirmation = confirm("Yakin ingin menghapus data ?") ;

            if (!confirmation)
            {
                event.preventDefault() ;
                window.alert('Penghapusan dibatalkan.')
            }
        }
    </script>
@endpush
