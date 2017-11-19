
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';

//https://router.vuejs.org/en/essentials/getting-started.html
import VueRouter from 'vue-router';


// Vue.component('pqQuicksearch' , require('./quicksearch/Quicksearch.vue'));
// Vue.component('pqQuicksearchFile' , require('./quicksearch/QuicksearchFile.vue'));
Vue.use(VueRouter);

// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
const router = new VueRouter({
    routes :  [
        { path: '*', redirect: '/home' },
        {
            path: '/home',
            component: require('./home/Home.vue')
        },
        {
            path: '/example',
            component: require('./components/Example.vue')
        },
        {
            path: '/recepie',
            component: require('./recepies/View.vue')
        },
        {
            path: '/recepie/:id',
            component: require('./recepie/View.vue'),
            props: true,
        },
    ]
});

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router
}).$mount('#app');
