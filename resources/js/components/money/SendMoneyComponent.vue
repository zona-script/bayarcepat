<template>
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box has-text-centered">
                <h3 class="subtitle is-4">Mau Kirim Uang Kemana?</h3>
                <div class="columns">
                    <div class="column is-6">
                        <a v-on:click="sendMoneyTo = 'member'" class="box has-text-centered">
                            <span><i class="fas fa-piggy-bank fa-2x"></i></span>
                            <p>Sesama Member</p>
                        </a>
                    </div>
                    <div class="column is-6">
                        <a v-on:click="sendMoneyTo = 'bank'" class="box has-text-centered">
                            <span><i class="fas fa-university fa-2x"></i></span>
                            <p>Rekening Bank</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="box" v-if="sendMoneyTo === 'member'">
                <h3 class="subtitle is-4">Informasi Tujuan</h3>
                <input type="hidden" name="_token" :value="csrf">
                <div class="field">
                    <label class="label">Username / No telepon</label>
                    <p class="control has-icons-left">
                        <input name="username_or_phone" class="input" type="text" placeholder="username atau nomor telepon" @change="onChangeUsername" v-model="searchKey">
                        <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                </span>
                    </p>
                    <p class="has-text-weight-light">Kesalahan memasukan username / no telepon menyebabkan uang hilang.</p>
                </div>

                <div class="field">
                    <label class="label">Jumlah Uang (Rp)</label>
                    <p class="control has-icons-left">
                        <input name="money_amount" class="input" type="number" placeholder="Text input" v-model="money_amount">
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
            </div>
            <div class="box" v-if="sendMoneyTo === 'bank'">
                <h3 class="subtitle is-4">Informasi Rekening</h3>
                <div class="field">
                    <p>Gunakan menu deposit / penarikan saldo untuk melakukan transfer ke bank.</p>
                </div>
                <div class="field">
                    <a href="/dashboard/saldo/deposit" class="button is-primary is-fullwidth">
                        <span>Lihat halaman deposit</span>
                    </a>
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
        }
    }
</script>

<style scoped>

</style>
