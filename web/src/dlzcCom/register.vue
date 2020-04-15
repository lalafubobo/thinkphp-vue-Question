<template>
  <div class="menu">
     <transition>
      <div class="hidden text-light text-center" v-show="flag"><small>{{message}}</small></div>
    </transition>

    <div class="container">
      <div class="row">
        <div class="loginContext col-6 bg-light offset-3">
          <div class="row">
            <div class="col-12 text-center h4 text-dark" style="padding: 10px;">
              {{register}}
            </div>
          </div>


            <div class="form-group">
              <label for="user">用户名：</label><small class="text-danger" v-show="flag2">用户名已经被使用</small>
              <input type="text" name="user" id="user" class="form-control" placeholder="请输入用户名" v-model="username"
               @blur="AgainUser()"  >

            </div>

            <div class="form-group">
              <label for="paw">密码：</label>
              <input type="password" name="paw" id="paw" class="form-control" placeholder="请输入用户密码" v-model="password">
            </div>

            <div class="form-group">
              <label for="pawt">确认密码：</label>
              <input type="password" name="pawt" id="pawt" class="form-control" placeholder="请再次输入你的密码"
                v-model="againPaw">
            </div>

            <div class="form-group">
              <label for="">性别：</label>
              <br>


              <div class="custom-control custom-radio custom-control-inline" v-for="item in list">
                <input type="radio" class="custom-control-input" :id="item.id" v-model="checkedValue"
                  :value="item.value">
                <label class="custom-control-label" :for="item.id">{{item.sex}}</label>
              </div>
            </div>

            <div class="form-group">
              <label for="sel1">爱好:</label>
              <select class="form-control" id="sel1" v-model="opt">
                <option :value="item.value" v-for="item in options">{{item.hob}}</option>
              </select>
            </div>

            <div class="well text-center row" style="padding: 10px;">
              <div class="col-4 offset-2">
                <button type="button" class="btn btn-primary" @click="sex()">提交</button>
              </div>
              <div class="col-4">
                <button type="reset" class="btn btn-danger">重置</button>
              </div>
            </div>
        </div>
 
      </div>
    </div>
  </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      flag: false,
      flag2: false,
      message: '所用数据都不能为空',
      register: '注册',
      username: '',
      password: '',
      againPaw: '',
      list: [
        { value: 1, sex: '男', id: 'man' },
        { value: 2, sex: '女', id: 'woman' }
      ],
      checkedValue: '1',
      options: [
        { value: '吉他', hob: '吉他' },
        { value: '游泳', hob: '游泳' },
        { value: 'LOL', hob: 'LOL' }
      ],
      opt: '吉他',
      blog: false
    }
  },
  methods: {
    sex: function() {
      var ret = this.AgainUser()

      console.log(
        this.checkedValue,
        this.username,
        this.password,
        this.againPaw,
        this.opt
      )
      if (this.username == '' || this.password == '') {
        this.flag = true
        setTimeout(() => {
          this.flag = false
        }, 1000)
      } else {
        if (this.password != this.againPaw) {
          this.flag = true
          this.message = '两次密码不一致'
          setTimeout(() => {
            this.flag = false
          }, 1500)
        } else {
          if (ret == true) {
            let that = this
            this.$http
              .post(
                'http://localhost/phpQuest/php/index.php/home/user/useradd',
                {
                  name: that.username,
                  pwd: that.password,
                  sex: that.checkedValue,
                  hob: that.opt
                },
                { emulateJSON: true }
              )
              .then(
                function(data) {
                  console.log(data.body.status)
                  if (data.body.status > 0) {
                    window.location.href = 'login.html'
                  } else {
                    console.log('失败！')
                  }
                },
                function(res) {
                  console.log(res)
                }
              )
          } else {
            console.log('失败')
          }
        }
      }
    },
    AgainUser: function() {
      // console.log("你好");
      // return false;
      if (this.username != '') {
        this.$http
          .get('http://localhost/phpQuest/php/index.php/home/user/checkName', {
            params: { name: this.username }
          })
          .then(
            function(data) {
              console.log(data.body)
              if (data.body.success == true) {
                this.flag2 = true
                this.blog = false
              } else {
                this.flag2 = false
                this.blog = true
              }
            },
            function(res) {
              console.log(res)
            }
          )
      }

      return this.blog
    }
  }
}
</script>

<style  scoped>
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
  top: 50%;
  left: 45%;
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