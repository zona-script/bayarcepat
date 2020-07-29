<template>
    <div class="box">
        <div class="content field">
            <h3 class="subtitle">Marketplace Prabayar</h3>
        </div>
        <hr>

<!--        <div class="field">-->
<!--            <label class="label">Kategori</label>-->
<!--            <div class="is-fullwidth">-->
<!--                <v-select label="category" :options="categories"></v-select>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="field">-->
<!--            <label class="label">Kategori</label>-->
<!--            <div class="is-fullwidth">-->
<!--                <v-select label="countryName" :options="countries"></v-select>-->
<!--            </div>-->
<!--        </div>-->
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Kategori</label>
                    <div class="select is-fullwidth">
                        <select v-model="selectedCategory" v-on:change="onChangeCategory" required>
                            <option disabled>Pilih Kategori Produk</option>
                            <option v-for="(item, key) in categories" v-bind:value="key">
                                {{ item.category }}
                            </option>
                        </select>
                    </div>
<!--                    <div class="is-fullwidth">-->
<!--                        <v-select v-model="selectedCategory" label="category" :value="categories" :options="categories" v-on:change="onChangeCategory"></v-select>-->

<!--                        <select v-model="selectedCategory" v-on:change="onChangeCategory">-->
<!--                            <option disabled>Pilih Kategori Produk</option>-->
<!--                            <option v-for="(item, key) in categories" v-bind:value="key">-->
<!--                                {{ item.category }}-->
<!--                            </option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <p>{{ selectedCategory}} | {{ products }}</p>-->
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
                    <label class="label">Pilih Produk (Gunakan Pencarian Agar Cepat Ketemu)</label>
                    <div class="is-fullwidth">
<!--                        <v-select v-model="selectedProduct" label="product_name" :options="products" :reduce="products => products" @input="onChangeProduct" ></v-select>-->
                        <v-select
                            v-model="selectedProduct"
                            label="product_name"
                            :options="products"
                            :reduce="product => product"
                            @input="onChangeProduct"
                        >
                            <template v-slot:option="option">
                                {{ option.product_name + " - Rp" + option.price + " [" + option.buyer_sku_code + "]"}}
                            </template>
                        </v-select>
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
                    <input class="input" type="text" disabled :value="product.buyer_sku_code">
                    <input name="product_code" type="hidden" :value="product.buyer_sku_code">
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
            Pembelian Produk ini dibatasi sejumlah 1 (satu) kali pembelian dalam waktu satu hari untuk setiap nomor telepon / nomor pelanggan.
            Pastikan nomor belum pernah di isi dalam waktu 24 jam terakhir (terkadang saldo tidak dikembalikan).
        </div>

        <div class="field" v-if="product.category === 'PLN' && product.brand === 'PLN'">
            <label class="label">No Pelanggan PLN</label>
            <input class="input" type="text" name="customer_number" required>
        </div>

        <div class="columns">
<!--            <div class="column is-12">-->
            <div class="column is-9">
                <div class="field">
                    <label class="label">No Pelanggan</label>
                    <input class="input" type="text" name="phone_number" :value="selectedContact.phone_number" required>
                </div>
            </div>
            <div class="column is-3">
                <div class="field">
                    <label class="label">Kontak</label>
                    <div class="button is-fullwidth is-primary is-outlined" v-on:click="showPhoneBook = true">Kontak</div>
                </div>
            </div>
            <div v-if="showPhoneBook === true">
                <phonebook-list @close="onClickCloseForm" @selected="onSelectedPhonebook"></phonebook-list>
            </div>
        </div>
        <div class="field" v-if="product.buyer_product_status && product.seller_product_status">
            <button class="button is-primary is-fullwidth">Beli Produk</button>
        </div>
    </div>
</template>

<script>
    import 'vue-select/dist/vue-select.css';

    export default {
        name: "prabayar",
        data() {
            return {
                showPhoneBook: false,
                selectedContact: {
                    phone_number: ''
                },
                balance: {
                    balance: 0,
                    balance_number_format: 0
                },
                categories: [
                    {
                        "category": "Loading ..."
                    }
                ],
                selectedCategory: '',
                brands: {
                    loading : {
                        product_name:'Loading ...',
                        category: '',
                        brand: '',
                        seller_name: '',
                        price: '0',
                        buyer_sku_code: '',
                        buyer_product_status: true,
                        seller_product_status: true,
                        stock: '',
                        multi: true,
                        desc: ''
                    },
                },
                selectedBrand: '',
                products: [
                    {
                        product_name:'Loading ...',
                        category: '',
                        brand: '',
                        seller_name: '',
                        price: '0',
                        buyer_sku_code: '',
                        buyer_product_status: true,
                        seller_product_status: true,
                        stock: '',
                        multi: true,
                        desc: ''
                    }
                ],
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
            onClickCloseForm(value) {
                this.showPhoneBook = false;
            },
            onSelectedPhonebook(value) {
                this.selectedContact = value
            },
            onChangeCategory() {
                let category = this.categories[this.selectedCategory].category;
                window.axios.get('/api/web/market/prabayar?category=' + encodeURIComponent(window.btoa(category)))
                    .then(response => {
                        // console.log(this.categories[this.selectedCategory].category)
                        // console.log(encodeURI(this.categories[this.selectedCategory].category))
                        this.brands = response.data
                    });

                this.resetData();
            },
            onChangeBrand() {
                this.products = this.brands[this.selectedBrand]
                this.resetDataFromBrand();
            },
            // onChangeProduct() {
            //     this.product = this.brands[this.selectedBrand][this.selectedProduct]
            // },
            onChangeProduct(value) {
                this.product = value
            },
            resetData() {
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
            },
            resetDataFromBrand() {
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
