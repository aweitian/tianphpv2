<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月20日
 * @Desc: 
 * 依赖:
 */

$ctr = appCtrl::$msg->getAction();

?>
<ul class="memertit fz14 clr">
	<li<?php if($ctr=="welcome"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::userProfile()?>">个人信息</a></li>
	<li<?php if($ctr=="modpwd"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::userModifypwd()?>">修改密码</a></li>
	<li<?php if($ctr=="avatar"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::userAvatar()?>">头像设置</a></li>
</ul>