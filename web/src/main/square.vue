<template>
  <div class="square_page">
    


    <div class="square_subject">
          <div class="subject_top">
            <span>最新问卷</span>
          </div>
          <div class="subject_content">
              <el-row :gutter="12" style="margin-bottom: 10px;" v-for="item in question" :key="item.aid">
                  <el-col>
                    <el-card shadow="hover">
                      <el-row>
                          <el-col :span="22">
                            <p style="font-size:18px">{{item.atopic}}</p>
                            <el-row>
                              <el-col :span="3"><i class="el-icon-time" style="font-size:14px">&nbsp;{{item.adate}}</i></el-col>
                              <el-col  :span="3"><i class="el-icon-user" style="font-size:14px">&nbsp;{{item.aname}}</i></el-col>
                             </el-row>
                          </el-col>
                          <el-col :span="2" style="margin-top:15px"> <router-link :to="`/square/questItem/${item.aid}/${qid}/${item.atopic}/${item.aname}`" ><el-button type="primary" plain >{{message}}</el-button></router-link> </el-col>
                      </el-row>
                      

                    </el-card>
                  
                  </el-col>
              </el-row>
             
              
          </div>
    </div>
    <!-- <router-link to="/account/login" >登录</router-link>
      <router-link to="/account/register">注册</router-link>

      <router-view></router-view> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      question: [],
      message: '立即参与',
      test: 1,
      qid: []
    }
  },
  methods: {
    getQuestion() {
      let that = this
      this.$http
        .get('http://localhost/phpQuest/php/index.php/home/index/showQuest')
        .then(
          function(data) {
            console.log(data.body)
            data.body.forEach(element => {
              console.log(element)
              that.question.push(element)
            })
          },
          function(res) {
            console.log(res)
          }
        )
    },
    checkQuest() {
      let that = this
      this.$http
        .get('http://localhost/phpQuest/php/index.php/home/user/checkQuest', {
          params: { uid: this.uid }
        })
        .then(
          function(data) {
            console.log(data.body)
            data.body.forEach(element => {
              that.qid.push(element.qid)
            })
            console.log(that.qid)
          },
          function(res) {
            console.log(res)
          }
        )
    }
  },
  mounted() {
    this.uid = JSON.parse(sessionStorage.getItem('uid'))
    this.getQuestion()
    this.checkQuest()
  }
}
</script>

<style  scoped>
.square_page {
  width: 100%;
  height: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.square_subject {
  width: 90%;
  height: 90%;
}
.subject_top {
  width: 100%;
  height: 60px;
}
.subject_top span {
  display: inline-block;
  font-family: '微软雅黑';
  font-size: 18px;
  line-height: 36px;
  color: #3a3a3a;
  font-weight: 700;
}
.subject_content {
  width: 100%;
}
</style>