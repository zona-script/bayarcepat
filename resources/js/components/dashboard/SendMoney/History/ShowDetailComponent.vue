<template>
    <div>
        <h3 class="title is-3">Detail Transaksi</h3>
        <hr class="navbar-divider">
        <div class="table-container">
            <table class="table is-hoverable is-hover is-fullwidth">
                <tr>
                    <td style="width: 110px">Kode</td>
                    <td style="width: 10px">:</td>
                    <td>{{ propsMoneyTransfer.id }}</td>
                </tr>
                <tr>
                    <td>Pengirim</td>
                    <td style="width: 10px">:</td>
                    <td>{{ propsMoneyTransfer.sender.name }}</td>
                </tr>
                <tr>
                    <td>Penerima</td>
                    <td>:</td>
                    <td>{{ propsMoneyTransfer.received.name }}</td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Pesan Dari Pengirim</td>
                    <td>:</td>
                    <td>{{ propsMoneyTransfer.messages }}</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>:</td>
                    <td>{{ propsMoneyTransfer.amount }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>
                        {{ propsMoneyTransfer.created_at_raw.day }} {{ propsMoneyTransfer.created_at_raw.month_name }} {{ propsMoneyTransfer.created_at_raw.year }}
                    </td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td>
                        {{ propsMoneyTransfer.created_at_raw.time }}
                    </td>
                </tr>
            </table>
            <div class="field">
                <button class="button is-primary is-fullwidth">CETAK TRANSAKSI</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowDetailComponent",
    props: [
        'propsUser',
        'propsMoneyTransfer'
    ]
}
</script>

<style scoped>

</style>
