<template>
    <div>
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Social Media Marketing
                    </h1>
                    <h2 class="subtitle">
                        Facebook, Twitter, Shopee, Tokopedia, dll.
                    </h2>
                </div>
            </div>
        </section>

        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <div class="notification is-warning">
                                Informasi Penting: <br>
                                Semua order akan dilakukan pengecekan secara manual oleh admin, sehingga order kemungkinan akan terlambat hingga beberapa saat.
                                Untuk langsung menjalankan orderan tanpa perlu pengecekan oleh admin, saat order silakan centang "Paksa untuk dijalankan sekarang".
                            </div>
                        </div>

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
                                    <order-form-component v-bind:props-product=this.selectedProduct></order-form-component>
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
                </div>
            </div>


            <br>
            <div class="container">
                <div id="petunjuk_order"></div>
                <div class="content">
                    <h6 class="subtitle is-6">Langkah-langkah membuat pesanan baru:</h6>
                    <ul>
                        <li>Pilih salah satu Kategori.</li>
                        <li>Pilih salah satu Layanan yang ingin dipesan.</li>
                        <li>Masukkan Target pesanan sesuai layanan, username/link.</li>
                        <li>Masukkan Jumlah Pesanan yang diinginkan.</li>
                        <li>Klik Submit untuk membuat pesanan baru</li>
                    </ul>
                    <h6 class="subtitle is-6">Ketentuan membuat pesanan baru:</h6>
                    <ul>
                        <li>Silahkan membuat pesanan sesuai langkah-langkah diatas.</li>
                        <li>Jika ingin membuat pesanan dengan<br>
                            Target yang sama dengan pesanan yang sudah pernah dipesan sebelumnya, mohon menunggu sampai pesanan sebelumnya selesai diproses.<br>
                            Jika terjadi kesalahan / mendapatkan pesan gagal yang kurang jelas, silahkan hubungi Admin untuk informasi lebih lanjut.</li>
                        <li><span class="has-text-danger">Jangan memasukkan orderan yang sama jika orderan sebelumnya belum selesai</span>. </li>
                        <li><span class="has-text-danger">Jangan memasukkan orderan yang sama di panel lain jika orderan di kami belum selesai.</span></li>
                        <li>Jangan mengganti username atau menghapus link target saat sudah order. </li>
                        <li>Orderan yang sudah masuk tidak dapat di cancel / refund manual, seluruh proses orderan dikerjakan secara otomatis oleh server.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderFormComponent from "./OrderFormComponent";
export default {
    components: {
      OrderFormComponent
    },
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
            if (rowObj.is_available) {
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
