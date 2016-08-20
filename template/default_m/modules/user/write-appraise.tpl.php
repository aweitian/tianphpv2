<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */
if ($_SERVER ["HTTP_REFERER"]) {
	$url = new url ( $_SERVER ["HTTP_REFERER"] );
	if ($url->path != HTTP_ENTRY . "/user/writeappraise") {
		$redirectUrl = "?return=". urlencode($_SERVER ["HTTP_REFERER"]) ;
	} else {
		$redirectUrl = "";
	}
} else {
	$redirectUrl = "";
}



$tree_dis = array();
foreach ($model->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
				"text" => $item["pd"],
				"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
}
?>
<div class="public_width">
<?php $user_header_title = "写评价";?>
<?php include dirname(__FILE__)."/common/header.tpl.php"?>

<!--head end-->

<div class="mzy30">
	<div class="blank30"></div>
    
    <form name="gh" onSubmit="return chk(this)" action="<?php print AppUrl::userWriteAppraise().$redirectUrl?>" method="post">
	    <div class="yuy_warp yuy_ys bor_rad borddd clr">
						<select class="fz16 gray" name="d">
						<option value="0">选择医生</option>
						<?php foreach($model->getAllDoc() as $doc):?>
						<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
						<?php endforeach;?>		    
					</select>
	     </div>
	     <div class="blank30"></div>
   <div class="yuy_warp yuy_ys bor_rad borddd clr">
						<select class="fz16 gray" name="j">
						<option value="0">选择疾病</option>					
					    <?php foreach($model->getLv0KeyInfoes() as $xbz):?>   	            
                       	<option value="<?php print $xbz["sid"] ?>"><?php print $xbz["data"] ?></option>     
                        <?php endforeach;?>			    
					</select>
	     </div>
	     <div class="blank30"></div>
        <div class="satisfied clr">
						<div class="twtitl fl fz16 pt7">满意度：</div>
					    <div class="twtitl fl fz16 pt7">
						<input name="m" type="radio" value="0" />  一般&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="m" type="radio" value="1" />  满意&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="m" type="radio" value="2" />  很满意
					    </div>
	     </div>
	<div class="blank30"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="我来说两句..." name="c"></textarea>
    </div>
    <div class="blank30"></div>     
    <button class="login_dl bor_rad yellow_bg" type="submit">发表</button>
    <div class="blank30"></div>
    </form>
</div>

  
<div class="blank30"></div>
</div>
