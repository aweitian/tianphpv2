<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

$msg  = $data["msg"];
$model = $data["model"];
$pid = 0;
$depth = 0;
if(isset($msg["?pid"]))
{
	$pid = $msg["?pid"];
}

if($pid > 0)
{
	//因为求的是PID的DEPTH。
	$depth = $model->getDepth($pid)->return + 1;
}


if(isset($msg["?mid"]))
{
	$mid = intval($msg["?mid"]) ;
}
else 
{
	exit("require mid arg");
}



if($msg->getAction() == "edit"){
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


if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}


$meta = $model->getMetaData($mid);
// var_dump();exit;
//这个地方要获取节点所在路径的最大长度来决定使用那个META组，
//每个META组用|分隔

$meta = explode(",", $meta->return["data"]);
// var_dump($depth);
$what = $depth < count($meta) ? $meta[$depth] : "***";
?>
		<section class="content">
			<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>一个<?php print $what?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/filterset/<?php print $ua;?><?php print $ret_url?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="vv"><?php print $what?>名称</label>
                      <input type="hidden" name="pid" value="<?php print $pid?>">
                      <input type="hidden" name="mid" value="<?php print $mid?>">
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