<template>
    <div>
        <div class="columns">
            <div class="column is-4">
                <div class="box">

                    <div class="field">
                        <label class="label">Kategori</label>
                        <div class="select is-fullwidth is-primary">
                            <select v-model="selectedCategory" v-on:change="onChangeCategory" required>
                                <option disabled>Pilih Kategori Produk</option>
                                <option v-for="(item, key) in categories" v-bind:value="key">
                                    {{ item.category }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Brand / Operator</label>
                        <div class="select is-fullwidth is-primary">
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
            <div class="column is-8">
                <div class="box">
                    <div class="table-container">
                        <table class="table is-hoverable is-fullwidth" id="example">
                            <thead>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Stok</th>
                            </thead>
                            <tbody>
                            <tr v-for="product in products">
                                <td>{{ product.buyer_sku_code }}</td>
                                <td>{{ product.product_name }}</td>
                                <td>{{ product.price }}</td>
                                <td>
                                    <span class="tag is-primary" v-if="product.seller_product_status">Tersedia</span>
                                    <span class="tag is-danger" v-else>Gangguan</span>
                                </td>
                                <td>

                                    <div v-if="product.seller_product_status">
                                        <span v-if="product.unlimited_stock">Tidak Terbatas</span>
                                        <span v-else>{{ product.stock }} Transaksi</span>
                                    </div>
                                    <div v-else>
                                        <span>-</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification is-danger" v-if="!product.buyer_product_status && !product.seller_product_status">
            Mohon maaf produk sedang gangguan.
        </div>

    </div>
</template>

<script>
    import 'vue-select/dist/vue-select.css';

    export default {
        name: "MarketPricingComponent",
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
            window.axios.get('/api/market/prabayar')
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
                window.axios.get('/api/market/prabayar?category=' + encodeURIComponent(window.btoa(category)))
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
