<template>
  <div class="pageM">

  <el-menu
  :default-active="activeIndex"
  class="el-menu-demo"
  mode="horizontal"
  background-color="#545c64"
  text-color="#fff"
  active-text-color="#ffd04b">
  <el-menu-item index="1"><router-link tag="div" to="/square">问卷广场</router-link></el-menu-item>
  <el-menu-item index="2" ><router-link tag="div" to="/myself">我的问卷</router-link></el-menu-item>
  
  <div class="rightShow">
    <div class="img"><img src="images/bg.jpg" alt=""></div>
    <p>{{username}}</p>
  </div>
</el-menu>

  
    
    <transition mode="out-in">
      <router-view></router-view>
    </transition>
  
  </div>
</template>
<script>
export default {
  data() {
    return {
      activeIndex: '1',
      username: ''
    }
  },
  methods: {},
  mounted() {
    this.username =
      '欢迎' + JSON.parse(sessionStorage.getItem('username')) + '用户'
  }
}
</script>

<style scoped>
.pageM {
  width: 80%;
  margin: 0 auto;
}
.rightShow {
  position: absolute;
  width: 200px;
  height: 50px;
  top: 50%;
  left: 100%;
  transform: translate(-100%, -50%);
  display: flex;
  align-items: center;
  justify-content: center;
}
.img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  overflow: hidden;
}
.img img {
  width: 100%;
  height: 100%;
}
.rightShow p {
  padding: 0px;
  margin: 0px 5px;
  font-size: 16px;
  color: aliceblue;
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