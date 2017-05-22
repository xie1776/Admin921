<?php

return array(
    /* 数据库设置 */
    'DB_DSN'=>'mysql://root:root@localhost:3306/admin',

    //改用线上数据
    // 'DB_TYPE'   => 'mysql', // 数据库类型
    // 'DB_HOST'   => 'rds8e52933d278457rl5.mysql.rds.aliyuncs.com', // 服务器地址
    // 'DB_NAME'   => 'r00949f37y', // 数据库名
    // 'DB_USER'   => 'xie1776', // 用户名
    // 'DB_PWD'    => 'Xie495290930', // 密码
    // 'DB_PORT'   => 3306, // 端口

    'DB_PREFIX'=>'pa_',


    'SHOW_PAGE_TRACE' => false,
    'TOKEN_ON' => true, // 是否开启令牌验证
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5', //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => FALSE, //令牌验证出错后是否重置令牌 默认为true
    /* 开发人员相关信息 */
    'AUTHOR_INFO' => array(
        'author' => 'zhibin.xie',
        'author_email' => 'zhibin3@qq.com',
    ),

    //分组设置
    'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
    'DEFAULT_GROUP'  => 'Home', //默认分组

    'SITE_INFO' => array ( 
        'name' => '通用内容管理系统后台', 
        'keyword' => '内容管理系统', 
        'description' => '分享自己写的php代码和收藏比较好的php代码，点滴PHP记录提升技术能力', 
        ), 
    'WEB_ROOT' => 'http://xwta.net/', 
    'AUTH_CODE' => '4Pfk4Z', 
    'ADMIN_AUTH_KEY' => 'admin@admin.com', 


    //站点配置
    'WEB' => array(
        'title' => 'xwta后台',
        'version' => '1.0',
        'icp' => '454545',
        'email' => 'zhibin3@qq.com',
        'phone' => '0791-5508527',
        'fax' => '0791-5508527',
        'address' => '江西省进贤县',
        'zipcode' => '371111',
        'keyword' => '内容管理系统',
        'description' => '分享自己写的php代码和收藏比较好的php代码，点滴PHP记录提升技术能力',
        ),

    //服务邮箱配置
    'EMAIL' => array(
        'smtp_host' => 'smtp.sina.cn',
        'smtp_port' => 25,
        'from_email' => 'jxxzb2010@sina.cn',
        'from_name' => 'zhibin.xie',
        'smtp_user' => 'jxxzb2010',
        'smtp_pass' => '495290930',
        'reply_email' => '',
        'reply_name' => '',
        'test_email' => '',
        ),

    //安全配置
    'TOKEN' => array ( 
        'admin_marked' => 'zhibin3@qq.com', 
        'admin_timeout' => 3600, 
        'member_marked' => 'http://xwta.net', 
        'member_timeout' => 3600, 
    ),

    'URL_MODEL' => 2,

    'LOAD_EXT_CONFIG' => 'city', //加载配置

    //reweite
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' =>array(
        'news/:id\d'=>'News/detail',
    ),
);


?>