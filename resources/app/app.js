require("./pusher");

import Vue from "vue"
import VueMeta from "vue-meta"
import PortalVue from "portal-vue"
import DataTable from "laravel-vue-datatable"
import { createInertiaApp, Link } from "@inertiajs/inertia-vue"
import { InertiaProgress } from "@inertiajs/progress"
import * as Sentry from "@sentry/browser"
import VCalendar from 'v-calendar'
import VueTour from "vue-tour"
import VueTelInput from "vue-tel-input"
import Notifications from "vt-notifications"
import VueSweetalert2 from "vue-sweetalert2"
import Vuelidate from "vuelidate"
import store from "./store"
import RolesPermissions from "./shared/helpers/RolesPermissions"
import "./global-components"
import "./utils"
import i18n from "./i18n"

require('vue-tour/dist/vue-tour.css')


window.Vue = Vue;
Vue.config.productionTip = false
Vue.use(Notifications)
Vue.use(DataTable)
Vue.use(VCalendar)
Vue.use(VueTour)
Vue.use(VueSweetalert2)
Vue.use(Vuelidate)
Vue.use(VueTelInput)
Vue.mixin({ methods: { route: window.route } })
Vue.use(PortalVue)
Vue.use(VueMeta)
Vue.mixin(RolesPermissions)
Vue.component("inertia-link", Link)

Pusher.logToConsole = (process.env.MIX_APP_ENV !== "production")
Sentry.init({ dsn: process.env.MIX_SENTRY_LARAVEL_DSN });
InertiaProgress.init({ delay: 250, color: "#f59031" });

createInertiaApp({
    resolve: async name => await import(`./pages/${name}`).then((res) =>res.default),
    setup({ el, app, props, plugin}) {
        Vue.use(plugin)
        new Vue({
            store,
            i18n,
            metaInfo: {
                titleTemplate: title => title ? `${title} | ${process.env.MIX_APP_NAME}` : process.env.MIX_APP_NAME,
            },
            render: h => h(app, props),
        }).$mount(el)
    },
})
