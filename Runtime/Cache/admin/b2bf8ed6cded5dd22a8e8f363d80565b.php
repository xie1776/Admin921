<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>添加管理员-权限管理-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
        <?php $addCss=""; $addJs=""; $currentNav ='权限管理 > 添加管理员'; ?>
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
    <div class="wrap"> <div id="Top">
    <div class="logo">xwta</div>
    <div class="menu">
        <ul> <?php echo ($menu); ?> </ul>
    </div>
</div>
<div id="Tags">
    <div class="userPhoto"><!-- <img src="__PUBLIC__/Admin/Img/userPhoto.jpg" /> --> </div>
    <div class="navArea">
        <div class="userInfo"><div><a href="#" class="sysSet"><span>&nbsp;</span>系统设置</a> <a href="<?php echo U("Public/logout");?>" class="loginOut"><span>&nbsp;</span>退出系统</a></div>欢迎您，<?php echo ($my_info["email"]); ?> | <a href="#">个人信息管理</a></div>
        <div class="nav"><font id="today"><?php echo date("Y-m-d H:i:s"); ?></font>您的位置：<?php echo ($currentNav); ?></div>
    </div>
</div>
<div class="clear"></div>
        <div class="mainBody"> <style>
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
                <div class="contentArea">
                    <div class="Item hr">
                        <div class="current">新增城市</div>
                    </div>
                    <form action="" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                            <tr>
                                <td width="120">所属分类：</td>
                                <td>
                                    <select name="pid">
                                        <?php if(is_array($citys)): foreach($citys as $key=>$c): ?><option value="<?php echo ($c["id"]); ?>"><?php echo ($c["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="120">城市：</th>
                                <td><input name="city" type="text" class="input" size="40" value="<?php echo ($info["city"]); ?>" id="city"/> <input type="button" onclick="checkCity()" value="检测"> <span class="span-city"></span></td>
                            </tr>
                            <tr>
                                <th>城市编号：</th>
                                <td><input class="input" name="code" type="text" size="40" value="<?php echo ($info["code"]); ?>" placeholder="例如：bj" id="code"/> <input type="button" onclick="checkCode()" value="检测"> <span class="span-code"></span></td>
                            </tr>
    
                            <tr>
                                <th>城市区号：</th>
                                <td><input class="input" name="area_code" type="text" size="40" value="" /></td>
                            </tr>
                            <tr>
                                <th>城市拼音：</th>
                                <td><input class="input" name="citypy" type="text" size="40" value="" /> 例如：beijing</td>
                            </tr>
                        </table>
                        <!-- <input type="hidden" name="aid" value="<?php echo ($info["aid"]); ?>"/> -->
                    
                    <div class="commonBtnArea">
                        <!-- <button class="btn submit">提交</button> -->
                        <input type="submit" class="btn" value="提交" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<div id="Bottom">© <?php echo date('Y');?> xwta.net All rights reserved 联系我们 <?php echo ($site["SITE_INFO"]["icp"]); ?></div>
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
    function checkCity(){
        var city = $("#city").val();
        $.ajax({
            url:"<?php echo U('City/checkName');?>",
            data:"name="+city,
            type:"post",
            dataType:"json",
            success:function(res){
                var CObj = $(".span-city");
                if(res.status){
                    CObj.css({"color":"green",});
                }else{
                    CObj.css({"color":"red",});
                }
                CObj.html(res.info);
            }
        });
    }

    function checkCode(){
        var code = $("#code").val();
        $.ajax({
            url:"<?php echo U('City/checkCode');?>",
            data:"code="+code,
            type:"post",
            dataType:"json",
            success:function(res){
                var CObj = $(".span-code");
                if(res.status){
                    CObj.css({"color":"green",});
                }else{
                    CObj.css({"color":"red",});
                }
                CObj.html(res.info);
            }
        });
    }
</script>
</body>
</html>