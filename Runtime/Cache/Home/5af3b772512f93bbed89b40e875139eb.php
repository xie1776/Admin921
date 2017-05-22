<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>希望塔-xwta.net</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="__PUBLIC__/Home_Css/base.css" rel="stylesheet">
<link href="__PUBLIC__/Home_Css/index.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="__PUBLIC__/Home_Css/entry.css">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/sliders.js"></script>

    <style>
        header { width: 90%; margin: 20px auto; overflow: hidden; clear: both;border-bottom:1px solid #cccccc;padding-bottom: 20px; }
        /* 头部信息 */
        #topnav { width: 60%; background: #48AE15; height: 46px; line-height: 46px; text-align: center; border-radius: 46px; }
        #topnav a { display: inline-block; font-size: 18px; font-family: "Microsoft Yahei", Arial, Helvetica, sans-serif; padding: 0 20px; }
        #topnav a:hover { background: #fff; color: #000; }
        #topnav a { color: #FFF }
        #topnav_current { background: #F3FF41; }/* 高亮选中颜色 */
        a#topnav_current { color: #000 }
        .ft-copyright { color: #fff; line-height: 24px; }
        .ft-list { background: url(../images/ft-wx-s.png) no-repeat right; height: 100px }
        #title{border-bottom: 1px solid #E5E5E5;height: 70px;}
        .title{font-size: 28px;color:black;font-family: "宋体";color: black;text-align: center;height: 32px;font-weight: 700;}
        .toast{text-align: center;margin-top: 8px;}
        .toast span{margin-left: 10px;color:black;font-family: "楷体";font-size: 13px;}
        article { width: 80%; margin: 20px auto 50px; min-height: 80%;padding:20px 10px;border: 1px solid #E5E5E5;}
        .content{color:black;padding: 20px 0;}
        /*footer*/
        footer { background: #333; width: 100%; clear: both; text-align: center;position: fixed;bottom: 0; }
        #tbox { width: 54px; float: right; position: fixed; right: 30px; bottom: 30px; _position: absolute; _bottom: auto; _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||0)-(parseInt(this.currentStyle.marginBottom, 10)||0)));_margin-bottom: 15px; }
    </style>
</head>
<body>
<header>
  <div class="logo f_l"> <a href="/"><img src="__PUBLIC__/Images/logo.gif"></a> </div>
  <nav id="topnav" class="f_r">
    <ul>
      <a href="#" target="_blank">首页</a> 
      <a href="#" target="_blank">关于我</a> 
      <a href="#" target="_blank">文章</a> 
      <a href="#" target="_blank">心情</a> 
      <a href="#" target="_blank">相册</a> 
      <a href="#" target="_blank">留言</a>
    </ul>
    
  </nav>
</header>
<article>
    <div id="title">
        <div class="title"><?php echo ($info["title"]); ?></div>
        <div class="toast"><?php echo (date("Y-m-d H:i:s",$info["published"])); ?><span>来源：<?php echo ($info["source"]); ?></span> <span>作者：<?php echo ($info["author"]); ?></span></div>
    </div>
  <div class="entry content">
      <?php echo ($info["content"]); ?>
  </div>
</article>
<footer>
  <p class="ft-copyright">希望塔&nbsp;&nbsp;&copy; <?php echo date('Y');?> xwta.net All rights reserved</p>
  <div id="tbox"> <a id="togbook" href="javascript:;"></a> <a id="gotop" href="#"></a> </div>
</footer>
</body>
</html>