 <?php

$ctr = appCtrl::$msg->getAction();


?>
<ul class="zjtdtit fz16 clearfix">
          <li <?php if($ctr=="welcome"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>">医师首页</a></li>
          <li <?php if($ctr=="ask"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?>  href="<?php print AppUrl::docAskHomeByDocid($m->data["id"])?>">患者服务区</a></li>
          <li <?php if($ctr=="article"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::docArticleHomeByDocid($m->data["id"])?>">文章</a></li>
          <li <?php if($ctr=="present"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::docPresentHomeByDocid($m->data["id"])?>">心意礼物</a></li>
             <li <?php if($ctr=="letter"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::docLetterHomeByDocid($m->data["id"])?>">感谢信</a></li> 
        </ul>