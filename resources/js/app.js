
require('./bootstrap');

//support vuex
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

window.Vue = require('vue');

import { router } from "./router/router"

Vue.component('app', require('./components/App.vue').default);

//storage
const store = new Vuex.Store({
    state: {
        count: 0
    },
    mutations: {
        increment (state) {
            state.count++
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    store
});


