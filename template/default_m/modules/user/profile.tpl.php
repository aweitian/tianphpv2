<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月19日
 * @Desc: 
 * 依赖:
 */
$userinfo = AppUser::getInstance ()->auth->getInfo ();
$act = appCtrl::$msg->getAction();
// var_dump($userinfo);exit;
?>
<div class="public_width">

<div class="head_tc blue_bg">
    <a class="goback fl" href="" title="返回上页" onclick="history.go(-1)"><b></b></a>
    <div class="head_tit" >个人中心</div>
    <a href="<?php print AppUrl::userLogout()?>" class="fr login_top bor_rad green_topbg">退出</a>
</div>
<div class="mzy30">
<!--head end-->
<div class="blank30"></div>
<div class="fz30">欢迎你,<span class="yellow"><?php print $userinfo["name"]?></span>!</div>
<div class="blank30"></div>
<div class="memer_center bor_rad borddd clr">
	<a href="<?php print AppUrl::userQuestions()?>">我的提问<span></span></a>
    <a href="<?php print AppUrl::userLetter()?>">我写的感谢信<span></span></a>
    <a href="<?php print AppUrl::userAppraise()?>">我发表的评价<span></span></a>
    <a href="<?php print AppUrl::userPresents()?>">心意礼物<span></span></a>
    <a href="<?php print AppUrl::userModifypwd()?>" class="mbor0">修改密码<span></span></a>
</div>

</div>
<div class="blank30"></div>
</div>
