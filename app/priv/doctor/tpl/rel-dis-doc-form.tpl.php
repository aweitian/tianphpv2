<?php
/**
 * Date: May 12, 2016
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
$m = $data["model"];

$def_weight = 60;

$def = $m->relDisAll()->return;

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


$tree_data = array();
foreach ($def as $item){
	if(!array_key_exists($item["dod"], $tree_data)){
		$tree_data[$item["dod"]] = array();
	}
	$tree_data[$item["dod"]][$item["did"]] = $item["weight"];
}


// array(2) {
// 	[2]=>
// 	array(1) {
// 		[1088]=>
// 		string(2) "25"
// 	}
// 	[3]=>
// 	array(1) {
// 		[1088]=>
// 		string(2) "74"
// 	}
// }
// var_dump($tree_data);exit;



$def = $tree_data;
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
                 <div class="form-group">
                    
                  </div>
                   
                    <!-- text input -->
                    <table class="ddt">
                    
                   <?php foreach($m->relDisNotRel()->return as $doctor):?>
					<tr>
                     	<td>
                    		<form method="post" action="<?php print HTTP_ENTRY?>/priv/doctor/dodDid<?php print $ret_url?>">
							<input type="hidden" name="dod" value="<?php print $doctor["sid"]?>">
                     		<?php foreach ($tree_dis as $dis):?>
                     		<div>
                     			<?php print $dis["text"]?>(<?php print($doctor["name"]) ?>|<?php print($doctor["sid"]) ?>)
                     		</div>
                     			<?php foreach($dis["children"] as $k => $d):?>
                     			<nobr>
                     			
	                     			<label id="dd<?php print $k?>" class="ddlb" title="<?php print $k?>">
	                     			<input<?php if(array_key_exists($doctor["sid"], $def) && array_key_exists($k, $def[$doctor["sid"]]) ):?> checked<?php endif?> type="checkbox" name="did[]" value="<?php print $k?>">
	                     			<?php print($d)?>
	                     			</label>
	                     			<input value="<?php print array_key_exists($doctor["sid"], $def) && array_key_exists($k, $def[$doctor["sid"]]) ? $def[$doctor["sid"]][$k] : $def_weight?>" size="3" name="weight[<?php print $k?>]" value="60" class="weight">
                     			</nobr>
                     			
                     			<?php endforeach;?>
							<?php endforeach;?>
                     		<br>
			        		<button type="submit" class="btn btn-primary">提交</button>
			        
		
                    		</form>
                     	</td>
                     
                     </tr>
		      		<?php endforeach;?>
			        
                    
                    </table>
                    
 					
					

                  
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