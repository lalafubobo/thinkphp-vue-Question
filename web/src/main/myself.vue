<template>
  <div class="myself_page"> 
    <div class="add_question" @click="addQ">
      <div class="ad_icon"> 
        <img src="images/add.png" alt="" srcset=""> 
          <p>新增问卷</p> 
        </div>
    </div>

    <div class="myQuest">
      <div class="myTop">
          <div class="topBox"></div>
          <span>&nbsp;发布的问卷</span> 
      </div>
      <div class="myContent">
        <!--  v-for="item in question" :key="item.aid" -->
         <el-row :gutter="12" style="margin-bottom: 10px;"  v-for="item in myCon" :key="item.aid">
                  <el-col>
                    <el-card shadow="always">
                      <el-row>
                          <el-col :span="22">
                            <p style="font-size:18px">{{item.atopic}}</p>
                            <el-row>
                              <el-col :span="3"><i class="el-icon-time" style="font-size:14px">&nbsp;{{item.adate}}</i></el-col>
                              <el-col  :span="3"><i class="el-icon-user" style="font-size:14px">&nbsp;{{item.aname}}</i></el-col>
                             </el-row>
                          </el-col>
                         
                      </el-row>
                    </el-card>
                  </el-col>
          </el-row>

      </div>
    </div>

    <div class="myQuest">
      <div class="myTop">
          <div class="topBox"></div>
          <span>&nbsp;参与的问卷</span> 
      </div>
      <div class="myContent">
        <!--  -->
         <el-row :gutter="12" style="margin-bottom: 10px;"  v-for="(item,i) in jonCon" :key="i">
                  <el-col>
                    <el-card shadow="always">
                     <el-row>
                          <el-col :span="22">
                            <p style="font-size:18px">{{item.atopic}}</p>
                            <el-row>
                              <el-col :span="3"><i class="el-icon-time" style="font-size:14px">&nbsp;{{item.adate}}</i></el-col>
                              <el-col  :span="3"><i class="el-icon-user" style="font-size:14px">&nbsp;{{item.aname}}</i></el-col>
                             </el-row>
                          </el-col>
                      </el-row>
                    </el-card>
                  </el-col>
          </el-row>
          
      </div>
    </div>

  </div>
</template>
<script>
export default {
  data() {
    return {
      myCon: [],
      name: '',
      uid: '',
      jonCon: []
    }
  },
  methods: {
    addQ() {
      var that = this
      var date = `${new Date().getFullYear()}-${new Date().getMonth() +
        1}-${new Date().getDate()}`
      this.$prompt('请先输入问卷主题', {
        confirmButtonText: '确定',
        cancelButtonText: '取消'
      })
        .then(({ value }) => {
          this.$http
            .get(
              'http://localhost/phpQuest/php/index.php/home/index/creatQuest',
              {
                params: { qname: value, qdate: date, uid: that.uid }
              }
            )
            .then(
              function(data) {
                that.myCon.splice(0, that.myCon.length)
                that.getMyCon()
              },
              function(res) {
                console.log(res)
              }
            )
          this.$message({
            type: 'success',
            message: '问卷: ' + value + '创建成功'
          })
        })
        .catch(() => {
          this.$message({
            type: 'info',
            message: '取消输入'
          })
        })
    },
    getMyCon() {
      let that = this
      this.$http
        .get(
          'http://localhost/phpQuest/php/index.php/home/index/getConByUser',
          {
            params: { username: this.name }
          }
        )
        .then(
          function(data) {
            data.body.forEach(element => {
              that.myCon.push(element)
            })
          },
          function(res) {
            console.log(res)
          }
        )
    },
    getJonCon() {
      // getJonByUser
      let that = this
      this.$http
        .get(
          'http://localhost/phpQuest/php/index.php/home/index/getJonByUser',
          {
            params: { username: this.name }
          }
        )
        .then(
          function(data) {
            data.body.forEach(element => {
              that.jonCon.push(element)
            })
          },
          function(res) {
            console.log(res)
          }
        )
    }
  },
  mounted() {
    this.name = JSON.parse(sessionStorage.getItem('username'))
    this.uid = JSON.parse(sessionStorage.getItem('uid'))
    this.getMyCon()
    this.getJonCon()
  }
}
</script>

<style scoped>
.myself_page {
  width: 90%;
  height: 500px;
  margin: 50px auto;
  /* border: 1px solid blue; */
}
.add_question {
  width: 180px;
  height: 180px;
  border-radius: 10px;
  box-shadow: 1px 1px 1px 2px rgb(207, 206, 206);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}
.ad_icon {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  text-align: center;
}
.ad_icon img {
  width: 100%;
  height: 100%;
}
.ad_icon p {
  font-size: 16px;
  color: #5e5e5e;
}
.myQuest {
  margin-top: 20px;
  width: 100%;
  height: atuo;
}
.myTop {
  width: 100%;
  height: 50px;
  display: flex;
  align-items: center;
  font-size: 18px;
  color: #5e5e5e;
}
.topBox {
  width: 10px;
  height: 30px;
  background: #409eff;
}
</style>