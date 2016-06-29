<?php
/**
 * Date: May 12, 2016
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */

if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "editext";
}else{
	$def = array(
		"dod" => "",
		"dlv" => "",
		"start" => "",
		"hot" => "",
		"love" => "",
		"contribution" => "",
		"desc" =>  "",
		"spec" => ""
	);
	$at = "添加";
	$ua = "addext";
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
                  <h3 class="box-title"><?php print $at?>医生信息</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/doctor/<?php print $ua;?><?php print $ret_url?>">
                    <!-- text input -->
                    <div class="form-group">
                      <label>医生id</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="dod" value="<?php print $def["dod"]?>">
                      <?php endif?>
                      
                      
                      <?php if ($ua == "editext"):?>
                      
                      <?php foreach($data["info"] as $doctor):?>
                      <div>
                      <?php if($doctor["dod"] == $def["dod"])print $doctor["name"]?>
                      </div>
                      <?php endforeach;?>
                      
                      <?php else :?>
                      <select class="form-control" name="dod">
                      <?php foreach($data["info"] as $doctor):?>
                      <option value="<?php print $doctor["sid"]?>"><?php print $doctor["name"]?></option>
                     	<?php endforeach;?>
                       </select>
                       
                       <?php endif;?>
                    </div>
                     <div class="form-group">
                      <label>医生等级</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="dlv" value="<?php print $def["dlv"]?>">
                      
                      <?php endif?>
					 <select class="form-control" name="dlv">
	                      <?php foreach($data["lvMeta"] as $lv):?>
	                      <option<?php if($lv["sid"] == $def["dlv"]):?> selected<?php endif;?> value="<?php print $lv["sid"]?>"><?php print $lv["data"]?></option>
                      <?php endforeach;?>
                           </select>

                    </div>
                    <div class="form-group">
                      <label>诊后服务星</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="start" value="<?php print $def["start"]?>">
                      <?php endif?>
                      <input value="<?php print $def["start"]?>" name="start" required type="text" class="form-control" placeholder="请输入医生等级">
                    </div>
                      <div class="form-group">
                      <label>患者推荐热度</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="hot" value="<?php print $def["hot"]?>">
                      <?php endif?>
                      <input value="<?php print $def["hot"]?>" name="hot" required type="text" class="form-control" placeholder="请输入医生等级">
                    </div>
                     <div class="form-group">
                      <label>爱心</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="love" value="<?php print $def["love"]?>">
                      <?php endif?>
                      <input value="<?php print $def["love"]?>" name="love" required type="text" class="form-control" placeholder="请输入医生等级">
                    </div>
                     <div class="form-group">
                      <label>贡献值</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="contribution" value="<?php print $def["contribution"]?>">
                      <?php endif?>
                      <input value="<?php print $def["contribution"]?>" name="contribution" required type="text" class="form-control" placeholder="请输入医生等级">
                    </div>
                     <div class="form-group">
                      <label>医生简介</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="desc" value="<?php print $def["desc"]?>">
                      <?php endif?>
                       <textarea name="desc"  class="form-control" placeholder="医生简介"><?php print $def["desc"]?></textarea>
                    </div>
                     <div class="form-group">
                      <label>医生擅长</label>
                      <?php if($ua == "editext"):?>
                      <input type="hidden" name="spec" value="<?php print $def["spec"]?>">
                      <?php endif?>

                      <textarea name="spec"  class="form-control" placeholder="医生擅长"><?php print $def["spec"]?></textarea>
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

	$("select[name=avatar]").on("change",function(){
		$("#avatar_src")
		.attr("src","<?php print HTTP_ENTRY?>/static/doctor/"+this.value)
		.attr("title",this.value);
// 		$("#example").popover({trigger: 'focus', delay: { show: 500, hide: 100}});
		//$("#example").popover({title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
	});;

// 	//$("select[name=avatar]").popover({title: 'Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
	

	 
});
</script>