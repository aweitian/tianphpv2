<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月20日
 * @Desc: 
 * 依赖:
 */
$act = appCtrl::$msg->getAction();
?>
<div class="fl memer_box1 border2">
	<dl class="clr">
		<dt class="fl">
			<img width="60" height="60"
				src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print $userinfo["avatar"]?>" />
		</dt>
		<dd class="fl">
			<p class="blank10"></p>
			<p class="color3 fz18 fw700"><?php print $userinfo["name"]?></p>
			<p class="blank10"></p>
			<p class="color9 fz13"><?php print $userinfo["phone"]?></p>
		</dd>
	</dl>
	<ul>
		<li><a href="<?php print AppUrl::userProfile()?>" class="memer_li<?php if($act == "welcome" || $act == "profile"):?>dq<?php endif?>1">帐号设置</a></li>
		<li><a href="<?php print AppUrl::userLetter()?>" class="memer_li<?php if($act == "letter"):?>dq<?php endif?>2">我写的感谢信</a></li>
		<li><a href="<?php print AppUrl::userAppraise()?>" class="memer_li<?php if($act == "appraise"):?>dq<?php endif?>3">我发表的评价</a></li>
		<li><a href="<?php print AppUrl::userQuestions()?>" class="memer_li<?php if($act == "questions"):?>dq<?php endif?>4">我的提问</a></li>
		<li><a href="<?php print AppUrl::userPresents()?>" class="memer_li<?php if($act == "presents"):?>dq<?php endif?>5">心意礼物</a></li>
	</ul>
</div>