import './bootstrap';

import {createApp} from 'vue'
import App from './App.vue'

import store from './vuex/store';
import router from './router';





createApp(App).use(router).use(store).mount("#app")