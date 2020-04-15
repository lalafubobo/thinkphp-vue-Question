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


<style>
  .wrap-user-header {
    background-image: linear-gradient(to right, #922e63, #731852, #6c2474, #29104a);
  }

  .user-pic {
    border-top: none;
  }

  .user-pic .user-btn {
    padding: .3rem;
    border-bottom: none;
    background-color: transparent;
  }

  .user-pic .thumbnail {
    width: 1rem;
    height: 1rem;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    overflow: hidden;
  }

  .user-pic .pic {
    width: 100%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
  }

  .user-pic .item-title {
    padding-top: .1rem;
    color: #fff;
    margin-bottom: .15rem;
  }

  .user-pic .user-btn .item-text {
    padding-top: .02rem;
    margin-bottom: .05rem;
    color: #fff;
    font-size: .18rem;
  }

  .user-pic .user-btn .account-address {
    text-align: right;
    font-size: .16rem;
    color: #fff;
  }

  .user-pic .user-btn .account-address a {
    color: #fff;
  }

  .user-pic .user-btn .user-right {
    font-size: .16rem;
  }

  .user-nav {
    background-color: rgba(0, 0, 0, 0.1);
  }

  .user-nav .bui-btn {
    padding-top: .1rem;
    padding-bottom: .1rem;
    border: none;
    color: #fff;
    font-size: .2rem;
    background-color: transparent;
    border-right: 1px solid #7c1852;
  }

  .user-nav .bui-btn span {
    display: block;
    margin-bottom: .1rem;
    font-size: .4rem;
  }

  .user-nav .bui-btn:last-child {
    border-right: none;
  }

  /*内容区*/
  .panel-usercenter {
    margin-top: 0;
    margin-bottom: .2rem;
  }

  .panel-usercenter .panel-head-right {
    font-size: .18rem;
    color: #999;
  }

  .panel-usercenter .bui-panel-head>i {
    font-size: .4rem;
    margin-right: .1rem;
  }

  .panel-usercenter .icon-order {
    color: #ffd46f;
  }

  .panel-usercenter .icon-money {
    color: #f99c8a;
  }

  .nav-list .bui-btn {
    border: 0;
    padding-top: .2rem;
    padding-bottom: .2rem;
    color: #333;
  }

  .nav-list .bui-btn i {
    margin-bottom: .1rem;
  }

  .nav-list .bui-btn span {
    margin-bottom: .1rem;
  }

  .menu-list {
    margin-bottom: .2rem;
  }

  .menu-list .tips {
    font-size: .18rem;
    color: #999;
  }

  .menu-list .bui-btn {
    color: #333;
  }

  .menu-list .icon-service,
  .menu-list .icon-member,
  .menu-list .icon-guess {
    font-size: .4rem;
    margin-right: .15rem;
  }

  .menu-list .icon-service {
    color: #c4b3ea;
  }

  .menu-list .icon-member {
    color: #e8a4cb;
  }

  .menu-list .icon-guess {
    color: #76e7c9;
  }
</style>

<body>

  <div class="bui-page">
    <header>
      <div class="wrap-user-header">
        <ul class="bui-list user-pic">
          <li class="bui-btn bui-box user-btn">
            <div class="thumbnail"><img src="images/face.png" class="pic" alt=""></div>
            <div class="span1">
              <h3 class="item-title">王某某</h3>
              <p class="item-text">钻石用户</p>
              <div class="account-address">
                账户管理,收货地址<i class="icon-listright user-right"></i>
              </div>
            </div>
          </li>
        </ul>
        <ul class="bui-nav user-nav">
          <li class="bui-btn">
            <span>39</span>
            <div class="span1">关注的商品</div>
          </li>
          <li class="bui-btn">
            <span>7</span>
            <div class="span1">关注的店铺</div>
          </li>
          <li class="bui-btn">
            <span>185</span>
            <div class="span1">浏览记录</div>
          </li>
        </ul>
      </div>
    </header>
    <main>
      <div class="bui-panel panel-usercenter">
        <div class="bui-panel-head bui-box-align-middle">
          <i class="icon-order">&#xe62d;</i>
          <div class="span1">我的订单</div>
          <div class="panel-head-right">查看全部订单<i class="icon-listright"></i></div>
        </div>
        <div class="bui-panel-main">
          <ul class="bui-nav nav-list">
            <li class="bui-btn bui-box-vertical">
              <i class="icon-check"></i>
              <div class="span1">待付款</div>
            </li>
            <li class="bui-btn bui-box-vertical">
              <i class="icon-plus"></i>
              <div class="span1">待收款</div>
            </li>
            <li class="bui-btn bui-box-vertical">
              <i class="icon-face"></i>
              <div class="span1">
                待评价
              </div>
            </li>
            <li class="bui-btn bui-box-vertical">
              <i class="icon-unlock">
                <span class="bui-badges">1</span>
              </i>
              <div class="span1">
                返修/退还
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="bui-panel panel-usercenter">
        <div class="bui-panel-head bui-box-align-middle">
          <i class="icon-money">&#xe63a;</i>
          <div class="span1">我的钱包</div>
          <div class="panel-head-right">京东福卡,小金库<i class="icon-listright"></i></div>
        </div>
        <div class="bui-panel-main">
          <ul class="bui-nav nav-list">
            <li class="bui-btn bui-box-vertical">
              <span>0.00</span>
              <div class="span1">账户余额</div>
            </li>
            <li class="bui-btn bui-box-vertical">
              <span>4</span>
              <div class="span1">优惠券</div>
            </li>
            <li class="bui-btn bui-box-vertical">
              <span>639</span>
              <div class="span1">
                京豆
              </div>
            </li>
            <li class="bui-btn bui-box-vertical">
              <span>0</span>
              <div class="span1">
                京东卡/E卡
              </div>
            </li>
          </ul>
        </div>
      </div>

      <ul class="bui-list menu-list">
        <li class="bui-btn bui-box">
          <i class="icon-service">&#xe62a;</i>
          <div class="span1">服务与反馈</div>
          <span class="tips">意见反馈搬这儿了</span>
          <i class="icon-listright"></i>
        </li>
        <li class="bui-btn bui-box">
          <i class="icon-member">&#xe635;</i>
          <div class="span1">京东会员</div>
          <span class="tips">会员俱乐部</span>
          <i class="icon-listright"></i>
        </li>
      </ul>
      <ul class="bui-list menu-list">
        <li class="bui-btn bui-box">
          <i class="icon-guess">&#xe641;</i>
          <div class="span1">猜你喜欢</div>
          <i class="icon-listright"></i>
        </li>
      </ul>
    </main>
    <footer>
      <ul class="bui-nav footer-nav">
        <li class="bui-btn bui-box-vertical">
          <i class="icon-home"></i>
          <div class="span1">首页</div>
        </li>
        <li class="bui-btn bui-box-vertical">
          <i class="icon-search">
            <span class="bui-badges"></span>
          </i>
          <div class="span1">发现</div>
        </li>
        <li class="bui-btn bui-box-vertical">
          <i class="icon-shoppingcart"></i>
          <div class="span1">购物车</div>
        </li>
        <li class="bui-btn bui-box-vertical active">
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

    })
  </script>
</body>

</html>