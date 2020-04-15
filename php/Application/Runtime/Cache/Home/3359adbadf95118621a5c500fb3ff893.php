<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>BUI</title>
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="/buiApp/Public/css/bui.css" />
  <link rel="stylesheet" href="/buiApp/Public/css/style.css" />
</head>

<body>
  <div class="bui-page">
    <header class="bui-bar">
      <div class="bui-bar-left">
        <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
      </div>
      <div class="bui-bar-main">注册</div>
      <div class="bui-bar-right">
        <!-- 右边按钮 -->
      </div>
    </header>
    <main>
      <!-- 正文内容 -->

      <li class="bui-btn bui-box clearactive">
        <label class="bui-label">账号:</label>
        <div class="span1">
          <div class="bui-input user-input">
            <input type="text" value="" placeholder="请输入" b-model="page.username">
          </div>
        </div>
      </li>

      <li class="bui-btn bui-box clearactive">
        <label class="bui-label">密码:</label>
        <div class="span1">
          <div class="bui-input user-input">
            <input type="password" value="" placeholder="请输入" b-model="page.password">
          </div>
        </div>
      </li>

      <li class="bui-btn bui-box clearactive">
        <label class="bui-label">确认密码:</label>
        <div class="span1">
          <div class="bui-input user-input">
            <input type="password" value="" placeholder="请输入" b-model="page.tPassword">
          </div>
        </div>
      </li>

      <li class="bui-btn bui-box clearactive">
        <label class="bui-label">手机号码:</label>
        <div class="span1">
          <div class="bui-input user-input">
            <input type="number" value="" placeholder="请输入" b-model="page.telNumber">
          </div>
        </div>
        <div class="span1">
          <label for="" class="bui-label ring primary-reverse" id="getmes">获取验证码</label>
        </div>
      </li>

      <li class="bui-btn bui-box clearactive">
        <label class="bui-label">验证码:</label>
        <div class="span1">
          <div class="bui-input user-input">
            <input type="password" value="" placeholder="请输入" b-model="page.message" v-model="page.password">
          </div>
        </div>
      </li>

      <div class="container-y">
        <div class="bui-box-space">
          <div class="span1">
            <div class="bui-btn round">重置</div>
          </div>
          <div class="span1">
            <div class="bui-btn round primary" id="submitRegister">注册</div>
          </div>
        </div>
      </div>

    </main>
    <footer>
      <!-- 底部内容 -->
    </footer>
  </div>
  <!-- 依赖库 手机调试的js引用顺序如下 -->
  <script src="/buiApp/Public/js/zepto.js"></script>
  <script src="/buiApp/Public/js/bui.js"></script>
  <script>
    bui.ready(function () {
      // 这里写业务及控件初始化

      var bs = bui.store({
        scope: "page",
        data: {
          username: "",
          password: '',
          tPassword: '',
          telNumber: '',
          message: '',
        }
      })

      $("#submitRegister").click(function () {

        // console.log(bs);
        if (bs.username == "") {
          bui.hint("账号不能为空");
          return;
        }
        if (bs.password != bs.tPassword) {
          bui.hint("两次密码不一致！");
          return;
        }

        bui.ajax({
          url: "useradd",
          data: bs.$data,//接口请求的参数
          // 可选参数
          method: "POST"
        }).then(function (result) {
          console.log(result.status);
          if (result.status == -1) {
            bui.hint("验证码错误")
            return;
          }
          if (result.status > 0) {
            bui.hint(
              {
                content: "注册成功",
                position: "center",
                onClose: function () {
                  window.location = "showlogin"
                }
              }
            )
          }

        }, function (result, status) {
          // 失败 console.log(status)
        });
      })


      $("#getmes").click(function () {
        if (bs.telNumber == "") {
          bui.hint("手机号未填写");
          return;
        }

        bui.ajax({
          url: "sendmsg",
          data: {
            tel: bs.telNumber
          },//接口请求的参数
          // 可选参数
          method: "POST"
        }).then(function (result) {
          // 成功
          console.log(result.code);
          $("#getmes").text("发送成功")
          // $("#getmes").prop(disabled, true)

        }, function (result, status) {
          console.log(status)
        });


      })
    })
  </script>
</body>

</html>