<template>
    <div class="box">
        <h3 class="subtitle is-4">Order Voucher Game</h3>
        <hr>
        <form action="/dashboard/transaksi" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <input name="type" type="text" value="voucher-game" hidden>
            <input type="hidden" name="product_provider" :value="selectedProduct.provider">
            <input type="hidden" name="product_provider_sub" :value="selectedProduct.provider_sub">
            <input type="hidden" name="product_operator" :value="selectedProduct.operator">
            <input type="hidden" name="product_operator_sub" :value="selectedProduct.operator_sub">
            <input type="hidden" name="product_code" :value="selectedProduct.code">
            <input type="hidden" name="product_price" :value="selectedProduct.price">


            <div class="field">
                <label class="label">Nama Game</label>
                <div class="select is-fullwidth">
                    <select name="operator" @change="onChangeOperator($event)" v-model="selectedOperator" required>
                        <option>Pilih Game</option>
                        <option v-for="(item, key) in operator" v-bind:value="key">
                            {{ key }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label">Nominal Voucher Game</label>
                <div class="select is-fullwidth">
                    <select name="product" @change="onChangeProduk($event)" required>
                        <option>Pilih Nominal</option>
                        <option v-for="(item, key) in product" v-bind:value="key">
                            {{ item.description }} -  Rp {{ item.price }}
                        </option>
                    </select>
                </div>
            </div>


            <div class="field" v-if="selectedProduct.description">
                <div class="notification is-info">
                    [Provider {{ selectedProduct.provider }}] {{ selectedProduct.description }}
                </div>
            </div>

            <div class="field" v-if="selectedProduct.status !== 'normal'">
                <div class="notification is-danger">
                    Mohon maaf produk {{ this.selectedProduct.description }} sedang tidak tersedia atau sedang mengalami gangguan. Mohon membeli produk yang lain.
                    Jika pesan ini muncul secara terus menerus, harap hubungi kami.
                </div>
            </div>

            <div class="field" v-if="balance.balance < selectedProduct.price">
                <div class="notification is-danger">
                    Saldo di akun anda kurang untuk membeli produk {{ this.selectedProduct.description }}. Harap melakukan topup atau deposit terlebih dahulu.
                </div>
            </div>


            <div class="field">
                <label class="label">No Telepon</label>
                <input name="phone_number" class="input" type="text" placeholder="Nomor Telepon" required>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Saldo Saat Ini</label>
                        <input class="input" type="text" :value="this.balance.balance_number_format" disabled>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Harga Produk</label>
                        <input type="text" name="product_price" class="input" :value="selectedProduct.price" disabled>
                    </div>
                </div>
            </div>

            <div class="field" v-if="selectedProduct.status === 'normal'">
                <button class="button is-primary is-fullwidth">Beli</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "PulsaComponent",

        data() {
            return {
                balance: {
                    balance: 0,
                    balance_number_format: 0
                },
                operator: [],
                selectedOperator:'',
                product: [],
                selectedProduct: {
                    provider: '',
                    provider_sub: '',
                    operator: '',
                    operator_sub: '',
                    code: '',
                    price: 0,
                    status: "normal"
                },
                hargaHarusDibayar: 0,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        created() {
            window.axios.get('/api/web/balance')
            .then(response => {
                this.balance = response.data.data
            });
            window.axios.get('/api/harga/voucher-game')
                .then(response => this.operator = response.data);
        },
        methods: {
            onChangeOperator(event) {
                this.product = this.operator[event.target.value]
            },
            onChangeProduk(event) {
                this.selectedProduct = this.product[event.target.value]
            }
        }
    }
</script>

<style scoped>

</style>
