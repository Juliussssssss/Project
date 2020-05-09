import Edit from "../components/pages/edit/Edit";
import Contacts from "../components/pages/contact-list/ContactRender";
import Test from "../components/pages/contact-list/test";

window.Vue = require('vue');

const Home = Vue.component('home', require('../components/pages/home/Home.vue').default);
import CreateContact from '../components/pages/contact-forms/createForm/CreateContact';
import EditContact from '../components/pages/contact-forms/edit-form/EditContact';
import ShowContact from '../components/pages/contact-forms/show-form/ShowContact';

export const routes = [
    {
        path: '/test',
        component: Test,
        name: 'Test',
        props: true,
    },
    {
        path: '/edit',
        component: Edit,
        name: "Edit"
    },
    {
        path: '/contacts',
        component: Contacts,
        name: "contacts"
    },
    {
        path: '/favorites',
        component: Contacts,
        name: "contacts"
    },
    {
        path: '/create-contact',
        component: CreateContact,
        name: "ContactAdd"
    },
    {
        path: '/edit-contact/:id',
        component: EditContact,
        name: "ContactEdit",
        props: true,
    },
    {
        path: '/show-contact/:id',
        component: ShowContact,
        name: "ContactShow",
        props: true,
    }
];
