<?php

?>

<div class="backToTop" style="display: block;"></div>



<script type="text/javascript" src="<?php print AppUrl::swtjs()?>?m=<?php print AppModule::$moduleName?><?php if(AppModule::$moduleName == "doctor")print '&n='.$this->model->data["id"]?><?php /*if(AppModule::$moduleName == "default" && appCtrl::$msg->getControl()=="main")print '&c=m'*/?>"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/touch_new_index.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/swt.js" type="text/javascript" charset="utf-8"></script>


