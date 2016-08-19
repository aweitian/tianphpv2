<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */
$userinfo = AppUser::getInstance()->auth->getInfo();
if ($_SERVER ["HTTP_REFERER"]) {
	$url = new url ( $_SERVER ["HTTP_REFERER"] );
	if ($url->path != HTTP_ENTRY . "/user/writeletter") {
		$redirectUrl = "?return=". urlencode($_SERVER ["HTTP_REFERER"]) ;
	} else {
		$redirectUrl = "";
	}
} else {
	$redirectUrl = "";
}

?>
<div class="public_width">
<?php $user_header_title = "感谢信";?>
<?php include dirname(__FILE__)."/common/header.tpl.php"?>

<!--head end-->

<div class="mzy30">
	<div class="blank30"></div>
    
    <form action="<?php print AppUrl::userWriteLetter().$redirectUrl?>" method="post">
	    <div class="yuy_warp yuy_ys bor_rad borddd clr">
						<select class="fz16 gray" name="d">
						<option>选择医生</option>
					    <?php foreach($model->getAllDoc() as $doc):?>
						<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
						<?php endforeach;?>					    
					</select>
	     </div>

	<div class="blank30"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="我来说两句..." name="c"></textarea>
    </div>
    <div class="blank30"></div>
    <button class="login_dl bor_rad new_blue_bg" type="submit">发表</button>
    <div class="blank30"></div>
    </form>
</div>



  
<div class="blank30"></div>
</div>