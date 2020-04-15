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
      <div class="bui-bar-main">页面标题</div>
      <div class="bui-bar-right">
        <!-- 右边按钮 -->
        <!-- <a class="bui-btn"><i class="icon-remo"></i></a> -->
      </div>
    </header>
    <main>
      <!-- 正文内容 -->
      <!-- 列表控件 html 对应的结构:  -->
      <div id="uiList" class="bui-scroll">
        <div class="bui-scroll-head"></div>
        <div class="bui-scroll-main">
          <ul class="bui-list">
          </ul>
        </div>
        <div class="bui-scroll-foot">

        </div>
      </div>


    </main>
    <footer>
      <!-- 底部内容 -->
      <ul class="bui-nav">
        <li class="bui-btn">首页</li>
        <li class="bui-btn">
          <div class="bui-box bui-btn">
            <div class="span1">
              <div class="bui-btn danger" id="clearCart">清空购物车</div>
            </div>
          </div>
        </li>
        <li class="bui-btn">结算</li>
      </ul>
    </footer>
  </div>
  <!-- 依赖库 手机调试的js引用顺序如下 -->
  <script src="/buiApp/Public/js/zepto.js"></script>
  <script src="/buiApp/Public/js/bui.js"></script>
  <script>
    bui.ready(function () {
      // 这里写业务及控件初始化
      // 列表控件 js 初始化: 

      $("#clearCart").on("click", function () {
        bui.ajax({
          url: "clearcart",
          data: {},//接口请求的参数
          // 可选参数
          method: "GET"
        }).then(function (result) {
          // 成功
          bui.hint("清空成功")
          uiList.empty();
        }, function (result, status) {
          // 失败 console.log(status)
        });
      })
      var uiList = bui.list({
        id: "#uiList",
        url: "getcart",
        pageSize: 5,
        data: {},
        //如果分页的字段名不一样,通过field重新定义
        field: {
          page: "page",
          size: "pageSize",
          data: "data"
        },
        callback: function (e) { },
        template: function (data) {
          var html = "";
          var count = 0;
          data.forEach(function (el, index) {
            count += el.bookprice * el.number;
            html += `<li class="bui-btn bui-box">
                        <div class="bui-thumbnail"><img src="/buiApp/Public/${el.bookimg}" alt=""></div>
                        <div class="span1">
                            <h3 class="item-title">${el.bookname}</h3>
                            <p class="item-text">商品价格：${el.bookprice}</p>
                            <p class="item-text">购买数量：${el.number}</p>
                        </div>
                        <span class="price"><i>小计</i>${el.bookprice * el.number}</span>
                    </li>`
          });

          return html;
        }
      });
    })
  </script>
</body>

</html>