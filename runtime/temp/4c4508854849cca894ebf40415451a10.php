<?php /*a:6:{s:45:"../template/default/cn/mobile/jishu\view.html";i:1555339502;s:45:"../template/default/cn/mobile/public\css.html";i:1551600893;s:46:"../template/default/cn/mobile/public\head.html";i:1553997495;s:49:"../template/default/cn/mobile/public\comment.html";i:1551599412;s:46:"../template/default/cn/mobile/public\foot.html";i:1551446328;s:51:"../template/default/cn/mobile/public\commentjs.html";i:1551599389;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo htmlentities($title); ?></title>
<meta name="keywords" content="<?php echo htmlentities($rs['keyword']); ?>" />
<meta name="description" content="<?php echo htmlentities($rs['description']); ?>" />
<meta name="author" content="www. ">
<!--CSS 开始-->
<link rel="stylesheet" type="text/css" href="/skin/index/default/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/skin/index/default/fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/skin/admin/jquery-weui/css/weui.min.css">
<link rel="stylesheet" type="text/css" href="/skin/index/default/css/global.min.css">
<link rel="stylesheet" type="text/css" href="/skin/index/default/css/green.min.css">
<!--CSS 结束-->
<link rel="stylesheet" href="/skin/index/default/owl.carousel/assets/owl.carousel.min.css">
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
            <div class="col-md-8 mt-md-2">
                <a href="<?php echo htmlentities($home_path); ?>" class="mr-2"><?php echo htmlentities(app('lang')->get('v_home')); ?></a> <i class="fa fa-angle-right"></i>
                <a href="<?php echo htmlentities($module_path); ?>" class="ml-2"><?php echo htmlentities(app('lang')->get('v_project')); ?></a>
                <?php if(is_array($list_nav) || $list_nav instanceof \think\Collection || $list_nav instanceof \think\Paginator): $i = 0; $__LIST__ = $list_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listnavRs): $mod = ($i % 2 );++$i;?>
                    <i class="fa fa-angle-right ml-2 mr-2"></i><a href="<?php echo url($lang_path.$listnavRs['urlroute'].'-'.$listnavRs['routesign'].$listnavRs['id'].'-1'); ?>"><?php echo htmlentities($listnavRs['title']); ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="col-md-4 mt-sm-2">
                <!--<form name="search_form" method="post" action="" onsubmit="return checksearch('<?php echo url('project/index'); ?>');">-->
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
        <!--内容 开始-->
        <div class="col-md-9 mb-4">
            <div class="row">
                <!--更多图片-->
                <div class="col-md-6">
                    <div class="owl-carousel nav-dark mb-2" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}" id="thumbGalleryDetail">
                        <img id="specimg-big" src="<?php echo htmlentities($rs['thumb']); ?>" alt="<?php echo htmlentities($rs['title']); ?>" class="img-fluid rounded big" onerror="this.src='/skin/admin/img/nopic.png'">
                        <?php foreach($morepics as $pic): if(!(empty($pic) || (($pic instanceof \think\Collection || $pic instanceof \think\Paginator ) && $pic->isEmpty()))): ?>
                                <img src="<?php echo htmlentities($pic); ?>" class="img-fluid rounded big" onerror="this.src='/skin/admin/img/nopic.png'">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="owl-carousel" id="thumbGalleryThumbs">
                        <?php foreach($morepics as $key=>$pic): if(!(empty($pic) || (($pic instanceof \think\Collection || $pic instanceof \think\Paginator ) && $pic->isEmpty()))): if($key == '0'): ?><img id="first" src="<?php echo htmlentities($rs['thumb']); ?>" alt="<?php echo htmlentities($rs['title']); ?>" class="img-fluid rounded small" onerror="this.src='/skin/admin/img/nopic.png'"><?php endif; ?>
                                <img src="<?php echo htmlentities($pic); ?>" class="img-fluid rounded small" onerror="this.src='/skin/admin/img/nopic.png'">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--产品详情-->
                <div class="col-md-6">
                    <h1 class="h6"><strong><?php echo htmlentities($rs['title']); ?></strong></h1>
                    <div class="w-100">

                        <p class="text-muted">
                            <?php 
                                foreach (explode(PHP_EOL,$rs['description']) as $description){
                                    echo $description.'<br>';
                                }
                             ?>
                        </p>
                        <?php if(in_array('attribute',$isdisplay_array)): ?>
                            <p class="my-3">
                                <?php if(is_array($attribute) || $attribute instanceof \think\Collection || $attribute instanceof \think\Paginator): $i = 0; $__LIST__ = $attribute;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attRs): $mod = ($i % 2 );++$i;?>
                                    <?php echo htmlentities($attRs['title']); ?>：<?php echo str_replace('|', ' | ', $attRs['attvalue']); ?><br />
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </p>
                        <?php endif; if(in_array('spec',$isdisplay_array)): ?>
                            <div class="my-3">
                                <ul id="sku">
                                    <?php if(is_array($speclist) || $speclist instanceof \think\Collection || $speclist instanceof \think\Paginator): $spec_key = 0; $__LIST__ = $speclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$specRs): $mod = ($spec_key % 2 );++$spec_key;?>
                                        <li class="attr-row">
                                            <?php echo htmlentities($specRs['title']); ?>：
                                            <?php if(is_array($specRs['subOne']) || $specRs['subOne'] instanceof \think\Collection || $specRs['subOne'] instanceof \think\Paginator): $i = 0; $__LIST__ = $specRs['subOne'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subspecRs): $mod = ($i % 2 );++$i;?>
                                                <button type="button" data-prime="<?php echo htmlentities($subspecRs['id']); ?>" class="btn btn-sm m-1 <?php if($subspecRs['id'] == $default_attid_arr[$spec_key-1]): ?> active<?php endif; ?>"><?php echo htmlentities($subspecRs['title']); ?></button>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="w-100"><p class="text-muted"><i class="fa fa-eye"></i> <?php echo htmlentities(app('lang')->get('v_hits')); ?>：<?php echo htmlentities($rs['hits']); ?> <?php echo htmlentities(app('lang')->get('v_times')); ?></p></div>
                </div>
                <div class="col-md-12 mt-3">
                    <?php if(in_array('morecontents',$isdisplay_array)): ?>
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a class="nav-link" href="#tab1" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_content1')); ?></a>
                            </li>
                            <!--<li class="nav-item">-->
                                <!--<a class="nav-link" href="#tab2" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_content2')); ?></a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                                <!--<a class="nav-link" href="#tab3" data-toggle="tab"><?php echo htmlentities(app('lang')->get('v_content3')); ?></a>-->
                            <!--</li>-->
                        </ul>
                        <div class="tab-content detail">
                            <div id="tab1" class="tab-pane active">
                                <?php echo $content1; ?>
                            </div>
                            <div id="tab2" class="tab-pane">
                                <?php echo $rs['content2']; ?>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <?php echo $rs['content3']; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <ul class="nav nav-tabs"></ul>
                        <div class="tab-content detail">
                            <?php echo $content1; ?>
                        </div>
                    <?php endif; ?>
                    <p class="mt-3 mb-2"><?php echo htmlentities(app('lang')->get('v_previous_page')); ?>：<?php echo $pre; ?></p>
                    <p><?php echo htmlentities(app('lang')->get('v_next_page')); ?>：<?php echo $next; ?></p>
                    <?php if(app('config')->get('isdisplay.comment') == '1'): ?><!--评论 开始-->
<!--百度编辑器开始-->
<script src="/skin/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
<script src="/skin/admin/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<!--百度编辑器结束-->
<div class="w-100 mt-4">
		<i class="fa fa-edit"></i> <?php echo htmlentities(app('lang')->get('v_comment_post')); ?>
		<form name="comment_form" action="<?php echo url('comment/edit'); ?>" method="post" onSubmit="return checkComment();">
		    <input type="hidden" name="infoid" value="<?php echo htmlentities($rs['id']); ?>">
		    <input type="hidden" name="tabledir" value="<?php echo htmlentities($tabledir); ?>">
			<div class="row">
				<?php if(!(empty(app('session')->get('username')) || ((app('session')->get('username') instanceof \think\Collection || app('session')->get('username') instanceof \think\Paginator ) && app('session')->get('username')->isEmpty()))): ?>
                    <div class="col-md-12 mb-2"><textarea name="content" id="content1a" class="w-100" style="height:100px;"></textarea></div>
                    <div class="col-md-12"><label class="float-left"><input type="checkbox" name="anonymous" value="1"> <?php echo htmlentities(app('lang')->get('v_anonymous')); ?></label> <button type="submit" class="btn btn-sm btn-color float-right"><i class="fa fa-check-circle"></i> <?php echo htmlentities(app('lang')->get('v_comment_post')); ?></button></div>
			    <?php else: ?>
			        <div class="col-md-12 mt-2"><div class="alert alert-success mb-3"><i class="fa fa-exclamation-circle"></i> <?php echo htmlentities(app('lang')->get('v_comment_post_require')); ?> <a href="<?php echo url('user/login'); ?>" class="text-success mx-2"><?php echo htmlentities(app('lang')->get('v_login')); ?></a> | <a href="<?php echo url('user/reg'); ?>" class="text-success ml-2"><?php echo htmlentities(app('lang')->get('v_reg')); ?></a></div></div>
			    <?php endif; ?>
			</div>
		</form>
</div>
<div class="w-100">
    <i class="fa fa-comments"></i> <?php echo htmlentities(app('lang')->get('v_comment')); ?> （<?php $result = db("comment")->where("signid=1 and tabledir='$tabledir' and infoid='$id'")->count();echo $result; ?>）
	<ul class="comments">
		<li>
		    <?php if(is_array($commentlist) || $commentlist instanceof \think\Collection || $commentlist instanceof \think\Paginator): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$commentRs): $mod = ($i % 2 );++$i;
		        $avatar = '/skin/admin/bootstrap/layouts/layout/img/avatar.jpg';
		        if(!empty($commentRs['avatar'])) $avatar = $commentRs['avatar'];
		        $commentid = $commentRs['id'];
		     ?>
			    <div class="comment">
				    <div class="img-thumbnail"><img class="avatar" src="<?php echo htmlentities($avatar); ?>" onerror="this.src='/skin/admin/img/nopic.png'"></div>
				    <div class="comment-block py-2 detail">
					    <div class="comment-arrow"></div>
						<strong><?php if($commentRs['anonymous'] == '1'): ?><?php echo htmlentities(app('lang')->get('v_anonymous')); else: ?><?php echo htmlentities($commentRs['nickname']); ?><?php endif; ?></strong> <span class="text-muted"><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($commentRs['addtime'])? strtotime($commentRs['addtime']) : $commentRs['addtime'])); ?></span>
						<span class="float-right"><span> <a href="javascript:void(0);" class="replay_id" parentid="<?php echo htmlentities($commentRs['id']); ?>"><i class="fa fa-reply"></i> <?php echo htmlentities(app('lang')->get('v_reply')); ?></a></span></span>
					    <p><?php echo $commentRs['content']; ?></p>
				    </div>
			    </div>
			    <?php $parentid = 0;$result = Db::view("comment",'*')->view("user",['avatar','nickname'],"comment.userid=user.id")->where("comment.parentid='$commentid' and comment.signid=1")->limit("10")->order("comment.addtime desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subCommentRs): $mod = ($i % 2 );++$i;?>
                    <ul class="comments reply mb-4">
				        <li class="pt-0">
					        <div class="comment">
						        <div class="img-thumbnail"><img class="avatar" src="<?php echo htmlentities($subCommentRs['avatar']); ?>" onerror="this.src='/skin/admin/img/nopic.png'"></div>
						        <div class="comment-block py-2">
							        <div class="comment-arrow"></div>
								    <strong><?php if($subCommentRs['anonymous'] == '1'): ?><?php echo htmlentities(app('lang')->get('v_anonymous')); else: ?><?php echo htmlentities($subCommentRs['nickname']); ?><?php endif; ?></strong> <span class="text-muted"><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($subCommentRs['addtime'])? strtotime($subCommentRs['addtime']) : $subCommentRs['addtime'])); ?></span>
							        <p><?php echo $subCommentRs['content']; ?></p>
						        </div>
					        </div>
				        </li>
			        </ul>
                <?php endforeach; endif; else: echo "" ;endif; ?>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</li>
	</ul>
</div>
<!--评论 结束-->
<!--富文本编辑器开始-->
<script type="text/javascript">
    var url='<?php echo url('ueditor/index'); ?>';
    var ue = UE.getEditor('content1a',{
        serverUrl :url,
        toolbars:[
            ['emotion','horizontal','bold','underline','strikethrough','insertcode','fontsize','forecolor','simpleupload','scrawl']
        ],
        elementPathEnabled: false,
        wordCount:false,
        'enterTag': 'br',//把换行P改为br
    });
    ue.ready(function(){
        ue.execCommand('serverparam', {
        'userid': <?php echo session('userid'); ?>,
        });
    });
</script>
<!--富文本编辑器结束--><?php endif; ?>
                </div>
            </div>
        </div>
        <!--内容 结束-->
        <!--侧边栏 开始-->
        <div class="col-md-3 d-none d-md-block">
            <aside>
                <!--分类 开始-->
                <h6 class="font-weight-bold"><i class="fa fa-dot-circle font-weight-light small"></i> <?php echo htmlentities(app('lang')->get('v_project_sort')); ?></h6>
                <ul class="nav nav-list flex-column mb-4">
                    <li><a class="<?php if(empty(input('sortid'))): ?>active<?php endif; ?>" href="<?php echo htmlentities($module_path); ?>"><?php echo htmlentities(app('lang')->get('v_project_all')); ?></a></li>
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
                <!--相关信息 开始-->
                <h6 class="font-weight-bold"><i class="fa fa-dot-circle font-weight-light small"></i> <?php echo htmlentities(app('lang')->get('v_project_related')); ?></h6>
                <ul class="aside-list pl-0">
                    <?php $parentid = 0;$result = Db::name("project")->where("lang='$lang' and sortid in($sortidArr) and id<>$id and signid=1")->limit("5")->order("sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$relatedproRs): $mod = ($i % 2 );++$i;?>
                    <li class="max-height-50">
                        <a href="<?php echo url($lang_path.$relatedproRs['urlroute'].'-'.$relatedproRs['routesign'].$relatedproRs['id']); ?>">
                            <img alt="<?php echo htmlentities($relatedproRs['title']); ?>" width="60" class="float-left img-fluid rounded mr-2 mt-1" src="<?php echo htmlentities($relatedproRs['thumb']); ?>" onerror="this.src='/skin/admin/img/nopic.png'">
                            <?php echo htmlentities($relatedproRs['title']); ?><br><span class="text-muted"><?php echo msubstr($relatedproRs['description'],0,52); ?></span>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <!--相关信息 结束-->
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
<!--规格 开始-->
<script src="/skin/index/default/js/sku.js"></script>
<script type="text/javascript">var props = {"goods_list": <?php echo $rs['sku_json']; ?>,}</script>
<script>
const sku1 = new sku({
    jqWrap: $('#sku'),
    goodsList: props.goods_list,
    success(product){
        if(product.specimg != ''){
            $('#specimg-big').attr("src",product.specimg);
        }
        $('#price').html(returnPrice(product.price));
        $('#stock').html(product.stock);
    }
});
$(function(){
    $('#first').click(function(){
        $('#specimg-big').attr("src",$('#first')[0].src);
    });
});
</script>
<!--规格 结束-->
<script type="text/javascript" src="/skin/index/default/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/skin/index/default/js/gallery.js"></script>
<!--回复评论 开始-->
<script type="text/javascript">
document.onclick = function(e){
    <?php if(!(empty(app('session')->get('userid')) || ((app('session')->get('userid') instanceof \think\Collection || app('session')->get('userid') instanceof \think\Paginator ) && app('session')->get('userid')->isEmpty()))): ?>
        e = e || event;
        var obj = $(e.srcElement || e.target);
        if (obj.closest('.reply_sign').attr('class') != 'comments mb-3 reply_sign') {
            $('.reply_sign').remove();
        }
    <?php endif; ?>
}
$('.replay_id').on("click",function(e){
	var parent = $(this).closest('.comment');
    var reply_sign = $('.reply_sign');
    if(reply_sign.length < 1){
        parent.append('<span class="reply_sign"></span>');
        <?php if(empty(app('session')->get('userid')) || ((app('session')->get('userid') instanceof \think\Collection || app('session')->get('userid') instanceof \think\Paginator ) && app('session')->get('userid')->isEmpty())): ?>
            parent.after('<ul class="comments mb-3 reply_sign"><i class="fa fa-exclamation-circle"></i> <?php echo htmlentities(app('lang')->get('v_comment_post_require')); ?> <a href="<?php echo url('user/login'); ?>"><?php echo htmlentities(app('lang')->get('v_login')); ?></a> | <a href="<?php echo url('user/reg'); ?>"><?php echo htmlentities(app('lang')->get('v_reg')); ?></a></ul>');
        <?php else: ?>
            var reply_html = '<ul class="comments mb-3 reply_sign">';
                reply_html += '<form name="comment_form2" action="<?php echo url('comment/edit'); ?>" method="post" onSubmit="return checkComment2();">';
                reply_html += '<input type=hidden name=parentid>';
                reply_html += '<textarea name="content" class="form-control mb-2" rows="2"></textarea>';
                reply_html += '<div class="row"><div class="col-md-12 clearfix">';
                reply_html += '<label class="float-left"><input type="checkbox" name="anonymous" value="1"> <?php echo htmlentities(app('lang')->get('v_anonymous')); ?></label>';
                reply_html += '<button type="submit" class="btn btn-sm btn-color float-right"><i class="fa fa-check-circle"></i> <?php echo htmlentities(app('lang')->get('v_comment_post')); ?></button>';
                reply_html += '</div></div>';
                reply_html += '</form>';
                reply_html += '</ul>';
            parent.after(reply_html);
            $('.reply_sign').find(':hidden[name=parentid]').val($(this).attr('parentid'));
        <?php endif; ?>
        
    }else{
        reply_sign.remove();
    }
    e = e || event;
    e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
});
</script>
<!--回复评论 结束-->
<script type="text/javascript">
/*评论检查*/
function checkComment(){
    var comment_form = document.comment_form;
    var content = document.comment_form.content.value;
    if(content.length < 2 || content.length > 500){
        $.toast("<i class='fa fa-info-circle fa-2x text-danger'></i><br><?php echo htmlentities(app('lang')->get('y_comment_error')); ?>",1000);
        ue.focus();
        return false;
    }
}
/*回复检查*/
function checkComment2(){
    var comment_form2 = document.comment_form2;
    var content = document.comment_form2.content.value;
    if(content.length < 2 || content.length > 500){
        $.toast("<i class='fa fa-info-circle fa-2x text-danger'></i><br><?php echo htmlentities(app('lang')->get('y_comment_error')); ?>",1000);
        comment_form2.content.focus();
        return false;
    }
}
</script>
</body>
</html>