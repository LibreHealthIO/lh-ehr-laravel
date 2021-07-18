import Vue from "vue"

Vue.component("Header", () => import("./../shared/includes/Header"))
Vue.component("Footer", () => import("./../shared/includes/Footer"))
Vue.component('Icon', () => import('./Icon'))
Vue.component('Breadcrumb', () => import('./Breadcrumb'))
Vue.component('DatePicker', () => import('./DatePicker'))
