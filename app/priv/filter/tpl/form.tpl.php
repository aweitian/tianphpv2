<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
// var_dump($data["usr"]);
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlColumnInfo.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/_meta/filterTypeMeta.php";
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlTableInfo.php";

$model = $data["model"];
$info = $data["info"];
$act = $data["act"];
if ($act == "edit") {
	$ret = $model->row($_REQUEST["sid"]);
	if(!$ret->isTrue()){
		$this->showOpResult($info,$ret->info,"");
	}
	$def = $ret->return;
	$at = "编辑";
	$ua = "edit";
} else {
	$def = array (
			"type" => "set",
			"data" => "",
			"enabled" => 1,
			"order" => 0 
	);
	$at = "添加";
	$ua = "add";
}
if (isset ( $_SERVER ['HTTP_REFERER'] )) {
	$ret_url = "?returl=" . urlencode ( $_SERVER ['HTTP_REFERER'] );
} else {
	$ret_url = "";
}

$str_fields = array ();
$num_fields = array ();

$tbname = "data_hosipital";

$tbinfo = new mysqlTableInfo ( $tbname );

foreach ( $tbinfo->getColumnNames () as $col ) {

	$colinfo = new mysqlColumnInfo ( $tbname, $col );
// 	var_dump($colinfo->getType ());
	if (mysqlColumnInfo::getPdoParamType ( $colinfo->getType () ) == PDO::PARAM_INT) {
		if(!$colinfo->isPk() && $model->chkRange($col)){
			$num_fields [$col] = $col."(".$colinfo->getComment().")";
		}
	} else if (mysqlColumnInfo::getPdoParamType ( $colinfo->getType () ) == PDO::PARAM_STR) {
		if($model->chkLikestr()){
			$str_fields [$col] = $col."(".$colinfo->getComment().")";
		}
	}

}
$fields = explode ( ",", $colinfo->getLen () );
$fields_name = filterTypeMeta::getData();
// var_dump($def);exit;

?>

<section class="content">
	<!-- general form elements disabled -->
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title"><?php print $at?>条件</h3>
		</div>
		
		<div id="data_controls" style="display:none">
			<div id="data_set">
				<input value="<?php if($def["type"] == "set"){print $def["data"];}?>" name="data" class="form-control" placeholder="以|分隔不同层级，以,分隔同一层级">
			</div>
			
			<div id="data_range">
			<?php if(count($num_fields)):?>
			<select class="form-control" name="data">
			<?php foreach ($num_fields as $field => $name): ?>
			<option<?php if($def["type"] == "range" && $field == $def["data"]){print " selected";}?> value="<?php print $field?>"><?php print $name?></option>
			<?php endforeach;?>			
			</select>	
			<?php endif;?>	
			</div>
			
			<div id="data_likestr">
			<?php if(count($str_fields)):?>
			<?php foreach ($str_fields as $field => $name): ?>
			<input<?php if($def["type"] == "likestr" && in_array($field,explode(",",$def["data"]))){print " checked";}?> type="checkbox" name="data[]" value="<?php print $field?>"><?php print $name?>
			<?php endforeach;?>			
			<?php endif;?>	
			</div>
		</div>
		
		<!-- /.box-header -->
		<div class="box-body">
			<form role="form" method="post"
				action="<?php print HTTP_ENTRY?>/priv/filter/<?php print $ua;?><?php print $ret_url?>">
                    <?php if(isset($_REQUEST["sid"])):?>
                    
                    <input type="hidden"
					value="<?php print $_REQUEST["sid"]?>" name="sid">
                    <?php endif;?>
                    <!-- text input -->
                   <?php if ($at == "add"):?>
				<div class="form-group">
					<label>选择条件类型</label> <select id="typectl" class="form-control" name="type">
						<option value="set" <?php if("set" == $def["type"]):?> selected
							<?php endif;?>>
							<?php print $fields_name["set"]?></option>
							
						<?php if(count($num_fields)):?>	
						<option value="range" <?php if("range" == $def["type"]):?> selected
							<?php endif;?>>
							<?php print $fields_name["range"]?></option>
						<?php endif?>	
						
						<?php if(count($str_fields)):?>	
						<option value="likestr" <?php if("likestr" == $def["type"]):?> selected
							<?php endif;?>>
							<?php print $fields_name["likestr"]?></option>
						<?php endif?>	
						
                        </select>
				</div>
				<?php endif;?>
				<div class="form-group">
					<label>补充数据</label> 
					
				<?php if ($at == "add"):?>	
					<div id="data_container">
					<?php if($def["type"] == "set"):?>
					<input value="<?php if($def["type"] == "set"){print $def["data"];}?>" name="data" class="form-control" placeholder="以|分隔不同层级，以,分隔同一层级">
					<?php endif;?>
					
					<?php if($def["type"] == "range" && count($num_fields)):?>
					<select class="form-control" name="data">
					<?php foreach ($num_fields as $field => $name): ?>
					<option<?php if($field == $def["data"]){print " selected";}?> value="<?php print $field?>"><?php print $name?></option>
					<?php endforeach;?>			
					</select>	
					<?php endif;?>	
					
					<?php if($def["type"] == "likestr" && count($str_fields)):?>
					<?php foreach ($str_fields as $field => $name): ?>
					<input<?php if(in_array($field,explode(",",$def["data"]))){print " checked";}?> type="checkbox" name="data[]" value="<?php print $field?>"><?php print $name?>
					<?php endforeach;?>			
					<?php endif;?>	
					
					</div>
				<?php else:?>

					<?php if($def["type"] == "set"):?>
					<input value="<?php print $def["data"];?>" name="data" class="form-control">
					<?php else:?>
					<input type="hidden" value="<?php print $def["data"];?>" name="data" class="form-control">
					<br><?php print $def["data"];?>
					<?php endif;?>
				<?php endif?>
				</div>
<!--
				<div class="form-group">
					<label>是否启用</label> 
					<br>
					<input<?php if($def["enabled"] == "1"){print " checked";}?> type="checkbox" name="enabled">
				</div>
 -->


				<div class="form-group">
					<label>排序</label>
	
						<input name="order" required 
						class="form-control" value="<?php print $def["order"]?>"
							placeholder="排序决定了条件的上下顺序">
					
					
				</div>


				<div class="form-group">
					<button type="submit" class="btn btn-primary">提交</button>
				</div>

			</form>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->



</section>

<script>
$(function(){
	$("#typectl").change(function(){
		$("#data_container").html(
			$("#data_"+this.value).html()
		);

	});
});
</script>