import VueRouter from 'vue-router'
import square from './main/square.vue'
import myself from './main/myself.vue'
import questItem from './main/questItem.vue'

// 3. 创建路由对象
var router = new VueRouter({
  routes: [
    { path: '/', redirect: '/square' },
    {
      path: '/square',
      component: square,
    },
    { path: '/myself', component: myself },
    { path: '/square/questItem/:id/:qid/:topic/:name', component: questItem, meta: { auth: true } },
  ]
})

let a = 1
router.beforeEach((to, from, next) => {
  //to跳转的页面
  // console.log(to);
  //from跳转前的页面
  //console.log(from);
  //跳转页面
  if (to.meta.auth) {
    // console.log(to.params.id);
    //  console.log(to.params.qid);

    let id = to.params.id;
    let qid = to.params.qid;
    let s = qid.split(',')
    var flag;
    s.forEach(element => {
      if (element != id) {
        flag = 1
      }
    });
    if (!flag) {
      next();
    } else {
      //不符合跳转登录界面
      alert("你已经参与");

      // next({
      //   path: '/square'
      // })
    }
  } else {
    next();
  }
});

export default router