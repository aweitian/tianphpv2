<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
		"data" => "",
		"key" => ""
	);
	$at = "添加";
	$ua = "add";
}
$pid = $data["pid"];
$meta = $data["meta"];

if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

?>
		<section class="content">
			<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>一个<?php print $meta?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/disease/<?php print $ua;?><?php print $ret_url?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="vv"><?php print $meta?></label>
                      <input type="hidden" name="pid" value="<?php print $pid?>">
                      <input required id="vv" type="text" name="data" value="<?php print $def["data"]?>" class="form-control" placeholder="<?php print $meta?>名称">
                    </div>
                    <div class="form-group">
                      <label for="vx">url</label>
                      <input required id="vx" type="text" name="key" value="<?php print $def["key"]?>" class="form-control" placeholder="网址路径，只能是字母，数字和下划线">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>
                </form>
              </div><!-- /.box -->
		</section>