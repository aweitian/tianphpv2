<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
	$def["files"] = array();
}else{
	$def = array(
		"askid" => $data["askid"],
		"role" => $data["role"],
		"conmeta" => "text",
		"content" => "",
		"files" => array(),
		"date" => date("Y-m-d H:i:s")
	);
	$at = "添加";
	$ua = "add";
}


// var_dump($def);

$file_item_html = "<div class='input-group'><i class='glyphicon glyphicon-trash input-group-addon'></i><input name='files[]' class='form-control' placeholder='图片路径' value=''></div>";

// var_dump($def);exit;

if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

// var_dump($def["dod"]);exit;
?>
<script src="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>问答 - <?php if($def["role"] == "user"):?>用户追问<?php else:?>医生回答<?php endif;?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <!-- 
                enctype="multipart/form-data"
                	此次HTTP提交为multipart/form-data，需要使用$_REQUEST来获取数据，$_POST,$_GET已被message类删除
                 -->
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/ask/append<?php print $ua; print $ret_url?>">
                   <!-- hidden -->
                   <?php if($ua == "edit"):?>
                   <input type="hidden" name="sid" value="<?php print $_REQUEST["sid"]?>">
                   <?php endif?>
                   <input type="hidden" name="askid" value="<?php print $def["askid"]?>">
                   <input type="hidden" name="role" value="<?php print $def["role"]?>">
                   <input type="hidden" name="conmeta" value="<?php print $def["conmeta"]?>">

                    <!-- textarea -->
                    <div class="form-group">
                      <label><?php if($def["role"] == "user"):?>病情描述<?php else:?>回答内容<?php endif;?></label>
                      <textarea name="content" required class="form-control" rows="3" placeholder="<?php if($def["role"] == "user"):?>病情描述<?php else:?>回答内容<?php endif;?>..."><?php print $def["content"]?></textarea>
                    </div>
     
                    <div class="form-group">
                      <label>图片资料</label>
                      <div id="upload_area">
                      <?php foreach ($def["files"] as $f):?>
                      
                      <?php print str_replace("value=''","value='".$f."'",$file_item_html)?>
                      
                      <?php endforeach;?>
                      </div>
                      	<div class="input-group">
                      	<button class="btn" type="button" id="upload_btn">
	 					<i class="glyphicon glyphicon-plus"></i>
	 					添加图片
	 					</button>
	 					</div>
                    </div>
                    <div class="form-group">
                      <label>日期</label>
         				<div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input name="date" type="datetime" required value="<?php print $def["date"]?>" class="form-control pull-right" id="reservation">
                    	</div>
                    </div>

					<div class="form-group">
	                    <button type="submit" class="btn btn-primary">提交</button>
	                  </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



</section>

<script>
$(function(){
	$("#reservation").datetimepicker({
	    format: 'yyyy-mm-dd hh:ii:ss'
	});
});

$("#upload_btn").click(function(){
	$("#upload_area").append(<?php print json_encode($file_item_html)?>);
});
$("#upload_area").on( "click", "i.glyphicon.glyphicon-trash.input-group-addon", function(){

	$(this).parent().remove();
	//console.log(this);
	
});
</script>