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
<?php $user_header_title = "写感谢信";?>
<?php include dirname(__FILE__)."/common/header.tpl.php"?>

<!--head end-->

<div class="mzy30">
	<div class="blank30"></div>
    
    <form name="gh" onSubmit="return chk(this)" action="<?php print AppUrl::userWriteLetter().$redirectUrl?>" method="post">
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
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="我来说两句..." name="c"></textarea>
    </div>
    <div class="blank30"></div>     
    <button class="login_dl bor_rad yellow_bg" type="submit">发表</button>
    <div class="blank30"></div>
    </form>
</div>

<script type="text/javascript">
			
function chk(f){
if (f.d.value=="0")
{ 
	alert("请选择医生");
	f.d.focus();
	return false;
}
if (f.j.value=="0")
{ 
	alert("请选择疾病");
	f.j.focus();
	return false;
}

if (f.c.value=="")
{ 
	alert("请填写内容");
	f.c.focus();
	return false;
}





return true;



}

</script>

  
<div class="blank30"></div>
</div>