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
      <div class="bui-bar-main">主页面</div>
      <div class="bui-bar-right">
        <!-- 右边按钮 -->
      </div>
    </header>
    <main>
      <h3>welcome</h3>
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

    })
  </script>
</body>

</html>