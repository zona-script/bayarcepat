@extends('layouts.admin')

@section('title', 'Tambah SMM')

@section('content')
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
                                <label class="label">Api URL</label>
                                <div class="control">
                                    <input name="api_url" class="input" type="text" placeholder="Tulis disini" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Api ID (optional)</label>
                                <div class="control">
                                    <input name="api_id" class="input" type="text" placeholder="Tulis disini">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Api Key (optional)</label>
                                <div class="control">
                                    <input name="api_key" class="input" type="text" placeholder="Tulis disini">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Api Username (optional)</label>
                                <div class="control">
                                    <input name="api_username" class="input" type="text" placeholder="Tulis disini">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Api Password (optional)</label>
                                <div class="control">
                                    <input name="api_password" class="input" type="text" placeholder="Tulis disini">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Note (optional)</label>
                                <div class="control">
                                    <textarea name="note" class="textarea"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Active</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="active" required>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
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
                                <label class="label">status_available</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="config_status_available" required>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">status</label>
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
                                    <input name="result_data_note" class="input" value="note" required>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <label class="label">Credential</label>
                                <div class="control">
                                    <textarea name="credential" class="textarea" required>{
    "api_key": "api_key"
}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <label class="label">trx_get_profile_url (optional)</label>
                                <div class="control">
                                    <input name="trx_get_profile_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">trx_get_profile</label>
                                <div class="control">
                                    <textarea name="trx_get_profile" class="textarea"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <label class="label">trx_get_services_url (optional)</label>
                                <div class="control">
                                    <input name="trx_get_services_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">trx_get_services</label>
                                <div class="control">
                                    <textarea name="trx_get_services" class="textarea"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <label class="label">trx_check_status_url (optional)</label>
                                <div class="control">
                                    <input name="trx_check_status_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">trx_check_status</label>
                                <div class="control">
                                    <textarea name="trx_check_status" class="textarea"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="field">
                                <label class="label">trx_create_order_url (optional)</label>
                                <div class="control">
                                    <input name="trx_create_order_url" class="input" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">trx_create_order</label>
                                <div class="control">
                                    <textarea name="trx_create_order" class="textarea"></textarea>
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
