import Edit from "../components/pages/edit/Edit";
import Contacts from "../components/pages/contact-list/ContactList";

window.Vue = require('vue');
const Home = Vue.component('main-page-moder', require('../components/pages/home/Home.vue').default);
export const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home',
    },
    {
        path: '/edit',
        component: Edit,
        name: "Edit"
    },
    {
        path: '/contacts',
        component: Contacts,
        name: "Contacts"
    },
];
