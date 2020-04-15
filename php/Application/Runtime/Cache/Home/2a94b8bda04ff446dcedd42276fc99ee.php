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
        <!-- <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a> -->
      </div>
      <div class="bui-bar-main">fubobo的铺子</div>
      <div class="bui-bar-right">

      </div>
    </header>
    <main>
      <!-- 正文内容 -->

      <div id="uiSlide" class="bui-slide">
        <div class="bui-slide-main">
          <ul>

            <li>
              <!--第1屏-->
              <img src="/buiApp/Public/images/lbt1.jpg" alt="">
              <div class="bui-slide-title">死亡如风</div>
            </li>

            <li style="display:none;">
              <!--第2屏-->
              <img src="/buiApp/Public/images/lbt2.jpg" alt="">
              <div class="bui-slide-title">常伴吾身</div>
            </li>

            <li style="display:none;">
              <!--第3屏-->
              <img src="/buiApp/Public/images/lbt3.jpg" alt="">
              <div class="bui-slide-title">哈撒给</div>
            </li>
          </ul>
        </div>
      </div>


    </main>
    <footer>
      <!-- 底部内容 -->

      <ul class="bui-nav" ID="buinav">

        <li class="bui-btn bui-box-vertical active">
          <i class="icon-home"></i>
          <div class="span1">首页</div>
        </li>

        <li class="bui-btn bui-box-vertical" href="bookList">
          <i class="icon-edit"></i>
          <div class="span1">列表</div>
        </li>

        <li class="bui-btn bui-box-vertical">
          <i class="icon-shoppingcart"></i>
          <div class="span1">购物车</div>
        </li>

        <li class="bui-btn bui-box-vertical" id="userBtn">
          <i class="icon-user"></i>
          <div class="span1">我的</div>
        </li>

      </ul>
    </footer>
  </div>
  <!-- 依赖库 手机调试的js引用顺序如下 -->
  <script src="/buiApp/Public/js/zepto.js"></script>
  <script src="/buiApp/Public/js/bui.js"></script>
  <script>
    bui.ready(function () {
      // 这里写业务及控件初始化
      var uiSlide = bui.slide({
        id: "#uiSlide",
        height: 350,
        autopage: true,
        loop: true
      });
      uiSlide.start();

      bui.btn({ id: "#buinav", handle: ".bui-btn" }).load();

      $("#userBtn").on("click", function () {
        bui.ajax({
          url: "../user/getloginstate",
          data: {},//接口请求的参数
          // 可选参数
          method: "GET"
        }).then(function (result) {
          // 成功
          console.log(result);

          if (result.result == 1) {
            window.location = "../user/showuserinfo"
          } else {
            window.location = "../user/showlogin"
          }

        }, function (result, status) {
          // 失败 console.log(status)
        });
      })
    })
  </script>
</body>

</html>