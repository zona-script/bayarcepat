<template>
    <div>
        <div v-if="showCreateForm">
            <create-component v-on:childToParent="fromChildCreateForm"></create-component>
        </div>
        <div class="field" v-else>
            <div class="field">
                <button class="button is-primary" v-on:click="methodShowCreateForm">Tambah</button>
            </div>
            <vue-good-table class="is-fullwidth"
                            :columns="columns"
                            :rows="userBanks"
                            :line-numbers="true"
                            @on-row-click="onRowClick"></vue-good-table>
        </div>
    </div>
</template>

<script>
import CreateTeamForm from "../../Teams/CreateTeamForm";
import CreateComponent from "./CreateComponent";
export default {
    components: {
        CreateComponent,
        CreateTeamForm
    },
    name: "IndexList",
    data() {
        return {
            columns: [
                {
                    label: 'Nama Bank',
                    field: 'bank_master.name',
                },
                {
                    label: 'Nama',
                    field: 'bank_account_name',
                },
                {
                    label: 'Nomor Rekening',
                    field: 'bank_account_number',
                },
                {
                    label: 'Hapus',
                    field: this.tableColumnDelete,
                    html: true
                }
            ],
            showCreateForm: false,
            userBanks: ''
        }
    },
    mounted() {
        this.url = this.route('api.user-bank.store')
        this.updateData()
    },
    methods: {
        methodShowCreateForm() {
            this.showCreateForm = true;
        },
        methodCloseCreateForm() {
            this.showCreateForm = false
        },
        submit() {
            window.axios.post(this.url, this.form)
                .then(response => {
                    console.log(response)
                })
        },
        tableColumnDelete() {
            return '<button class="button is-danger">Hapus</button>'
        },
        fromChildCreateForm (value) {
            this.updateData()
            if(!value) {
                this.$alert('Berhasil', 'Data berhasil disimpan', 'success');
            }
            this.showCreateForm = value
        },
        childToParentClickCancel(value) {
          this.showCreateForm = false
        },
        updateData() {
            window.axios.get(this.route('api.user-bank.index'))
                .then(response => {
                    this.userBanks = response.data.data
                })
        },
        onRowClick(params) {
            this.delete(params.row)
        },
        delete(row) {
            this.$confirm("Yakin ingin menghapus data ini ?").then(() => {
                window.axios.delete(this.route('api.user-bank.destroy', row.id))
                    .then(response => {
                        this.updateData()
                        this.$alert('Data berhasil dihapus', 'Berhasil', 'success');
                    })
                    .catch(error => {
                        this.$alert('Data gagal dihapus', 'Gagal Menghapus', 'error');
                    });
            });
        }
    },
}
</script>

<style scoped>

</style>
