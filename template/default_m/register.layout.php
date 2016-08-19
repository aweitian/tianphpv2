<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>手机快速登录/注册</title>
<script language="javascript" src="<?php print AppUrl::getMediaPath()?>/js/base.js"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script language="javascript" src="<?php print AppUrl::getMediaPath()?>/js/js.js"></script>
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/public_style.css">
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/nav_bar.css">
</head>
<body>
<div class="public_width">

<div class="head_tc blue_bg">
    <a class="goback" href="" title="返回上页" onclick="history.go(-1)"><b></b></a>
    <div class="head_tit" >手机快速注册/登录</div>
</div>
<div class="mzy30">
<!--head end-->
<div class="blank30"></div>

<div class="login_warp bor_rad borddd">
	<input type="text" placeholder="11位中国大陆手机号码" />
    <div class="hd_hsx"></div>
    <p class="clr">
    	<input type="text" class="login_yzm fl" placeholder="填写短信验证码" />
        <input type="submit" class="login_fsyzm fr bor_rad borblue blue fz24" value="发送验证码" />
    </p>
    
</div>
<div class="blank30"></div>
<button class="login_dl bor_rad">登录</button>

<div class="blank30"></div>
<div class="login_sm1 clr fz26">
	<a href="<?php print AppUrl::userResetPwd()?>" class="fl blue">忘记密码？</a>
    <a href="<?php print AppUrl::userLogin()?>" class="fr blue">帐号密码登录</a>
</div>
</div>
<div class="blank30"></div>
</div>
<div class="backToTop" style="display: block;"></div>
<script src="<?php print AppUrl::getMediaPath()?>/js/touch_new_index.js" type="text/javascript"></script> 
</body>
</html>
