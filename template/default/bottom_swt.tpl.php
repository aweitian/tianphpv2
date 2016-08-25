





<div class="bottom">
  <div class="btnr">
    <dl>
      <dt>
        <img src="<?php print AppUrl::getMediaPath()?>/doctor/120X100/<?php print ($doc_id)?>.png" width="117" height="99" class="btzj" />
        <h4><b><?php print($doc_name) ?></b><?php print ($doc_lv) ?></h4>
        <p>擅长：<?php print utility::utf8Substr($doc_spec,0,25); ?>...</p>
      </dt>
      <dd><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl() ?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/btbtn1.png" width="120" height="40" /></a><a href="<?php print AppUrl::navSubscribe()?>"><img src="<?php print AppUrl::getMediaPath()?>/images/btbtn2.png" width="120" height="40" /></a></dd>
    </dl>
  </div>
</div>
  