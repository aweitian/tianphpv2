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
		"name" => "",
		"url" => "",
		"order" => 0,
	);
	$at = "添加";
	$ua = "add";
}
$pid = $data["pid"];

if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

?>
		<section class="content">
			<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>一个栏目</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/tree/<?php print $ua;?><?php print $ret_url?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="vv">栏目名称</label>
                      <input type="hidden" name="pid" value="<?php print $pid?>">
                      <input required id="vv" type="text" name="name" value="<?php print $def["name"]?>" class="form-control" placeholder="名称">
                    </div>
                    <div class="form-group">
                      <label for="vv">生成网址</label>
                      <input required type="text" name="url" value="<?php print $def["url"]?>" class="form-control" placeholder="生成网址">
                    </div>
                    <div class="form-group">
                      <label for="vv">排序</label>
                      <input required type="text" name="order" value="<?php print $def["order"]?>" class="form-control" placeholder="排序">
                    </div>
                    </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>
                </form>
              </div><!-- /.box -->
		</section>