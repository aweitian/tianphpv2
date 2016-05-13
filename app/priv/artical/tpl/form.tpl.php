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
}else{
	$def = array(
			"title" => "",
			"content" => "",
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
?>
<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>文章</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/artical/<?php print $ua;?><?php print $ret_url?>">
                    <!-- text input -->
                    <div class="form-group">
                      <label>标题</label>
                      <?php if($ua == "edit"):?>
                      <input type="hidden" name="sid" value="<?php print $def["sid"]?>">
                      
                      <?php endif?>
                      <input value="<?php print $def["title"]?>" name="title" required type="text" class="form-control" placeholder="文章标题">
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                      <label>内容</label>
                      <textarea name="content" required class="form-control" rows="3" placeholder="内容"><?php print $def["content"]?></textarea>
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
});
</script>