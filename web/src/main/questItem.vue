<template>
  <div class="content_page">

    <el-card class="box-card">
  <div slot="header" class="clearfix" style="font-size:20px;font-weight: 700; text-align: center; " >
    <span>{{this.$route.params.topic}}</span>
    <el-button style="float: right; padding: 3px 0" type="text"><el-tag>{{this.$route.params.name}}</el-tag></el-button>
  </div>
   <div v-for="(itec,i) in title" :key="itec.sname">
      <el-row class="row_top">
      {{itec.sname}}
      </el-row>
    <el-radio-group v-model="radio[i].title" >
      <el-row v-for="item in option" :key="item.oid" class="row_option">
          <el-radio  v-show="itec.sid==item.sid" :label="item.oid" > 
             {{item.oname}} 
           </el-radio>  
      </el-row>
    </el-radio-group>
       <el-divider></el-divider>
     </div> 
      <el-row :gutter="24">
           <el-col :span="4" :offset="10"><el-button type="primary"  size="medium" @click="submit">提交</el-button></el-col>
      </el-row>
    </el-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      qid: this.$route.params.id,
      uid: '',
      option: [],
      title: [],
      radio: [{ title: '1' }, { title: '1' }, { title: '1' }, { title: '1' }]
    }
  },
  methods: {
    getQuestItem() {
      let that = this
      this.$http
        .get('http://localhost/phpQuest/php/index.php/home/index/getTitle', {
          params: { Qid: this.qid }
        })
        .then(
          function(data) {
            console.log(data.body)
            let option = data.body.option
            option.forEach(element => {
              //console.log(element)
              element.forEach(ar => {
                // console.log(ar)
                that.option.push(ar)
              })
            })

            //console.log(that.option)

            let title = data.body.title
            title.forEach(element => {
              // console.log(element)
              that.title.push(element)
            })

            console.log(that.title)
          },
          function(res) {
            console.log(res)
          }
        )
    },
    submit() {
      let that = this
      this.$http
        .post(
          'http://localhost/phpQuest/php/index.php/home/user/submitQuest',
          {
            uid: that.uid,
            qid: that.qid
          },
          { emulateJSON: true }
        )
        .then(
          function(data) {
            console.log(data.body)
            if (data.body.status > 0) {
              this.$alert('问卷提交成功，将返回到首页', {
                confirmButtonText: '确定',
                callback: action => {
                  window.location.href = 'index.html'
                }
              })
            } else {
              console.log('失败！')
            }
          },
          function(res) {
            console.log(res)
          }
        )
    }
  },
  mounted() {
    this.uid = JSON.parse(sessionStorage.getItem('uid'))
    this.getQuestItem()
  }
}
</script>

<style scoped>
.content_page {
  width: 90%;
  height: auto;
  margin: 50px auto;
}
.row_top {
  font-size: 18px;
  margin: 10px;
}
.row_option {
  font-size: 16px;
  margin: 0px 10px;
}
</style>