<template>
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="field">
                <label class="label">Username Penerima</label>
                <div class="is-fullwidth">
                    <v-select v-model="user" label="username" :options="users" @search="fetchOptions" />
                </div>
            </div>
            <div class="field">
                <label class="label">Jumlah Uang</label>
                <div class="control">
                    <input v-model="amount" class="input is-primary" type="number" placeholder="Masukan jumlah uang" min="1" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Pesan Untuk Penerima (Opsional)</label>
                <div class="control">
                    <textarea v-model="message" class="textarea is-primary" placeholder="Masukan pesan untuk penerima (tidak wajib)"></textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button @click="sendMoney" class="button is-primary is-fullwidth">Kirim Uang</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",
    data() {
        return {
            users: [],
            user: '',
            amount: '',
            message: ''
        }
    },
    mounted() {
    },
    created() {
    },
    methods: {
        /**
         * Triggered when the search text changes.
         *
         * @param search  {String}    Current search text
         * @param loading {Function}	Toggle loading class
         */
        fetchOptions (search, loading) {
            if (search.length > 3) {
                window.axios.get('/api/users/username?username=' + search)
                    .then(response => {
                        this.users = response.data
                    })
            }
        },
        sendMoney() {
            if (this.user === '' || this.amount === '') {
                this.checkInput()
            } else {
                let params = {
                    username: this.user.username,
                    amount: this.amount,
                    message: this.message
                }

                window.axios.post('?', params)
                    .then(response => {
                        const result = response.data;
                        console.log(result)
                        if(result.status) {
                            this.resetForm()
                            this.$alert(result.message, 'Pembelian Berhasil', 'success').then(() => {
                                alert('redirect ')
                            });
                        } else {
                            this.$alert(result.message, 'Transaksi Tidak berhasil', 'error')
                        }
                    })
            }
        },
        checkInput() {
            if (this.user === '') {
                this.$alert('Anda belum memasukan username penerima.','Pemberitahuan',  'warning')
            }

            if (this.amount === '') {
                this.$alert('Anda belum memasukan jumlah uang.', 'Pemberitahuan',  'warning')
            }
        },
        resetForm() {
            this.user = ''
            this.amount = ''
            this.message = ''
        }
    },
    watch: {
    }
}
</script>

<style scoped>

</style>
