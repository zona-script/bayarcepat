/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('pembelian-component', require('./components/Pembelian').default);
// Vue.component('form-pembelian-pulsa', require('./components/pembelian/PulsaComponent').default);
// Vue.component('form-pembelian-pulsa-transfer', require('./components/pembelian/PulsaTransferComponent').default);
// Vue.component('form-pembelian-paket-data', require('./components/pembelian/DataComponent').default);
// Vue.component('form-pembelian-pln', require('./components/pembelian/PlnComponent').default);
// Vue.component('form-pembelian-telepon-dan-sms', require('./components/pembelian/TeleponDanSmsComponent').default);
// Vue.component('form-pembelian-wifi', require('./components/pembelian/WifiComponent').default);
// Vue.component('form-pembelian-gift-card', require('./components/pembelian/GiftCardComponent').default);
// Vue.component('form-pembelian-ewallet', require('./components/pembelian/EwalletComponent').default);
// Vue.component('form-pembelian-voucher-game', require('./components/pembelian/VoucherGameComponent').default);

Vue.component('money-send-money', require('./components/money/SendMoneyComponent').default);
Vue.component('phonebook-list', require('./components/phonebook/list').default);
Vue.component('phonebook-add', require('./components/phonebook/add').default);

// Vue.component('market-prabayar', require('./components/market/prabayar').default);
// Vue.component('market-pascabayar', require('./components/market/pascabayar').default);

Vue.component('pages-product', require('./components/pages/ProductComponent').default);
Vue.component('price-market-pricing', require('./components/price/MarketPricingComponent').default);

import VueGoodTablePlugin from 'vue-good-table';
// import the styles
import 'vue-good-table/dist/vue-good-table.css'
Vue.use(VueGoodTablePlugin);
import { VueGoodTable } from 'vue-good-table';

import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

// add to component
Vue.component('vue-good-table', VueGoodTable)
Vue.component('prepaid-index', require('./components/prepaid/Index').default);
Vue.component('postpaid-index', require('./components/postpaid/Index').default);


// check bill
// Vue.component('market-pascabayar-checkbill-pln', require('./components/market/pascabayar/CheckBillPln').default);
// Vue.component('market-pascabayar-checkbill-pln', {
//     props: ['result'],
//     template: require('./components/market/pascabayar/CheckBillPln').default
// });

import Vue from 'vue'
import vSelect from 'vue-select'
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

Vue.component('v-select', vSelect);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
