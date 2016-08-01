<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

$msg  = $data["msg"];
$model = $data["model"];


$mid = intval($msg["?m"]);
$hid = intval($msg["?hid"]);

$row = $model->exists($hid,$mid);
if(!empty($row)){
	$def = $row;
	$at = "编辑";
	$ua = "reassign";
}else{
	$def = array(
		"fsid" => 0,
	);
	$at = "添加";
	$ua = "assign";
}


if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}


// var_dump($model->getDepthData($mid));exit;

$hosipital = $model->getHosipitalRow($hid)->return;

?>
		<section class="content">
			<div class="box box-primary">
                  <!-- form start -->
                <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/hosipital_filterset/<?php print $ua;?><?php print $ret_url?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="vv">名称</label>
                      <input type="hidden" name="hid" value="<?php print $hid?>">
                      <input type="hidden" name="mid" value="<?php print $mid?>">
                      <?php if($ua == "reassign"):?>
                      <input type="hidden" name="oldfsid" value="<?php print $def["fsid"]?>">
                      <?php endif?>
                      <input  type="text" readonly value="<?php print $hosipital["name"]?>" class="form-control" placeholder="名称">
                    </div>
                    <div class="form-group">
                      <label for="vv">集合元素</label>
                      <?php $sets = $model->getDepthData($mid)?>
                      <?php if(empty($sets)):?>
                    		<br>  没有集合数据,现在去
                    		<a href="<?php print HTTP_ENTRY?>/priv/filterset?mid=<?php print $mid?>">添加</a>
                      <?php else:?>
                      <select name="fsid" class="form-control">
                      <?php foreach ($model->getDepthData($mid) as $item):?>
                      <option<?php if($def["fsid"] == $item["sid"]):?> selected<?php endif;?> value="<?php print $item["sid"]?>"><?php print str_replace(' ','&nbsp;',$item["name"])?></option>
                      <?php endforeach;?>
                      <?php endif?>
                      </select>
                    </div>
                    </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit"<?php if(empty($sets)):?> disabled<?php endif?> class="btn btn-primary">提交</button>
                  </div>
                </form>
              </div><!-- /.box -->
		</section>