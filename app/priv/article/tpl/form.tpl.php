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
$model = $data["model"];
// var_dump($info["def"]["tag"]);exit;
if(isset($data["def"]) && !is_null($data["def"])) {
	$actionMode = "edit";
}else{
	$actionMode = "add";
}

/**
 * @var pmcaiMsg
 */
$msg = $model->msg;

if($actionMode == "edit"){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
	$aid = $msg["?sid"];
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
	$aid = 0;
}
if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

//array(2) { ["aid"]=> string(3) "354" ["trd"]=> string(1) "7" }
if($aid > 0)
	$channelData = $model->getInfo_tree($aid);

?>

<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script>
function hideContent(o)
{
	$(o).parent().parent().find("div").toggle();
}
</script>

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>文章</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form onsubmit="return chk(this)" <?php if($ua == "add"):?>enctype="multipart/form-data"<?php endif?> role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/article/<?php print $ua;?><?php print $ret_url?>">
                    <!-- text input -->
                    <div class="form-group">
                      <label>标题</label>
                      <?php if($ua == "edit"):?>
                      <input type="hidden" name="sid" value="<?php print $def["sid"]?>">
                      <?php endif?>
                      <input value="<?php print AppFilter::filterOut($def["title"])?>" name="title" required type="text" class="form-control" placeholder="文章标题">
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                      <label>内容</label>&nbsp;<a href="#" onclick="window.open('<?php print HTTP_ENTRY?>/editor')">使用kindeditor编辑器编辑</a>
                      <textarea id="articlecontent" name="content" required class="form-control" rows="3" placeholder="内容"><?php print AppFilter::filterOut($def["content"])?></textarea>
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
                      <?php 
                      $hash_doc_rel = array();
                      foreach ($info["def"]["doc"] as $doc_selected){
                      	$hash_doc_rel[$doc_selected["dod"]] = $doc_selected["aid"];
                      }
                      ?>
                      <fieldset>
                      	<legend>选择医生 <span onclick="hideContent(this)" class="text-info" style="cursor:pointer">显示/隐藏</span></legend>
						<div style="display: none">
 	                        <?php foreach ($info["doctor"] as $child):?>
	                        <label style="font-weight:normal;padding-right:12px;">
	                        <input type="checkbox" name="doid[]" value="<?php print $child["sid"]?>"<?php if(array_key_exists($child["sid"], $hash_doc_rel)):?>checked <?php endif;?>><?php print $child["name"]?>
	                        </label>
	                        <?php endforeach;?>        				

						</div>
                      	</fieldset>  
                        
                        
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
                      	<fieldset>
                      	<legend>选择疾病 <span onclick="hideContent(this)" class="text-info" style="cursor:pointer">显示/隐藏</span></legend>
                      	<div style="display: none">
                      	 <?php foreach ($tree_dis as $pid => $item):?>
                        <b><?php print $item["text"]?>:</b>
	                        <?php foreach ($item["children"] as $mid => $child):?>
	                        <label style="font-weight:normal;padding-right:12px;">
	                        <input type="checkbox" name="diid[]" value="<?php print $mid?>"<?php if(array_key_exists($mid, $hash_dis_rel)):?>checked <?php endif;?>><?php print $child?>
	                        </label>
	                        <?php endforeach;?>
                        <br>
                        
                        <?php endforeach;?>
                      	
                      	</div>
                      	</fieldset>
<!--                         <select multiple class="form-control" name="diid[]"> -->
                       
<!--                         </select>  -->
                      
                    </div>
                    
                    
                    
                     <div class="form-group">
         				<?php  
                      	/***
                      	 * 选择症状
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
                      		if(!$item["pd"])continue;
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
                      
                      	<fieldset>
                      	<legend>选择症状 <span onclick="hideContent(this)" class="text-info" style="cursor:pointer">显示/隐藏</span></legend>
                      	<div style="display: none">
                      	 <?php foreach ($tree_sym as $pid => $item):?>
                        <b><?php print $item["text"]?>:</b><br>
	                       <?php foreach ($item["children"] as $mid => $child):?>
	                        <label style="font-weight:normal;padding-right:12px;<?php if($model->hasArticleBysyd($mid)):?><?php else:?>color:red;<?php endif?>">
	                        <input type="checkbox" name="syid[]" value="<?php print $mid?>"<?php if(array_key_exists($mid, $hash_sym_rel)):?>checked <?php endif;?>><?php print $child?>
	                        </label>
	                        <?php endforeach;?>
                        <br>
                        <?php endforeach;?>
                      	
                      	</div>
                      	</fieldset>
                      
                      
                      
                    </div>
                   
                    <div class="form-group">
	                      <label>栏目</label>
	                      <select name="tree" class="form-control pull-right">
	                      <option value="0"> ---- 空 ----</option>
	                      <?php foreach ($model->dump() as $item):?>
	    					
	    					<option<?php if(isset($channelData["trd"]) && $channelData["trd"] == $item["sid"]):?> selected<?php endif?> value="<?php print $item["sid"]?>"><?php print str_replace(' ','&nbsp;',$item["name"])?></option>
	    					
	    					
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
function chk(o) {
	var dods = o["doid[]"];
	for(var i=0;i<dods.length;i++){
		if(dods[i].checked)return true;
	}
	alert("需要选择一个医生");
	return false;
}
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






