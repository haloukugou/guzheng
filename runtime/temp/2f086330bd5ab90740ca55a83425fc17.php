<?php /*a:1:{s:90:"D:\phpStudy\PHPTutorial\WWW\5bb1cc23560bb\application\admin\view\public\dispatch_jump.html";i:1554291638;}*/ ?>
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @   版权所有-->
<!--开发：dj-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo htmlentities(app('lang')->get('v_do_tips')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="www. ">
    <!--[if lt IE 9]>
    <script src="/skin/admin/js/html5shiv.min.js"></script>
    <script src="/skin/admin/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/skin/admin/css/global.min.css">
</head>
<body class="login">
<div class="jump">
        <?php switch($code): case "1": ?>
                <img src="/skin/admin/img/success.png" align="absmiddle"><br><br>
                <?php if(mb_strlen($msg,'utf-8') > 6): ?>
                    <h3 class="success"><?php echo(strip_tags($msg)); ?></h3>
                <?php else: ?>
                    <h1 class="success"><?php echo(strip_tags($msg)); ?></h1>
                <?php endif; break; case "0": ?>
                <img src="/skin/admin/img/error.png" align="absmiddle"><br><br>
                <?php if(mb_strlen($msg,'utf-8') > 6): ?>
                    <h3 class="error"><?php echo(strip_tags($msg)); ?></h3>
                <?php else: ?>
                    <h1 class="error"><?php echo(strip_tags($msg)); ?></h1>
                <?php endif; break; ?>
        <?php endswitch; ?>
        <br><?php echo htmlentities(app('lang')->get('v_page_auto')); ?> <a id="href" href="<?php echo htmlentities($url); ?>"><?php echo htmlentities(app('lang')->get('v_jump')); ?></a> <?php echo htmlentities(app('lang')->get('v_waittime')); ?>： <b id="wait"><?php echo htmlentities($wait); ?></b>
</div>
<script type="text/javascript">
    (function(){
         var wait = document.getElementById('wait'),
         href = document.getElementById('href').href;
         var interval = setInterval(function(){
             var time = --wait.innerHTML;
             if(time <= 0) {
                 location.href = href;
                 clearInterval(interval);
             };
        }, 1000);
    })();
</script>
</body>
</html>