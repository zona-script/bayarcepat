@extends('layouts.admin')

@section('title', 'Social Media Marketing - Panel')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10 is-offset-1">
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
                                    <td>Code</td>
                                    <td>:</td>
                                    <td>{{ $provider->code }}</td>
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
                                    <td>Api Url</td>
                                    <td>:</td>
                                    <td>{{ $provider->api_url }}</td>
                                </tr>
                                <tr>
                                    <td>Api ID</td>
                                    <td>:</td>
                                    <td>{{ $provider->api_id }}</td>
                                </tr>
                                <tr>
                                    <td>Api Key</td>
                                    <td>:</td>
                                    <td>{{ $provider->api_key }}</td>
                                </tr>
                                <tr>
                                    <td>Api Username</td>
                                    <td>:</td>
                                    <td>{{ $provider->api_username }}</td>
                                </tr>
                                <tr>
                                    <td>Api Password</td>
                                    <td>:</td>
                                    <td>{{ $provider->api_password }}</td>
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
                                    <th>Active</th>
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
                                        <td>{{ $product->active }}</td>
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
