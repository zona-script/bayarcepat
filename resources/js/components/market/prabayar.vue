<template>
    <div class="box">
        <div class="field">
            <h3 class="subtitle">Marketplace Prabayar</h3>
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Kategori</label>
                    <div class="select is-fullwidth">
                        <select v-model="selectedCategory" v-on:change="onChangeCategory">
                            <option disabled>Pilih Kategori Produk</option>
                            <option v-for="(item, key) in categories" v-bind:value="key">
                                {{ item.category }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Brand / Operator</label>
                    <div class="select is-fullwidth">
                        <select v-model="selectedBrand" v-on:change="onChangeBrand">
                            <option disabled>Pilih Brand / Operator</option>
                            <option v-for="(item, key) in brands" v-bind:value="key">
                                {{ key }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-12">
                <div class="field">
                    <label class="label">Pilih Produk</label>
                    <div class="select is-fullwidth">
                        <select v-model="selectedProduct" v-on:change="onChangeProduct">
                            <option disabled>Pilih Kategori Produk</option>
                            <option v-for="(item, key) in products" v-bind:value="key">
                                {{ item.product_name }} - Rp {{ item.price }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification is-danger" v-if="!product.buyer_product_status && !product.seller_product_status">
            Mohon maaf produk sedang gangguan.
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Kode Produk</label>
                    <input class="input" type="text" disabled v-bind:value="product.buyer_sku_code">
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Nama Penjual</label>
                    <input class="input" type="text" disabled v-bind:value="product.seller_name">
                </div>
            </div>
        </div>
        <div class="notification is-danger" v-if="product.price > balance.balance">
            Saldo anda kurang untuk membeli produk ini.
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Saldo Anda</label>
                    <input class="input" type="text" disabled v-model="balance.balance_number_format">
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Harga Produk</label>
                    <input class="input" type="text" disabled v-bind:value="product.price">
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Deskripsi Produk</label>
            <textarea class="textarea" type="text" disabled>{{ product.desc }}</textarea>
        </div>
        <div class="notification is-warning" v-if="!product.multi">
            Penjual produk ini membatasi hanya sejumlah 1 (satu) kali pembelian untuk satu nomor telepon dalam waktu satu hari.
            Pastikan nomor belum pernah di isi dalam 24 jam terakhir (terkadang saldo tidak dikembalikan).
        </div>
        <div class="columns">
            <div class="column is-9">
                <div class="field">
                    <label class="label">No Telepon</label>
                    <input class="input" type="text">
                </div>
            </div>
            <div class="column is-3">
                <div class="field">
                    <label class="label">Buku Telepon</label>
                    <button class="button is-fullwidth is-info is-outlined">List Kontak</button>
                </div>
            </div>
        </div>
        <div class="field">
            <button class="button is-primary is-fullwidth">Beli Produk</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "prabayar",
        data() {
            return {
                balance: {
                    balance: 0,
                    balance_number_format: 0
                },
                categories: [
                ],
                selectedCategory: '',
                brands: [],
                selectedBrand: '',
                products: [],
                selectedProduct: '',
                product:{
                    product_name:'',
                    category: '',
                    brand: '',
                    seller_name: '',
                    price: '',
                    buyer_sku_code: '',
                    buyer_product_status: true,
                    seller_product_status: true,
                    stock: '',
                    multi: true,
                    desc: ''
                },
                total: 0,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        created() {
            window.axios.get('/api/web/balance')
                .then(response => {
                    this.balance = response.data.data
                });
            window.axios.get('/api/web/market/prabayar')
                .then(response => {
                    this.categories = response.data
                });
        },
        methods: {
            onChangeCategory() {
                window.axios.get('/api/web/market/prabayar?category=' + this.categories[this.selectedCategory].category)
                    .then(response => {
                        this.brands = response.data
                    });

                this.resetData();
            },
            onChangeBrand() {
                this.products = this.brands[this.selectedBrand]
            },
            onChangeProduct() {
                this.product = this.brands[this.selectedBrand][this.selectedProduct]
                console.log(this.product)
                console.log(this.selectedProduct)
            },
            resetData() {
                this.selectedCategory= ''
                this.brands= []
                this.selectedBrand = ''
                this.products= []
                this.selectedProduct= ''
                this.product = {
                    product_name: '',
                    category: '',
                    brand: '',
                    seller_name: '',
                    price: '',
                    buyer_sku_code: '',
                    buyer_product_status: true,
                    seller_product_status: true,
                    stock: '',
                    multi: true,
                    desc: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
