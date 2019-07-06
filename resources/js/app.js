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

// const attachments = require.context('./', true, /\.vue$/i);
// attachments.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], attachments(key).default));

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

import '../../public/org/sunshine/js/sweetalert2.all.js';
import '../../public/org/sunshine/js/page-transition.js';
import '../../public/org/sunshine/js/imagesloaded.pkgd.min.js';
import '../../public/org/sunshine/js/validator.js';
import '../../public/org/sunshine/js/owl.carousel.min.js';
import '../../public/org/sunshine/js/jquery.magnific-popup.min.js';
import '../../public/org/sunshine/js/jquery.hoverdir.js';
import '../../public/org/sunshine/js/toastr.min.js';
import '../../public/org/sunshine/js/main.js';
import vueMenu from './components/backend/menu.vue';
import vueHome from './components/backend/home.vue';
import vueAboutMe from './components/backend/aboutMe.vue';
import vueResume from './components/backend/resume.vue';
import vuePortfolio from './components/backend/portfolio.vue';
import vueContact from './components/backend/contact.vue';


import frontVueMenu from './components/frontend/menu.vue';
import frontVueHome from './components/frontend/home.vue';
import frontVueAboutMe from './components/frontend/aboutMe.vue';
import frontVueResume from './components/frontend/resume.vue';
// import frontVuePortfolio from './components/frontend/portfolio.vue';
import frontVueContact from './components/frontend/contact.vue';

Vue.use(util);

const appMenu = new Vue({
    el: '#vueMenu',
    components: {
        vueMenu,
    },
});

const app = new Vue({
    el: '#vueApp',
    components: {
        vueHome,
        vueAboutMe,
        vueResume,
        vueContact,
        // vuePortfolio,
    },
    data: {
        background: {
            url: '',
        }
    },
    created(){
        this.$eventHub.$on('initUserInfo', this.userDetailUpdate);
    },
    methods: {
        userDetailUpdate(detail){
            this.background.url = detail.background;
        },
        save() {
            this.background.url = this.$refs.modalBackground.src;
            axios.post('/admin/editBackground', this.background)
                .then((res) => {
                    console.log(res);
                    if (res.data.code === 1) {

                    }
                    this.messageAlert(res.data);
                });
        },
    },
});

const frontMenu = new Vue({
    el: '#frontMenu',
    components: {
        frontVueMenu,
    },
});


const frontApp = new Vue({
    el: '#frontApp',
    components: {
        frontVueHome,
        frontVueAboutMe,
        frontVueResume,
        frontVueContact,
    },
    data: {
        background: {
            url: '',
        }
    },
    created(){
        this.$eventHub.$on('initUserInfo', this.userDetailUpdate);
    },
    methods: {
        userDetailUpdate(detail){
            this.background.url = detail.background;
        }
    },
});
