
<div class="box">
<div class="field">
    <h3 class="title is-4">Informasi Produk</h3>
</div>
<div class="field">
    <label class="label">Status Transaksi</label>
    <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
</div>
<div class="field">
    <label class="label">No Transaksi Pembelian</label>
    <input type="text" class="input" value="{{ $transaction->information['id'] }}" disabled>
</div>
<div class="field">
    <label class="label">No Telepon</label>
    <input type="text" class="input" value="{{ $transaction->information['information']['phone_number'] }}" disabled>
</div>
{{--<div class="field">--}}
{{--    <label class="label">Provider</label>--}}
{{--    <input type="text" class="input" value="{{ $transaction->information['information']['product']['provider'] }}" disabled>--}}
{{--</div>--}}
{{--<div class="field">--}}
{{--    <label class="label">Operator</label>--}}
{{--    <input type="text" class="input" value="{{ $transaction->information['information']['product']['operator'] }}" disabled>--}}
{{--</div>--}}
{{--<div class="field">--}}
{{--    <label class="label">Deskripsi</label>--}}
{{--    <input type="text" class="input" value="{{ $transaction->information['information']['product']['description'] }}" disabled>--}}
{{--</div>--}}
<div class="field">
    <label class="label">Harga</label>
    <input type="text" class="input" value="{{ $transaction->information['information']['product']['price'] }}" disabled>
</div>
<div class="field">
    <a href="{{ route('web.dashboard.riwayat.show', $transaction->information['id']) }}" class="button is-primary is-fullwidth">Lihat Detail</a>
</div>
</div>
