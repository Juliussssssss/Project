import Vue from 'vue';
import Vuex from 'vuex';
import axios from "axios";
import groups from "./modules/groups/groups";
import contacts from "./modules/contacts/contacts";
import contactForms from "./modules/contacts/contact-forms";
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
        groups,
        contacts,
        contactForms
    }
})
