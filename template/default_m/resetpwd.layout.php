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
<title>找回密码</title>
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
<?php $user_header_title = "找回密码";?>
<?php include dirname(__FILE__)."/modules/user/common/header.tpl.php"?>
  
  <!--head end-->
  
  <div class="mzy30"> 
    <!--head end-->
    <div class="blank30"></div>
    <form action="<?php print AppUrl::userWritecode();?>" method="post">
    
    <div class="login_warp bor_rad borddd">
      <label class="fl">手机号：</label>
      <input type="text" placeholder="11位中国大陆手机号码" class="fl zh_pswd1" />
      <div class="hd_hsx"></div>
      <p class="clr">
        <label class="fl">郊验码：</label>
        <input type="text" class="zh_pswd2 fl" placeholder="填写短信验证码" />
        <img src="<?php print AppUrl::getMediaPath()?>/images/zh_yzm.jpg" class="fr" /> </p>
    </div>
    <div class="blank30"></div>
    <button class="login_dl bor_rad green_bg" type="submit">下一步</button>
    </form>
    <div class="blank30"></div>
  </div>
  <div class="blank30"></div>
</div>
</body>
</html>
