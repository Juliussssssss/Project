import Edit from "../components/pages/edit/Edit";
import Contacts from "../components/pages/contact-list/ContactList";
import Contacts2 from "../components/pages/contact-list/ContactRender";

window.Vue = require('vue');

const Home = Vue.component('home', require('../components/pages/home/Home.vue').default);
import CreateContact from '../components/pages/contact-forms/CreateContact';
import EditContact from '../components/pages/contact-forms/EditContact';
export const routes = [
    {
        path: '/',
        component: Contacts,
        name: 'contacts',
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
    {
        path: '/contacts2',
        component: Contacts2,
        name: "Contacts"
    },
    {
        path: '/create-contact',
        component: CreateContact,
        name: "ContactAdd"
    },
    {
        path: '/edit-contact',
        component: EditContact,
        name: "ContactEdit"
    },
];
