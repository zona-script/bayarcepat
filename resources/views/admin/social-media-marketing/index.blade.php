@extends('layouts.admin')

@section('title', 'Social Media Marketing - Panel')

@section('content')
    <div class="section">
        <div class="container">
            <div class="table-container">
                <table class="table is-fullwidth is-bordered display" id="table_id">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Provider</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Min</th>
                        <th>Max</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($panelProducts as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->min }}</td>
                            <td>{{ $product->max }}</td>
                            <td>{{ $product->category }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
@push('stack-head')
@endpush

@push('stack-foot')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endpush
