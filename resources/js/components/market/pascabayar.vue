<template>
    <div class="box">
        <div class="afield">
            <h3 class="subtitle">Marketplace Pascabayar</h3>
        </div>
        <hr>

        <div class="field">
            <label class="label">Nama brand / Layanan</label>
            <div class="select is-fullwidth">
                <select v-model="selectedBrand" v-on:change="onChangeBrand">
                    <option disabled>Pilih Brand / Operator</option>
                    <option v-for="(item, key) in brands" v-bind:value="key">
                        {{ key }}
                    </option>
                </select>
            </div>
        </div>
        <div class="columns">
            <div class="column is-12">
                <div class="field">
                    <label class="label">Nama produk (Gunakan Pencarian Agar Cepat Ketemu)</label>
                    <div class="is-fullwidth">
                        <v-select
                            v-model="selectedProduct"
                            label="product_name"
                            :options="products"
                            :reduce="product => product"
                            @input="onChangeProduct"
                        >
                            <template v-slot:option="option">
                                {{ option.product_name + " [Kode Produk : " + option.buyer_sku_code + "]"}}
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
                    <label class="label">Saldo Anda</label>
                    <input class="input" type="text" disabled v-model="balance.balance_number_format">
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column is-9">
                <div class="field">
                    <label class="label">No Pelanggan</label>
                    <input class="input" type="text" name="phone_number" v-model="selectedContact.phone_number" required>
<!--                    <input class="input" type="text" name="phone_number" :value="selectedContact.phone_number" required>-->
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
        <div class="field">
            <div v-on:click="onClickCheckBill" class="button is-primary is-fullwidth">Cek Tagihan</div>
        </div>

        <div v-if="checkBill">
<!--            <market-pascabayar-checkbill-pln v-bind:result="checkBill"></market-pascabayar-checkbill-pln>-->
            <market-pascabayar-checkbill-pln  v-bind:result="checkBill"></market-pascabayar-checkbill-pln>
        </div>

    </div>
</template>

<script>
    import 'vue-select/dist/vue-select.css';
    import CheckBillPln from "./pascabayar/CheckBillPln";

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
                        product_name:'Pilih Brand Dulu',
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
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                checkBill: '',
            }
        },
        created() {
            window.axios.get('/api/web/balance')
                .then(response => {
                    this.balance = response.data.data
                });
            window.axios.get('/api/web/market/pascabayar?category=UGFzY2FiYXlhcg%3D%3D')
                .then(response => {
                    this.categories = response.data
                    this.brands = response.data
                });
        },
        methods: {
            onClickCheckBill() {
                if (this.product.buyer_sku_code === '') {
                    window.alert('Pilih produk terlebih dahulu.')
                } else {
                    window.axios.post('/api/web/check-postpaid-bill', {
                        // buyer_sku_code: this.product.buyer_sku_code,
                        // customer_no: this.selectedContact.phone_number
                    })
                        .then(response => {
                            this.checkBill = response.data
                            console.log(response.data)
                            console.log(this.checkBill)
                        });
                }
            },
            onClickCloseForm(value) {
                this.showPhoneBook = false;
            },
            onSelectedPhonebook(value) {
                this.selectedContact = value
            },
            onChangeCategory() {
                let category = this.categories[this.selectedCategory].category;
                window.axios.get('/api/web/market/pascabayar?category=' + encodeURIComponent(window.btoa(category)))
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
