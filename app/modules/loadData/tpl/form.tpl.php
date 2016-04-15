<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */

?>
<div class="m-form">
<form action="<?php print $submit_url?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<fieldset>
	<legend class="f-p8">选择一个CSV文件上传</legend>
	
	
	<div class="formitm">
                <label class="lab">选择文件：</label>
                <div class="ipt">
                    <input type="file" name="csv" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/> 
                </div>
	</div>

		<div class="formitm formitm-1">
			<input type="submit" name="submit" value="Submit" class="u-btn"/>
		</div>


</fieldset>
</form>
</div>