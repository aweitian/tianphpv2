<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */
// var_dump($model->getVcFlag());exit;
if(isset($_SERVER['HTTP_REFERER']))
{
	$url = $_SERVER['HTTP_REFERER'];
}else{
	$url = AppUrl::navHome();
}



$url ="?return=".urlencode($url);

?>

<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="<?php print AppUrl::getMediaPath()?>/css/style.css" rel="stylesheet" />
</head>

<body>
<div class="wid1000 loginlogo clearfix"><a<?php print App::useTarget()?> href="<?php print AppUrl::navHome()?>"><img class="fl" src="<?php print AppUrl::getMediaPath()?>/images/loginlogo.jpg" width="284" height="47" /></a><span class="fl black fz24">登录</span></div>
<div class="loginban">
  <div class="wid1000">
    <div class="logintable fz13">
      <p class="fz18">请先登录</p>
      <div class="blank25"></div>
      <form action="<?php print AppUrl::userLogin()?><?php print $url?>" method="post">
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
          <button class="fl loginbtn" type="submit" value=""><img src="<?php print AppUrl::getMediaPath()?>/images/loginbtn.jpg" width="102" height="34" /></button>
          <span class="fr loginnozc"><a<?php print App::useTarget()?> href="<?php print AppUrl::userResetPwd()?>"><span class="fr">忘记密码？</span></a></span></div>
      </form>
      <div class="blank15"></div>
      <div class="otherlogin clearfix"><span class="fl">没有账号？<a<?php print App::useTarget()?> href="<?php print AppUrl::userRegister()?>" class="blue">立即注册</a></span>
      	<span class="fl">
      	<!-- 
      	<a<?php print App::useTarget()?> href=""><img src="<?php print AppUrl::getMediaPath()?>/images/loginqq.jpg" width="22" height="22" /></a><a<?php print App::useTarget()?> href=""><img src="<?php print AppUrl::getMediaPath()?>/images/loginxl.jpg" width="22" height="22" /></a><a<?php print App::useTarget()?> href=""><img src="<?php print AppUrl::getMediaPath()?>/images/loginwc.jpg" width="22" height="22" /></a>
      	 -->
     	</span>
      </div>
    </div>
  </div>
</div>

<div class="blank20"></div>


<div class="footernav fz13">
    <ul class="clearfix tc">
      <a<?php print App::useTarget()?> href="<?php print AppUrl::process() ?>">门诊流程</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::notice() ?>">住院须知</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">预约服务</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::navSubscribe()?>">预约挂号</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::policy() ?>">隐私声明</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::navDoctors() ?>">医护团队</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::navAsk() ?>">疾病问答</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::guide()?>">价格与收费</a> <a<?php print App::useTarget()?> class="nobor" href="<?php print Appurl::environment() ?>">就诊环境</a>
    </ul>
  </div>
  <div class="footerloc fz13 tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</div>

</body>
</html>
