<template>
    <div class="modal is-active">
<!--    <div class="modal is-active" v-if="isActive">-->
        <div class="modal-background"></div>
        <div class="modal-card">
            <div class="modal-card-head">
                <p class="modal-card-title">List Kontak</p>
                <button class="delete" aria-label="close" v-on:click="closeModal"></button>
            </div>
            <section class="modal-card-body">
                <div class="table-container">
                    <table class="table-bordered table is-fullwidth">
                        <thead>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Nomor Telepon</th>
                        <th>Nomor Pelanggan</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="5">Setiap pembelian yang digunakan adalah nomor konsumen,</td>
                        </tr>
                        <tr v-for="user in contacts">
                            <td>{{ user.name }}K</td>
                            <td>{{ user.type }}</td>
                            <td>{{ user.phone_number }}</td>
                            <td>{{ user.customer_number }}</td>
                            <td>
                                <button class="button is-primary" v-on:click="selectContact(user)">Pilih</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        name: "list",
        data() {
            return {
                isActive: true,
                activeClass: 'is-active',
                errorClass: '',
                contacts: [],
                selectedContact: {}
            }
        },
        created() {
            window.axios.get('/api/web/contact')
                .then(response => this.contacts = response.data);

            this.isActive = true;
            // console.log(this.contacts)
        },
        mounted() {
            this.isActive = true;
        },
        methods: {
            closeModal (event) {
                this.$emit('close', false)
            },
            selectContact (event) {
                // console.log(event)
                this.$emit('selected',event)
                // this.$emit('selected', this.selectedContact)
                this.$emit('close', false)
            }
        }
    }
</script>

<style scoped>

</style>
