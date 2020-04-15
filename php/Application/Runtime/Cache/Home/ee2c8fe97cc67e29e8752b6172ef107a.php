<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>BUI</title>
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="/phpQuest/php/Public/css/bui.css" />
  <link rel="stylesheet" href="/phpQuest/php/Public/css/style.css" />
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
        <div class="bui-scroll-foot"></div>
      </div>

    </main>
    <footer>
      <!-- 底部内容 -->
      <ul class="bui-nav" id="buinav">

        <li class="bui-btn bui-box-vertical " href="index">
          <i class="icon-home"></i>
          <div class="span1">首页</div>
        </li>

        <li class="bui-btn bui-box-vertical active">
          <i class="icon-edit"></i>
          <div class="span1">列表</div>
        </li>

        <li class="bui-btn bui-box-vertical">
          <i class="icon-shoppingcart"></i>
          <div class="span1">购物车</div>
        </li>

        <li class="bui-btn bui-box-vertical">
          <i class="icon-user"></i>
          <div class="span1">我的</div>
        </li>

      </ul>

    </footer>
  </div>
  <!-- 依赖库 手机调试的js引用顺序如下 -->
  <script src="/phpQuest/php/Public/js/zepto.js"></script>
  <script src="/phpQuest/php/Public/js/bui.js"></script>
  <script>
    bui.ready(function () {
      // 这里写业务及控件初始化
      bui.btn({ id: "#buinav", handle: ".bui-btn" }).load()

      // 列表控件 js 初始化: 
      var uiList = bui.list({
        id: "#uiList",
        url: "http://localhost/buiApp/index.php/home/index/getbooklist",
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
          // console.log(data);

          data.forEach(function (el, index) {
            var param = { "bookid": el.bookid };

            var paramstr = JSON.stringify(param);
            //  console.log(paramstr);

            html += `<li class="bui-btn bui-box" href="getbook" param='${paramstr}'>
                      <div class="bui-thumbnail"><img src="/phpQuest/php/Public/${el.bookimg}" alt=""></div>
                      <div class="span1">
                          <h3 class="item-title">${el.bookname}</h3>
                          <p class="item-text">类型：${el.typename}</p>
                          <p class="item-text">数量：${el.bookcount}</p>
                      </div>
                      <span class="price"><i>￥</i>${el.bookprice}</span>
                  </li>`
          });

          return html;
        }
      });


      bui.btn({ id: "#uiList", handle: ".bui-btn" }).load();
    })
  </script>
</body>

</html>