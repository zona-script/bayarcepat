<template>
    <div>

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Riwayat Prepaid (Prabayar)
                    </h1>
                    <h2 class="subtitle">
                        Riwayat Pembelian Pulsa, Paket Data, PLN,
                    </h2>
                </div>
            </div>
        </section>

        <div class="section">
            <div class="container">
                <vue-good-table
                    :columns="columns"
                    :rows="rows"
                    @on-row-click="showModal"
                    :search-options="{
                    enabled: true,
                    placeholder: 'Cari Transaksi ...',
                }"
                    :pagination-options="{
                enabled: true,
                mode: 'records',
                rowsPerPageLabel: 'Jumlah perhalaman',
                ofLabel: 'dari',
              }">
                    <div slot="emptystate">
                        Data tidak tersedia atau masih menghubungkan layanan.
                    </div>
                </vue-good-table>
            </div>

            <div class="modal" v-bind:class="{ 'is-active': showFormIsActive }">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Detail Transaksi</p>
                        <button class="delete" aria-label="close" @click="closeModal"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="table-container">
                            <table class="table is-fullwidth table-responsive">
                                <tbody>
                                <tr>
                                    <td>refid</td>
                                    <td style="width: 10px">:</td>
                                    <td>{{ selectedData.ref_id }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Konsumen</td>
                                    <td>:</td>
                                    <td>{{ selectedData.customer_number }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>:</td>
                                    <td>{{ product.desc }}</td>
                                </tr>
                                <tr>
                                    <td>Kode Produk</td>
                                    <td>:</td>
                                    <td>{{ product.buyer_sku_code }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ product.category }}</td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td>:</td>
                                    <td>{{ product.brand }}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>{{ selectedData.price }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ selectedData.status_raw }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal transaksi</td>
                                    <td>:</td>
                                    <td>{{ selectedData.date }}</td>
                                </tr>
                                <tr>
                                    <td>Jam transaksi</td>
                                    <td>:</td>
                                    <td>{{ selectedData.time }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-primary" @click="closeModal">Tutup</button>
                    </footer>
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
                selectedData: {},
                product: {},
                columns: [
                    {
                        label: 'Action',
                        field: this.funcBuyButton,
                        html: true,
                    },
                    {
                        label: 'Nomor Konsumen',
                        field: 'customer_number',
                    },
                    {
                        label: 'Nama Produk',
                        field: 'product.product_name',
                    },
                    {
                        label: 'Harga',
                        field: 'price',
                        type: 'number',
                    },
                    {
                        label: 'Status',
                        field: this.tableColumnStatus,
                        html: true
                    },
                    {
                        label: 'Waktu Transaksi',
                        field: this.tableTimeTransaction,
                    },
                ],
                rows: [],

                showFormIsActive: false,
            }
        },
        mounted() {
            window.axios.get(this.route('api.products.prepaid.history.index').url())
                .then(response => {
                    this.data = response.data
                    this.rows = this.data
                })
        },
        created() {
        },
        methods: {
            funcBuyButton(rowObj) {
                return '<button class="button is-primary is-fullwidth">Detail</button>'
            },
            showModal(params) {
                this.showFormIsActive = true
                this.selectedData = params.row
                this.product = params.row.product
            },
            closeModal() {
                this.resetForm()
            },
            tableColumnStatus(rowObj) {
                if (rowObj.status_raw === 'Sukses') {
                    return '<span class="tag is-primary">' + rowObj.status_raw + '</span>'
                } else if (rowObj.status_raw === 'Gagal') {
                    return '<span class="tag is-danger">' + rowObj.status_raw + '</span>'
                } else if (rowObj.status_raw === 'Pending') {
                    return '<span class="tag is-warning">' + rowObj.status_raw + '</span>'
                }

                return '<span class="tag is-white">tidak tersedia</span>'
            },
            tableTimeTransaction(rowObj) {
                return rowObj.date + ' (' + rowObj.time + ')';
            },
            resetForm() {
                this.selectedData = {}
                this.showFormIsActive = false
                this.product = {}
            }
        },
        watch: {
        }
    }
</script>

<style scoped>

</style>
