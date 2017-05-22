<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台管理首页-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
        <?php $addCss=""; $addJs=""; $currentNav ='网站管理 > 系统信息'; ?>
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
                        <div class="current">系统信息</div>
                    </div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                        <?php if(is_array($server_info)): $k = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k%2==1) echo "<tr>"; ?>
                                <td width="120" align="right"><?php echo ($key); ?>：</td>
                                <td><?php echo ($vo); ?></td>
                                <?php if($k%2==0) echo "</tr>"; endforeach; endif; else: echo "" ;endif; ?>
                            <?php if(count($caches)%2==1) echo '<td>&nbsp;</td><td>&nbsp;</td></tr>'; ?>
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
        <script type="text/javascript">
            $(function(){
                //不再备份
                // $.post("<?php echo U('SysData/backup');?>", { systemBackup: 1 },function(json){
                //     if(json.status==1){
                //         popup.success(json.info,"系统定期备份成功提醒");
                //     }
                // });
            });
        </script>
    </body>
</html>