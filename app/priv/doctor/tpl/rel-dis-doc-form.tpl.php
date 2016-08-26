<?php
/**
 * Date: May 12, 2016
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
$m = $data["model"];
if(isset($m->msg["?dod"],$m->msg["?did"])){
	$def = $m->relDisRow($m->msg["?dod"],$m->msg["?did"]);
	$at = "编辑";
	$ua = "editext";
}else{
	$def = array(
		"dod" => "",
		"did" => "",
		"weight" => "60",
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
<style>
.dutytable{}
.dutytable td{padding:8px;}
</style>
<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>医生与疾病的关系</h3>
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
		                      <?php foreach($m->relDisNotRel()->return as $doctor):?>
		                      <div class="text-danger">
		                      <?php if($doctor["dod"] == $def["dod"])print $doctor["name"]?>
		                      </div>
		                      <?php endforeach;?>
		   			<?php else :?>
		                      <select class="form-control" name="dod">
		                      <?php foreach($m->relDisNotRel()->return as $doctor):?>
		                      <option value="<?php print $doctor["sid"]?>"><?php print $doctor["name"]?></option>
		                     	<?php endforeach;?>
		                       </select>
                       
                       <?php endif;?>
                    </div>
                     <div class="form-group">
                      <label>医生等级</label>
					 <select class="form-control" name="dlv">
	                      <?php foreach($data["lvMeta"] as $lv):?>
	                      <option<?php if($lv["sid"] == $def["dlv"]):?> selected<?php endif;?> value="<?php print $lv["sid"]?>"><?php print $lv["data"]?></option>
                      <?php endforeach;?>
                           </select>

                    </div>
                    <div class="form-group">
                      <label>诊后服务星</label>
                        <input value="<?php print $def["star"]?>" name="star" required type="number" min="1" max="10" class="form-control" placeholder="请输入医生等级">
                    </div>
                      <div class="form-group">
                      <label>患者推荐热度</label>
                      <input value="<?php print $def["hot"]?>" name="hot" required type="text" class="form-control" placeholder="请输入医生等级">
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