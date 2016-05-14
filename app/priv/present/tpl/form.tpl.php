<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */

$def_avatar_src = "01541998.jpg";

if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
			"cost" => "",
			"data" => "",
			"ben" => "",
			"avatar" => $def_avatar_src,
	);
	$at = "添加";
	$ua = "add";
}
if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}
$avatar = tian::getFileList(FILE_SYSTEM_ENTRY."/static/present","gif,jpg,png");
// var_dump($avatar);exit;

?>

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>礼物</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/present/<?php print $ua;?><?php print $ret_url?>">
                    <!-- text input -->
                    <div class="form-group">
                      <label>礼物名称</label>
                      <?php if($ua == "edit"):?>
                      <input type="hidden" name="sid" value="<?php print $def["sid"]?>">
                      <?php endif?>
                      <input value="<?php print $def["data"]?>" name="data" required type="text" class="form-control" placeholder="如:小小心意">
                    </div>
                    <div class="form-group">
                      <label>消耗积分</label>
                      <input value="<?php print $def["cost"]?>" name="cost" type="number" min="1" max="10000" class="form-control" placeholder="送礼物花费积分">
                    </div>
                    <div class="form-group">
                      <label>爱心点数</label>
                      <input value="<?php print $def["ben"]?>" name="ben" type="number" min="1" max="100" class="form-control" placeholder="医生获得的爱心点数">
                    </div>
                    <div class="form-group">
                      <label>礼物图片</label>
                      <div class="input-group">
                      	<span class="input-group-addon" style="width:50px;">
                      	<img id="avatar_src" width="50" height="50" src="<?php print HTTP_ENTRY?>/static/present/<?php print $def["avatar"]?>">
                      	</span>
                      <select class="form-control btn-lg" style="height:70px;" name="avatar" class="btn btn-success">
                      <?php foreach ($avatar as $item):?>
                      <option<?php if(pathinfo($item,PATHINFO_BASENAME) == $def["avatar"]):?> selected<?php endif;?> value="<?php print pathinfo($item,PATHINFO_BASENAME)?>"><?php print pathinfo($item,PATHINFO_FILENAME)?></option>
                      <?php endforeach;?>
                      </select>
                      </div>
                    </div>

					<div class="form-group">
					<input type="hidden" value="my card id?" name="rpq"> 
					<input type="hidden" value="302404501200" name="rpa"> 
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



</section>

<script>
$(function(){

	$("select[name=avatar]").on("change",function(){
		$("#avatar_src").attr("src","<?php print HTTP_ENTRY?>/static/present/"+this.value);
// 		$("#example").popover({trigger: 'focus', delay: { show: 500, hide: 100}});
		//$("#example").popover({title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
	});;

	 
});
</script>