import Vue from "vue"

Vue.component("Header", () => import("./../shared/includes/Header"))
Vue.component("Footer", () => import("./../shared/includes/Footer"))
Vue.component('Icon', () => import('./Icon'))
Vue.component('EhrInput', () => import('./EhrInput'))
Vue.component('EhrButton', () => import('./EhrButton'))
Vue.component('EhrLabel', () => import('./EhrLabel'));
Vue.component('EhrHeaderMenu', () => import('./EhrHeaderMenu'));
Vue.component('Breadcrumb', () => import('./Breadcrumb'))
Vue.component('DatePicker', () => import('./DatePicker'))
