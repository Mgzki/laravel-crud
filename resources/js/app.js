require('./bootstrap');

import Vue from 'vue'
import App from './vue/app'
import Test from './vue/test'
import '../css/tailwind.css'

const app = new Vue({
    el: '#app',
    components: { Test }
})