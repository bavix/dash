
window.io = require('socket.io-client');
require('./echo');

import Vue from 'vue'
import Hero from './components/Hero'
import Services from './components/Services'

const app = new Vue({
    el: '#app',
    components: {
        Hero,
        Services,
    }
});
