 <?php

$ctr = appCtrl::$msg->getAction();


?>
<div class="bg_fff">
	<div class="zjtd">
	<div class="mzy30 zjtd_box1">
    	<a href=""><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" class="fl zjtd_box1_img1" /></a>
        <dl class="fl">
        	<dt class="fz24 jbkp_zjzx clr"><b class="blue fz28"><?php print $m->data["name"]?></b></dt>
            <dd><?php print $m->data["lv"]?></dd>
            <dd>患者推荐热度(综合) : <span><?php print $m->data["hot"]?></span><img src="<?php print AppUrl::getMediaPath()?>/images/ys_tj.png" class="zjtd_box1_img3" /></dd>
        </dl>
        <a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr zjtd_box1_img4" /></a>
    </div>
    <div class="blank20"></div>
    
</div>
</div>