require("./pusher");

import Vue from "vue";
import VueMeta from "vue-meta";
import PortalVue from "portal-vue";
import { InertiaApp, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import * as Sentry from "@sentry/browser";
import DataTable from "laravel-vue-datatable";
import VueTailwindPicker from 'vue-tailwind-picker'
import VueTelInput from "vue-tel-input";
import Notifications from "vt-notifications";
import Vuelidate from "vuelidate";
import store from "./store";
import RolesPermissions from "./shared/helpers/RolesPermissions";
import "./global-components";
import "./utils";
import i18n from "./i18n";

window.Vue = Vue;
Vue.config.productionTip = false
Vue.use(Notifications)
Vue.use(DataTable)
Vue.use(Vuelidate)
Vue.use(VueTelInput)
Vue.use(VueTailwindPicker);
Vue.mixin({ methods: { route: window.route } })
Vue.use(plugin)
Vue.use(PortalVue)
Vue.use(VueMeta)
Vue.mixin(RolesPermissions)
Pusher.logToConsole = (process.env.MIX_APP_ENV !== "production");

Sentry.init({ dsn: process.env.MIX_SENTRY_LARAVEL_DSN });

InertiaProgress.init({ delay: 250, color: "#f59031" });

const el = document.getElementById("app");

new Vue({
    i18n,
    store,
    metaInfo: {
        titleTemplate: title =>
            title
                ? ` ${title} | ${process.env.MIX_APP_NAME} `
                : process.env.MIX_APP_NAME
    },
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => require(`./pages/${name}`).default
            }
        })
}).$mount(el);
