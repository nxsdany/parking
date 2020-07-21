require('./bootstrap');
window.Vue = require('vue');

import App from './components/App.vue';
import CarIndex from './components/parking/Index';

Vue.component('parking', CarIndex);

new Vue({
  el: '#app',
  components: {
    App
  },
  render: h => h(App),
});
