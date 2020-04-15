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
      <div class="bui-bar-main">用户登录</div>
      <div class="bui-bar-right">
        <!-- 右边按钮 -->
      </div>
    </header>
    <main>
      <!-- 正文内容 -->
      <!-- 列表控件 html 对应的结构:  -->
      <div id="uiList" class="bui-scroll">
        <div class="bui-scroll-head"></div>
        <div class="bui-scroll-main">
          <ul class="bui-list">

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

            <li>
              <div class="container-y">
                <div class="bui-box-space">
                  <div class="span1">
                    <div class="bui-btn round">重置</div>
                  </div>
                  <div class="span1">
                    <div class="bui-btn round primary" b-click="page.submit()">提交</div>
                  </div>
                </div>
              </div>
            </li>

            <li class="bui-btn bui-box">
              <div class="span1">
                <!-- 直接写名称，表示控制器的一个方法 -->
                <label class=" bui-box-center" href="register">注册</label>
              </div>

              <div class="span1">
                <label class=" bui-box-center" href="anonymous.html">游客登录</label>
              </div>

            </li>
          </ul>
        </div>
        <div class="bui-scroll-foot"></div>
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


      bui.btn({ id: ".bui-btn", handle: ".bui-box-center" }).load()
      var bs = bui.store({
        scope: "page",
        data: {
          username: '',
          password: ''
        },
        methods: {
          submit: function () {
            var username = bs.$data.username;
            var password = bs.$data.password;
            if (username == "" || password == "") {
              bui.hint("请填写数据")
            }
            else {
              bui.ajax({
                url: "login",
                data: {
                  username: username,
                  password: password
                },//接口请求的参数
                // 可选参数
                method: "POST"
              }).then(function (result) {
                console.log(result);
                if (result.data == 1) {
                  console.log("成功");
                  bui.hint(
                    {
                      content: "登录成功",
                      position: "center",
                      onClose: function () {
                        window.location = "../index/index"
                      }
                    }
                  )
                } else {
                  bui.hint("失败")
                }

                // 成功
              }, function (result, status) {
                console.log(result)

              });
            }
          }
        },
      });

      $("#chg").click(function () {
        bs.msg = "中午加鸡腿"
      })
    })
  </script>
</body>

</html>