
require('./bootstrap');

//support vuex
import Vue from 'vue'

window.Vue = require('vue');

import { router } from "./router/router"
import store from "./store/index"
import App from "./components/App"
import VeeValidate from './validation';

Vue.component('left-nav', require('./components/left-nav/LeftNav.vue').default);
Vue.component('tools', require('./components/tools/Tools.vue').default);
Vue.component('contact-list', require('./components/pages/contact-list/ContactList').default);
Vue.component('logout', require('./components/Logout').default);
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store
});


