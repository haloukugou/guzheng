<?php /*a:1:{s:81:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\login\index.html";i:1554291628;}*/ ?>
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
    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="www. ">
    <link rel="stylesheet" href="/skin/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/skin/admin/font-awesome/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="/skin/admin/js/html5shiv.min.js"></script>
    <script src="/skin/admin/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/skin/admin/css/global.min.css">
</head>
<body class="login" style="background:url(/skin/admin/img/<?php echo htmlentities($season); ?>.jpg) center repeat;">
<!--LOGO 开始-->
<div class="logo"><img src="/skin/admin/img/logo.png" /></div>
<!--LOGO 结束-->
<!--登录 开始-->
<div class="content">
    <!--登录表单 开始-->
    <form name="login" class="login-form" onSubmit="return logincheck();" action="<?php echo url('?lang=cn'); ?>" method="post">
        <h3 class="form-title"><?php echo htmlentities(app('lang')->get('v_user_login')); ?></h3>
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;</span>
            <input name="username" type="text" class="form-control" maxlength="20" placeholder="<?php echo htmlentities(app('lang')->get('v_username')); ?>" />
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i>&nbsp;</span>
            <input name="password" type="password" class="form-control" maxlength="20" placeholder="<?php echo htmlentities(app('lang')->get('v_password')); ?>" />
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
            <input name="verify" type="text" class="form-control" maxlength="4" placeholder="<?php echo htmlentities(app('lang')->get('v_verify')); ?>" />
        </div>
        <div class="row clearfix">
            <div class="col-md-6 col-xs-12">
                <img class="table" id="imgverify" src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?randid='+Math.floor(Math.random()*100);" height="35" align="absmiddle" />
            </div>
            <div class="col-md-6 col-xs-12 mb-2">
                <button type="submit" class="btn btn-info table"> <?php echo htmlentities(app('lang')->get('v_login')); ?> </button>
            </div>
        </div>
        <div class="radio">
            <?php if(is_array($langlist) || $langlist instanceof \think\Collection || $langlist instanceof \think\Paginator): $i = 0; $__LIST__ = $langlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lang): $mod = ($i % 2 );++$i;?>
                <label class="mr-2">
                    <input name="language" type="radio" value="<?php echo htmlentities($lang['mulu']); ?>" <?php if($lang['isdefault'] == '1'): ?> checked="checked"<?php endif; ?> /><img src="<?php echo htmlentities($lang['ico']); ?>" border="0" width="16" height="11" /> <?php echo htmlentities($lang['admintitle']); ?>
                </label>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="forget-password">
            <h4><?php echo htmlentities($helloChosen); ?></h4>
        </div>
        <div class="create-account">
            <p><?php echo htmlentities(app('lang')->get('v_words')); ?></p>
        </div>
    </form>
    <!--登录表单结束-->
</div>
<!--登录 结束-->
<!--版权 开始-->
<div class="copyright"><?php echo htmlentities(app('lang')->get('v_version')); ?>：<?php echo htmlentities($system_version); ?></div>
<!--版权 结束-->
<script src="/skin/admin/jquery/jquery.min.js"></script>
</body>
</html>