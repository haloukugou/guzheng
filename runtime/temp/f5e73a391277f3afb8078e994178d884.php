<?php /*a:5:{s:80:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\jishu\edit.html";i:1555339502;s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\head.html";i:1554291628;s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\left.html";i:1554291637;s:88:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\global_left.html";i:1554291629;s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\foot.html";i:1554291631;}*/ ?>
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @   版权所有-->
<!--开发：dj-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo htmlentities(app('lang')->get('v_admin_system')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="www. ">
    <link rel="stylesheet" href="/skin/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/skin/admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/skin/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="/skin/admin/css/skins/all-skins.min.css">
    <!--[if lt IE 9]>
    <script src="/skin/admin/js/html5shiv.min.js"></script>
    <script src="/skin/admin/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/skin/admin/css/global.min.css">
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <span class="logo">
            <span class="logo-mini" data-toggle="push-menu" role="button"><i class="fa fa-bars"></i></span>
            <span class="logo-lg"><a href="<?php echo url('index/index?lang='.input('lang')); ?>" class="pull-left mr-2"><i class="fa fa-home"></i> <?php echo htmlentities(app('lang')->get('v_admin_system')); ?></a> <span class="pull-right"><i class="fa fa-bars" data-toggle="push-menu" role="button"></i></span></span>
        </span>
        <nav class="navbar navbar-static-top">
            <a href="/" class="home hidden-sm hidden-md hidden-lg" target="_blank"><i class="fa fa-desktop"></i></a>
            <!--头部左侧横向菜单 开始-->
            <div class="hor-menu hidden-sm hidden-xs">
                <ul class="nav navbar-nav">
                    <li class="classic-menu-dropdown <?php echo htmlentities($home_current); ?>">
                        <a href="<?php echo url('index/index?lang='.input('lang')); ?>"><i class="fa fa-home"></i> <?php echo htmlentities(app('lang')->get('v_home')); if($home_current == 'active'): ?><span class="selected"></span><?php endif; ?>
                        </a>
                    </li>
                    <li class="classic-menu-dropdown <?php echo htmlentities($global_current); ?>">
                        <a href="<?php echo url('siteinfo/index?lang='.input('lang')); ?>"><i class="fa fa-globe"></i> <?php echo htmlentities(app('lang')->get('v_global')); if($global_current == 'active'): ?><span class="selected"></span><?php endif; ?>
                        </a>
                    </li>
                    <li class="classic-menu-dropdown"><a href="/" target="_blank"><i class="fa fa-desktop"></i> <?php echo htmlentities(app('lang')->get('v_homepage')); ?></a></li>
                </ul>
            </div>
            <!--头部左侧横向菜单 结束-->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!--清理缓存 开始-->
                    <li class="dropdown messages-menu">
                        <a href="<?php echo url('index/delCache?lang='.input('lang')); ?>" class="dropdown-toggle">
                            <i class="fa fa-refresh"></i><span class="hidden-xs"> <?php echo htmlentities(app('lang')->get('v_clean_cache')); ?></span>
                        </a>
                    </li>
                    <!--清理缓存 结束-->
                    <!--语言 开始-->
                    <?php if($languageNum > '1'): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo htmlentities($nowLang['ico']); ?>"><span class="hidden-xs"> <?php echo htmlentities($nowLang['admintitle']); ?></span> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if(is_array($headlang) || $headlang instanceof \think\Collection || $headlang instanceof \think\Paginator): $i = 0; $__LIST__ = $headlang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$headlang): $mod = ($i % 2 );++$i;if(app('request')->get('lang') != $headlang['mulu']): ?>
                                <li><a href="<?php echo url('index/index?lang='.$headlang['mulu']); ?>"><img src="<?php echo htmlentities($headlang['ico']); ?>"> <?php echo htmlentities($headlang['admintitle']); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!--语言 结束-->
                    <!--用户 开始-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="user-image" src="<?php echo input('session.avatar'); ?>" />
                            <span class="hidden-xs"><?php echo input('session.nickname'); ?></span> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo url('user/edit?lang='.input('lang').'&id='.input('session.userid')); ?>"><i class="fa fa-user"></i> <?php echo htmlentities(app('lang')->get('v_me_edit')); ?></a></li>
                            <li><a href="<?php echo url('login/logout'); ?>" onClick='return confirm("<?php echo htmlentities(app('lang')->get('v_confirm_quit')); ?>");'><i class="fa fa-power-off"></i> <?php echo htmlentities(app('lang')->get('v_logout')); ?></a></li>
                        </ul>
                    </li>
                    <!--用户 结束-->
                </ul>
            </div>
        </nav>
    </header>
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @   版权所有-->
<!--开发：dj-->
<link href="/skin/admin/css/sku.css" rel="stylesheet" />
<link href="/skin/admin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<!--百度编辑器开始-->
<script src="/skin/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
<?php if(!app('request')->isMobile()): ?>
    <script src="/skin/admin/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<?php else: ?>
    <script src="/skin/admin/ueditor/mobile.ueditor.all.min.js" type="text/javascript"></script>
<?php endif; if(app('request')->get('lang') == 'cn' or app('request')->get('lang') == 'tw'): ?>
<script type="text/javascript" charset="utf-8" src="/skin/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<?php else: ?>
<script type="text/javascript" charset="utf-8" src="/skin/admin/ueditor/lang/en/en.js"></script>
<?php endif; ?>
<!--百度编辑器结束-->
    <!--左侧 开始-->
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree" data-animation-speed="200">
                <!--有理想的地方，地狱都是天堂-->
<!--Copyright @   版权所有-->
<!--开发：dj-->
                <?php if(is_array($modulelist) || $modulelist instanceof \think\Collection || $modulelist instanceof \think\Paginator): $i = 0; $__LIST__ = $modulelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$moduleRs): $mod = ($i % 2 );++$i;$isdisplay_array=explode(',',$moduleRs['isdisplay']); ?>
                <li class="treeview <?php if($moduleRs['tabledir'] == app('request')->get('tabledir') or (app('request')->get('tabledir') == 'Spec' and app('request')->get('moduletable') == $moduleRs['tabledir'])): ?>active menu-open<?php endif; ?>">
                    <a href="javascript:;">
                        <i class="fa fa-dot-circle-o text-<?php echo htmlentities($key); ?>"></i> <span><?php echo htmlentities($moduleRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--是否显示添加信息-->
                        <?php if(in_array(('addinfo'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?>
                            <li class="<?php if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == $moduleRs['tabledir'] and $action == 'edit'): ?>active<?php endif; ?>">
                                <a href="<?php echo url($moduleRs['tabledir'].'/edit?tabledir='.$moduleRs['tabledir'].'&lang='.input('lang')); ?>">
                                    <i class="fa fa-edit"></i>
                                    <?php echo htmlentities(app('lang')->get('v_add')); ?> <?php echo htmlentities($moduleRs['title']); if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == $moduleRs['tabledir'] and $action == 'edit'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!--信息管理-->
                        <li class="<?php if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == $moduleRs['tabledir'] and $action == 'index'): ?>active<?php endif; ?>">
                            <a href="<?php echo url($moduleRs['tabledir'].'/index?tabledir='.$moduleRs['tabledir'].'&lang='.input('lang').'&signid=1'); ?>">
                                <i class="fa fa-list-ul"></i>
                                <?php echo htmlentities($moduleRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == $moduleRs['tabledir'] and $action == 'index'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?>
                            </a>
                        </li>
                        <!--是否显示分类-->
                        <?php if(in_array(('sort'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?>
                            <li class="<?php if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == 'Sort'): ?>active<?php endif; ?>">
                                <a href="<?php echo url('sort/index?tabledir='.$moduleRs['tabledir'].'&lang='.input('lang')); ?>">
                                    <i class="fa fa-sitemap"></i>
                                    <?php echo htmlentities($moduleRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_sort')); if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == 'Sort'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!--是否显示属性-->
                        <?php if(in_array(('attribute'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?>
                            <li class="<?php if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == 'Attribute' and app('request')->get('moduletable') != 'Spec'): ?>active<?php endif; ?>">
                                <a href="<?php echo url('attribute/index?tabledir='.$moduleRs['tabledir'].'&lang='.input('lang')); ?>">
                                    <i class="fa fa-tag"></i>
                                    <?php echo htmlentities($moduleRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_attribute')); if($moduleRs['tabledir'] == app('request')->get('tabledir') and $controller == 'Attribute' and app('request')->get('moduletable') != 'Spec'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!--规格-->
                        <?php if(in_array('spec',$isdisplay_array) and !in_array($moduleRs['module'],array('About','News'))): ?>
                            <li class="<?php if($moduleRs['tabledir'] == app('request')->get('tabledir') and ($controller == 'Spec' or app('request')->get('moduletable') == 'Spec')): ?>active<?php endif; ?>">
                                <a href="<?php echo url('spec/index?tabledir='.$moduleRs['tabledir'].'&lang='.input('lang')); ?>">
                                    <i class="fa fa-puzzle-piece"></i>
                                    <?php echo htmlentities($moduleRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_spec')); if($moduleRs['tabledir'] == app('request')->get('tabledir') and ($controller == 'Spec' or app('request')->get('moduletable') == 'Spec')): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="sidebar-menu hidden-sm hidden-md hidden-lg" data-widget="tree" data-animation-speed="200">
                <!--有理想的地方，地狱都是天堂-->
<!--Copyright @   版权所有-->
<!--开发：dj-->
                <li class="treeview 
                    <?php switch($controller): case "Siteinfo":case "Guestbook":case "User":case "Area":case "Field":case "Chat":case "Keywordlink":case "Ad":case "Navigation":case "Comment":case "Module":case "Filemanage":case "Attribute": ?>active menu-open<?php break; ?>
                    <?php endswitch; ?>">
                    <a href="javascript:;">
                        <i class="fa fa-globe"></i> <span><?php echo htmlentities(app('lang')->get('v_global')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--全局管理 开始-->
                        <!--网站设置-->
                        <?php if(app('config')->get('app.isdisplay.siteinfo') == '1'): ?>
                            <li class="<?php if($controller == 'Siteinfo'): ?>active<?php endif; ?>">
                                <a href="<?php echo url('siteinfo/index?lang='.input('lang')); ?>"><i class="fa fa-gear"></i> <?php echo htmlentities(app('lang')->get('v_siteinfo')); if($controller == 'Siteinfo'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                            </li>
                        <?php endif; ?>
                        <!--字段-->
                        <?php if(app('config')->get('app.isdisplay.field') == '1'): ?>
                        <li class="<?php if($controller == 'Field'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('field/index?lang='.input('lang')); ?>"><i class="fa fa-list-alt"></i> <?php echo htmlentities(app('lang')->get('v_field')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Field'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--留言-->
                        <?php if(app('config')->get('app.isdisplay.guestbook') == '1'): ?>
                        <li class="<?php if($controller == 'Guestbook' or ($controller == 'Attribute' and input('tabledir') == 'Guestbook')): ?>active<?php endif; ?>">
                            <a href="<?php echo url('guestbook/index?lang='.input('lang').'&signid=3'); ?>"><i class="fa fa-commenting-o"></i> <?php echo htmlentities(app('lang')->get('v_guestbook')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Guestbook' or ($controller == 'Attribute' and input('tabledir') == 'Guestbook')): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--客服-->
                        <?php if(app('config')->get('app.isdisplay.chat') == '1'): ?>
                        <li class="<?php if($controller == 'Chat' or ($controller == 'Attribute' and input('tabledir') == 'Chat')): ?>active<?php endif; ?>">
                            <a href="<?php echo url('chat/index?lang='.input('lang')); ?>"><i class="fa fa-user-circle-o"></i> <?php echo htmlentities(app('lang')->get('v_chat')); if($controller == 'Chat' or ($controller == 'Attribute' and input('tabledir') == 'Chat')): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--广告-->
                        <?php if(app('config')->get('app.isdisplay.ad') == '1'): ?>
                        <li class="<?php if($controller == 'Ad' or ($controller == 'Attribute' and input('tabledir') == 'Ad')): ?>active<?php endif; ?>">
                            <a href="<?php echo url('ad/index?att_type=banner&lang='.input('lang')); ?>"><i class="fa fa-bullhorn"></i> <?php echo htmlentities(app('lang')->get('v_ad')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Ad' or ($controller == 'Attribute' and input('tabledir') == 'Ad')): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--关键词-->
                        <?php if(app('config')->get('app.isdisplay.keyword') == '1'): ?>
                        <li class="<?php if($controller == 'Keywordlink'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('keywordlink/index?lang='.input('lang')); ?>"><i class="fa fa-flag"></i> <?php echo htmlentities(app('lang')->get('v_keyword')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Keywordlink'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--导航-->
                        <?php if(app('config')->get('app.isdisplay.navigation') == '1'): ?>
                        <li class="<?php if($controller == 'Navigation' or ($controller == 'Attribute' and input('tabledir') == 'Navigation')): ?>active<?php endif; ?>">
                            <a href="<?php echo url('navigation/index?lang='.input('lang')); ?>"><i class="fa fa-navicon"></i> <?php echo htmlentities(app('lang')->get('v_navigation')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Navigation' or ($controller == 'Attribute' and input('tabledir') == 'Navigation')): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--地区-->
                        <?php if(app('config')->get('app.isdisplay.area') == '1'): ?>
                        <li class="<?php if($controller == 'Area'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('area/index?lang='.input('lang')); ?>"><i class="fa fa-map-marker"></i> <?php echo htmlentities(app('lang')->get('v_area')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Area'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--评论-->
                        <?php if(app('config')->get('app.isdisplay.comment') == '1'): ?>
                        <li class="<?php if($controller == 'Comment'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('comment/index?lang='.input('lang').'&signid=3'); ?>"><i class="fa fa-comments"></i> <?php echo htmlentities(app('lang')->get('v_comment')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Comment'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--管理员-->
                        <?php if(app('config')->get('app.isdisplay.user') == '1'): ?>
                        <li class="<?php if($controller == 'User'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('user/index?lang='.input('lang')); ?>"><i class="fa fa-user"></i> <?php echo htmlentities(app('lang')->get('v_user')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'User'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--模块-->
                        <li class="<?php if($controller == 'Module'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('module/index?lang='.input('lang')); ?>"><i class="fa fa-cubes"></i> <?php echo htmlentities(app('lang')->get('v_module')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Module'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <!--文件-->
                        <?php if(app('config')->get('app.isdisplay.filemanage') == '1'): ?>
                        <li class="<?php if($controller == 'Filemanage'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('filemanage/index?lang='.input('lang')); ?>"><i class="fa fa-folder"></i> <?php echo htmlentities(app('lang')->get('v_document')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Filemanage'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <!--全局管理 结束-->
                <?php if(app('config')->get('app.isdisplay.parameter') == 1 or app('config')->get('app.isdisplay.databackup') == 1 or app('config')->get('app.isdisplay.authgroup') == 1 or app('config')->get('app.isdisplay.authrule') == 1 or app('config')->get('app.isdisplay.language') == 1 or app('config')->get('app.isdisplay.templatemanage') == 1): ?>
                <!--系统管理 开始-->
                <li class="treeview 
                    <?php switch($controller): case "AuthGroup":case "AuthRule":case "Language":case "Config":case "Databackup":case "Templatemanage": ?>active menu-open<?php break; ?>
                    <?php endswitch; ?>">
                    <a href="javascript:;">
                        <i class="fa fa-gears"></i> <span><?php echo htmlentities(app('lang')->get('v_system_manage')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--参数设置-->
                        <?php if(app('config')->get('app.isdisplay.parameter') == '1'): ?>
                        <li class="<?php if($controller == 'Config'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('config/index?lang='.input('lang')); ?>"><i class="fa fa-cogs"></i> <?php echo htmlentities(app('lang')->get('v_config_setting')); if($controller == 'Config'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--数据库-->
                        <?php if(app('config')->get('app.isdisplay.databackup') == '1'): ?>
                        <li class="<?php if($controller == 'Databackup'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('databackup/index?lang='.input('lang')); ?>"><i class="fa fa-database"></i> <?php echo htmlentities(app('lang')->get('v_data')); ?> <?php echo htmlentities(app('lang')->get('v_backup')); if($controller == 'Databackup'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--权限组-->
                        <?php if(app('config')->get('app.isdisplay.authgroup') == '1'): ?>
                        <li class="<?php if($controller == 'AuthGroup'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('authGroup/index?lang='.input('lang')); ?>"><i class="fa fa-users"></i> <?php echo htmlentities(app('lang')->get('v_authgroup')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'AuthGroup'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--权限-->
                        <?php if(app('config')->get('app.isdisplay.authrule') == '1'): ?>
                        <li class="<?php if($controller == 'AuthRule'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('authRule/index?lang='.input('lang')); ?>"><i class="fa fa-briefcase"></i> <?php echo htmlentities(app('lang')->get('v_auth')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'AuthRule'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--语言-->
                        <?php if(app('config')->get('app.isdisplay.language') == '1'): ?>
                        <li class="<?php if($controller == 'Language'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('language/index?lang='.input('lang')); ?>"><i class="fa fa-language"></i> <?php echo htmlentities(app('lang')->get('v_language')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Language'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                        <!--模板-->
                        <?php if(app('config')->get('app.isdisplay.templatemanage') == '1'): ?>
                        <li class="<?php if($controller == 'Templatemanage'): ?>active<?php endif; ?>">
                            <a href="<?php echo url('templatemanage/index?lang='.input('lang')); ?>"><i class="fa fa-file-text"></i> <?php echo htmlentities(app('lang')->get('v_template')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); if($controller == 'Templatemanage'): ?><i class="fa fa-angle-right pull-right"></i><?php endif; ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <!--系统管理 结束-->
                <?php endif; ?>
            </ul>
        </section>
    </aside>
    <!--左侧 结束-->
    <!--右侧 开始-->
    <div class="content-wrapper">
        <!--导航 开始-->
        <div>
            <ol class="breadcrumb">
                <li><?php echo htmlentities(app('lang')->get('v_home')); ?></li>
                <li><?php echo htmlentities($mRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></li>
                <li><?php if(empty($rs['id']) || (($rs['id'] instanceof \think\Collection || $rs['id'] instanceof \think\Paginator ) && $rs['id']->isEmpty())): ?><?php echo htmlentities(app('lang')->get('v_add')); else: ?><?php echo htmlentities(app('lang')->get('v_edit')); ?><?php endif; ?> <?php echo htmlentities($mRs['title']); ?></li>
            </ol>
        </div>
        <!--导航 结束-->
        <!--内容 开始-->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <form name="form1" action="<?php echo url('jishu/index?tabledir='.input('tabledir').'&lang='.input('lang').'&signid=1'); ?>" method="post">
                        <input type="hidden" name="lang" value="<?php echo input('lang'); ?>">
                        <input type="hidden" name="tabledir" value="<?php echo input('tabledir'); ?>">
                        <div class="col-md-8 mb-2">
                            <div class="row">
                                <a class="btn btn-default mb-2 mr-2" href="<?php echo url('jishu/index?tabledir='.input('tabledir').'&lang='.input('lang').'&signid=1'); ?>"><i class="fa fa-eye"></i> <?php echo htmlentities(app('lang')->get('v_show')); ?></a>
                                <a class="btn btn-default mb-2 mr-2" href="<?php echo url('jishu/index?tabledir='.input('tabledir').'&lang='.input('lang').'&signid=2'); ?>"><i class="fa fa-eye-slash"></i> <?php echo htmlentities(app('lang')->get('v_no_sale')); ?></a>
                                <a class="btn btn-default mb-2 mr-2" href="<?php echo url('jishu/index?tabledir='.input('tabledir').'&lang='.input('lang').'&signid=9'); ?>"><i class="fa fa-recycle"></i> <?php echo htmlentities(app('lang')->get('v_recycle')); ?></a>
                                <a class="btn btn-success mb-2" href="<?php echo url('jishu/edit?tabledir='.input('tabledir').'&lang='.input('lang')); ?>"><i class="fa fa-plus-circle"></i> <?php echo htmlentities(app('lang')->get('v_add')); ?> <?php echo htmlentities($mRs['title']); ?></a>
                            </div>
                        </div>
                        <div class="col-md-4 input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="<?php echo htmlentities(app('lang')->get('v_quickfind')); ?>" />
                            <span class="input-group-btn"><button type="submit" class="btn btn-success"><i class="fa fa-search"></i> <?php echo htmlentities(app('lang')->get('v_search')); ?></button></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <?php $isdisplay_array=explode(',',$navModuleRs['isdisplay']); ?>
                <ul class="nav nav-tabs pull-right">
                    <?php if(in_array(('spec'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><li><a href="#tab_spec" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_spec')); ?></a></li><?php endif; if(in_array(('attribute'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><li><a href="#tab_attribute" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_attribute')); ?></a></li><?php endif; ?>
                    <li><a href="#tab_extend" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_extend')); ?></a></li>
                    <li class="active"><a href="#tab_general" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_basic')); ?></a></li>
                    <li class="pull-left header"><i class="fa fa-edit"></i> <?php if(empty($rs['id']) || (($rs['id'] instanceof \think\Collection || $rs['id'] instanceof \think\Paginator ) && $rs['id']->isEmpty())): ?><?php echo htmlentities(app('lang')->get('v_add')); else: ?><?php echo htmlentities(app('lang')->get('v_edit')); ?><?php endif; ?> <?php echo htmlentities($mRs['title']); ?></li>
                </ul>
                <form name="editform" id="editform" method="post" action="" class="form-horizontal box-body">
                    <input type="hidden" name="id" value="<?php echo htmlentities($rs['id']); ?>">
                    <input type="hidden" name="lang" value="<?php echo input('lang'); ?>">
                    <input type="hidden" name="tabledir" value="<?php echo input('tabledir'); ?>">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_general">
                            <div class="form-group <?php if(!in_array(('sort'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?>hidden<?php endif; ?>">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_sort')); ?></div>
                                <div class="col-md-5">
                                    <select name="sortid" class="form-control">
                                        <?php if(in_array(('sort'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><option value="" <?php if(empty($rs['id']) || (($rs['id'] instanceof \think\Collection || $rs['id'] instanceof \think\Paginator ) && $rs['id']->isEmpty())): ?>selected="selected"<?php endif; ?>><?php echo htmlentities(app('lang')->get('v_sort_check')); ?></option><?php endif; if(is_array($Sort) || $Sort instanceof \think\Collection || $Sort instanceof \think\Paginator): if( count($Sort)==0 ) : echo "" ;else: foreach($Sort as $key=>$k): ?>
                                            <option value="<?php echo htmlentities($k['id']); ?>" <?php if($rs['sortid'] == $k['id']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($k['html']); ?> <?php echo htmlentities($k['title']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label text-red"><?php echo htmlentities(app('lang')->get('v_title')); ?> *</div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="title" id="title" onblur="strtopy();" value="<?php echo htmlentities($rs['title']); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_seo')); ?> <?php echo htmlentities(app('lang')->get('v_title')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="seotitle" value="<?php echo htmlentities($rs['seotitle']); ?>" placeholder="<?php echo htmlentities(app('lang')->get('v_seo_use_title')); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_keyword')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="keyword" value="<?php echo htmlentities($rs['keyword']); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_description')); ?></div>
                                <div class="col-md-5">
                                    <textarea name="description" rows="4" class="form-control"><?php echo htmlentities($rs['description']); ?></textarea>
                                </div>
                            </div>
                            <?php if(in_array('thumb',$isdisplay_array)): ?>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_img')); ?></div>
                                    <div class="col-md-5">
                                        <div class="input-group"><input name="thumb" id="morepics1" type="text" class="form-control" value="<?php echo htmlentities($rs['thumb']); ?>" /> <span class="input-group-btn"><button type="button" class="btn btn-success" onclick="upImage('morepics1');"><small><i class="fa fa-cloud-upload"></i></small> <?php echo htmlentities(app('lang')->get('v_upload_img')); ?></button></span></div>
                                    </div>
                                </div>
                            <?php endif; ?><!--更多图片-->
                            <?php if(in_array('morepics',$isdisplay_array)): ?>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_more_img')); ?></div>
                                    <div class="col-md-5">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="tab1">
                                            <?php if(empty($rs['morepics']) || (($rs['morepics'] instanceof \think\Collection || $rs['morepics'] instanceof \think\Paginator ) && $rs['morepics']->isEmpty())): ?>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="morepics[]" id="morepics2" value="<?php echo htmlentities($rs['morepics']); ?>" class="form-control">
                                                            <span class="input-group-btn">
                                                                <button type="button" onClick="upImage('morepics2');" class="btn btn-success"><small><i class="fa fa-cloud-upload"></i></small> <?php echo htmlentities(app('lang')->get('v_upload_img')); ?></button>
                                                                <button type="button" class="btn btn-info" onClick="javascript:AddRow('tab1','delbutton1','upImage','morepics','<?php echo htmlentities($morepicsNum); ?>','<?php echo htmlentities(app('lang')->get('v_upload_img')); ?>');"><i class="fa fa-plus-circle"></i> <?php echo htmlentities(app('lang')->get('v_add_one')); ?></button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>                        
                                            <?php else: if(is_array($morepics) || $morepics instanceof \think\Collection || $morepics instanceof \think\Paginator): $i = 0; $__LIST__ = $morepics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?>
                                                    <tr>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="morepics[]" id="morepics<?php echo htmlentities($i); ?>" value="<?php echo htmlentities($img); ?>" class="form-control">
                                                                <span class="input-group-btn">
                                                                    <button type="button" onClick="upImage('morepics<?php echo htmlentities($i); ?>');" class="btn btn-success"><small><i class="fa fa-cloud-upload"></i></small> <?php echo htmlentities(app('lang')->get('v_upload_img')); ?></button>
                                                                    <?php if($i == '1'): ?>
                                                                        <button type="button" class="btn btn-info" onClick="javascript:AddRow('tab1','delbutton1','upImage','morepics','<?php echo htmlentities($morepicsNum); ?>','<?php echo htmlentities(app('lang')->get('v_upload_img')); ?>');"><i class="fa fa-plus-circle"></i> <?php echo htmlentities(app('lang')->get('v_add_one')); ?></button>
                                                                    <?php else: ?>
                                                                        <label class="btn btn-danger"><input type="checkbox" class="hidden" id="delbutton1" onClick="javascript:DelRow('tab1','delbutton1');" /><i class="fa fa-trash"></i> <?php echo htmlentities(app('lang')->get('v_delete_this')); ?></label>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>                        
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; if(in_array('fileurl',$isdisplay_array)): ?>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_upload_file')); ?></div>
                                    <div class="col-md-5">
                                        <div class="input-group"><input name="fileurl" id="morefileurl1" type="text" class="form-control" value="<?php echo htmlentities($rs['fileurl']); ?>" /> <span class="input-group-btn"><button type="button" class="btn btn-success" onclick="upFiles('morefileurl1');"><small><i class="fa fa-cloud-upload"></i></small> <?php echo htmlentities(app('lang')->get('v_upload_file')); ?></button></span></div>
                                    </div>
                                </div>
                            <?php endif; ?><!--更多附件-->
                            <?php if(in_array('morefiles',$isdisplay_array)): ?>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_more_file')); ?></div>
                                    <div class="col-md-5">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="tab2">
                                            <?php if(empty($rs['morefileurl']) || (($rs['morefileurl'] instanceof \think\Collection || $rs['morefileurl'] instanceof \think\Paginator ) && $rs['morefileurl']->isEmpty())): ?>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="morefileurl[]" id="morefileurl2" value="<?php echo htmlentities($rs['morefileurl']); ?>" class="form-control">
                                                            <span class="input-group-btn">
                                                                <button type="button" onClick="upFiles('morefileurl2');" class="btn btn-success"><small><i class="fa fa-cloud-upload"></i></small> <?php echo htmlentities(app('lang')->get('v_upload_file')); ?></button>
                                                                <button type="button" class="btn btn-info" onClick="javascript:AddRow('tab2','delbutton2','upFiles','morefileurl','<?php echo htmlentities($morefilesNum); ?>','<?php echo htmlentities(app('lang')->get('v_upload_file')); ?>');"><i class="fa fa-plus-circle"></i> <?php echo htmlentities(app('lang')->get('v_add_one')); ?></button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>                        
                                            <?php else: if(is_array($morefileurl) || $morefileurl instanceof \think\Collection || $morefileurl instanceof \think\Paginator): $i = 0; $__LIST__ = $morefileurl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?>
                                                    <tr>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="morefileurl[]" id="morefileurl<?php echo htmlentities($i); ?>" value="<?php echo htmlentities($file); ?>" class="form-control">
                                                                <span class="input-group-btn">
                                                                    <button type="button" onClick="upFiles('morefileurl<?php echo htmlentities($i); ?>');" class="btn btn-success"><small><i class="fa fa-cloud-upload"></i></small> <?php echo htmlentities(app('lang')->get('v_upload_file')); ?></button>
                                                                    <?php if($i == '1'): ?>
                                                                        <button type="button" class="btn btn-info" onClick="javascript:AddRow('tab2','delbutton2','upFiles','morefileurl','<?php echo htmlentities($morefilesNum); ?>','<?php echo htmlentities(app('lang')->get('v_upload_file')); ?>');"><i class="fa fa-plus-circle"></i> <?php echo htmlentities(app('lang')->get('v_add_one')); ?></button>
                                                                    <?php else: ?>
                                                                        <label class="btn btn-danger"><input type="checkbox" class="hidden" id="delbutton2" onClick="javascript:DelRow('tab2','delbutton2');" /><i class="fa fa-trash"></i> <?php echo htmlentities(app('lang')->get('v_delete_this')); ?></label>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>                        
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; if(in_array('morecontents',$isdisplay_array)): ?>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_content_a')); ?></div>
                                    <div class="col-md-9">
                                        <button type="button" name="ShowUeditor1" id="ShowUeditor1" onclick="ShowUeditor1a();" class="btn btn-success btn-sm" /><?php echo htmlentities(app('lang')->get('v_editor_showornot')); ?></button>
                                        <textarea name="content1" id="content1a" style="width:100%; height:350px; display:none;"><?php echo htmlentities($rs['content1']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_content_b')); ?></div>
                                    <div class="col-md-9">
                                        <button type="button" name="ShowUeditor2" id="ShowUeditor2" onclick="ShowUeditor2a();" class="btn btn-success btn-sm" /><?php echo htmlentities(app('lang')->get('v_editor_showornot')); ?></button>
                                        <textarea name="content2" id="content2a" style="width:100%; height:350px; display:none;"><?php echo htmlentities($rs['content2']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_content_c')); ?></div>
                                    <div class="col-md-9">
                                        <button type="button" name="ShowUeditor3" id="ShowUeditor3" onclick="ShowUeditor3a();" class="btn btn-success btn-sm" /><?php echo htmlentities(app('lang')->get('v_editor_showornot')); ?></button>
                                        <textarea name="content3" id="content3a" style="width:100%; height:350px; display:none;"><?php echo htmlentities($rs['content3']); ?></textarea>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="form-group <?php if(!in_array('onecontent',$isdisplay_array)): ?>hidden<?php endif; ?>">
                                    <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_content_a')); ?></div>
                                    <div class="col-md-9">
                                        <textarea name="content1" id="content1a" style="width:100%; height:350px;"><?php echo htmlentities($rs['content1']); ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="tab_extend">
                            <div class="form-group <?php if(in_array('area',$isdisplay_array)): else: ?>hidden<?php endif; ?>">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_area')); ?></div>
                                <div class="col-md-9" id="area">
                                    <?php $__FOR_START_20171__=1;$__FOR_END_20171__=5;for($i=$__FOR_START_20171__;$i < $__FOR_END_20171__;$i+=1){ ?>
                                        <select name="areaid" class="area<?php echo htmlentities($i); ?> input">
                                            <?php if(!(empty($rs['id']) || (($rs['id'] instanceof \think\Collection || $rs['id'] instanceof \think\Paginator ) && $rs['id']->isEmpty()))): ?><!--编辑状态-->
                                                <?php switch($i): case "1": ?><option value="<?php echo htmlentities($a); ?>" selected><?php break; case "2": ?><option value="<?php echo htmlentities($b); ?>" selected><?php break; case "3": ?><option value="<?php echo htmlentities($c); ?>" selected><?php break; case "4": ?><option value="<?php echo htmlentities($d); ?>" selected><?php break; ?>
                                                <?php endswitch; ?>
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if(in_array('price',$isdisplay_array)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_sale_price')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="price" value="<?php if(empty($rs['price']) || (($rs['price'] instanceof \think\Collection || $rs['price'] instanceof \think\Paginator ) && $rs['price']->isEmpty())): ?>0.00<?php else: ?><?php echo htmlentities($rs['price']); ?><?php endif; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_market_price')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="marketprice" value="<?php if(empty($rs['marketprice']) || (($rs['marketprice'] instanceof \think\Collection || $rs['marketprice'] instanceof \think\Paginator ) && $rs['marketprice']->isEmpty())): ?>0.00<?php else: ?><?php echo htmlentities($rs['marketprice']); ?><?php endif; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_stock')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="stock" value="<?php if(empty($rs['stock']) || (($rs['stock'] instanceof \think\Collection || $rs['stock'] instanceof \think\Paginator ) && $rs['stock']->isEmpty())): ?><?php echo htmlentities($stock); else: ?><?php echo htmlentities($rs['stock']); ?><?php endif; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_stock_unit')); ?></div>
                                <div class="col-md-5">
                                    <select name="stockunit" class="form-control">
                                        <?php foreach($stockunit_arr as $unit): ?>
                                            <option value="<?php echo htmlentities($unit); ?>" <?php if($unit == $rs['stockunit']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($unit); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label text-red"><?php echo htmlentities(app('lang')->get('v_urlroute')); ?> *</div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="urlroute" id="urlroute" placeholder="<?php echo htmlentities(app('lang')->get('v_urlroute_tips')); ?>" value="<?php echo htmlentities($rs['urlroute']); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_sequence')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="sequence" value="<?php if($rs['sequence'] == ''): ?>0<?php else: ?><?php echo htmlentities($rs['sequence']); ?><?php endif; ?>" />
                                </div>
                            </div>
                            <?php if(in_array('hits',$isdisplay_array)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_hits')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="hits" value="<?php if(empty($rs['hits']) || (($rs['hits'] instanceof \think\Collection || $rs['hits'] instanceof \think\Paginator ) && $rs['hits']->isEmpty())): ?><?php echo htmlentities($hits); else: ?><?php echo htmlentities($rs['hits']); ?><?php endif; ?>" />
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="form-group <?php if(in_array('client',$isdisplay_array)): else: ?>hidden<?php endif; ?>">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_client')); ?></div>
                                <div class="col-md-5 checkbox">
                                    <?php $client_array=explode(',',$rs['client']); ?>
                                    <label class="mr-2">
                                        <input type="checkbox" name="client[]" value="pc" <?php if(in_array('pc',$client_array) or $rs['client'] == ''): ?>checked="checked"<?php endif; ?>><?php echo htmlentities(app('lang')->get('v_client_pc')); ?>
                                    </label>
                                    <label>
                                        <input type="checkbox" name="client[]" value="wap" <?php if(in_array('wap',$client_array) or $rs['client'] == ''): ?>checked="checked"<?php endif; ?>><?php echo htmlentities(app('lang')->get('v_client_mobile')); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group <?php if(in_array('tags',$isdisplay_array)): else: ?>hidden<?php endif; ?>">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_label')); ?></div>
                                <div class="col-md-5 checkbox">
                                    <?php foreach($module_tags as $tagRs): ?>
                                        <label class="mr-2">
                                            <input name="tags[]" type="checkbox" value="<?php echo htmlentities($tagRs); ?>" <?php if(in_array($tagRs,$tags)==true): ?>checked="checked"<?php endif; ?> /> <?php echo htmlentities($tagRs); ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group <?php if(in_array('addtime',$isdisplay_array)): else: ?>hidden<?php endif; ?>">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_adddate')); ?></div>
                                <div class="col-md-5">
                                    <div class="input-group date form_datetime">
                                        <input type="text" class="form-control" name="addtime" readonly="readonly" value="<?php if(empty($rs['addtime']) || (($rs['addtime'] instanceof \think\Collection || $rs['addtime'] instanceof \think\Paginator ) && $rs['addtime']->isEmpty())): ?><?php echo date('Y-m-d H:i:s',time()); else: ?><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($rs['addtime'])? strtotime($rs['addtime']) : $rs['addtime'])); ?><?php endif; ?>" />
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default date-set"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php if(in_array('linkurl',$isdisplay_array)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_jump_url')); ?></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="linkurl" value="<?php echo htmlentities($rs['linkurl']); ?>" />
                                </div>
                            </div>
                            <?php endif; if(in_array('view_template',$isdisplay_array)): ?>
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_index_viewtemplate')); ?></div>
                                <div class="col-md-5">
                                    <select name="viewtemp" class="form-control">
                                        <?php foreach($viewtemp as $viewtempRs): $viewtempPrefix = strstr($viewtempRs,'.html',true); if(empty($rs['id']) and $viewtempPrefix == $defaulttemp): ?>
                                                <option value="<?php echo htmlentities($defaulttemp); ?>" selected="selected"><?php echo htmlentities($viewtempRs); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo htmlentities($viewtempPrefix); ?>" <?php if($rs['viewtemp'] == $viewtempPrefix): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($viewtempRs); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="tab_attribute">
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities($mRs['title']); ?> <?php echo htmlentities(app('lang')->get('v_attribute')); ?></div>
                                <div class="col-md-2">
                                    <select name="attributeid" id="attributeid" class="form-control">
                                        <option value=""><?php echo htmlentities(app('lang')->get('v_please_select')); ?> <?php echo htmlentities(app('lang')->get('v_attribute')); ?></option>
                                        <?php if(is_array($attlist) || $attlist instanceof \think\Collection || $attlist instanceof \think\Paginator): if( count($attlist)==0 ) : echo "" ;else: foreach($attlist as $key=>$attRs): ?>
                                            <option value="<?php echo htmlentities($attRs['id']); ?>" <?php if($rs['attributeid'] == $attRs['id']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($attRs['title']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div id="get_attribute" class="clearfix"></div>
                        </div>
                        <div class="tab-pane" id="tab_spec">
                            <div class="form-group">
                                <div class="col-md-3 control-label"><?php echo htmlentities(app('lang')->get('v_spec')); ?> <?php echo htmlentities(app('lang')->get('v_attribute')); ?></div>
                                <div class="col-md-2">
                                    <select name="attid" id="attid" class="form-control">
                                        <option value=""><?php echo htmlentities(app('lang')->get('v_please_select')); ?> <?php echo htmlentities(app('lang')->get('v_spec')); ?> <?php echo htmlentities(app('lang')->get('v_attribute')); ?></option>
                                        <?php if(is_array($specatt) || $specatt instanceof \think\Collection || $specatt instanceof \think\Paginator): if( count($specatt)==0 ) : echo "" ;else: foreach($specatt as $key=>$attRs): ?>
                                            <option value="<?php echo htmlentities($attRs['id']); ?>" <?php if($rs['attid'] == $attRs['id']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($attRs['title']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div id="get_sku" class="clearfix"></div>
                        </div>
                        <div class="col-md-offset-3 col-md-9 mb-4">
                            <button type="submit" class="btn btn-success mr-4"><i class="fa fa-check"></i> <?php echo htmlentities(app('lang')->get('v_save')); ?></button>
                            <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);"><i class="fa fa-angle-double-left"></i> <?php echo htmlentities(app('lang')->get('v_goback')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!--内容 结束-->
    </div>
    <!--右侧 结束-->
    <div class="clearfix"></div>
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @   版权所有-->
<!--开发：dj-->
    <footer class="main-footer">
        <div class="pull-right"><?php echo htmlentities(app('lang')->get('v_version')); ?>：<?php echo htmlentities(app('session')->get('system_version')); ?></div>
        <strong></strong>&nbsp;
    </footer>
</div>
<script src="/skin/admin/jquery/jquery-3.3.1.min.js"></script>
<script src="/skin/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/skin/admin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/skin/admin/js/adminlte.min.js"></script>
<?php if(empty($rs['id'])): ?>
<!--汉字转拼音 开始-->
<!--前提要引入JQ-->
<script type="text/javascript">
function strtopy(){
    var title = $("#title").val();
    $.post("<?php echo url('base/pinyin?lang='.input('lang')); ?>",{title:title},function(data){
        document.editform.urlroute.value=data;
    });
}
</script>
<!--汉字转拼音 结束-->
<?php endif; ?>
<!--日期选择 开始-->
<script src="/skin/admin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<?php if(app('request')->get('lang') == 'cn'): ?>
<script type="text/javascript" src="/skin/admin/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<?php endif; ?>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        <?php if(app('request')->get('lang') == 'cn'): ?>
        language: 'zh-CN',
        <?php endif; ?>
        pickerPosition: "bottom-left"
    });
</script>
<!--日期选择 结束-->
<!--文件上传开始-->
<script type="text/plain" id="input_editor" style="display:none;"></script>
<script type="text/javascript">
    //弹出文件上传的对话框
    var url='<?php echo url('ueditor/index'); ?>';
    //实例化编辑器
    var upload_editor = UE.getEditor('input_editor',{
        serverUrl :url,
        UEDITOR_HOME_URL:'/skin/admin/ueditor/',
    });
    function upFiles(morefileurl){
        upload_editor.ready(function(){
            upload_editor.execCommand('serverparam', {
                'userid': <?php echo session('userid'); ?>,//图片子文件夹，以用户ID命名
            });
            var filekey = 1;
            upload_editor.hide();//隐藏编辑器
            //文件上传监听
            // 需要在ueditor.all.min.js文件中找到d.execCommand("insertHtml",l)之后插入d.fireEvent('afterUpfile',b)
            upload_editor.addListener('afterUpfile', function (t, arg){
                if(filekey == 1){
                    document.getElementById(morefileurl).value=arg[0].url;
                }
                filekey ++;
            });
        });
        //弹出文件上传的对话框
        var myFiles = upload_editor.getDialog("attachment");
        myFiles.open();
    } 
</script>
<!--文件上传结束-->
<!--图片上传开始-->
<script type="text/plain" id="input_editor" style="display:none;"></script>
<script type="text/javascript">
    var url='<?php echo url('ueditor/index'); ?>';
    var upload_editor = UE.getEditor('input_editor',{
        serverUrl :url,
        UEDITOR_HOME_URL:'/skin/admin/ueditor/',
    });
    function upImage(morepics){
        upload_editor.ready(function(){
            upload_editor.execCommand('serverparam', {
                'userid': <?php echo session('userid'); ?>,
            });
            var pickey = 1;
            upload_editor.hide();
            upload_editor.addListener('beforeInsertImage', function (t,arg){
                if(pickey == 1){
                    if(morepics.indexOf('specimg') != -1){
                        document.getElementById(morepics).innerHTML='<img src="'+arg[0].src+'" class="img-rounded" style="max-height:35px; max-width:100px;"><input type="hidden" value="'+arg[0].src+'" name="sku_specimg[]"><input type="button" class="btn btn-success" onClick="upImage(\'' + morepics + '\');" value="<?php echo htmlentities(app('lang')->get('v_upload_img')); ?>" />';
                    }else{
                        document.getElementById(morepics).value=arg[0].src;
                    }
                }
                pickey ++;
            });
        });
        var myImage = upload_editor.getDialog("insertimage");
        myImage.open();
    }
</script>
<!--图片上传结束-->
<!--多图多附件增减开始-->
<script type="text/javascript">
function AddRow(tab1,delbutton1,upmethod,inputMethod,moreNum,uptext){
    //添加一行
    var i =document.getElementById(tab1).rows.length;
    var newTr = document.getElementById(tab1).insertRow();
    var moreNum=moreNum+i;
    //添加列
    var newTd0 = newTr.insertCell();
    newTd0.innerHTML = '<div class="input-group"><input type="text" name="'+inputMethod+'[]" id="'+inputMethod+''+moreNum+'" value="" class="form-control" /><span class="input-group-btn"><button type="button" onClick="'+upmethod+'(\''+inputMethod+moreNum + '\');" class="btn btn-success"><small><i class="fa fa-cloud-upload"></i></small> '+uptext+'</button><label class="btn btn-danger"><input type="checkbox" class="hidden" id="'+delbutton1+'" onclick="javascript:DelRow(\''+tab1+'\',\''+delbutton1+'\');"/ /><i class="fa fa-trash"></i> <?php echo htmlentities(app('lang')->get('v_delete_this')); ?></label></span></div>';
}
function DelRow(tab1,delbutton1){
    //删除一行
    var shu=0;
    var delTr=document.all(delbutton1);
    for(var i=0;i<delTr.length;i++){
        if (delTr[i].checked==true){
            shu++;
        }
    }
    if(shu==delTr.length){
        return;
    }else  if(shu==0){
        document.getElementById(tab1).deleteRow(1);
    }else if(shu==1){
        for(var i=0;i<delTr.length;i++){
            if(delTr[i].checked==true){
                document.getElementById(tab1).deleteRow(i+1);
            }
        }
    }else if(shu>1){
        for(var a=0;a<shu;a++){
            for(var i=0;i<delTr.length;i++){
                if(delTr[i].checked==true){
                    document.getElementById(tab1).deleteRow(i+1);
                    break;
                }
            }
        }
    }
}
</script>
<!--多图多附件增减结束-->
<!--富文本编辑器开始-->
<?php if(in_array('morecontents',$isdisplay_array)): ?>
<script type="text/javascript">
<?php for($i=1;$i<4;$i++){ ?>
function ShowUeditor<?php echo htmlentities($i); ?>a(){
    var url='<?php echo url('ueditor/index'); ?>';
    var ue = UE.getEditor('content<?php echo htmlentities($i); ?>a',{
        serverUrl :url,
        <?php if(app('request')->isMobile()): ?>
        toolbars:[
            ['source','undo','redo','justifyleft','justifycenter','justifyright','bold','italic','underline','strikethrough','link','unlink','insertcode','fontfamily','fontsize','forecolor','backcolor','simpleupload','insertimage','attachment','spechars','map','insertvideo','music','scrawl']
        ],
        'enterTag': 'br',//把换行P改为br
        <?php endif; ?>
    });
    ue.ready(function(){
        ue.execCommand('serverparam', {
        'userid': <?php echo session('userid'); ?>,
        });
    });
    if(content<?php echo htmlentities($i); ?>a.style.display=="block"){
        content<?php echo htmlentities($i); ?>a.style.display='none';
    }else{
        content<?php echo htmlentities($i); ?>a.style.display='block';
    }
}
<?php } ?>
</script>
<?php else: ?>
<script type="text/javascript">
    var url='<?php echo url('ueditor/index'); ?>';
    var ue = UE.getEditor('content1a',{
        serverUrl :url,
    });
    ue.ready(function(){
        ue.execCommand('serverparam', {
        'userid': <?php echo session('userid'); ?>,
        });
    });
</script>
<?php endif; ?>
<!--富文本编辑器结束-->
<!--地区开始-->
<script src="/skin/admin/js/jquery.cxselect.min.js"></script>
<script type="text/javascript">
$('#area').cxSelect({
  url: <?php echo $areaArr; ?>,
  selects: [<?php $__FOR_START_10971__=1;$__FOR_END_10971__=5;for($i=$__FOR_START_10971__;$i < $__FOR_END_10971__;$i+=1){ ?>'area<?php echo htmlentities($i); ?>'<?php if($i != '4'): ?>,<?php endif; } ?>],
  required: true,
  jsonName: 'title', 
  jsonValue: 'id', 
  jsonSub: '0', 
  nodata: 'none'
});
</script>
<!--地区结束-->
<!--属性 开始-->
<script type="text/javascript">
<?php if(!(empty($rs['attributeid']) || (($rs['attributeid'] instanceof \think\Collection || $rs['attributeid'] instanceof \think\Paginator ) && $rs['attributeid']->isEmpty()))): ?>
$(function(){
    var att_url = "<?php echo url('attribute/getattr?lang='.input('lang')); ?>"+"&attributeid="+<?php echo htmlentities($rs['attributeid']); ?>+"&id=<?php echo htmlentities($rs['id']); ?>"+"&tabledir=<?php echo input('tabledir'); ?>";
    $.ajax({
        url: att_url,
        type: "get",
        dataType : "html",//数据格式 
        async: false,
        success: function(data){
            $("#get_attribute").html(data);
        }
    });
});
<?php endif; ?>

$("#attributeid").change(function(){
    var att_url = "<?php echo url('attribute/getattr?lang='.input('lang')); ?>"+"&attributeid="+$(this).val()+"&id=<?php echo htmlentities($rs['id']); ?>"+"&tabledir=<?php echo input('tabledir'); ?>";
    $('#get_attribute').empty();
    $.ajax({
        url: att_url,
        type: "get",
        dataType : "html",//数据格式 
        async: false,
        success: function(data){
            $("#get_attribute").html(data);
        }
    });
});
</script>
<!--属性 结束-->
<!--规格开始-->
<script type="text/javascript">
<?php if(!(empty($rs['attid']) || (($rs['attid'] instanceof \think\Collection || $rs['attid'] instanceof \think\Paginator ) && $rs['attid']->isEmpty()))): ?>
$(function(){
    var sku_url = "<?php echo url('sku/getsku?lang='.input('lang')); ?>"+"&attid="+<?php echo htmlentities($rs['attid']); ?>+"&id=<?php echo htmlentities($rs['id']); ?>"+"&tabledir=<?php echo input('tabledir'); ?>";
    $.ajax({
        url: sku_url,
        type: "get",
        dataType : "html",//数据格式 
        async: false,
        success: function(data){
            $("#get_sku").html(data);
        }
    });
});
<?php endif; ?>

$("#attid").change(function(){
    var sku_url = "<?php echo url('sku/getsku?lang='.input('lang')); ?>"+"&attid="+$(this).val()+"&id=<?php echo htmlentities($rs['id']); ?>"+"&tabledir=<?php echo input('tabledir'); ?>";
    $.ajax({
        url: sku_url,
        type: "get",
        dataType : "html",//数据格式 
        async: false,
        success: function(data){
            $("#get_sku").html(data);
        }
    });
});
</script>
<!--规格 结束-->
</body>
</html>