
<template>

<div class="menu">
<transition>
      <div class="hidden text-light text-center" v-show="flag"><small>{{message}}</small></div>
    </transition>

    <div class="bg container">
      <div class="row">
        <div class="loginContext col-6 bg-light offset-3">
          <div class="row">
            <div class="col-12 text-center h4 text-dark" style="padding: 10px;">
              {{login}}
            </div>
          </div>

          <div class="form-group">
            <label for="username" class="text-drak h5">{{uN}}</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
              placeholder="请输入用户名" v-model="username">
          </div>

          <div class="form-group">
            <label for="password" class="text-drak h5">{{pD}}</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
              placeholder="请输入您的密码" v-model="password" @keyup.Enter="check()">
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-9">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck" name="example1"
                    v-model="checkbox">
                  <label class="custom-control-label" for="customCheck">7天免密登录</label>
                </div>
              </div>
              <div class="col-3"><a href="register.html" class="text-info">前往注册页面</a></div>

            </div>


          </div>

          <div class="form-group text-center">
            <button class="btn btn-info" @click="check()">登录</button>
          </div>

        </div>
      </div>
    </div>

</div>
 
</template>

<script>
import { Setcookie, getCookie, delCookie } from '../lib/cookie.js'
export default {
  data() {
    return {
      login: '登录',
      uN: '用户名：',
      pD: '密码：',
      username: '',
      password: '',
      checkbox: true,
      message: '',
      flag: false
    }
  },
  methods: {
    check: function() {
      if (this.username == '' || this.password == '') {
        this.message = '请填写数据不能为空'
        this.flag = true
        setTimeout(() => {
          this.flag = false
        }, 1500)
      } else {
        let that = this
        this.$http
          .post(
            'http://localhost/phpQuest/php/index.php/home/user/login',
            { username: that.username, password: that.password },
            { emulateJSON: true }
          )
          .then(
            function(data) {
              let username = data.body.userinfo[0].uname
              let userpwd = data.body.userinfo[0].upassword
              let uid = data.body.userinfo[0].uid
              if (data.body.data == 1) {
                console.log(that.checkbox)
                if (that.checkbox == true) {
                  Setcookie('username', username)
                  Setcookie('password', userpwd)
                  Setcookie('status', 'true')
                } else if (that.checkbox == false) {
                  delCookie('username')
                  delCookie('password')
                  delCookie('status')
                }
                window.location.href = 'index.html'
                sessionStorage.username = JSON.stringify(username)
                sessionStorage.uid = JSON.stringify(uid)
              } else {
                that.message = '账户或密码错误'
                that.flag = true
                that.username = ''
                that.password = ''
                setTimeout(() => {
                  that.flag = false
                }, 1500)
              }
            },
            function(res) {
              console.log(res)
            }
          )
      }
    }
  },
  mounted() {
    var a = getCookie('username')
    var b = getCookie('password')
    var c = getCookie('status')
    console.log(c)
    this.username = a
    this.password = b
    this.checkbox = c
    console.log(this.checkbox)
  }
}
</script>

<style scoped>
.menu {
  margin-top: 200px;
}
.loginContext {
  box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.5);
  opacity: 0.8;
  border-radius: 5px;
}
.hidden {
  width: 130px;
  height: 30px;
  background-color: black;
  border-radius: 8px;
  position: fixed;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999;
}
.v-enter,
.v-leave-to {
  opacity: 0;
}

.v-enter-active,
.v-leave-active {
  transition: all 0.6s ease;
}
</style>