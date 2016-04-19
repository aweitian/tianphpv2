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
	<div class="formitm">
		<label class="lab">创意ID：</label>
		<div class="ipt">
			<input type="text" name="id" value="<?php print $id?>"/> 
			<input type="submit" value="Submit" class="u-btn"/>
		</div>
	</div>
	
	
	<div id="info" class="f-tac f-m5 f-p3">
	<?php if(is_array($content) && !empty($content)):?>
	<table class="m-table">
	<tbody>
	<tr><td>渠道</td><td><?php print $content["ch"]["ch_val"]?></td></tr>
	<tr><td>帐户</td><td><?php print $content["ac"]["ac_val"]?></td></tr>
	<tr><td>计划</td><td><?php print $content["pl"]["pl_val"]?></td></tr>
	<tr><td>单元</td><td><?php print $content["un"]["un_val"]?></td></tr>
	<tr><td rowspan="4">创意</td><td><?php print $content["id"]["title"]?></td></tr>
	<tr><td><?php print $content["id"]["desc1"]?></td></tr>
	<tr><td><?php print $content["id"]["desc2"]?></td></tr>
	<tr><td><?php print $content["id"]["url"]?></td></tr>
	</tbody>
	</table>
	
	<?php else:?>
	<?php print $content?>
	<?php endif;?>
	
	</div>
</fieldset>
</form>
</div>