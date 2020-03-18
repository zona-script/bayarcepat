
<div class="box">
    <div class="field">
    <h3 class="title is-4">Informasi Produk</h3>
</div>
<div class="field">
    <label class="label">Status Transaksi</label>
    <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
</div>
<div class="field">
    <label class="label">No Telepon</label>
    <input type="text" class="input" value="{{ $transaction->information['phone_number'] }}" disabled>
</div>
<div class="field">
    <label class="label">Kategori</label>
    <input type="text" class="input" value="{{ $transaction->information['product']['category'] }}" disabled>
</div>
<div class="field">
    <label class="label">Brand</label>
    <input type="text" class="input" value="{{ $transaction->information['product']['brand'] }}" disabled>
</div>
<div class="field">
    <label class="label">Kode Produk</label>
    <input type="text" class="input" value="{{ $transaction->information['product']['buyer_sku_code'] }}" disabled>
</div>
<div class="field">
    <label class="label">Deskripsi Produk</label>
    <input type="text" class="input" value="{{ $transaction->information['product']['desc'] }}" disabled>
</div>
<div class="field">
    <label class="label">Harga</label>
    <input type="text" class="input" value="{{ $transaction->information['product']['price'] }}" disabled>
</div>
</div>

@include('dashboard.laporan.component.callback', $transaction)
