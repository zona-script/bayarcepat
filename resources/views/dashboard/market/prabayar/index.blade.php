@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <market-prabayar></market-prabayar>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('stack-head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endpush
@push('stack-foot')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').select2();
        });
    </script>
@endpush
