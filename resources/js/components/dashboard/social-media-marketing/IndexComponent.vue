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
            <div class="column is-5">
                <div class="field">
                    <label class="label">Jangan Lupa Baca Petunjuk Order</label>
                    <div class="control">
                        <a href="#petunjuk_order" class="button is-warning is-fullwidth">Baca Petunjuk Order</a>
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
                    <p class="modal-card-title">Form Pembelian SMM</p>
                    <button class="delete is-danger" aria-label="close" @click="closeBuyForm"></button>
                </header>
                <section class="modal-card-body" v-if="!selectedProduct.active">
                    <dashboard-social-media-marketing-order-form v-bind:props-product=this.selectedProduct></dashboard-social-media-marketing-order-form>
                </section>

                <section class="modal-card-body" v-else>
                    <div class="notification is-danger">
                        Produk saat ini tidak tersedia.<br>Jangan khawatir, engineering kami sedang memperbaiki masalah ini.
                    </div>
                </section>

<!--                <footer class="modal-card-foot">-->
<!--                    <button class="button is-danger is-fullwidth" @click="closeBuyForm">Tutup Form</button>-->
<!--                </footer>-->
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
                    label: 'Harga (per 1000)',
                    field: 'price',
                },
                {
                    label: 'Minimal',
                    field: 'min',
                },
                {
                    label: 'Maksimal',
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
            if (rowObj.active) {
                return '<span class="tag is-primary">tersedia</span>'
            }

            return '<span class="tag is-danger">tidak tersedia</span>'
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
