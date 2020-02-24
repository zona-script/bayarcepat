<div class="field">
<br>
    @if ($message = session()->get('success'))
        <div class="notification is-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = session()->get('error'))
        <div class="notification is-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = session()->get('warning'))
        <div class="notification is-warning">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = session()->get('info'))
        <div class="notification is-info">
            <strong>{{ $message }}</strong>
        </div>
    @endif

</div>
