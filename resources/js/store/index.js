import Vue from 'vue';
import Vuex from 'vuex';
import axios from "axios";
import groups from "./modules/groups/groups";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        count: 0,
    },
    getters: {

    },
    mutations: {

    },
    actions: {

    },
    modules: {
        groups
    }
})
