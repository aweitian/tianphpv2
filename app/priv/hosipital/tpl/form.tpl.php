<?php
/**
 * Date: May 12, 2016
  * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
// var_dump($data["usr"]);
if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
		"text" => 0,
				);
	$at = "添加";
	$ua = "add";
}
if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

// var_dump($def);exit;

?>

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>标签</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/tags/<?php print $ua;?><?php print $ret_url?>">
                    <?php if(isset($_REQUEST["sid"])):?>
                    
                    <input type="hidden" value="<?php print $_REQUEST["sid"]?>" name="sid">
                    <?php endif;?>
                    <!-- text input -->
                    <div class="form-group">
           				<label>标签</label>
						<input  name="text" type="text" class="form-control"  value="<?php print $def["text"]?>" />
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


	 
});
</script>