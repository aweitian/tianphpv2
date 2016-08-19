<?php 
/**
 * @var userModel;
 */
$m = $model;

// var_dump($model->getVcFlag());exit;

?>
<div class="public_width">

<div class="head_tc blue_bg">
    <a class="goback" href="" title="返回上页" onclick="history.go(-1)"><b></b></a>
    <div class="head_tit" >已有账号登录</div>
    <a href="<?php print AppUrl::userRegister()?>" class="fr login_top bor_rad">注册</a>
</div>
<div class="mzy30">
<!--head end-->
<div class="blank30"></div>
<form action="<?php print AppUrl::userLogin()?>" method="post">
<div class="login_warp bor_rad borddd">
	<input type="text" name="nep" placeholder="您的手机号码/用户名/邮箱" />
    <div class="hd_hsx"></div>
    <input type="password" name="pwd" placeholder="您的密码" />
</div>
<div class="blank30"></div>
<button class="login_dl bor_rad" type="submit" value="">登录</button>

<div class="blank30"></div>
<div class="login_sm1 clr fz26">
	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/dl_dui.png" />下次自动登录</span>
    <a href="<?php print AppUrl::userResetPwd()?>" class="fr blue">忘记密码？</a>
</div>
<div class="blank30"></div>
</form>
<div class="blank30"></div>
<div class="login_sanf fz30 color6"><p>或第三方快速登录</p></div>
<div class="blank40"></div>
<div class="login_sfdl clr">
	<a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/login_qq.png" class="fl" /></a>
    <a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/login_weibo.png" class="fr" /></a>
</div>

</div>
<div class="blank30"></div>
</div>