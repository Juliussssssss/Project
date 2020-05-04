
require('./bootstrap');

//support vuex
import Vue from 'vue'

window.Vue = require('vue');

import { router } from "./router/router"
import store from "./store/index"

Vue.component('app', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});


