<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * array("doctor","tags","disease","symptom","def")
 * "dis" "doc "sym" "tag"
 */
// $info = $data["info"];
// var_dump($data["user"]);exit;
if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "editcomment";
}else{
	$def = array(
		"aid" => $_REQUEST["aid"],
		"uid" => 0,
		"comment" => "",
		"datetime" => date("Y-m-d H:i:s")
	);
	$at = "添加";
	$ua = "addcomment";
}
if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}
?>
<script src="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>评论</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
					<form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/article/<?php print $ua;?><?php print $ret_url?>">
                   	<?php if(isset($_REQUEST["aid"])):?>
                   	<input type="hidden" name="aid" value="<?php print $_REQUEST["aid"]?>">
                   	<?php else:?>
                   	<input type="hidden" name="sid" value="<?php print $_REQUEST["sid"]?>">
                   	<?php endif;?>
                   	<div class="form-group">
           				<label>选择用户</label>
         				<select class="form-control" name="uid">
                        <?php foreach ($data["user"]->return as $child):?>
                        <option value="<?php print $child["sid"]?>"<?php if($child["sid"] == $def["uid"]):?>selected <?php endif;?>><?php print $child["name"]?></option>
                        <?php endforeach;?>
                        </select>
           			</div>
                   
                    <!-- textarea -->
                    <div class="form-group">
                      <label>内容</label>
                      <textarea name="comment" required class="form-control" rows="3" placeholder="内容"><?php print $def["comment"]?></textarea>
                    </div>
                    <div class="form-group">
                      <label>日期</label>
         				<div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input name="datetime" type="datetime" required value="<?php print $def["datetime"]?>" class="form-control pull-right" id="reservation">
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
</script>





<!-- 
<input id="debug" type="text">
<script>
// var elt = $('#debug');
// elt.tagsinput({
//   itemValue: 'value',
//   itemText: 'text'
// });
// elt.tagsinput('add', { "value": 1 , "text": "Amsterdam" });
// elt.tagsinput('add', { "value": 4 , "text": "Washington"});
// elt.tagsinput('add', { "value": 7 , "text": "Sydney"    });
// elt.tagsinput('add', { "value": 10, "text": "Beijing"  });
// elt.tagsinput('add', { "value": 13, "text": "Cairo"     });
</script> 
-->






