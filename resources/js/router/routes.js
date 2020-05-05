import Edit from "../components/pages/edit/Edit";
import Contacts from "../components/pages/contact-list/ContactList";

window.Vue = require('vue');
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
];
