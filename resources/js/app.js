import Vue from 'vue'
import VueMeta from 'vue-meta'
import { InertiaApp } from '@inertiajs/inertia-vue'
import * as Sentry from '@sentry/browser'
import VueTailwindPicker from 'vue-tailwind-picker'
import PortalVue from 'portal-vue'
import store from "~/store/index";
import i18n from "~/i18n";

Vue.config.productionTip = false;
Vue.mixin({ methods: { route: window.route } });
Vue.use(InertiaApp);
Vue.use(VueTailwindPicker);
Vue.use(VueMeta);
Vue.use(PortalVue);

Sentry.init({dsn: process.env.MIX_SENTRY_LARAVEL_DSN,});

const app = document.getElementById('app');
new Vue({
    store,
    i18n,
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - ${process.env.MIX_APP_NAME}` : process.env.APP_NAME
    },
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => require(`~/Pages/${name}`).default,
        },
    }),
}).$mount(app);
