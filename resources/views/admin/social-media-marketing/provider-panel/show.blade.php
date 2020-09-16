@extends('layouts.admin')

@section('title', 'Social Media Marketing - Panel')

@section('content')
    <div class="section">
        <div class="container">

            <div class="box">
                <div class="table-container">
                    <table class="table is-fullwidth is-bordered">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>{{ $provider->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>{{ $provider->name }}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>:</td>
                            <td>{{ $provider->website }}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>:</td>
                            <td>{{ $provider->note }}</td>
                        </tr>
                        <tr>
                            <td>Active</td>
                            <td>:</td>
                            <td>{{ $provider->active }}</td>
                        </tr>
                        <tr>
                            <td>Config</td>
                            <td>:</td>
                            <td><pre>{{ json_encode($provider->config, JSON_PRETTY_PRINT) }}</pre></td>
                        </tr>
                        <tr>
                            <td>Result Data</td>
                            <td>:</td>
                            <td><pre>{{ json_encode($provider->result_data, JSON_PRETTY_PRINT) }}</pre></td>
                        </tr>

                        <tr>
                            <td>trx_credential</td>
                            <td>:</td>
                            <td><pre>{{ $provider->trx_credential }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_get_profile_url</td>
                            <td>:</td>
                            <td>{{ $provider->trx_get_profile_url }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_get_profile</td>
                            <td>:</td>
                            <td><pre>{{ json_encode($provider->trx_get_profile, JSON_PRETTY_PRINT) }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_get_services_url</td>
                            <td>:</td>
                            <td>{{ $provider->trx_get_services_url }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_get_services</td>
                            <td>:</td>
                            <td><pre>{{ json_encode($provider->trx_get_services, JSON_PRETTY_PRINT) }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_check_status_url</td>
                            <td>:</td>
                            <td>{{ $provider->trx_check_status_url }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_check_status</td>
                            <td>:</td>
                            <td><pre>{{ $provider->trx_check_status }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_create_order_url</td>
                            <td>:</td>
                            <td>{{ $provider->trx_create_order_url }}</pre></td>
                        </tr>
                        <tr>
                            <td>trx_create_order</td>
                            <td>:</td>
                            <td><pre>{{ json_encode($provider->trx_create_order, JSON_PRETTY_PRINT) }}</pre></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('web.admin.social-media-marketing.provider-panel-sync.update', $provider->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="field">
                    <div class="control">
                        <p>
                            <button class="button is-primary is-fullwidth">Update Produk / Layanan (Sync)</button>
                        </p>
                    </div>
                </div>
            </form>
            <div class="box">
                <h3>Jumlah Data: {{ count($provider->products) }}</h3>
                <div class="table-container">
                    <table class="table is-fullwidth is-bordered">
                        <thead>
                        <tr>
                            <th>ID (Service ID)</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Kategori</th>
                            <th>Is_Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($provider->products as $product)
                            <tr>
                                <td>{{ $product->id }} ( {{ $product->service_id }} )</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->min }}</td>
                                <td>{{ $product->max }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    @if($product->is_available)
                                        <span class="tag is-primary">Tersedia</span>
                                    @else
                                        <span class="tag is-danger">Tidak Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('stack-head')
@endpush
