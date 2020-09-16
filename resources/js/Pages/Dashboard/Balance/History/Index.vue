<template>
    <div>
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Riwayat deposit & penarikan uang
                    </h1>
                    <h2 class="subtitle">
                        Daftar semua riwayat deposit dan penarikan uang
                    </h2>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <vue-good-table class="is-fullwidth"
                                    :columns="columns"
                                    :rows="transactionWallets"
                                    :line-numbers="true"
                                    @on-row-click="onRowClick"></vue-good-table>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: [
        'transactionWallets'
    ],
    data() {
        return {
            columns: [
                {
                    label: 'Tanggal',
                    field: this.tableColumnTime,
                    html: true
                },
                {
                    label: 'Tipe',
                    field: this.tableColumnType,
                    html: true
                },
                {
                    label: 'Jumlah Total',
                    field: 'total_amount',
                },
                {
                    label: 'Status',
                    field: this.tableColumnStatus,
                    html: true
                },
                {
                    label: 'Lihat',
                    field: this.tableColumnShow,
                    html: true
                }
            ],
        }
    },
    methods:{
        tableColumnTime(params) {
            return params.created_at_raw.day + ' ' + params.created_at_raw.month_name + ' ' + params.created_at_raw.year
        },
        tableColumnType(params) {
            if (params.type == 1) {
                return '<span class="tag is-primary">Deposit</span>'
            }
            return '<span class="tag is-info">Penarikan</button>'
        },
        tableColumnStatus(params) {
            if (params.status == 1) {
                return '<span class="tag is-primary">Sukses</span>'
            }
            return '<span class="tag is-warning">Proses</button>'
        },
        tableColumnShow() {
            return '<button class="button is-primary">Lihat Detail</button>'
        },
        onRowClick(params) {
            window.location.href = this.route('web.dashboard.balance.history.show', params.row.id)
            // this.delete(params.row)
        },
    }
}
</script>

<style scoped>

</style>
