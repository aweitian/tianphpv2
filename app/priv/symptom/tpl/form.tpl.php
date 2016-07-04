<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
		"data" => "",
		"dis"  => array()
	);
	$at = "添加";
	$ua = "add";
}
$pid = $data["pid"];
$meta = $data["meta"];
$dis = $data["dis"];

if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

?>
		<section class="content">
			<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>一个<?php print $meta?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/symptom/<?php print $ua;?><?php print $ret_url?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="vv"><?php print $meta?></label>
                      <input type="hidden" name="pid" value="<?php print $pid?>">
                      <input required id="vv" type="text" name="data" value="<?php print $def["data"]?>" class="form-control" placeholder="<?php print $meta?>名称">
                    </div>
                    <div class="form-group">
						<?php  
                      	/***
                      	 * 选择疾病
                      	 * array(
                      	 * 	"pid"=>array(
                      	 * 		"text"=>"",
                      	 * 		"children"=>array(
                      	 * 			"id"=>"text"
                      	 * 		)
                      	 * 	)
                      	 * )
                      	 */
                      	$tree_dis = array();
                      	foreach ($dis as $item){
                      		if(!array_key_exists($item["pid"], $tree_dis)){
                      			$tree_dis[$item["pid"]] = array(
                      				"text" => $item["pd"],
                      				"children" => array()
                      			);
                      		}
                      		$tree_dis[$item["pid"]]["children"][$item["mid"]] = $item["md"];
                      	}
                      	$hash_dis_rel = array();
                      	foreach ($def["dis"] as $dis_selected){
                      		$hash_dis_rel[$dis_selected["did"]] = $dis_selected["syd"];
                      	}
                      	
//                       	var_dump($hash_dis_rel);exit;
                      	
                      	?>
                    
                    <fieldset>
                      	<legend>选择诱发疾病</legend>
                      	 <?php foreach ($tree_dis as $pid => $item):?>
                        <span style="font-weight:bolder;display:inline-block;min-width:80px;"><?php print $item["text"]?>:</span>
	                        <?php foreach ($item["children"] as $mid => $child):?>
	                        <label style="font-weight:normal;padding-right:12px;display:inline-block;">
	                        <input type="checkbox" name="diid[]" value="<?php print $mid?>"<?php if(array_key_exists($mid, $hash_dis_rel)):?>checked <?php endif;?>><?php print $child?>
	                        </label>
	                        <?php endforeach;?>
                        <br>
                        <?php endforeach;?>
                      	
                      	
                      	</fieldset>
                    
                    
                    </div>
                    
                    
                    
                    
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>
                </form>
              </div><!-- /.box -->
		</section>