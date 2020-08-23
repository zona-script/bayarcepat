<template>
    <div>
        <div class="container">
            <button class="button is-info is-fullwidth is-rounded">Tambah Data</button>
            <br>
        </div>
        <div class="container">
            <vue-good-table
                :columns="columns"
                :rows="rows"
                :search-options="{
                    enabled: true,
                    placeholder: 'Cari data ...',
                }"
                :pagination-options="{
                enabled: true,
                mode: 'records',
                rowsPerPageLabel: 'Jumlah perhalaman',
                ofLabel: 'dari',
              }">
                <div slot="emptystate">
                    Data masihh belum tersedia atau masih menghubungkan layanan.
                </div>
            </vue-good-table>
        </div>

    </div>
</template>

<script>
export default {
    name: "BankComponent",
    data() {
        return {
            columns: [
                {
                    label: 'ID',
                    field: 'id',
                },
                {
                    label: 'Nama',
                    field: 'name',
                },
                {
                    label: 'Email',
                    field: 'email',
                },
                {
                    label: 'Username',
                    field: 'username',
                },
                {
                    label: 'Verified',
                    field: 'verified',
                },
                {
                    label: 'Action',
                    field: this.funcBuyButton,
                    html: true,
                }
            ],
            rows: [],
        }
    },
    mounted() {
        window.axios.get('?api=true')
            .then(response => {
                this.rows = response.data
            })
    },
    created() {
    },
    methods: {
        funcBuyButton(rowObj) {
            return '<button class="button is-primary is-fullwidth">Kelola</button>'
        },
    },
    watch: {
    }
}
</script>

<style scoped>

</style>
