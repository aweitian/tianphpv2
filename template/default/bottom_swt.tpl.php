

<div class="b_bottom_box news_fixs">
    <div class="aus_info">
        <a target="_blank" href="<?php print AppUrl::getSwtUrl() ?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print ($doc_img)?>" width="80" height="80" /></a>
    </div>
    <div class="fix_right_box">
        <div class="docs_info_box zzx_dib_w">
            <a target="_blank"  href="" class="docs_info">
                <strong><?php print($doc_name) ?></strong>
                <span><?php print utility::utf8Substr($doc_spec,0,30); ?>...</span>
            </a>
        </div>
        <div class="btn_box clearfix">
            <div class="new_bottom_btn docs_n_btns">
                <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl() ?>" class="online" >网上咨询</a>
            </div>
    
              <div class="docs_btns">
                  <div class="b2_btn">
                      <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navSubscribe() ?>">预约挂号</a>
                  </div>
              </div>
        </div>
    </div>
</div>
  