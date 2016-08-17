<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
$def = array(
		"uid" => 0,
		"title" => "",
		"did" => "0",
		"desc" => "",
		"svr" => "",
		"files" => array(),
		"date" => date("Y-m-d H:i:s")
	);
	$at = "添加";
	$ua = "add";


$file_item_html = "<div class='input-group'><i class='glyphicon glyphicon-trash input-group-addon'></i><input name='files[]' class='form-control' placeholder='图片路径' value=''></div>";

// var_dump($this->model->getWaterArm()->return);exit;



if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}


$dis_infoes = $this->model->getAllDis();
$doc_infoes = $this->model->getAllDoc();
// var_dump($def["dod"]);exit;
?>
<script type="text/javascript">
<!--
function ru(o)
{
	o.parentNode.nextSibling.value = o.parentNode.nextSibling.options[Math.floor(o.parentNode.nextSibling.options.length * Math.random())].value;
	
}
//-->
</script>
<script src="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>问答</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <!-- 
                enctype="multipart/form-data"
                	此次HTTP提交为multipart/form-data，需要使用$_REQUEST来获取数据，$_POST,$_GET已被message类删除
                 -->
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/ask/<?php print $ua;?><?php print $ret_url?>">
                   <!-- hidden -->
                   <div class="form-group">
                      <label>水军(<span style="color: blue" onclick='ru(this)'>点击随机产生</span>)</label><select class="form-control" name="uid" id="sel_uid">
                        <?php foreach ($this->model->getWaterArm()->return as $item):?>
	               		<option value="<?php print $item["sid"]?>"><?php print $item["name"]?></option>
                        <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label>医生(<span style="color: blue" onclick='ru(this)'>点击随机产生</span>)</label><select class="form-control" name="dod" id="sel_dd">
                        <?php foreach ($doc_infoes as $item):?>
	               		<option value="<?php print $item["sid"]?>"<?php if(isset($def["dod"]) && $def["dod"] == $item["sid"]):?> selected<?php endif;?>><?php print $item["name"]?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                                     
                    <!-- text input -->
                    <div class="form-group">
                      <label>标题</label>
                      <?php if($ua == "edit"):?>
                      <input type="hidden" name="sid" value="<?php print $def["sid"]?>">
                      <?php endif?>
                      <input value="<?php print $def["title"]?>" name="title" required type="text" class="form-control" placeholder="文章标题">
                    </div>
                    
                    <div class="form-group">
                      <label>病种</label>
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
                      	foreach ($dis_infoes as $item){
                      		if(!array_key_exists($item["pid"], $tree_dis)){
                      			$tree_dis[$item["pid"]] = array(
                      				"text" => $item["pd"],
                      				"children" => array()
                      			);
                      		}
                      		$tree_dis[$item["pid"]]["children"][$item["mid"]] = $item["md"];
                      	}
                      	
                      	
                      	//var_dump($tree_dis);exit;
                      	
                      	?>
                        <select class="form-control" name="did" id="sel_dd">
                        <?php foreach ($tree_dis as $pid => $item):?>
                        <optgroup label="<?php print $item["text"]?>">
	                        <?php foreach ($item["children"] as $mid => $child):?>
	                        <option value="<?php print $mid?>"<?php if($def["did"] == $mid):?> selected<?php endif;?>><?php print $child?></option>
	                        <?php endforeach;?>
                        </optgroup>
                        
                        <?php endforeach;?>
                        </select>
                    </div>
                    
                    
                    
                    <!-- textarea -->
                    <div class="form-group">
                      <label>病情描述</label>
                      <textarea name="desc" required class="form-control" rows="3" placeholder="病情描述..."><?php print $def["desc"]?></textarea>
                    </div>
                    <div class="form-group">
                      <label>希望提供的帮助</label>
                      <textarea name="svr" required class="form-control" rows="3" placeholder="希望提供的帮助"><?php print $def["svr"]?></textarea>
                    </div>
                    <div class="form-group">
                      <label>检查资料</label>
                      <div id="upload_area">
                      <?php foreach ($def["files"] as $f):?>
                      
                      <?php print str_replace("value=''","value='".$f."'",$file_item_html)?>
                      
                      <?php endforeach;?>
                      </div>
                      	<div class="input-group">
                      	<button class="btn" type="button" id="upload_btn">
	 					<i class="glyphicon glyphicon-plus"></i>
	 					添加检查资料
	 					</button>
	 					</div>
                    </div>
                    <div class="form-group">
                      <label>日期</label>
         				<div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input name="date" type="datetime" required value="<?php print $def["date"]?>" class="form-control pull-right" id="reservation">
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
	$("#reservation").datetimepicker({
	    format: 'yyyy-mm-dd hh:ii:ss'
	});
});

$("#upload_btn").click(function(){
	$("#upload_area").append(<?php print json_encode($file_item_html)?>);
});
$("#upload_area").on( "click", "i.glyphicon.glyphicon-trash.input-group-addon", function(){

	$(this).parent().remove();
	//console.log(this);
	
});
</script>