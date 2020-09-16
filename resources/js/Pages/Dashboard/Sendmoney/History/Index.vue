<template>
<div>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Riwayat Pengiriman Uang
                </h1>
                <h2 class="subtitle">
                    Riwayat semua pengiriman uang (saldo) yang anda lakukan.
                </h2>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="container">
            <vue-good-table
                :columns="columns"
                :rows="moneyTransfers"
                @on-row-click="rowOnClick"
                :search-options="{
                    enabled: true,
                    placeholder: 'Cari riwayat pengiriman ...',
                }"
                :pagination-options="{
                enabled: true,
                mode: 'records',
                rowsPerPageLabel: 'Jumlah perhalaman',
                ofLabel: 'dari',
              }">
            </vue-good-table>


            <div class="modal" v-bind:class="{ 'is-active': showModalIsActive }">
                <div class="modal-background"></div>
                <div class="modal-background has-background-white"></div>
                <div class="modal-content has-background-white">
                    <show-detail-component v-bind:props-user=this.user v-bind:props-money-transfer=this.selectedMoneyTransfer></show-detail-component>
                </div>
                <button class="modal-close is-large has-background-danger" aria-label="close" v-on:click="closeModal"></button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import ShowDetailComponent from "../../../../components/dashboard/SendMoney/History/ShowDetailComponent";
export default {
    components: {
        ShowDetailComponent
    },
    name: "Index",
    props: [
        'user',
        'moneyTransfers'
    ],
    data() {
        return {
            showModalIsActive: false,
            selectedMoneyTransfer: '',
            columns: [
                {
                    label: 'Lihat Detail',
                    field: this.tableColumnShowDetail,
                    html: true,
                },
                {
                    label: 'Waktu',
                    field: this.tableColumnTime,
                },
                {
                    label: 'Jenis',
                    field: this.tableColumnType,
                    html: true
                },
                {
                    label: 'Pengirim',
                    field: 'sender.name',
                },
                {
                    label: 'Penerima',
                    field: 'received.name',
                },
                {
                    label: 'Status',
                    field: this.tableColumnStatus,
                    html: true
                },
                {
                    label: 'Jumlah',
                    field: 'amount',
                },
            ],
        }
    },
    methods: {
        tableColumnShowDetail(rowObj) {
            return '<button class="button is-primary is-fullwidth">Lihat Detail</button>'
        },
        tableColumnTime(rowObj) {
            return rowObj.updated_at_raw.day + ' '
                +  rowObj.updated_at_raw.month_name
                + ' ' + rowObj.updated_at_raw.year
                + ' (' + rowObj.updated_at_raw.hour + ':' + rowObj.updated_at_raw.minutes + ')'
        },

        tableColumnType(rowObj) {
            if (rowObj.sender_user_id === this.user.id) {
                return '<span class="tag is-link">Pengiriman</span>'
            }

            return '<span class="tag is-info">Menerima</span>'
        },

        tableColumnStatus(rowObj) {
            if (rowObj.status) {
                return '<span class="tag is-primary">Sukses</span>'
            }

            return '<span class="tag is-danger">Gagal</span>'
        },
        rowOnClick(rowObj) {
            this.selectedMoneyTransfer = rowObj.row
            this.showModal()
        },
        showModal() {
            this.showModalIsActive = true
        },
        closeModal() {
            this.showModalIsActive = false
        },
    }
}
</script>

<style scoped>

</style>
