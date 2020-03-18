<template>
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box has-text-centered">
                <h3 class="subtitle is-4">Mau Kirim Uang Kemana?</h3>
                <div class="columns">
                    <div class="column is-6">
                        <a v-on:click="sendMoneyTo = 'member'" class="box has-text-centered">
                            <span>
                                <img src="data:image/png;base64,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"/>
                            </span>
                            <p>Sesama Member</p>
                        </a>
                    </div>
                    <div class="column is-6">
                        <a v-on:click="sendMoneyTo = 'bank'" class="box has-text-centered">
                            <span>
                                <img src="data:image/png;base64,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"/>
                            </span>
                            <p>Rekening Bank</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="box" v-if="sendMoneyTo === 'member'">
                <form action="/dashboard/kirim-uang/" method="POST">
                    <input type="hidden" name="_token" :value="csrf">

                    <h3 class="subtitle is-4">Informasi Tujuan</h3>
                    <input type="hidden" name="_token" :value="csrf">
                    <div class="field">
                        <label class="label">Email Pengguna (tujuan transfer)</label>
                        <p class="control has-icons-left">
                            <input name="username_or_phone" class="input" type="text" placeholder="username atau nomor telepon" @change="onChangeUsername" v-model="searchKey" required>
                            <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                </span>
                        </p>
                        <p class="has-text-weight-light is-small">Kesalahan memasukan email menyebabkan uang hilang.</p>
                    </div>

                    <div class="field">
                        <label class="label">Jumlah Uang (Rp)</label>
                        <p class="control has-icons-left">
                            <input name="money_amount" class="input" type="number" placeholder="Text input" v-model="money_amount" v-on:change="onChangeAmount" required>
                            <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                        </p>
                    </div>

                    <div class="field" v-if="balance.balance < money_amount">
                        <div class="notification is-danger">
                            Saldo anda kurang, tidak bisa mengirim uang lebih dari jumlah saldo anda.
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Deskripsi (tidak wajib di isi)</label>
                        <textarea name="description" class="textarea" placeholder="Tulis informasi pembayaran atau apapun.">

                            </textarea>
                    </div>

                    <div class="field" v-if="balance.balance >= money_amount">
                        <button class="button is-primary is-fullwidth">
                            <span>Kirim Uang</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="box" v-if="sendMoneyTo === 'bank'">
                <h3 class="subtitle is-4">Informasi Rekening</h3>
                <div class="field">
                    <p>Gunakan menu deposit / penarikan saldo untuk melakukan transfer ke bank.</p>
                </div>
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <a href="/dashboard/saldo/deposit" class="button is-primary is-fullwidth">
                                <span>Deposit</span>
                            </a>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <a href="/dashboard/saldo/tarik" class="button is-primary is-fullwidth">
                                <span>Tarik Saldo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SendMoneyComponent",
        data() {
            return {
                balance: {
                    balance: 0,
                    balance_number_format: 0
                },
                money_amount:0,
                description: '',
                searchKey: '',
                user: '',
                sendMoneyTo: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        created() {
            window.axios.get('/api/web/balance')
                .then(response => {
                    this.balance = response.data.data
                });
        },
        methods: {
            onChangeUsername() {
                window.axios.get('/api/web/user/index?key=' + event.target.value)
                    .then(response => this.user = response.data);
                console.log(this.user)
            },
            onChangeAmount() {
                if (this.money_amount <= 0) {
                    alert('Harus lebih dari Rp 0');
                }
            },
        }
    }
</script>

<style scoped>

</style>
