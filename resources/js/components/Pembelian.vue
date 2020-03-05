<template>
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="box">
                    <div class="field">
                        <h3 class="title">Beli Produk</h3>
                    </div>
                    <div class="field">
                        <label class="label has-text-left">Pilih Produk & Layanan</label>
                        <div class="control has-icons-left">
                            <div class="select is-fullwidth is-primary">
                                <select v-on:change="changeSelect($event)">
                                    <option value="" selected>Pilih Produk & Layanan</option>
                                    <option value="pulsa">Pulsa (Pulsa Reguller dan Promo)</option>
                                    <option value="pulsa-transfer">Pulsa Transfer (Tidak Menambah Masa Aktif)</option>
<!--                                    <option value="pln">Listrik PLN (Pasca Bayar)</option>-->
                                    <option value="data">Paket Data (Paket Internet)</option>
                                    <option value="telepon-dan-sms">Paket Telepon dan Paket SMS</option>
                                    <option value="wifi">Wifi (Voucher Wifi.ID)</option>
                                    <option value="gift-card">Gift Card (Google Play & iTunes Gift Card)</option>
                                    <option value="ewallet">Saldo E-wallet & Ojek Online (Gojek, Grab, Ovo, Dana, LinkAja, ShoppePay)</option>
                                    <option value="transfer-saldo">Transfer Saldo</option>
<!--                                    <option value="voucher-game">Voucher Game Online (Mobile, Web dan PC)</option>-->
                                </select>
                            </div>
                            <span class="icon is-left">
                        <i class="fas fa-globe"></i>
                      </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="columns">
            <div class="column is-6 is-offset-3">
<!--                <div class="notification is-warning">-->
<!--                    <p class="has-text-weight-bold">Informasi</p>-->
<!--                    <p>Pastikan data yang anda inputkan sudah benar.</p>-->
<!--                </div>-->
                <form-pembelian-pulsa v-if="isActive === 'pulsa'"></form-pembelian-pulsa>
                <form-pembelian-pulsa-transfer v-if="isActive === 'pulsa-transfer'"></form-pembelian-pulsa-transfer>
                <form-pembelian-pln v-if="isActive === 'pln'"></form-pembelian-pln>
                <form-pembelian-paket-data v-if="isActive === 'data'"></form-pembelian-paket-data>
                <form-pembelian-telepon-dan-sms v-if="isActive === 'telepon-dan-sms'"></form-pembelian-telepon-dan-sms>
                <form-pembelian-wifi v-if="isActive === 'wifi'"></form-pembelian-wifi>
                <form-pembelian-gift-card v-if="isActive === 'gift-card'"></form-pembelian-gift-card>
                <form-pembelian-ewallet v-if="isActive === 'ewallet'"></form-pembelian-ewallet>
                <form-pembelian-voucher-game v-if="isActive === 'voucher-game'"></form-pembelian-voucher-game>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "pembelian",
        // props: ['actionFormUrl'],
        data() {
            return {
                isActive: '',
                activeClass: 'is-active',
                errorClass: '',
            }
        },
        methods: {
            changeTab(value) {
                this.isActive = value
            },
            changeSelect(value) {
                this.isActive = value.target.value;
                // console.log(value.target.value)

                if (this.isActive === 'transfer-saldo') {
                    window.location.href = '/dashboard/kirim-uang'
                }
            },
        }
    }
</script>

<style scoped>

</style>
