<?php /*a:4:{s:45:"../template/default/cn/mobile/news\index.html";i:1554990284;s:45:"../template/default/cn/mobile/public\css.html";i:1551600893;s:46:"../template/default/cn/mobile/public\head.html";i:1553997495;s:46:"../template/default/cn/mobile/public\foot.html";i:1551446328;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo htmlentities($title); ?></title>
<meta name="keywords" content="<?php echo htmlentities($keyword); ?>" />
<meta name="description" content="<?php echo htmlentities($description); ?>" />
<meta name="author" content="www. ">
<!--CSS 开始-->
<link rel="stylesheet" type="text/css" href="/skin/index/default/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/skin/index/default/fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/skin/admin/jquery-weui/css/weui.min.css">
<link rel="stylesheet" type="text/css" href="/skin/index/default/css/global.min.css">
<link rel="stylesheet" type="text/css" href="/skin/index/default/css/green.min.css">
<!--CSS 结束-->
</head>
<body>
<!--头部 开始-->
<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body">
        <div class="header-top bg-light">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-start d-none d-md-block">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li><span class="pl-0"><?php echo htmlentities($slogan); ?></span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li><a href="tel:<?php echo htmlentities($telephone); ?>" rel="nofollow" class="mr-1"><i class="fa fa-phone"></i> <?php echo htmlentities($telephone); ?></a><a href="tel:<?php echo htmlentities($mob); ?>" rel="nofollow"><i class="fa fa-mobile-alt"></i> <?php echo htmlentities($mob); ?></a></li>

                                    <?php if($langNum > '1'): ?>
                                    <li class="dropdown nav-item-left-border">
                                        <a class="pl-0 ml-2" href="<?php echo htmlentities($home_path); ?>" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/skin/admin/img/flags/<?php echo htmlentities($lang); ?>.png" /> <?php echo htmlentities($langRs['viewtitle']); ?> <i class="fa fa-angle-down"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownLanguage">
                                            <?php $parentid = 0;$result = Db::name("language")->where("mulu<>'$lang' and status=1")->limit("10")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$langRs): $mod = ($i % 2 );++$i;?>
                                                <a class="dropdown-item" href="/<?php echo htmlentities($langRs['mulu']); ?>/"><img src="/skin/admin/img/flags/<?php echo htmlentities($langRs['mulu']); ?>.png" /> <?php echo htmlentities($langRs['viewtitle']); ?></a>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo"><a href="<?php echo htmlentities($home_path); ?>"><img alt="<?php echo htmlentities($siteRs['title']); ?>" width="210" height="50" data-sticky-width="189" data-sticky-height="45" src="<?php echo htmlentities($siteRs['logo']); ?>"></a></div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links order-2 order-lg-1">
                            <div class="header-nav-main">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <?php if(is_array($navigation) || $navigation instanceof \think\Collection || $navigation instanceof \think\Paginator): $i = 0; $__LIST__ = $navigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oneRs): $mod = ($i % 2 );++$i;if($oneRs['att_type'] == 'Product'): ?>
                                                <li class="dropdown dropdown-mega">
                                                    <a class="dropdown-item dropdown-toggle" href="<?php echo htmlentities($oneRs['linkurl']); ?>"><?php echo htmlentities($oneRs['title']); ?></a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <div class="dropdown-mega-content">
                                                                <div class="row">
                                                                    <?php $parentid = 0;$result = Db::name("sort")->where("lang='$lang' and tabledir='Product' and parentid=0")->limit("5")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navsortRs): $mod = ($i % 2 );++$i;?>
                                                                    <div class="nav-col col-12">
                                                                        <a href="<?php echo url($lang_path.$navsortRs['urlroute'].'-'.$navsortRs['routesign'].$navsortRs['id'].'-1'); ?>" class="dropdown-mega-sub-title text-dark pl-0 pr-0 font-weight-bold"><?php echo htmlentities($navsortRs['title']); ?></a>
                                                                        <ul class="dropdown-mega-sub-nav ml-0">
                                                                            <?php 
                                                                                $arrStr = getOneArr('getChildSort','sort','id,parentid',$navsortRs['id'],'id');
                                                                             $parentid = 0;$result = Db::name("product")->where("lang='$lang' and sortid in($arrStr)")->limit("5")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navproRs): $mod = ($i % 2 );++$i;?>
                                                                                <li class="detail"><a class="dropdown-item" href="<?php echo url($lang_path.$navproRs['urlroute'].'-'.$navproRs['routesign'].$navproRs['id']); ?>"><img src="<?php echo htmlentities($navproRs['thumb']); ?>" class="rounded mr-2" onerror="this.src='/skin/admin/img/nopic.png'"><?php echo htmlentities($navproRs['title']); ?></a></li>
                                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                            <li class="detail"><a class="dropdown-item" href="<?php echo url($lang_path.$navsortRs['urlroute'].'-'.$navsortRs['routesign'].$navsortRs['id'].'-1'); ?>">&raquo; <?php echo htmlentities(app('lang')->get('v_more')); ?></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                        <?php else: if(empty($oneRs['subOne']) || (($oneRs['subOne'] instanceof \think\Collection || $oneRs['subOne'] instanceof \think\Paginator ) && $oneRs['subOne']->isEmpty())): ?>
                                                <li><a class="dropdown-item" href="<?php echo htmlentities($oneRs['linkurl']); ?>"><?php echo htmlentities($oneRs['title']); ?></a></li>
                                            <?php else: ?>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle" href="<?php echo htmlentities($oneRs['linkurl']); ?>"><?php echo htmlentities($oneRs['title']); ?></a>
                                                    <ul class="dropdown-menu">
                                                        <?php if(is_array($oneRs['subOne']) || $oneRs['subOne'] instanceof \think\Collection || $oneRs['subOne'] instanceof \think\Paginator): $i = 0; $__LIST__ = $oneRs['subOne'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$twoRs): $mod = ($i % 2 );++$i;if(empty($twoRs['subTwo']) || (($twoRs['subTwo'] instanceof \think\Collection || $twoRs['subTwo'] instanceof \think\Paginator ) && $twoRs['subTwo']->isEmpty())): ?>
                                                                <li><a class="dropdown-item" href="<?php echo htmlentities($twoRs['linkurl']); ?>"><?php echo htmlentities($twoRs['title']); ?></a></li>
                                                            <?php else: ?>
                                                                <li class="dropdown-submenu">
                                                                    <a class="dropdown-item" href="<?php echo htmlentities($twoRs['linkurl']); ?>"><?php echo htmlentities($twoRs['title']); ?></a>
                                                                    <ul class="dropdown-menu">
                                                                        <?php if(is_array($twoRs['subTwo']) || $twoRs['subTwo'] instanceof \think\Collection || $twoRs['subTwo'] instanceof \think\Paginator): $i = 0; $__LIST__ = $twoRs['subTwo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$threeRs): $mod = ($i % 2 );++$i;if(empty($threeRs['subThree']) || (($threeRs['subThree'] instanceof \think\Collection || $threeRs['subThree'] instanceof \think\Paginator ) && $threeRs['subThree']->isEmpty())): ?>
                                                                                <li><a class="dropdown-item" href="<?php echo htmlentities($threeRs['linkurl']); ?>"><?php echo htmlentities($threeRs['title']); ?></a></li>
                                                                            <?php else: ?>
                                                                                <li class="dropdown-submenu">
                                                                                    <a class="dropdown-item" href="<?php echo htmlentities($threeRs['linkurl']); ?>"><?php echo htmlentities($threeRs['title']); ?></a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <?php if(is_array($threeRs['subThree']) || $threeRs['subThree'] instanceof \think\Collection || $threeRs['subThree'] instanceof \think\Paginator): $i = 0; $__LIST__ = $threeRs['subThree'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fourRs): $mod = ($i % 2 );++$i;?>
                                                                                            <li><a class="dropdown-item" href="<?php echo htmlentities($fourRs['linkurl']); ?>"><?php echo htmlentities($fourRs['title']); ?></a></li>
                                                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                                    </ul>
                                                                                </li>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                    </ul>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </ul>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--头部 结束-->
<!--面包屑 开始-->
<div class="w-100 bg-light py-3" style="background:url(<?php echo htmlentities($page_banner); ?>) center center no-repeat 100% 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 pt-2">
                <a href="<?php echo htmlentities($home_path); ?>" class="mr-2"><?php echo htmlentities(app('lang')->get('v_home')); ?></a> <i class="fa fa-angle-right"></i>
                <a href="<?php echo htmlentities($module_path); ?>" class="ml-2"><?php echo htmlentities(app('lang')->get('v_news')); ?></a>
                <?php if(is_array($list_nav) || $list_nav instanceof \think\Collection || $list_nav instanceof \think\Paginator): $i = 0; $__LIST__ = $list_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listnavRs): $mod = ($i % 2 );++$i;?>
                    <i class="fa fa-angle-right ml-2 mr-2"></i><a href="<?php echo url($lang_path.$listnavRs['urlroute'].'-'.$listnavRs['routesign'].$listnavRs['id'].'-1'); ?>"><?php echo htmlentities($listnavRs['title']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; if(!empty(input('keyword'))): ?><i class="fa fa-angle-right ml-2 mr-2"></i><?php echo htmlentities(app('lang')->get('v_search')); ?><span class="text-danger ml-2">“<?php echo input('keyword'); ?>”</span><?php endif; ?>
            </div>
            <div class="col-md-4 mt-2">
                <!--<form name="search_form" method="post" action="" onsubmit="return checksearch('<?php echo url('news/index'); ?>');">-->
                    <!--<div class="input-group">-->
                        <!--<input type="text" class="form-control form-control-sm" name="keyword" placeholder="<?php echo htmlentities(app('lang')->get('v_keyword_tips')); ?>...">-->
                        <!--<span class="input-group-append"><button class="btn btn-sm" type="submit"><i class="fa fa-search"></i></button></span>-->
                    <!--</div>-->
                <!--</form>-->
            </div>
        </div>
    </div>
</div>
<!--面包屑 结束-->
<!--主体 开始-->
<div class="container mt-5">
    <div class="row">
        <!--列表 开始-->
        <div class="col-md-9 mb-4">
            <div class="row">
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><div class="col-md-12 text-center"><?php echo htmlentities(app('lang')->get('v_nodata')); ?></div><?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;$fileurl = $root.$rs['fileurl']; ?>
                    <div class="col-md-12 news mb-3">
                        <article>
                            <div class="date"><span class="day"><?php echo htmlentities(date('d',!is_numeric($rs['addtime'])? strtotime($rs['addtime']) : $rs['addtime'])); ?></span><span class="month"><?php echo htmlentities(date('Y',!is_numeric($rs['addtime'])? strtotime($rs['addtime']) : $rs['addtime'])); ?>-<?php echo htmlentities(date('m',!is_numeric($rs['addtime'])? strtotime($rs['addtime']) : $rs['addtime'])); ?></span></div>
                            <h6 class="mb-2"><a href="<?php echo url($lang_path.$rs['urlroute'].'-'.$rs['routesign'].$rs['id']); ?>"><?php echo htmlentities(msubstr($rs['title'],0,36)); ?></a></h6>
                            <p><?php echo msubstr($rs['description'],0,150); ?></p>
                            <p class="text-muted">
                                <span class="float-left mt-2">
                                    <i class="fa fa-cubes mr-1"></i><?php echo htmlentities(app('lang')->get('v_sort')); ?>：<?php echo htmlentities($rs['sort_title']); ?>
                                    <i class="fa fa-eye ml-2 mr-1"></i> <?php echo htmlentities(app('lang')->get('v_hits')); ?>：<?php echo htmlentities($rs['hits']); ?>
                                </span>
                                <span class="float-right">
                                    <a href="<?php echo url($lang_path.$rs['urlroute'].'-'.$rs['routesign'].$rs['id']); ?>" class="btn btn-sm btn-color px-3"><?php echo htmlentities(app('lang')->get('v_view')); ?> &raquo;</a>
                                </span>
                                <div class="clearfix"></div>
                            </p>
                            <hr>
                        </article>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!--分页-->
            <div class="row mt-4">
                <div class="col-md-4 col-sm-12"><?php echo htmlentities(app('lang')->get('v_total')); ?> <?php echo htmlentities($last_page); ?> <?php echo htmlentities(app('lang')->get('v_page')); ?> <?php echo htmlentities($total); ?> <?php echo htmlentities(app('lang')->get('v_records')); ?></div>
                <div class="col-md-8 col-sm-12">
                    <div class="pages float-right"><?php echo $list->render(); ?></div>
                </div>
            </div>
        </div>
        <!--列表 结束-->
        <!--侧边栏 开始-->
        <div class="col-md-3 d-none d-md-block">
            <aside>
                <!--分类 开始-->
                <h6 class="font-weight-bold"><i class="fa fa-dot-circle font-weight-light small"></i> <?php echo htmlentities(app('lang')->get('v_news_sort')); ?></h6>
                <ul class="nav nav-list flex-column mb-4">
                    <li><a class="<?php if(empty(input('sortid'))): ?>active<?php endif; ?>" href="<?php echo htmlentities($module_path); ?>"><?php echo htmlentities(app('lang')->get('v_news_all')); ?></a></li>
                    <?php if(is_array($sortlist) || $sortlist instanceof \think\Collection || $sortlist instanceof \think\Paginator): $i = 0; $__LIST__ = $sortlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oneRs): $mod = ($i % 2 );++$i;if(empty($oneRs['subOne']) || (($oneRs['subOne'] instanceof \think\Collection || $oneRs['subOne'] instanceof \think\Paginator ) && $oneRs['subOne']->isEmpty())): ?>
                            <li><a class="<?php if(input('sortid') == $oneRs['id']): ?>active<?php endif; ?>" href="<?php echo url($lang_path.$oneRs['urlroute'].'-'.$oneRs['routesign'].$oneRs['id'].'-1'); ?>"><?php echo htmlentities($oneRs['title']); ?></a></li>
                        <?php else: ?>
                            <li>
                                <a class="<?php if(input('sortid') == $oneRs['id']): ?>active<?php endif; ?>" data-toggle="collapse" aria-expanded="false" href="#collapse<?php echo htmlentities($oneRs['id']); ?>"><?php echo htmlentities($oneRs['title']); ?><span class="float-right mr-2">+</span></a>
                                <ul id="collapse<?php echo htmlentities($oneRs['id']); ?>" class="collapse <?php if(deep_in_array($oneRs['id'],$parent_arr) == true): ?>show<?php endif; ?>">
                                    <?php if(is_array($oneRs['subOne']) || $oneRs['subOne'] instanceof \think\Collection || $oneRs['subOne'] instanceof \think\Paginator): $i = 0; $__LIST__ = $oneRs['subOne'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$twoRs): $mod = ($i % 2 );++$i;if(empty($twoRs['subTwo']) || (($twoRs['subTwo'] instanceof \think\Collection || $twoRs['subTwo'] instanceof \think\Paginator ) && $twoRs['subTwo']->isEmpty())): ?>
                                            <li><a class="<?php if(input('sortid') == $twoRs['id']): ?>active<?php endif; ?>" href="<?php echo url($lang_path.$twoRs['urlroute'].'-'.$twoRs['routesign'].$twoRs['id'].'-1'); ?>"><?php echo htmlentities($twoRs['title']); ?></a></li>
                                        <?php else: ?>
                                            <li><a class="<?php if(input('sortid') == $twoRs['id']): ?>active<?php endif; ?>" href="<?php echo url($lang_path.$twoRs['urlroute'].'-'.$twoRs['routesign'].$twoRs['id'].'-1'); ?>"><?php echo htmlentities($twoRs['title']); ?></a>
                                                <ul>
                                                    <?php if(is_array($twoRs['subTwo']) || $twoRs['subTwo'] instanceof \think\Collection || $twoRs['subTwo'] instanceof \think\Paginator): $i = 0; $__LIST__ = $twoRs['subTwo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$threeRs): $mod = ($i % 2 );++$i;if(empty($threeRs['subThree']) || (($threeRs['subThree'] instanceof \think\Collection || $threeRs['subThree'] instanceof \think\Paginator ) && $threeRs['subThree']->isEmpty())): ?>
                                                            <li><a class="<?php if(input('sortid') == $threeRs['id']): ?>active<?php endif; ?>" href="<?php echo url($lang_path.$threeRs['urlroute'].'-'.$threeRs['routesign'].$threeRs['id'].'-1'); ?>"><?php echo htmlentities($threeRs['title']); ?></a></li>
                                                        <?php else: ?>
                                                            <li><a class="<?php if(input('sortid') == $threeRs['id']): ?>active<?php endif; ?>" href="<?php echo url($lang_path.$threeRs['urlroute'].'-'.$threeRs['routesign'].$threeRs['id'].'-1'); ?>"><?php echo htmlentities($threeRs['title']); ?></a>
                                                                <ul>
                                                                    <?php if(is_array($threeRs['subThree']) || $threeRs['subThree'] instanceof \think\Collection || $threeRs['subThree'] instanceof \think\Paginator): $i = 0; $__LIST__ = $threeRs['subThree'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fourRs): $mod = ($i % 2 );++$i;?>
                                                                        <li><a class="<?php if(input('sortid') == $fourRs['id']): ?>active<?php endif; ?>" href="<?php echo url($lang_path.$fourRs['urlroute'].'-'.$fourRs['routesign'].$fourRs['id'].'-1'); ?>"><?php echo htmlentities($fourRs['title']); ?></a></li>
                                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                </ul>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <!--分类 结束-->
                <!--最新信息 开始-->
                <h6 class="font-weight-bold mb-3"><i class="fa fa-dot-circle font-weight-light small"></i> <?php echo htmlentities(app('lang')->get('v_news_hot')); ?></h6>
                <ul class="aside-list pl-0">
                    <?php $parentid = 0;$result = Db::name("news")->where("lang='$lang' and signid=1")->limit("5")->order("hits desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hotnewsRs): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="<?php echo url($lang_path.$hotnewsRs['urlroute'].'-'.$hotnewsRs['routesign'].$hotnewsRs['id']); ?>">
                            <h6><i class="fa fa-angle-right mr-2"></i><?php echo htmlentities($hotnewsRs['title']); ?></h6><span class="text-muted"><?php echo msubstr($hotnewsRs['description'],0,52); ?></span>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <!--最新信息 结束-->
            </aside>
        </div>
        <!--侧边栏 结束-->
    </div>
</div>
<!--底部 开始-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-4 col-4">
				<h4><?php echo htmlentities(app('lang')->get('v_product')); ?></h4>
				<ul>
                    <?php $parentid = 0;$result = Db::name("sort")->where("lang='$lang' and tabledir='Product' and parentid=0")->limit("5")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prosortRs): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php echo url($lang_path.$prosortRs['urlroute'].'-'.$prosortRs['routesign'].$prosortRs['id'].'-1'); ?>"><i class="fa fa-caret-right"></i> <?php echo htmlentities($prosortRs['title']); ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-md-2 col-sm-4 col-4">
				<h4><?php echo htmlentities(app('lang')->get('v_news')); ?></h4>
				<ul>
                    <?php $parentid = 0;$result = Db::name("sort")->where("lang='$lang' and tabledir='News' and parentid=0")->limit("5")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newssortRs): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php echo url($lang_path.$newssortRs['urlroute'].'-'.$newssortRs['routesign'].$newssortRs['id'].'-1'); ?>"><i class="fa fa-caret-right"></i> <?php echo htmlentities($newssortRs['title']); ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-md-2 col-sm-4 col-4">
				<h4><?php echo htmlentities(app('lang')->get('v_project')); ?></h4>
				<ul>
                    <?php $parentid = 0;$result = Db::name("sort")->where("lang='$lang' and tabledir='Project' and parentid=0")->limit("5")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$projectsortRs): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php echo url($lang_path.$projectsortRs['urlroute'].'-'.$projectsortRs['routesign'].$projectsortRs['id'].'-1'); ?>"><i class="fa fa-caret-right"></i> <?php echo htmlentities($projectsortRs['title']); ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-md-2 col-sm-4 col-12 text-center">
				<img src="<?php echo htmlentities($erweima); ?>" class="img-fluid" /><br /><?php echo htmlentities(app('lang')->get('v_qrcode')); ?>
			</div>
			<div class="col-md-4 col-sm-8 col-12">
				<h4><?php echo htmlentities($siteRs['company']); ?></h4>
				<ul>
					<li><p><i class="fa fa-map-marker"></i> <strong><?php echo htmlentities(app('lang')->get('v_address')); ?>：</strong> <?php echo htmlentities($address); ?></p></li>
					<li><p><i class="fa fa-phone"></i> <strong><?php echo htmlentities(app('lang')->get('v_telephone')); ?>：</strong> <a href="tel:<?php echo htmlentities($telephone); ?>" rel="nofollow" class="mr-1"><?php echo htmlentities($telephone); ?></a><i class="fa fa-mobile-alt ml-2 mr-1"></i><strong><?php echo htmlentities(app('lang')->get('v_mobile')); ?>：</strong> <a href="tel:<?php echo htmlentities($mob); ?>" rel="nofollow" class="mr-1"><?php echo htmlentities($mob); ?></a></p></li>
					<li><p><i class="fa fa-envelope"></i> <strong><?php echo htmlentities(app('lang')->get('v_email')); ?>：</strong> <a href="mailto:<?php echo htmlentities($email); ?>"><?php echo htmlentities($email); ?></a></p></li>
					<?php if($lang == 'cn'): ?>
					<li>
						<i class="fab fa-qq"></i> <strong>Q Q：</strong>
						<?php $parentid = 0;$result = Db::name("chat")->where("lang='$lang' and chat_type='qq'")->limit("2")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qqRs): $mod = ($i % 2 );++$i;?>
							<a class="mr-3" rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo htmlentities($qqRs['account']); ?>&site=qq&menu=yes"><?php echo htmlentities($qqRs['title']); ?></a>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<?php if(app('request')->controller() == 'Index'): ?>
            <div class="col-md-12">
                <?php echo htmlentities(app('lang')->get('v_friendlink')); ?>：
                <?php $parentid = 0;$result = Db::name("ad")->where("lang='$lang' and att_type='link'")->limit("35")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$friendRs): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo htmlentities($friendRs['linkurl']); ?>" class="mr-3" target="_blank"><?php echo htmlentities($friendRs['title']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row py-2">
				<div class="col-md-9 col-sm-12"><?php echo $copyright; ?></div>
				<div class="col-md-3 col-sm-12 text-center"><a href="http://www.miitbeian.gov.cn/" rel="nofollow" target="_blank"><?php echo htmlentities($siteRs['icpnumber']); ?></a></div>
			</div>
		</div>
	</div>
</footer>
<!--底部  结束-->
<script src="/skin/admin/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/skin/index/default/bootstrap/js/popper.min.js" type="text/javascript"></script>
<script src="/skin/index/default/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/skin/index/default/js/global.js"></script>
<!--客服 开始-->
<div id="top" class="<?php if($lang == 'cn'): ?>d-none d-md-block<?php else: ?>d-sm-none<?php endif; ?>">
    <div id="chat-id" class="chat-menu">
        <div class="chat-float"></div>
        <div class="kfbtn btn-qq">
            <div class="qq">
                <?php $parentid = 0;$result = Db::name("chat")->where("lang='$lang' and chat_type='qq'")->limit("10")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chatRs): $mod = ($i % 2 );++$i;?>
                    <a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo htmlentities($chatRs['account']); ?>&site=qq&menu=yes"><img src="<?php echo htmlentities($chatRs['thumb']); ?>" alt="<?php echo htmlentities($chatRs['title']); ?>" onerror="this.src='/skin/admin/img/nopic.png'" /><br /><?php echo htmlentities($chatRs['title']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="kfbtn btn-wx"><img class="pic" src="<?php echo htmlentities($erweima); ?>"></div>
        <div class="kfbtn btn-phone">
            <div class="phone"><?php echo htmlentities($telephone); ?></div>
        </div>
        <div class="kfbtn btn-top" style="display: none;"></div>
    </div>
</div>
<!--客服 结束-->
<script type="text/javascript" src="/skin/admin/jquery-weui/js/jquery-weui<?php if($lang != 'cn'): ?>.en<?php endif; ?>.min.js"></script>
<script type="text/javascript">
/*搜索*/
function checksearch($action){
    if(document.search_form.keyword.value.length > 1){
    	document.search_form.action = $action + "?keyword="+document.search_form.keyword.value;
        return true;
    }else{
        $.toast("<i class='fa fa-info-circle fa-2x text-danger'></i><br><?php echo htmlentities(app('lang')->get('v_keyword_tips')); ?>",1000);
        document.search_form.keyword.focus();
        return false;
	}
}
</script>
<?php if(!(empty($siteRs['htmlcode']) || (($siteRs['htmlcode'] instanceof \think\Collection || $siteRs['htmlcode'] instanceof \think\Paginator ) && $siteRs['htmlcode']->isEmpty()))): ?><?php echo $siteRs['htmlcode']; ?><?php endif; ?>
</body>
</html>