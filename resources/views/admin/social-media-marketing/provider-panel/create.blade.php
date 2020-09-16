@extends('layouts.admin')

@section('title', 'Tambah SMM')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                   Tambah Provider
                </h1>
                <h2 class="subtitle">
                    Menambahkan provider baru, harap di perhatikan penulisan.
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <form action="{{ route('web.admin.social-media-marketing.provider-panel.store') }}" method="POST">
                        @csrf

                        <div class="box">
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input name="name" class="input" type="text" placeholder="Tulis Disini" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Website</label>
                                <div class="control">
                                    <input name="website" class="input" type="text" placeholder="Tulis disini" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Note (optional)</label>
                                <div class="control">
                                    <textarea name="note" class="textarea"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">IS Active</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="is_active" required>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box">
                            <div class="field">
                                <label class="label">Credential</label>
                                <div class="control">
                                    <textarea name="credential" class="textarea" required>{
    "api_key": "98687ngngugguyfhhnfh"
}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <h3 class="subtitle">Config (config)</h3>
                            </div>
                            <div class="field">
                                <label class="label">result_in</label>
                                <div class="control">
                                    <input name="config_result_in" class="input" type="text" value="data" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">field_status_available ?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="config_field_status_available" required>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">field_status_in</label>
                                <div class="control">
                                    <input name="config_field_status_in" class="input" type="text" value="status" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">filed_status_success_if_status</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="config_status" required>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="field">
                                <h3 class="subtitle">Result Data (result_data)</h3>
                            </div>
                            <div class="field">
                                <label class="label">service_id</label>
                                <div class="control">
                                    <input name="result_data_service_id" class="input" type="text" value="id" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">name</label>
                                <div class="control">
                                    <input name="result_data_name" class="input" type="text" value="name" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">price</label>
                                <div class="control">
                                    <input name="result_data_price" class="input" type="text" value="price" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">min</label>
                                <div class="control">
                                    <input name="result_data_min" class="input" type="text" value="min" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">max</label>
                                <div class="control">
                                    <input name="result_data_max" class="input" type="text" value="max" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">category</label>
                                <div class="control">
                                    <input name="result_data_category" class="input" type="text" value="category" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">note</label>
                                <div class="control">
                                    <input name="result_data_note" class="input" value="description" required>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <label class="label">get_profile_url</label>
                                <div class="control">
                                    <input name="get_profile_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">get_profile_append_data (json)</label>
                                <div class="control">
                                    <textarea name="get_profile_append_data" class="textarea"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">get_profile_http_method</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="get_profile_http_method">
                                            @foreach (get_all_http_method() as $method)
                                                <option value="{{ $method }}">{{ $method }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box">
                            <div class="field">
                                <label class="label">get_services_url</label>
                                <div class="control">
                                    <input name="get_services_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">get_services_append_data (json)</label>
                                <div class="control">
                                    <textarea name="get_services_append_data" class="textarea"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">get_services_http_method</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="get_services_http_method">
                                            @foreach (get_all_http_method() as $method)
                                                <option value="{{ $method }}">{{ $method }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box">
                            <div class="field">
                                <label class="label">check_status_url</label>
                                <div class="control">
                                    <input name="check_status_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">check_status_append_data (json)</label>
                                <div class="control">
                                    <textarea name="check_status_append_data" class="textarea"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">check_status_http_method</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="check_status_http_method">
                                            @foreach (get_all_http_method() as $method)
                                                <option value="{{ $method }}">{{ $method }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box">
                            <div class="field">
                                <label class="label">create_order_url</label>
                                <div class="control">
                                    <input name="create_order_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">create_order_append_data (json)</label>
                                <div class="control">
                                    <textarea name="create_order_append_data" class="textarea"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">create_order_http_method</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="create_order_http_method">
                                            @foreach (get_all_http_method() as $method)
                                                <option value="{{ $method }}">{{ $method }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth">Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('stack-head')
@endpush
