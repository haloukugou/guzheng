<?php /*a:5:{s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\index\index.html";i:1554291634;s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\head.html";i:1554291628;s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\left.html";i:1554291637;s:88:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\global_left.html";i:1554291629;s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\foot.html";i:1554291631;}*/ ?>
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
                <li class="active"><?php echo htmlentities(app('lang')->get('v_quick_edit')); ?></li>
            </ol>
        </div>
        <!--导航 结束-->
        <!--内容 开始-->
        <section class="content">
            <div class="row">
                <!--全局 开始-->
                <!--网站设置-->
                <?php if(app('config')->get('app.isdisplay.siteinfo') == '1'): ?>
                <a href="<?php echo url('siteinfo/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-0">
                        <h5><i class="fa fa-gear"></i> <?php echo htmlentities(app('lang')->get('v_siteinfo')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--字段-->
                <?php if(app('config')->get('app.isdisplay.field') == '1'): ?>
                <a href="<?php echo url('field/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-1">
                        <h5><i class="fa fa-list-alt"></i> <?php echo htmlentities(app('lang')->get('v_field')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--留言-->
                <?php if(app('config')->get('app.isdisplay.guestbook') == '1'): ?>
                <a href="<?php echo url('guestbook/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-2">
                        <h5><i class="fa fa-commenting-o"></i> <?php echo htmlentities(app('lang')->get('v_guestbook')); if(input('lang') != 'en'): ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?><?php endif; ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--客服-->
                <?php if(app('config')->get('app.isdisplay.chat') == '1'): ?>
                <a href="<?php echo url('chat/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-3">
                        <h5><i class="fa fa-user-circle-o"></i> <?php echo htmlentities(app('lang')->get('v_chat')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--广告-->
                <?php if(app('config')->get('app.isdisplay.ad') == '1'): ?>
                <a href="<?php echo url('ad/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-4">
                        <h5><i class="fa fa-bullhorn"></i> <?php echo htmlentities(app('lang')->get('v_ad')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--关键词-->
                <?php if(app('config')->get('app.isdisplay.keyword') == '1'): ?>
                <a href="<?php echo url('keywordlink/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-0">
                        <h5><i class="fa fa-flag"></i> <?php echo htmlentities(app('lang')->get('v_keyword')); if(input('lang') != 'en'): ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?><?php endif; ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--导航-->
                <?php if(app('config')->get('app.isdisplay.navigation') == '1'): ?>
                <a href="<?php echo url('navigation/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-1">
                        <h5><i class="fa fa-navicon"></i> <?php echo htmlentities(app('lang')->get('v_navigation')); if(input('lang') != 'en'): ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?><?php endif; ?></h5>
                    </div>
                </a>
                <?php endif; ?>                
                <!--地区-->
                <?php if(app('config')->get('app.isdisplay.area') == '1'): ?>
                <a href="<?php echo url('area/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-2">
                        <h5><i class="fa fa-map-marker"></i> <?php echo htmlentities(app('lang')->get('v_area')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--管理员-->
                <?php if(app('config')->get('app.isdisplay.user') == '1'): ?>
                <a href="<?php echo url('user/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-3">
                        <h5><i class="fa fa-user"></i> <?php echo htmlentities(app('lang')->get('v_user')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--模块-->
                <a href="<?php echo url('module/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-4">
                        <h5><i class="fa fa-cubes"></i> <?php echo htmlentities(app('lang')->get('v_module')); if(input('lang') != 'en'): ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?><?php endif; ?></h5>
                    </div>
                </a>
                <!--文件-->
                <?php if(app('config')->get('app.isdisplay.filemanage') == '1'): ?>
                <a href="<?php echo url('filemanage/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-0">
                        <h5><i class="fa fa-folder"></i> <?php echo htmlentities(app('lang')->get('v_document')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--参数-->
                <?php if(app('config')->get('app.isdisplay.parameter') == '1'): ?>
                <a href="<?php echo url('config/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-1">
                        <h5><i class="fa fa-cogs"></i> <?php echo htmlentities(app('lang')->get('v_config_setting')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--数据库-->
                <?php if(app('config')->get('app.isdisplay.databackup') == '1'): ?>
                <a href="<?php echo url('databackup/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-2">
                        <h5><i class="fa fa-database"></i> <?php echo htmlentities(app('lang')->get('v_data')); if(input('lang') != 'en'): ?> <?php echo htmlentities(app('lang')->get('v_backup')); ?><?php endif; ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--权限组-->
                <?php if(app('config')->get('app.isdisplay.authgroup') == '1'): ?>
                <a href="<?php echo url('authGroup/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-3">
                        <h5><i class="fa fa-users"></i> <?php echo htmlentities(app('lang')->get('v_authgroup')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--权限-->
                <?php if(app('config')->get('app.isdisplay.authrule') == '1'): ?>
                <a href="<?php echo url('authRule/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-4">
                        <h5><i class="fa fa-briefcase"></i> <?php echo htmlentities(app('lang')->get('v_auth')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--语言-->
                <?php if(app('config')->get('app.isdisplay.language') == '1'): ?>
                <a href="<?php echo url('language/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-0">
                        <h5><i class="fa fa-language"></i> <?php echo htmlentities(app('lang')->get('v_language')); if(input('lang') != 'en'): ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?><?php endif; ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--模板-->
                <?php if(app('config')->get('app.isdisplay.templatemanage') == '1'): ?>
                <a href="<?php echo url('templatemanage/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-1">
                        <h5><i class="fa fa-file-text"></i> <?php echo htmlentities(app('lang')->get('v_template')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--评论-->
                <?php if(app('config')->get('app.isdisplay.comment') == '1'): ?>
                <a href="<?php echo url('comment/index?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-2">
                        <h5><i class="fa fa-comments"></i> <?php echo htmlentities(app('lang')->get('v_comment')); ?> <?php echo htmlentities(app('lang')->get('v_manage')); ?></h5>
                    </div>
                </a>
                <?php endif; ?>
                <!--缓存-->
                <a href="<?php echo url('index/delCache?lang='.input('lang')); ?>" class="col-md-2 col-sm-2 col-xs-6 text-center">
                    <div class="alert bg-3">
                        <h5><i class="fa fa-refresh"></i> <?php echo htmlentities(app('lang')->get('v_clean_cache')); ?></h5>
                    </div>
                </a>
                <!--全局 结束-->
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
<?php if(!(empty($admintips) || (($admintips instanceof \think\Collection || $admintips instanceof \think\Paginator ) && $admintips->isEmpty()))): ?>
<!--24小时不再提示 开始-->
<div class="modal fade" id="change_admin_file" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-0"><?php echo htmlentities(app('lang')->get('v_edit_admin_file')); ?>：admin.php</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form name="form1" action="<?php echo url('index/editadminfile?lang='.input('lang')); ?>" method="post">
                        <div class="col-md-offset-2 col-md-7">
                            <h5><?php echo htmlentities(app('lang')->get('v_admin_filename')); ?>：</h5>
                            <div class="input-group">
                                <input type="text" name="filename" class="form-control" maxlength="20" placeholder="<?php echo htmlentities(app('lang')->get('v_english_only')); ?>">
                                <span class="input-group-addon">.php</span>
                            </div>
                            <h6 class="text-3 bold"><?php echo htmlentities(app('lang')->get('v_admin_address')); ?>：</h6>
                            <h5 class="text-0 bold"><?php echo htmlentities($domain); ?>/<span class="h6 bold"><?php echo htmlentities(app('lang')->get('v_entered_above')); ?></span>.php</h5>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <h6>
                                <button type="submit" class="btn btn-info mr-4"><i class="fa fa-check"></i> <?php echo htmlentities(app('lang')->get('v_save')); ?></button>
                                <button onclick="javascript:closetips();" type="button" class="btn"><i class="fa fa-times-circle"></i> <?php echo htmlentities(app('lang')->get('v_donot_show_again')); ?></button>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    if(cookieget('closetips')!='closetips'){
        $("#change_admin_file").modal("show");
    }
});
function cookieget(n){
    var name = n + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i<ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
function closetips(){
    $("#change_admin_file").modal("hide");
    var n = 'closetips';
    var v = 'closetips';
    var mins = 60 * 24;
    var dn = '';
    var path = "/";
    var date = new Date();
    date.setTime(date.getTime() + (mins * 60 *1000));
    var expires = "; expires=" + date.toGMTString();
    if(dn) dn = "domain=" + dn + "; ";
    document.cookie = n + "=" + v + expires + "; " + dn + "path=" + path;
}
</script>
<!--24小时不再提示 结束-->
<?php endif; ?>
</body>
</html>