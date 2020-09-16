<template>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="box">
                        <h3 class="subtitle is-4">Pengajuan Deposit</h3>

                        <div class="field">
                            <div class="notification is-warning">
                                <p>Jumlah uang yang anda inputkan, setelah klik tombol pengajuan deposit, maka akan ditambah dengan kode unik, random antara angka 1 sampai dengan 500 (kode unik akan dimasukan ke saldo anda).</p>
                            </div>
                        </div>
                        <div class="field">
                            <label>Jumlah Uang (Rp)</label>
                            <div class="control has-icons-left">
                                <input class="input" v-model="amount" min="1" type="number" placeholder="Jumlah uang">
                                <span class="icon is-small is-left">
                                        <i class="fas fa-coins"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label>Metode Pembayaran</label>
                            <div class="control is-fullwidth">
                                <v-select v-model="selectedPaymentMethod" :options="banks" label="name">
                                    <template #search="{attributes, events}">
                                        <input
                                            class="vs__search"
                                            :required="!selectedPaymentMethod"
                                            v-bind="attributes"
                                            v-on="events"
                                        />
                                    </template>
                                </v-select>
                            </div>
                        </div>
                        <div class="field">
                            <label>Tujuan Pembayaran</label>
                            <div class="control is-fullwidth">
                                <v-select v-model="selectedBank" v-bind:options="bankOptions" label="bank_account_name">
                                    <template #search="{attributes, events}">
                                        <input
                                            class="vs__search"
                                            :required="!selectedBank"
                                            v-bind="attributes"
                                            v-on="events"
                                        />
                                    </template>
                                </v-select>
                            </div>
                        </div>

                        <div class="field">
                            <label>Catatan/Pesan (optional)</label>
                            <div class="control">
                                    <textarea v-model="notes" class="textarea" placeholder="Notes (optional)">
                                    </textarea>
                            </div>
                        </div>

                        <div class="field">
                            <div class="notification is-warning">
                                <p>Pengiriman harus menggunakan rekening seperti yang anda tentukan, tidak boleh menggunakan rekening selain yang anda tentukan.</p>
                            </div>
                        </div>
                        <div class="field">
                            <label>Rekening Pengirim</label>
                            <div class="field is-grouped">
                                <div class="control is-expanded is-vcentered">
                                    <v-select class="is-fullwidth" v-model="selectedUserBank" :options="userBanks">
                                        <template #search="{attributes, events}">
                                            <input
                                                class="vs__search"
                                                :required="!selectedUserBank"
                                                v-bind="attributes"
                                                v-on="events"
                                            />
                                        </template>
                                        <template slot="option" slot-scope="option">
                                            {{option.bank_master.name }} - {{ option.bank_account_name }}
                                        </template>
                                        <template slot="selected-option" slot-scope="option">
                                            {{option.bank_master.name }} - {{ option.bank_account_name }}
                                        </template>
                                    </v-select>
                                </div>
                                <div class="control">
                                    <button type="submit" class="button is-info is-small" v-on:click="showModal">Tambah</button>
                                </div>
                            </div>
                        </div>


                        <div class="field">
                            <button v-on:click="saveData" class="button is-primary is-fullwidth">Ajukan Deposit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" v-bind:class="{ 'is-active': showModalIsActive }">
            <div class="modal-background has-background-white"></div>
            <div class="modal-content">
                <index-list v-bind:users="userBanks" v-bind:banks="banks"></index-list>
            </div>
            <button class="modal-close is-large has-background-danger" aria-label="close" v-on:click="closeModal"></button>
        </div>

    </div>
</template>

<script>
import IndexList from "../../Bank/IndexList";

export default {
    components: {
      IndexList
    },
    name: "Index",
    props: [
        'banks'
    ],
    data() {
        return {
            selectedPaymentMethod: '',
            selectedBank: '',
            selectedUserBank: '',
            bankOptions: [],
            userBanks: [],
            amount: '',
            notes: '',
            showModalIsActive: false,
        }
    },
    watch: {
        selectedPaymentMethod: function (newValue, oldValue) {
            this.bankOptions = newValue.bank
            this.selectedBank = []
        }
    },
    mounted() {
        this.updateData()
    },
    methods: {
        showModal() {
            this.showModalIsActive = true
        },
        closeModal() {
            this.updateData()
            this.showModalIsActive = false
        },
        updateData() {
            window.axios.get(this.route('api.user-bank.index'))
                .then(response => {
                    this.userBanks = response.data.data
                })
        },
        saveData() {

            if (this.selectedBank == '' ||
                this.selectedUserBank == '' ||
                this.amount == ''
            ) {
                this.$alert('Semua wajib disini (kecuali catatan)', 'Ada kesalahan', 'error');
            } else {
                const formData = {
                    'selected_bank': this.selectedBank,
                    'selected_bank_id': this.selectedBank.id,
                    'selected_user_bank': this.selectedUserBank,
                    'selected_user_bank_id': this.selectedUserBank.id,
                    'amount': this.amount,
                    'notes': this.notes
                }

                window.axios.post(this.route('api.balance.deposit.store'), formData)
                    .then(response => {
                        this.$alert(response.data.message, 'Berhasil', 'success');
                        window.location.href = this.route('web.dashboard.balance.history.show', response.data.data.id)
                    })
                    .catch(error => {
                        this.$alert(error.response.data.message, 'Gagal Deposit', 'error');
                    });
            }
        }
    }
}
</script>

<style scoped>
</style>
