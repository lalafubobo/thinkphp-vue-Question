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
            <li>
              <div class="bui-pic">
                <div class="bui-pic-img"><img src="/phpQuest/php/Public/<?php echo ($book["bookimg"]); ?>"></div>
                <div class="bui-pic-title">图片标题</div>
              </div>

              <div class="bui-panel">
                <div style="display: none;" bookid="<?php echo ($book["bookid"]); ?>" id="bookid">id:<?php echo ($book["bookid"]); ?></div>
                <div class="bui-panel-head">书名：<?php echo ($book["bookname"]); ?></div>
                <div class="bui-panel-head">分类：<?php echo ($book["typename"]); ?></div>
                <div class="bui-panel-head">价格：<?php echo ($book["bookprice"]); ?></div>
                <div class="bui-panel-head">
                  <div class="bui-box" count="<?php echo ($book["bookcount"]); ?>">
                    <div class="span1">
                      库存<?php echo ($book["bookcount"]); ?>
                    </div>
                    <div class="span1"></div>

                    <div class="span1">
                      <div class="bui-number" id="number"></div>
                      <a class></a>
                    </div>

                  </div>


                </div>
              </div>
            </li>

            <li class="bui-btn bui-box-align-right">
              <div class="bui-btn primary" id="addcart">加入购物车</div>
            </li>



          </ul>
        </div>
        <div class="bui-scroll-foot"></div>

        <div id="uiTab" class="bui-tab">
          <div class="bui-tab-head">
            <ul class="bui-nav">
              <!-- 分屏菜单 active 是激活的TAB样式 -->
              <li class="bui-btn active">详情</li>
              <li class="bui-btn">评价</li>
            </ul>
          </div>
          <div class="bui-tab-main">
            <ul>
              <li>
                第1屏
              </li>
              <li style="display:none;">
                第2屏
              </li>
            </ul>
          </div>
        </div>
      </div>


    </main>
    <footer>
      <!-- 底部内容 -->
      <ul class="bui-nav" ID="buinav">

        <li class="bui-btn bui-box-vertical active" href="index">
          <i class="icon-home"></i>
          <div class="span1">首页</div>
        </li>

        <li class="bui-btn bui-box-vertical" href="bookList">
          <i class="icon-edit"></i>
          <div class="span1">列表</div>
        </li>

        <li class="bui-btn bui-box-vertical" href="showcart">
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

      //  console.log($(".bui-panel .bui-box").attr("count"));

      var num = $(".bui-panel .bui-box").attr("count");

      // 这里写业务及控件初始化
      var uiNumber = bui.number({
        id: '#number',
        min: 1,
        //  max: num,
        onChange: function (e) {
          // console.log("onChange", e);
          if (e.value > num) {
            bui.hint("超过库存")
            uiNumber.value(num)
          }
        },


      });
      // 选项卡 js 初始化:
      var uiTab = bui.tab({
        id: "#uiTab"
      });

      bui.btn({ id: "#buinav", handle: ".bui-btn" }).load();

      $("#addcart").on("click", function () {
        var bookNum = uiNumber.value();
        var bookid = $("#bookid").attr("bookid");
        //  console.log(bookid);


        bui.ajax({
          url: "addcart",
          data: {
            bookNum, bookid
          },//接口请求的参数
          // 可选参数
          method: "POST"
        }).then(function (result) {
          // 成功
          console.log(result);
          bui.hint("添加成功")

        }, function (result, status) {
          // 失败 console.log(status)
        });
      })
    })
  </script>
</body>

</html>