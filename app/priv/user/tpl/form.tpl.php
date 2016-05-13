<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */

$def_avatar_src = "181941301.png";

if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
			"email" => "",
			"name" => "",
			"pwd" => "",
			"phone" => "",
			"avatar" => $def_avatar_src,
			"rpq" => "",
			"rpa" => "",
			"date" => date("Y-m-d")
	);
	$at = "添加";
	$ua = "add";
}
if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}
$avatar = tian::getFileList(FILE_SYSTEM_ENTRY."/static/avatar","gif,jpg,png");
// var_dump($avatar);exit;

?>

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>用户</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/user/<?php print $ua;?><?php print $ret_url?>">
                    <!-- text input -->
                    <div class="form-group">
                      <label>邮箱</label>
                      <?php if($ua == "edit"):?>
                      <input type="hidden" name="sid" value="<?php print $def["sid"]?>">
                      <?php endif?>
                      <input value="<?php print $def["email"]?>" name="email" required type="email" class="form-control" placeholder="user@qq.com">
                    </div>
                    <div class="form-group">
                      <label>昵称(可选)</label>
                      <input value="<?php print $def["name"]?>" name="name" type="text" class="form-control" placeholder="请输入昵称用于显示，登陆使用邮箱">
                    </div>
                    <?php if($ua == "add"):?>
                    <div class="form-group">
                      <label>密码</label>
                      <input value="<?php print $def["pwd"]?>" name="pwd" required type="text" class="form-control" placeholder="至少3位">
                    </div>
                    <?php endif?>
                    <div class="form-group">
                      <label>手机(可选)</label>
                      <input value="<?php print $def["phone"]?>" name="phone" type="tel" class="form-control" placeholder="13678780000">
                    </div>
                    <div class="form-group">
                      <label>头像</label>
                      <div class="input-group">
                      	<span class="input-group-addon" style="width:50px;">
                      	<img id="avatar_src" width="50" height="50" src="<?php print HTTP_ENTRY?>/static/avatar/<?php print $def["avatar"]?>">
                      	</span>
                      <select class="form-control btn-lg" style="height:70px;" name="avatar" class="btn btn-success">
                      <?php foreach ($avatar as $item):?>
                      <option<?php if(pathinfo($item,PATHINFO_BASENAME) == $def["avatar"]):?> selected<?php endif;?> value="<?php print pathinfo($item,PATHINFO_BASENAME)?>"><?php print pathinfo($item,PATHINFO_FILENAME)?></option>
                      <?php endforeach;?>
                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>日期</label>
         				<div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input name="date" type="date" required value="<?php print $def["date"]?>" class="form-control pull-right" id="reservation">
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
	$("#reservation").datepicker({
		"format":"yyyy-mm-dd"
	});

	$("select[name=avatar]").on("change",function(){
		$("#avatar_src").attr("src","<?php print HTTP_ENTRY?>/static/avatar/"+this.value);
// 		$("#example").popover({trigger: 'focus', delay: { show: 500, hide: 100}});
		//$("#example").popover({title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
	});;

// 	//$("select[name=avatar]").popover({title: 'Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
	

	 
});
</script>