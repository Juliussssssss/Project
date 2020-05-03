window.Vue = require('vue');
const Home = Vue.component('main-page-moder', require('../components/pages/home/Home.vue').default);
export const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home',
    }
];
