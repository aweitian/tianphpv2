<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */
/**
 * @var rirResult
 */
//$r = new rirResult();
?>
<?php if(!$r->isTrue()):?>
	
<div class="m-form">
	<h2 class="f-red"><?php print $r->info?></h2>
</div>


<?php else:?>
<div class="m-form">
<form action="<?php print $submit_url?>" method="post" accept-charset="utf-8">
<fieldset>
	<legend class="f-p8">确认是否导入数据</legend>
	
	<input type="hidden" name="token" value="">
	<div class="formitm">
		<label class="lab">渠道：</label>
		<div class="ipt">
			<span class="domain"><?php print $r->return["channel"]?></span>
		</div>
	</div>
	<div class="formitm">
		<label class="lab">设备：</label>
		<div class="ipt">
			<span class="domain"><?php print $r->return["device"]?></span>
		</div>
	</div>
	<div class="formitm">
		<label class="lab">文件名：</label>
		<div class="ipt">
			<span class="domain"><?php print $r->return["path"]?></span>
		</div>
	</div>
	<div class="formitm">
		<label class="lab">文件总行数：</label>
		<div class="ipt">
			<span class="domain"><?php print $r->return["total"]?></span>
		</div>
	</div>
	<div class="formitm formitm-1">
		<input type="submit" name="submit" value="Submit" class="u-btn"/>
	</div>


</fieldset>
</form>
</div>
<?php endif;?>