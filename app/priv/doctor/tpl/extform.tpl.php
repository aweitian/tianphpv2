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
		"spec" => "",
		"duty" => str_pad(0, 21, "0", STR_PAD_LEFT)
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
                      <div class="text-danger">
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
					 <select class="form-control" name="dlv">
	                      <?php foreach($data["lvMeta"] as $lv):?>
	                      <option<?php if($lv["sid"] == $def["dlv"]):?> selected<?php endif;?> value="<?php print $lv["sid"]?>"><?php print $lv["data"]?></option>
                      <?php endforeach;?>
                           </select>

                    </div>
                    <div class="form-group">
                      <label>诊后服务星</label>
                        <input value="<?php print $def["start"]?>" name="start" required type="number" min="1" max="10" class="form-control" placeholder="请输入医生等级">
                    </div>
                      <div class="form-group">
                      <label>患者推荐热度</label>
                      <input value="<?php print $def["hot"]?>" name="hot" required type="text" class="form-control" placeholder="请输入医生等级">
                    </div>
                     <div class="form-group">
                      <label>爱心</label>

                      <input value="<?php print $def["love"]?>" name="love" required type="number" class="form-control" placeholder="请输入医生等级">
                    </div>
                     <div class="form-group">
                      <label>贡献值</label>
                      <input value="<?php print $def["contribution"]?>" name="contribution" required type="number" class="form-control" placeholder="请输入医生等级">
                    </div>
                     <div class="form-group">
                      <label>医生简介</label>
                       <textarea name="desc"  class="form-control" placeholder="医生简介"><?php print $def["desc"]?></textarea>
                    </div>
                     <div class="form-group">
                      <label>医生擅长</label>
                      <textarea name="spec"  class="form-control" placeholder="医生擅长"><?php print $def["spec"]?></textarea>
                    </div>
 					<div class="form-group">
                      <label>医生值班表</label>
                      
                      <?php require_once FILE_SYSTEM_ENTRY."/app/data/_meta/doctorDutyMeta.php"?>
                      <?php $meta_duty = doctorDutyMeta::getDay()?>
                      <?php $meta_status = doctorDutyMeta::getDayStaus()?>
                      <?php $meta_daynight = doctorDutyMeta::getDayNight()?>
                     
                     <?php /*var_dump($def["duty"]);*/?>
                     
                     	<table class="dutytable">
                     	<thead>
                     	<tr>
                     		<th></th>
                     		<th>星期1</th>
                     		<th>星期2</th>
                     		<th>星期3</th>
                     		<th>星期4</th>
                     		<th>星期5</th>
                     		<th>星期6</th>
                     		<th>星期天</th>
                     	</tr>
                     	</thead>
                     	<tbody>
                     	<?php for($i=0;$i<3;$i++):?> 
                      	<tr>
                      	<td><?php print $meta_daynight[$i]?></td>
                      	
	                      	<?php for($j=0;$j<7;$j++):?> 
	                   		<td>
		                   		<select name="duty[]">
			                    <?php for($k=0;$k<4;$k++):?>
			                    <option value="<?php print $k?>"<?php if(substr($def["duty"],$i * 7 + $j,1) == $k):?> selected<?php endif;?>><?php print $meta_status[$k]?></option>
			                    <?php endfor;?>
			                    </select>
	                   		</td>
		                     
		                     <?php endfor;?>
	                     </tr>
	                     <?php endfor;?>
                     	
                     	</tbody>
                     	</table>
                     
                      <div>
                    
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