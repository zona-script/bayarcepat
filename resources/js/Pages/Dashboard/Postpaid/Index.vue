<template>
    <div>
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Postpaid (Pasca bayar)
                    </h1>
                    <h2 class="subtitle">
                        PLN, Internet, Gas, BPJS, Multi Finance, dll.
                    </h2>
                </div>
            </div>
        </section>

        <div class="section">
            <div class="container">

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Brand</label>
                            <div class="control">
                                <div class="select is-fullwidth is-primary">
                                    <select v-model="selectedBrand" @change="onBrand">
                                        <option disabled>Pilih Brand</option>
                                        <option v-for="brand in brands" v-bind:value="brand">{{ brand.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <vue-good-table
                        :columns="columns"
                        :rows="rows"
                        @on-row-click="showBuyForm"
                        :search-options="{
                    enabled: true,
                    placeholder: 'Cari produk ...',
                }"
                        :pagination-options="{
                enabled: true,
                mode: 'records',
                rowsPerPageLabel: 'Jumlah perhalaman',
                ofLabel: 'dari',
              }">
                        <div slot="emptystate">
                            Produk masih belum tersedia atau masih menghubungkan layanan.
                        </div>
                    </vue-good-table>
                </div>

                <div class="modal" v-bind:class="{ 'is-active': showFormIsActive, 'text-danger': hasError }">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Form Pembelian</p>
                            <button class="delete" aria-label="close" @click="closeBuyForm"></button>
                        </header>
                        <section class="modal-card-body" v-if="selectedProduct.seller_product_status && selectedProduct.buyer_product_status">
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Nama Produk</label>
                                        <div class="control">
                                            <input class="input" type="text" v-bind:value="selectedProduct.product_name" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Brand</label>
                                        <div class="control">
                                            <input class="input" type="text" v-bind:value="selectedProduct.brand" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Kode Produk</label>
                                        <div class="control">
                                            <input class="input" type="text" v-bind:value="selectedProduct.buyer_sku_code" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Stok</label>
                                        <div class="control">
                                            <input class="input" type="text" v-bind:value="selectedProduct.unlimited_stock ? 'Tanpa batas': selectedProduct.stock" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Deskripsi</label>
                                <div class="control">
                                    <textarea class="textarea" disabled>{{ selectedProduct.desc }}</textarea>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">No Pelanggan</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="No Telepon / No Pelanggan" v-model="customerNumber">
                                </div>
                            </div>

                            <div class="field">
                                <button class="button is-primary is-fullwidth" @click="onClickCheckBill">Cek Tagihan</button>
                                *) Klik cek tagihan untuk mengetahui jumlah tagihan yang harus dibayarkan.
                            </div>

                            <div class="field" v-if="showResult">
                                <div class="box">
                                    <h3 class="subtitle">Jumlah yang harus dibayar</h3>
                                    <h3 class="title">Rp XXXX</h3>
                                    <div class="content">
                                        <ul>
                                            <li>sebelum klik order, pastikan saldo anda mencukupi</li>
                                            <li>produk yang tidak support multi transaksi, dalam 24 jam hanya diperbolehkan order 1 kali untuk setiap no telepon/no pelanggan.</li>
                                            <li>pastikan waktu order bukan pada jam cut off.</li>
                                            <li>Transaksi akan tetap dilanjutkan setelah anda melakukan klik tombol "beli sekarang" dan tidak bisa dibatalkan, meskipun klik tombol "tutup form".</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </section>

                        <section class="modal-card-body" v-else>
                            <div class="notification is-danger">
                                Produk saat ini tidak tersedia.<br>Jangan khawatir, engineering kami sedang memperbaiki masalah ini.
                            </div>
                        </section>

                        <footer class="modal-card-foot"
                                v-if="selectedProduct.seller_product_status && selectedProduct.buyer_product_status"
                        >
                            <button class="button is-success"
                                    @click="onClickBuyButton"
                            >Bayar Tagihan</button>

                            <button class="button" @click="closeBuyForm">Tutup Form</button>
                        </footer>
                        <footer class="modal-card-foot" v-else>
                            <button class="button" @click="closeBuyForm">Tutup Form</button>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                data: [],
                dataInit: [], // real data after request
                brands: [],
                brandsInit:[], // real data from init
                products: [],  // real data from init
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                selectedBrand: {},
                selectedProduct: {}, // produk yang dipilih ketika tombol beli di klik
                customerNumber: '',
                showResult: false,

                columns: [
                    {
                        label: 'Action',
                        field: this.funcBuyButton,
                        html: true,
                    },
                    {
                        label: 'Nama Produk',
                        field: 'product_name',
                    },
                    {
                        label: 'Kode Produk',
                        field: 'buyer_sku_code',
                    },
                    {
                        label: 'Status',
                        field: this.tableColumnStatus,
                        html: true
                    },
                    {
                        label: 'Brand',
                        field: 'brand',
                    },
                ],
                rows: [],

                showFormIsActive: false,
                showFormBuyButton: true,
                hasError: false
            }
        },
        mounted() {
            window.axios.get('/api/web/products/postpaid')
                .then(response => {
                    this.dataInit = response.data

                    this.initializeData()
                })
        },
        created() {
        },
        methods: {
            initializeData() {
                let i,j,k
                const brands = [], products = []

                // get brand and product
                for (i = 0; i < this.dataInit.length; i++) {
                    brands.push(this.dataInit[i])
                    const brandProduct = this.dataInit[i].products

                    // get all product in single array
                    for (k = 0; k < brandProduct.length; k++) {
                        products.push(brandProduct[k])
                    }
                }

                this.brandsInit = brands;
                this.brands = brands;
                this.rows = products
                this.products = products
            },
            onBrand(){
                const brandProduct = this.selectedBrand.products
                const products = []
                let i

                // get brand with product
                for (i = 0; i < brandProduct.length; i++) {
                    products.push(brandProduct[i])
                }

                this.rows = products
            },
            funcBuyButton(rowObj) {
                return '<button class="button is-primary is-fullwidth">Beli</button>'
            },
            showBuyForm(params) {
                // https://xaksis.github.io/vue-good-table/guide/configuration/table-events.html#on-row-click
                this.showFormIsActive = true
                this.selectedProduct = params.row
            },
            closeBuyForm() {
                this.showFormIsActive = false
            },
            tableColumnStatus(rowObj) {
                if (rowObj.buyer_product_status && rowObj.seller_product_status) {
                    return '<span class="tag is-primary">tersedia</span>'
                }

                return '<span class="tag is-danger">tidak tersedia</span>'
            },
            onClickCheckBill() {
                let result
                let params = {
                    buyer_sku_code: this.selectedProduct.buyer_sku_code,
                    customer_number: this.customerNumber
                }

                if (this.customerNumber === '') {
                    this.$alert("no pelanggan masih kosong.", '', 'warning');
                } else {
                    window.axios.post('/api/web/products/postpaid/check', params)
                        .then(response => {
                            result = response.data
                            if(result.status) {
                                this.$alert(result.message, 'Berhasil melakukan pengecekan', 'success')
                                this.showResult = true
                            } else {
                                this.$alert(result.message, 'Transaksi Tidak berhasil', 'error')
                            }
                        })
                }
            },
            onClickBuyButton() {
                let result
                let params = {
                    buyer_sku_code: this.selectedProduct.buyer_sku_code,
                    customer_number: this.customerNumber
                }

                if (this.customerNumber === '') {
                    this.$alert("no pelanggan masih kosong.", '', 'warning');
                } else {
                    window.axios.post('/api/web/products/prepaid', params)
                        .then(response => {
                            result = response.data
                            if(result.status) {
                                this.$alert(result.message, 'Pembelian Berhasil', 'success')
                            } else {
                                this.$alert(result.message, 'Transaksi Tidak berhasil', 'error')
                            }
                            this.resetForm();
                        })
                }
            },
            resetForm() {
                this.selectedProduct = {}
                this.showFormIsActive = false
                this.customerNumber = ''
            }
        }
    }
</script>

<style scoped>

</style>
