
<div class="field">
    <h3 class="title is-4">Informasi Bank Pembayaran</h3>
</div>
<div class="field">
    <label class="label">Status Deposit</label>
    <input type="text" class="input is-primary" value="{{ $transaction->status_string }}" disabled>
</div>
<div class="field">
    <label class="label">Nama Bank</label>
    <input type="text" class="input" value="{{ $transaction->information['bank']['bank_name'] }}" disabled>
</div>
<div class="field">
    <label class="label">No Rekening Bank</label>
    <input type="text" class="input" value="{{ $transaction->information['bank']['bank_account_number'] }}" disabled>
</div>
<div class="field">
    <label class="label">Nama Rekening Bank</label>
    <input type="text" class="input" value="{{ $transaction->information['bank']['bank_account_name'] }}" disabled>
</div>
<div class="field">
    <label class="label">Nominal</label>
    <input type="text" class="input" value="Rp {{ money_format_rupiah($transaction->information['bank']['value']) }}" disabled>
</div>
<div class="field">
    <label class="label">Kode Unik</label>
    <input type="text" class="input" value="Rp {{ money_format_rupiah($transaction->information['bank']['value_unique']) }}" disabled>
</div>
<div class="field">
    <label class="label">Total Uang Harus Dikirim</label>
    <input type="text" class="input" value="Rp {{ money_format_rupiah($transaction->information['bank']['value_total']) }}" disabled>
</div>
</div>
<div class="box">
    <div class="field">
        <h3 class="title is-4">Informasi Bank Anda</h3>
    </div>
    <div class="field">
        <div class="notification is-warning">
            Untuk menyelesaikan transaksi ini, Anda harus mengirim pembayaran dengan nomor rekening dibawah ini.
        </div>
    </div>
    <div class="field">
        <label class="label">Nama Bank</label>
        <input type="text" class="input" value="{{ $transaction->information['user_bank']['bank_name'] }}" disabled>
    </div>
    <div class="field">
        <label class="label">No Rekening Bank</label>
        <input type="text" class="input" value="{{ $transaction->information['user_bank']['bank_account_number'] }}" disabled>
    </div>
    <div class="field">
        <label class="label">Nama Rekening Bank</label>
        <input type="text" class="input" value="{{ $transaction->information['user_bank']['bank_account_name'] }}" disabled>
    </div>
