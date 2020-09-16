<template>
    <div>
        <div class="field">
            <label class="label">Nama Layanan</label>
            <div class="control">
                <input type="text" class="input is-primary" :value="propsProduct.name" disabled>
            </div>
        </div>
        <div class="field">
            <label class="label">Kategori Layanan</label>
            <div class="control">
                <input type="text" class="input is-primary" :value="propsProduct.category" disabled>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Harga (Per 1000)</label>
                    <div class="control">
                        <input type="text" class="input is-primary" :value="propsProduct.price" disabled>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Minimum Pemesanan</label>
                    <div class="control">
                        <input type="text" class="input is-primary" :value="propsProduct.min" disabled>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Maksimal Pemesanan</label>
                    <div class="control">
                        <input type="text" class="input is-primary" :value="propsProduct.max" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Deskripsi Layanan</label>
            <textarea class="textarea is-warning" disabled>{{ propsProduct.note }}</textarea>
        </div>
        <div class="field">
            <label class="label">Target Pesanan</label>
            <div class="control">
                <input v-model="target" type="text" class="input is-primary" placeholder="Masukan target">
            </div>
        </div>
        <div class="field">
            <label class="label">Jumlah Pesanan</label>
            <div class="control">
                <input v-model="quantity" type="number" :min="propsProduct.min" :max="propsProduct.max" class="input is-primary" placeholder="Masukan jumlah pesanan">
            </div>
        </div>
        <div class="field">
            <label class="label">Kustom Komentar (isi jika diperlukan)</label>
            <textarea v-model="customComment" class="textarea is-primary" placeholder="Isi jika diperlukan (hanya untuk beberapa layanan saja)"></textarea>
        </div>
        <div class="field">
            <label class="label">Kustom Link (isi jika diperlukan)</label>
            <div class="control">
                <input v-model="customLink" type="text" class="input is-primary" placeholder="Isi jika diperlukan (hanya untuk beberapa layanan saja)">
            </div>
        </div>
        <div class="field">
            <label class="label">Total Harga</label>
            <div class="control">
                <input type="text" class="input is-primary" v-bind:value="price" disabled>
            </div>
        </div>
        <div class="field">
            <label class="checkbox">
                <input type="checkbox">
                Paksa untuk dijalankan sekarang
            </label>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-primary is-fullwidth">Beli Layanan</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderFormComponent",
    props: {
        'propsProduct' : {
            type: Object,
            required: true
        }
    },
    computed: {
        normalizedData: function () {
            this.quantity = 0
            this.price = 0
        }
    },
    data() {
        return {
            target: '',
            quantity: '',
            customComment: '',
            customLink: '',
            price: 0,
        }
    },
    watch: {
        quantity: function (value) {
            this.price = Math.ceil(this.propsProduct.price * (value / 1000))
        }
    },
    methods: {
        resetForm: function () {
            this.target = ''
            this.quantity= ''
            this.customComment= ''
            this.customLink = ''
            this.price = 0
        }
    }
}
</script>

<style scoped>

</style>
