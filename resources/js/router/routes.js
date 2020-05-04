import Edit from "../components/pages/edit/Edit";

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
    }
];
