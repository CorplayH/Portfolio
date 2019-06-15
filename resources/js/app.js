/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('Home', require('./components/backend/home.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//

require('./bootstrap');
window.Vue = require('vue');
import util from './util.js';
import vueHome from './components/backend/home.vue';
import vueAboutMe from './components/backend/aboutMe.vue';
import vueResume from './components/backend/resume.vue';
import vueContact from './components/backend/contact.vue';
import vueMenu from './components/backend/menu.vue';
import vuePortfolio from './components/backend/portfolio.vue';

Vue.use(util);
const app = new Vue({
    el: '#vueApp',
    components: {
        vueHome,
        vueAboutMe,
        vueResume,
        vueContact,
        vuePortfolio,
    },
    data: {
        backGround: {
            url: 'org/sunshine/images/2G5A2942.jpg',
        }
    },
    methods: {
        uploadImage(){
            console.log(this.backGround.url);
        },
    },
});

const appMenu = new Vue({
    el: '#vueMenu',
    components: {
        vueMenu,
    },
});
