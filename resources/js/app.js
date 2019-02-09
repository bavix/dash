import "@babel/polyfill";
window.io = require('socket.io-client');
require('./echo');

import Vue from 'vue'
import store from './store'
import Hero from './components/Hero'
import Services from './components/Services'

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    store,
    components: {
        Hero,
        Services,
    }
});
