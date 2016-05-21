<?php
/**
 * Date: 2016年5月21日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
error_reporting(E_ALL);
ini_set("display_errors","On");

define("FILE_SYSTEM_ENTRY",dirname(dirname(__FILE__)));
define("HTTP_ENTRY","");

if(isset($_FILES) && !empty($_FILES)){

	require '../lib/rirResult.php';
	require '../lib/response/httpResponse.php';
	require '../modules/upload/uploadCommon.php';
	
	$demo = new uploadCommon();
	$demo->init();
	$ret = $demo->upload();
	
	var_dump($ret);
}
 ?>
 
<form action="" method="post" enctype="multipart/form-data" name="form1">
<input type="file" name="file1">
<input type="file" name="file2">
<input type="file" name="file3">
<input type="submit" name="Submit" value="提交">
<input name="scan" type="hidden" id="up" value="true">
</form>
<br/>
 