/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var Vue = require('vue')
Vue.use(require('vue-cookies'));






// set default config
VueCookies.config('7d')

// set global cookie
VueCookies.set('theme','default');
VueCookies.set('hover-time','1s');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('add-reservation', require('./components/AddReservation.vue').default);
Vue.component('units', require('./components/DisplayUnits.vue').default);
Vue.component('units-edit-all', require('./components/UnitsEditAll.vue').default);
Vue.component('reservations', require('./components/AllReservations.vue').default);
Vue.component('add-unit', require('./components/AddUnit.vue').default);
Vue.component('unit-edit', require('./components/UnitEdit').default);



//Vue.component('',require('./components/').default);








/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueMoment from 'vue-moment';
import VueCookies from 'vue-cookies';

import Vuetify from 'vuetify/lib';
Vue.use(VueMoment);

Vue.use(VueCookies);
Vue.use(Vuetify);
const app = new Vue({

    el: '#app',

});
Vue.use(Vuetify);
