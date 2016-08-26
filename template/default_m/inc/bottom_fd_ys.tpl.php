<?php
?>
<div style="height:1.25rem;"></div>
<div class="box_d">
    <div class="clr">
        <a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" class="fl" /></a>
        <div class="fl">
        	<h5 class="fw400 color3"><?php print $m->data["name"]?><span class="color6 fz24"><?php print $m->data["lv"]?></span></h5>
            <p class="clr"><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="btn_b1">在线咨询</a><a href="tel:021-52733999" class="btn_b2">电话咨询</a></p>
        </div>
    </div> 
</div>