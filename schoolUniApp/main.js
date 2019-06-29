import Vue from 'vue'
import App from './App'
Vue.config.productionTip = false
import Comm from "./common.js";
Vue.prototype.comm=Comm;
App.mpType = 'app'

const app = new Vue({
    ...App
})
app.$mount()
