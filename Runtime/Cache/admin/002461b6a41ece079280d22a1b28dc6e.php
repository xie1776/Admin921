<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>网站注册会员管理-后台管理首页-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
        <?php $addCss=""; $addJs=""; $currentNav ='网站注册会员管理 > 会员列表'; ?>
        <base href="<?php echo ($site["WEB_ROOT"]); ?>"/>
<link rel="stylesheet" href="__PUBLIC__/Admin/Css/base.css">
<link rel="stylesheet" href="__PUBLIC__/Admin/Css/layout.css">
<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css">
<script src="__PUBLIC__/Js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/Js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/Js/functions.js"></script>
<script src="__PUBLIC__/Admin/Js/base.js"></script>
<script src="__PUBLIC__/Js/jquery.form.js"></script>
<script src="__PUBLIC__/Js/asyncbox/asyncbox.js"></script>
    </head>
    <body>
        <div class="wrap">
            <div id="Top">
    <div class="logo">后台管理</div>
    <div class="menu">
        <ul> <?php echo ($menu); ?> </ul>
    </div>
</div>
<div id="Tags">
    <div class="userPhoto"><!-- <img src="__PUBLIC__/Admin/Img/userPhoto.jpg" /> --> </div>
    <div class="navArea">
        <div class="userInfo"><div><a href="<?php echo U('Webinfo/index');?>" class="sysSet"><span>&nbsp;</span>系统设置</a> <a href="<?php echo U("Public/logout");?>" class="loginOut"><span>&nbsp;</span>退出系统</a></div>欢迎您，<?php echo ($my_info["email"]); ?> | <a href="#">个人信息管理</a></div>
        <div class="nav"><font id="today"><?php echo date("Y-m-d H:i:s"); ?></font>您的位置：<?php echo ($currentNav); ?></div>
    </div>
</div>
<div class="clear"></div>
            <div class="mainBody">
                <style>
    .li_sub{background: #7AA5CD;margin-left: 8px;}
</style>
<div id="Left">
    <div id="control" class=""></div>
    <div class="subMenuList">
        <div class="itemTitle"><?php if(MODULE_NAME == 'Index'): ?>常用操作<?php else: ?>子菜单<?php endif; ?> </div>
        <ul>
            <?php if(is_array($sub_menu)): foreach($sub_menu as $key=>$sv): ?><li><a href="<?php echo ($sv["url"]); ?>"><?php echo ($sv["title"]); ?></a></li>
                <?php if($sv['sub'] != false): ?><ul>
                    <?php if(is_array($sv['sub'])): foreach($sv['sub'] as $k=>$s): ?><li class="li_sub"><a href="<?php echo ($s["url"]); ?>"><?php echo ($s["title"]); ?></a></li><?php endforeach; endif; ?>
                </ul><?php endif; endforeach; endif; ?>
        </ul>
    </div>
    <!-- <div class="QRcode">移动设备访问本页：<br/><br/><img src="<?php echo ($QRcodeUrl); ?>"/></div> -->
</div>
                <div id="Right">
                    <div class="Item hr">
                        <div class="current">网站注册会员管理</div>
                    </div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>邮箱</td>
                                <td>昵称</td>
                                <td>城市</td>
                                <td>验证邮箱</td>
                                <td width="150">操作</td>
                            </tr>
                        </thead>
                        <?php if(is_array($list)): foreach($list as $key=>$m): ?><tr align="center" id="<?php echo ($vo["uid"]); ?>">
                                <td><?php echo ($m["uid"]); ?></td>
                                <td><?php echo ($m["email"]); ?></td>
                                <td><?php echo ($m["nickname"]); ?></td>
                                <td><?php echo ($citys[$m['city']]); ?></td>
                                <td><?php if($m['verify_status'] == 0): ?><font color="red">未验证</font><?php else: ?><font color="green">已验证</font><?php endif; ?></td>
                                <td><a href="#" onclick="del()">删除</a></td>
                            </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div id="Bottom">© <?php echo date('Y');?> Admin.com All rights reserved 联系我们 <?php echo ($site["SITE_INFO"]["icp"]); ?></div>
<script type="text/javascript">
    $(window).resize(autoSize);
    $(function(){
        autoSize();
        $(".loginOut").click(function(){
            var url=$(this).attr("href");
            popup.confirm('你确定要退出吗？','你确定要退出吗',function(action){
                if(action == 'ok'){ window.location=url; }
            });
            return false;
        });

        var time=self.setInterval(function(){$("#today").html(date("Y-m-d H:i:s"));},1000);


    });

</script>
    </body>
</html>
<script>
    function del(){
        var url=$(this).attr("href");
            popup.confirm('你确定要删除？','删除',function(action){
                if(action == 'ok'){ window.location=url; }
        });
        return false;
    }
</script>