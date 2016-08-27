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
$dis_info =  $m->getInfo_disease();


$tree_dis = array();
foreach ($dis_info as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
				"text" => $item["pd"],
				"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = $item["md"];
}
// var_dump($dis_info);exit;
?>
<style>
.dutytable{}
.dutytable td{padding:8px;}
.ddt{
	border-collpase:collapse;
	width:100%;
}
.ddt td{
	border:2px solid gray;
	padding:8px;
}
.weight{
	margin-right:25px;
}
.ddlb{
	min-width:80px;
}
</style>
<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">更新医生与疾病的关系</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/doctor/addDodDid<?php print $ret_url?>">
                    <!-- text input -->
                    <table class="ddt">
                    
                   <?php foreach($m->relDisNotRel()->return as $doctor):?>
					<tr>
                
                     	
               
               
                     	<td>
							<input type="hidden" name="dod[]" value="<?php print $doctor["sid"]?>">
                     		<?php foreach ($tree_dis as $dis):?>
                     		<?php print $dis["text"]?>(<?php print($doctor["name"]) ?>)
                     			<br>
                     			<?php foreach($dis["children"] as $k => $d):?>
                     			<nobr>
                     			
	                     			<label id="dd<?php print $k?>" class="ddlb">
	                     			<input type="checkbox" name="did[<?php $doctor["sid"]?>][]" value="<?php print $k?>">
	                     			<?php print($d)?>
	                     			</label>
	                     			<input size="3" name="weight[<?php $doctor["sid"]?>][<?php print $k?>]" value="60" class="weight">
                     			</nobr>
                     			
                     			<?php endforeach;?>
                     			<br>
                     			<br>
                     			<br>
							<?php endforeach;?>
                     	
                     	</td>
                     
                     </tr>
		      		<?php endforeach;?>
                    
                    
                    
                    </table>
                    
 					
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