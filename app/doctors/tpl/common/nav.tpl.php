     <ul class="zjtdtit fz16 clearfix">
          <li class="selected"><a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>">医师首页</a></li>
          <li><a href="<?php print AppUrl::docAskHomeByDocid($m->data["id"])?>">患者服务区</a></li>
          <li><a href="<?php print AppUrl::docArticleHomeByDocid($m->data["id"])?>">文章</a></li>
          <li><a href="<?php print AppUrl::docPresentHomeByDocid($m->data["id"])?>">心意礼物</a></li>
        </ul>