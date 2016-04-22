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
<form onsubmit="return confirm('确认要导入到数据库?')" action="<?php print $submit_url?>" method="post" accept-charset="utf-8">
<fieldset>
	<legend class="f-p8">确认是否导入数据</legend>
	
	<div class="f-text-red"><?php print $r->info?></div>
	
	<input type="hidden" name="token" value="<?php print $r->return["token"]?>">
	<div class="formitm">
		<label class="lab">识别信息：</label>
		<div class="ipt">
			<span class="domain"><?php print $r->return["dn"] ?></span>
		</div>
	</div>
	<div class="formitm">
		<label class="lab">文件名：</label>
		<div class="ipt">
			<span class="domain"><?php print pathinfo($r->return["path"],PATHINFO_BASENAME)?></span>
		</div>
	</div>
	<div class="formitm">
		<label class="lab">总行数：</label>
		<div class="ipt">
			<span class="domain"><?php print $r->return["total"]?></span>
		</div>
	</div>
	<div class="formitm formitm-1">
		
		<?php if($r->info != ""):?>
		<script>
		function en(){
			if(!document.getElementById("ens").checked){
				document.getElementById("btn").disabled = false;
				document.getElementById("btn").className = 'u-btn';
			}else{
				document.getElementById("btn").disabled = true;
				document.getElementById("btn").className = '';
			}
		}
		</script>
		<input type="checkbox" id="ens"><label for="ens" onclick="en()">我确定此文件数据没有导入到数据库中</label>
		<br>
		<input type="submit" id="btn" name="submit" value="Submit" disabled/>
		
		<?php else:?>
		<input type="submit" id="btn" name="submit" value="Submit" class="u-btn" />
		
		<?php endif;?>
		
	</div>


</fieldset>
</form>
</div>
<?php endif;?>