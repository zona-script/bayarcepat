<template>
    <div class="content">
        <div class="field">
            <label class="label">Admin</label>
            <input type="text" :value="result.admin" class="input" disabled>
        </div>

        <div class="table-container">
            <table class="table is-fullwidth is-bordered">
                <thead>
                    <tr>
                        <td>Jumlah Tagihan</td>
                        <td colspan="3">{{ result.desc.lembar_tagihan }}</td>
                    </tr>
                    <tr>
                        <th>Periode</th>
                        <th>Nilai Tagihan</th>
                        <th>Admin</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table is-fullwidth" v-for="(detail, index) in result.desc.detail">
                        <td v-for="(value, name) in detail">
                            {{ value }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="has-text-right">Harga</td>
                        <td>{{ result.price }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="has-text-right">Biaya Admin</td>
                        <td>{{ result.admin }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="has-text-right">Harga Total</td>
                        <td>{{ result.selling_price }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <pre>{{ result }}</pre>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CheckBillPln",
        props: ['result'],
        mounted() {
            console.log(this.$props)
            console.log(this.result)
        }
    }
</script>

<style scoped>

</style>
