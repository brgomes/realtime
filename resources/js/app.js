require('./bootstrap');

import Vue from 'vue'
import VueToastify from 'vue-toastify'

Vue.config.devtools = true
Vue.use(VueToastify)

Vue.component('posts-component', require('./components/Posts/Posts.vue').default)

const app = new Vue({
    el: '#app'
})
