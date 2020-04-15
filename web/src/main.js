import Vue from 'vue'

//引入element-ui
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)

//引入vue-resource
import VueResource from 'vue-resource'

Vue.use(VueResource)

//引入bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
// import './lib/cookie.js'

// 引入 vue-router 
import VueRouter from 'vue-router'
Vue.use(VueRouter)


//导入自定义组件
import app from './app.vue'
import login from './dlzcCom/login.vue'
import register from './dlzcCom/register.vue'

import router from './loader.js'
var vm = new Vue({
  el: "#app",
  methods: {

  },
  render: h => h(app), //render 会把 el 指定的容器内容覆盖
  // 路由的 router-view 和 router-Link 不要直接写到 el 是容器中
  router
})

var vc = new Vue({
  el: "#login",
  methods: {

  },
  render: h => h(login),
})

var vc = new Vue({
  el: "#register",
  methods: {

  },
  render: h => h(register),
})