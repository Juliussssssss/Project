
require('./bootstrap');

//support vuex
import Vue from 'vue'

window.Vue = require('vue');

import { router } from "./router/router"
import store from "./store/index"
import App from "./components/App"

Vue.component('app', require('./components/App.vue').default);
Vue.component('left-nav', require('./components/left-nav/LeftNav.vue').default);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store
});


