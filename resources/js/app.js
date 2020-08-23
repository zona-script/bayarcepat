require('./bootstrap');

window.Vue = require('vue');

import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'
import { VueGoodTable } from 'vue-good-table';
import VueSimpleAlert from "vue-simple-alert";
import Vue from 'vue'
import vSelect from 'vue-select'

Vue.use(VueGoodTablePlugin);
Vue.use(VueSimpleAlert);

Vue.component('money-send-money', require('./components/money/SendMoneyComponent').default);
Vue.component('phonebook-list', require('./components/phonebook/list').default);
Vue.component('phonebook-add', require('./components/phonebook/add').default);

Vue.component('pages-product', require('./components/pages/ProductComponent').default);
Vue.component('price-market-pricing', require('./components/price/MarketPricingComponent').default);

// add to component
Vue.component('vue-good-table', VueGoodTable)
Vue.component('prepaid-index', require('./components/prepaid/Index').default);
Vue.component('prepaid-history-index', require('./components/prepaid/history/Index').default);
Vue.component('postpaid-index', require('./components/postpaid/Index').default);
Vue.component('send-money-index', require('./components/sendmoney/IndexComponent').default);

// social media marketing
Vue.component('dashboard-social-media-marketing-index', require('./components/dashboard/social-media-marketing/IndexComponent').default);

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
