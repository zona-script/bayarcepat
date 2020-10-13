require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'
import { VueGoodTable } from 'vue-good-table';
import VueSimpleAlert from "vue-simple-alert";
import vSelect from 'vue-select'

import route from 'ziggy';
import { Ziggy } from '../assets/js/ziggy';

Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
        getLaravelCsrfToken: () => document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
});

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

Vue.use(VueGoodTablePlugin);
Vue.use(VueSimpleAlert);
Vue.component('v-select', vSelect);
Vue.component('vue-good-table', VueGoodTable)

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
