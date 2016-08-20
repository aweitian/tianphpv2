<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>验证码</title>
<script language="javascript" src="<?php print AppUrl::getMediaPath()?>/js/base.js"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script language="javascript" src="<?php print AppUrl::getMediaPath()?>/js/js.js"></script>
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/public_style.css">
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/nav_bar.css">
<style type="text/css">
body,td,th {
	font-family: "Microsoft YaHei";
}
</style>
</head>
<body>
<div class="public_width">
<?php $user_header_title = "填写验证码";?>
<?php include dirname(__FILE__)."/modules/user/common/header.tpl.php"?>
  
  <!--head end-->
  
  <div class="mzy30"> 
    <!--head end-->
    <div class="blank30"></div>
    <p class="fz28 color9">您的手机号：<span class="yellow">13950297754</span></p>
    
    <p class="fz28 color9 yzm_mt1">我们给你发送了一条短信，请将短信中的数字作为验证码填写在下面</p>
    <div class="blank20"></div>
    <div class="yam_sm1 clr color3">验证码:
      <p class="fr bor_rad tc fz26">剩余50秒</p>
    </div>
    <div class="blank30"></div>
    <input type="text" class="iptbr" placeholder="请输入验证码" value="" />
    <div class="blank30"></div>
    <button class="login_dl bor_rad green_bg">下一步</button>
    <div class="blank30"></div>
  </div>
  <div class="blank30"></div>
</div>
</body>
</html>
