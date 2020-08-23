@extends('layouts.admin')

@section('title', 'Social Media Marketing - Panel')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <div class="box">
                        <p>
                            <a href="{{ route('web.admin.social-media-marketing.provider-panel.create') }}" class="button is-primary">Tambah Data</a>
                        </p>
                        <br>
                        <div class="table-container">
                            <table class="table is-fullwidth is-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Website</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($providers as $provider)
                                    <tr>
                                        <td>{{ $provider->id }}</td>
                                        <td>{{ $provider->name }}</td>
                                        <td>{{ $provider->website }}</td>
                                        <td>
                                            @if ($provider->active)
                                                <span class="tag is-primary">Aktif</span>
                                            @else
                                                <span class="tag is-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('web.admin.social-media-marketing.provider-panel.show', $provider->id) }}" class="button is-primary">Detail</a>
                                            <a href="{{ route('web.admin.social-media-marketing.provider-panel.edit', $provider->id) }}" class="button is-info">Edit</a>
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

@push('stack-head')
@endpush
