<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
        <meta charset="utf-8">
        <title>登录-<?php echo ($site["name"]); ?></title>
        <base href="<?php echo ($site["WEB_ROOT"]); ?>"/>
        <link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css">
        <link rel="stylesheet" href="__PUBLIC__/Admin/Css/base.css">
        <script src="__PUBLIC__/Js/jquery-1.9.0.min.js"></script>
        <script src="__PUBLIC__/Js/functions.js"></script>
        <script src="__PUBLIC__/Js/jquery.form.js"></script>
        <script src="__PUBLIC__/Js/asyncbox/asyncbox.js"></script>
</head>

<body class="loginWeb">
    <div class="loginBox">
        <div class="innerBox">
            <div class="logo"> xwta后台系统 </div>
            <form id="form1" action="" method="post">
                <div class="loginInfo">
                    <ul>
                        <li class="row1">登录账号：</li>
                        <li class="row2"><input class="input" name="email" id="email" size="30" type="text" /></li>
                    </ul>
                    <ul>
                        <li class="row1">登录密码：</li>
                        <li class="row2"><input class="input" name="pwd" id="pwd" size="30" type="password" /></li>
                    </ul>
                    <ul>
                        <li class="row1">验证码：</li>
                        <li class="row2"><input class="input" id="verify_code" name="verify_code" type="text" style="width:100px;" /> <img src="<?php echo U('Public/verify_code');?>"  title="看不清？单击此处刷新" onclick="this.src+='?rand='+Math.random();"  style="cursor: pointer; vertical-align: middle;"/></li>
                    </ul>
                </div>
                <input type="hidden" name="op_type" id="op_type" value="1"/>
            </form>
            <div class="clear"></div>
            <div class="operation"><button class="btn submit">登录</button></div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $(".submit").click(function(){
                $("#op_type").val("1");
                if($("#email").val()==''||$("#pwd").val()==''||$("#verify_code").val()==''){
                    popup.alert("填写完整方可登陆");
                    return false;
                }
                commonAjaxSubmit();
            });
            $(".findPwd").click(function(){
                $("#op_type").val("2");
                if($("#email").val()==''){
                    popup.alert("填写了你的邮箱方可找回密码");
                    return false;
                }
                if($("#verify_code").val()==''){
                    popup.alert("请写验证码方可找回密码");
                    return false;
                }
                commonAjaxSubmit();
            });
        });
    </script>
</body>
</html>