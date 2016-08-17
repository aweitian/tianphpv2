<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */
// var_dump($model->getVcFlag());exit;
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="<?php print HTTP_ENTRY?>/static/css/style.css" rel="stylesheet" />
</head>

<body>
<div class="wid1000 loginlogo clearfix"><a href="<?php print AppUrl::navHome()?>"><img class="fl" src="<?php print HTTP_ENTRY?>/static/images/loginlogo.jpg" width="284" height="47" /></a><span class="fl black fz24">登录</span></div>
<div class="loginban">
  <div class="wid1000">
    <div class="logintable fz13">
      <p class="fz18">请先登录</p>
      <div class="blank25"></div>
      <form action="<?php print AppUrl::userLogin()?>" method="post">
        <input  class="logininp gray border2" name="nep" placeholder='用户名/邮箱/手机号'/>
        <div class="blank25"></div>
        <input type="password" class="logininp gray  border2" name="pwd" placeholder="密码" />
        <div class="blank25"><?php print $info?></div>
        <div class="loginmdlbox clearfix"> 
        	<?php if($model->getVcFlag()):?>
        		<span class="fl">
         		<input name="code" class="logininp gray border2" placeholder='验证码'/>
         		<img src="<?php print HTTP_ENTRY?>/captcha" width="86" height="32" id="captcha"/>
          		</span>
          	<?php endif;?>
          </div>
        <div class="blank20"></div>
        <div class="loginbtnbox clearfix">
          <button class="fl loginbtn" type="submit" value=""><img src="<?php print HTTP_ENTRY?>/static/images/loginbtn.jpg" width="102" height="34" /></button>
          <span class="fr loginnozc"><a href="<?php print AppUrl::userResetPwd()?>"><span class="fr">忘记密码？</span></a></span></div>
      </form>
      <div class="blank15"></div>
      <div class="otherlogin clearfix"><span class="fl">没有账号？<a href="<?php print AppUrl::userRegister()?>" class="blue">立即注册</a></span>
      	<span class="fl">
      	<!-- 
      	<a href=""><img src="<?php print HTTP_ENTRY?>/static/images/loginqq.jpg" width="22" height="22" /></a><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/loginxl.jpg" width="22" height="22" /></a><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/loginwc.jpg" width="22" height="22" /></a>
      	 -->
     	</span>
      </div>
    </div>
  </div>
</div>
<div class="blank20"></div>
<div class="blank20"></div>
<div class="loginfooter dgray fz13 wid1000">
  <div class="loginfooternav tc"><a href="">关于我们</a><a href="">友情链接</a><a href="<?php print AppUrl::getSwtUrl()?>">找大夫咨询</a><a href="">预约挂号</a><a href="">版权声明</a><a class="nobor" href="">联系我们</a></div>
  <div class="blank15"></div>
  <div class="loginfooterloc tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</div>
</div>
</body>
</html>
