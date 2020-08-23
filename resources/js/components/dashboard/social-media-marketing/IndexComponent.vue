<template>
    <div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Kategori Layanan</label>
                    <div class="control">
                        <div class="select is-fullwidth is-primary">
                            <select v-model="selectedCategory" @change="onCategory">
                                <option disabled>Pilih Kategori Layanan</option>
                                <option v-for="category in categories" v-bind:value="category">{{ category.name }}</option>
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
</template>

<script>
export default {
    name: "IndexComponent",
    data() {
        return {
            categories: [],
            products: [],  // real data from init
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            selectedCategory: {},
            selectedProduct: {}, // produk yang dipilih ketika tombol beli di klik

            columns: [
                {
                    label: 'Action',
                    field: this.funcBuyButton,
                    html: true,
                },
                {
                    label: 'Nama Produk',
                    field: 'name',
                },
                {
                    label: 'Harga',
                    field: 'price',
                },
                {
                    label: 'Min',
                    field: 'min',
                },
                {
                    label: 'Max',
                    field: 'max',
                },
                {
                    label: 'Status',
                    field: this.tableColumnStatus,
                    html: true
                }
            ],
            rows: [],

            showFormIsActive: false,
            showFormBuyButton: true,
            hasError: false
        }
    },
    mounted() {
        window.axios.get('/api/products/social-media-marketing')
            .then(response => {
                this.products = response.data
                this.categories = response.data
                this.initializeData()
            })
    },
    created() {
    },
    methods: {
        initializeData() {
            let i, j;
            let rows = [], products = []

            for (i = 0; i < this.products.length; i++) {
                products = this.products[i].products
                for (j = 0; j < products.length; j++) {
                    rows.push(products[j])
                }
            }

            this.rows = rows
        },
        onCategory() {
            this.rows = this.selectedCategory.products
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
            if (rowObj) {
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
