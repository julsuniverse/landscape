
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require ('vue-picture-input');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('upload-form', require('./components/UploadForm.vue'));
Vue.component('google-map', require('./components/GoogleMap.vue'));
Vue.component('google-address', require('./components/Address.vue'));

import * as VueGoogleMaps from "vue2-google-maps";
import Geocoder from "@pderas/vue2-geocoder";

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyCKx8O5IXubnyYKt55eIo4df09igekS3qY",
    },
});

Vue.use(Geocoder, {
    googleMapsApiKey: "AIzaSyCKx8O5IXubnyYKt55eIo4df09igekS3qY"
});

const app = new Vue({
    el: '#app'
});
