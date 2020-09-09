@extends('layouts.dashboard')

@section('title', 'Api')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box">
                        <h3 class="subtitle is-4">Informasi Developer Api</h3>
                        <div class="field">
                            <div class="table-container">
                                <table class="table is-fullwidth is-bordered">
                                    <tr>
                                        <td>Status Developer Api</td>
                                        <td>:</td>
                                        <td>
                                            <span class="tag is-danger">Belum Aktif</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="field">
                            <button class="button is-primary is-fullwidth">Aktifkan Api</button>
                        </div>
                    </div>

                    <div class="box">
                        <h3 class="subtitle is-4">Panduan</h3>
                        <div class="field">
                            <label class="label"></label>
                            <p>Panduan penggunaan api dapat dibaca pada halaman "Dokumentasi Api".</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
