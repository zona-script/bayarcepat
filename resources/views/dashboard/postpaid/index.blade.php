@extends('layouts.dashboard')
@section('title', 'Postpaid')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Postpaid (Pasca bayar)
                </h1>
                <h2 class="subtitle">
                    PLN, Internet, Gas, BPJS, Multi Finance, dll.
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <dashboard-postpaid-index></dashboard-postpaid-index>
        </div>
    </div>
    </div>
@endsection
