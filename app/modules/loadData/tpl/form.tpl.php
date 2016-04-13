<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */

?>
<div class="m-form">
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<fieldset>
	<legend class="f-p8">选择一个CVS文件上传</legend>
	
	
	<div class="formitm">
                <label class="lab">选择文件：</label>
                <div class="ipt">
                    <input type="file" name="file" id="file"/> 
                </div>
	</div>

		<div class="formitm formitm-1">
			<input type="submit" name="submit" value="Submit" class="u-btn"/>
		</div>


</fieldset>
</form>
</div>