import Vue from "vue";
import App from './App.vue'
import router from './router';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

window.axios = require('axios');
window.Vue = require('vue');
window.app = new Vue({
  el: '#app',
  router,
  render: h => h(App),
})