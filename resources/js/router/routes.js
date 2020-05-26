import Edit from "../components/pages/edit/Edit";
import Contacts from "../components/pages/contact-list/ContactRender";
import Print from "../components/pages/Print/Print";

window.Vue = require('vue');

import CreateContact from '../components/pages/contact-forms/createForm/CreateContact';
import EditContact from '../components/pages/contact-forms/edit-form/EditContact';
import ShowContact from '../components/pages/contact-forms/show-form/ShowContact';


import groups from "../store/modules/groups/groups";
import Write from "../components/pages/write/Write";


export const routes = [
    {
        path: '/print/:group/:id',
        component: Print,
        name: 'Print',
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
        path: '/frequent-contacts',
        component: Contacts,
        name: "FrequentContacts"
    },
    {
        path: '/favorites',
        component: Contacts,
        name: "favorites"
    },
    {
        path: '/create-contact',
        component: CreateContact,
        name: "ContactAdd",
    },
    {
        path: '/edit-contact',
        component: EditContact,
        name: "ContactEdit",
        props: true,
    },
    {
        path: '/show-contact',
        component: ShowContact,
        name: "ContactShow",
        props: true,
    },
    {
        path: "/groups",
        component: Contacts,
        name: "groups"
    },
    {
        path: "/write",
        component: Write
    }
];
