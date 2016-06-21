<?php
/**
 * Date: May 12, 2016
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
/**
 * array("doctor","tags","disease","symptom","def")
 * "dis" "doc "sym" "tag"
 */
$info = $data["info"];
// var_dump($info["def"]["tag"]);exit;
if(isset($data["def"]) && !is_null($data["def"])) {
	$actionMode = "edit";
}else{
	$actionMode = "add";
}



if($actionMode == "edit"){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
		"title" => "",
		"content" => "",
		"kw" => "",
		"desc" => "",
		"kw" => "",
		"thumb" => "",
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
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>文章</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form <?php if($ua == "add"):?>enctype="multipart/form-data"<?php endif?> role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/artical/<?php print $ua;?><?php print $ret_url?>">
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
                      <label>关键词</label>
                      <textarea name="kw" required class="form-control" rows="3" placeholder="关键词"><?php print $def["kw"]?></textarea>
                    </div>
					 <div class="form-group">
                      <label>描述</label>
                      <textarea name="desc" required class="form-control" rows="3" placeholder="描述"><?php print $def["desc"]?></textarea>
                    </div>
					<div class="form-group">
                      <label>缩略图</label>
                      <input <?php if($ua == "edit"):?>type="text" class="form-control"<?php else:?>type="file" accept="image/*"<?php endif?> name="thumb" value="<?php print $def["thumb"]?>"/>
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
                      <label>选择医生</label>
                      <?php 
                      $hash_doc_rel = array();
                      foreach ($info["def"]["doc"] as $doc_selected){
                      	$hash_doc_rel[$doc_selected["dod"]] = $doc_selected["aid"];
                      }
                      ?>
         				 <select multiple class="form-control" name="doid[]">
                        <?php foreach ($info["doctor"] as $child):?>
                        <option value="<?php print $child["sid"]?>"<?php if(array_key_exists($child["sid"], $hash_doc_rel)):?>selected <?php endif;?>><?php print $child["name"]?></option>
                        <?php endforeach;?>
           
                        </select>
                    </div>
                    
                     <div class="form-group">
                      <label>选择疾病</label>
         				
         				<?php  
                      	/***
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
                      	foreach ($info["disease"] as $item){
                      		if(!array_key_exists($item["pid"], $tree_dis)){
                      			$tree_dis[$item["pid"]] = array(
                      				"text" => $item["pd"],
                      				"children" => array()
                      			);
                      		}
                      		$tree_dis[$item["pid"]]["children"][$item["mid"]] = $item["md"];
                      	}
                      	
                      	
//                       	var_dump($tree_dis);exit;

//                       	var_dump($info["def"]["dis"]);
                      	$hash_dis_rel = array();
                      	foreach ($info["def"]["dis"] as $dis_selected){
                      		$hash_dis_rel[$dis_selected["did"]] = $dis_selected["aid"];
                      	}
                      	?>
                        <select multiple class="form-control" name="diid[]">
                        <?php foreach ($tree_dis as $pid => $item):?>
                        <optgroup label="<?php print $item["text"]?>">
	                        <?php foreach ($item["children"] as $mid => $child):?>
	                        <option value="<?php print $mid?>"<?php if(array_key_exists($mid, $hash_dis_rel)):?>selected <?php endif;?>><?php print $child?></option>
	                        <?php endforeach;?>
                        </optgroup>
                        
                        <?php endforeach;?>
                        </select> 
                      
                    </div>
                    
                    
                    
                     <div class="form-group">
                      <label>选择症状</label>
         				
         				<?php  
                      	/***
                      	 * array(
                      	 * 	"pid"=>array(
                      	 * 		"text"=>"",
                      	 * 		"children"=>array(
                      	 * 			"id"=>"text"
                      	 * 		)
                      	 * 	)
                      	 * )
                      	 */
                      	$tree_sym = array();
                      	foreach ($info["symptom"] as $item){
                      		if(!array_key_exists($item["pid"], $tree_sym)){
                      			$tree_sym[$item["pid"]] = array(
                      				"text" => $item["pd"],
                      				"children" => array()
                      			);
                      		}
                      		$tree_sym[$item["pid"]]["children"][$item["mid"]] = $item["md"];
                      	}
                      	
                      	
						$hash_sym_rel = array();
                      	foreach ($info["def"]["sym"] as $sym_selected){
                      		$hash_sym_rel[$sym_selected["syd"]] = $sym_selected["aid"];
                      	}
                      	
//                       	var_dump($info["def"]["sym"]);
                      	
                      	?>
                        <select multiple class="form-control" name="syid[]">
                        <?php foreach ($tree_sym as $pid => $item):?>
                        <optgroup label="<?php print $item["text"]?>">
	                        <?php foreach ($item["children"] as $mid => $child):?>
	                        <option value="<?php print $mid?>"<?php if(array_key_exists($mid, $hash_sym_rel)):?> selected<?php endif;?>><?php print $child?></option>
	                        <?php endforeach;?>
                        </optgroup>
                        
                        <?php endforeach;?>
                        </select> 
                      
                    </div>
                    
                     <div class="form-group">
                    
	                      <label>标签</label>
	                		<?php 
	                		$hash_tag_selected = array();
	                		foreach($info["def"]["tag"] as $tag_selected_item){
	                			$hash_tag_selected[$tag_selected_item["tid"]] = 1;
	                		}
// 	                		var_dump($hash_tag_selected);
	                		?>      
	                      <?php foreach ($info["tags"] as $item):?>
	    					<div class="checkbox">
	    					<label>
	    					<input type="checkbox" name="tags[]" value="<?php print $item["sid"]?>"<?php if(array_key_exists($item["sid"], $hash_tag_selected)):?> checked<?php endif?>><?php print $item["text"]?>
	    					</label>
	    					 </div>
	                      <?php endforeach;?>  

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






