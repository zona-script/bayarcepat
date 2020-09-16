<template>
    <div>
        <h3 class="subtitle is-3">Tambah Data</h3>
        <div class="field" v-if="errorMessage">
            <div class="notification is-danger">
                {{ errorMessage }}
                <p v-for="(value, key) in errors">
                    <ul v-for="item in value">
                        <li>{{ item }}</li>
                    </ul>
                </p>
            </div>
        </div>
        <form @submit.prevent="submit">
            <div class="field">
                <div class="control">
                    <label class="label">Bank / Metode Pembayaran</label>
                    <v-select v-model="selectedBank" :options="banks" label="name">
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
                <div class="control">
                    <label class="label">Nama Pada Rekening</label>
                    <input v-model="bankAccountName" class="input" type="text" placeholder="">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <label class="label">Nomor Rekening</label>
                    <input v-model="bankAccountNumber" class="input" type="text" placeholder="">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <label class="label">Catatan</label>
                    <textarea v-model="notes" class="textarea" type="text" placeholder="optional">
                            </textarea>
                </div>
            </div>
            <div class="field">
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <div v-on:click="cancel" class="button is-danger is-fullwidth">Kembali</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="control">
                            <button class="button is-primary is-fullwidth">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'CreateComponent',
    data() {
        return {
            selectedBank: '',
            bankAccountName: '',
            bankAccountNumber: '',
            notes: '',
            url:'',
            errors: '',
            errorMessage: '',
            banks: ''
        }
    },
    mounted() {
        this.url = this.route('api.user-bank.store')
        window.axios.get(this.route('api.bank-master.index'))
            .then(response => {
                this.banks = response.data.data
            })
    },
    methods: {
        cancel() {
            this.$emit('childToParentClickCancel', false)
        },
        submit() {
            const formData = {
                'selected_bank': this.selectedBank,
                'selected_bank_id': this.selectedBank.id,
                'bank_account_name': this.bankAccountName,
                'bank_account_number': this.bankAccountNumber,
                'notes': this.notes
            }

            window.axios.post(this.url, formData)
                .then(response => {
                    this.$emit('childToParent', false)

                })
                .catch(error => {
                    this.errorMessage = error.response.data.message
                    this.errors = error.response.data.errors
                });
        },
        clearData() {
            this.selectedBank = ''
            this.bankAccountName = ''
            this.bankAccountNumber = ''
        }
    },
}
</script>

<style scoped>

</style>
