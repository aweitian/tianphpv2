<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */

?>
<div class="m-form">
<form action="<?php print $submit_url?>" method="get" accept-charset="utf-8">
<fieldset>
	<legend class="f-p8">创意查询</legend>
	
	<div id="info" class="f-text-white f-tac f-bg-red f-m5 f-p3 f-dn"><?php print $content?></div>
	<div class="formitm">
		<label class="lab">输入创意ID：</label>
		<div class="ipt">
			<input type="text" name="id"/> 
		</div>
	</div>

	<div class="formitm formitm-1">
		<input type="submit" name="submit" value="Submit" class="u-btn"/>
	</div>


</fieldset>
</form>
</div>