<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
// var_dump($data["usr"]);
if(isset($data["def"]) && !is_null($data["def"])){
	$def = $data["def"];
	$at = "编辑";
	$ua = "edit";
}else{
	$def = array(
		"uid" => 0,
		"did" => 0,
		"dod" => 0,
		"lv" => 0,
		"txt" => '',
		"date" => date("Y-m-d"),
	);
	$at = "添加";
	$ua = "add";
}
if(isset($_SERVER['HTTP_REFERER'])){
	$ret_url = "?returl=".urlencode($_SERVER['HTTP_REFERER']);
}else{
	$ret_url = "";
}

// var_dump($def);exit;

?>

<section class="content">
 <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $at?>对医生的评价</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <script>
				function ru()
				{
					document.getElementById('ake_23832873321').value = document.getElementById("ake_23832873321").options[Math.floor(document.getElementById("ake_23832873321").options.length * Math.random())].value;
				}

                </script>
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/appraise/<?php print $ua;?><?php print $ret_url?>">
                    <?php if(isset($_REQUEST["sid"])):?>
                    
                    <input type="hidden" value="<?php print $_REQUEST["sid"]?>" name="sid">
                    <?php endif;?>
                    <!-- text input -->
                    <div class="form-group">
           				<label>选择用户(<span style="color: blue" onclick='ru()'>点击随机产生</span>)</label>
         				<select id='ake_23832873321' class="form-control" name="uid">
                        <?php foreach ($data["usr"]->return as $child):?>
                        <option value="<?php print $child["sid"]?>"<?php if($child["sid"] == $def["uid"]):?>selected <?php endif;?>><?php print $child["name"]?></option>
                        <?php endforeach;?>
                        </select>
           			</div>
           			
           			<div class="form-group">
                      <label>选择疾病</label>
                        <select class="form-control" name="did">
                        <?php foreach ($data["dis"] as $item):?>
	                        <option value="<?php print $item["sid"]?>"<?php if($item["sid"] == $data["def"]["did"]):?>selected <?php endif;?>><?php print $item["data"]?></option>
                        <?php endforeach;?>
                        </select> 
                      
                    </div>
           			
 					<div class="form-group">
                      <label>选择医生</label>
         				 <select class="form-control" name="dod">
                        <?php foreach ($data["doc"] as $child):?>
                        <option value="<?php print $child["sid"]?>"<?php if($child["sid"] == $data["def"]["dod"]):?>selected <?php endif;?>><?php print $child["name"]?></option>
                        <?php endforeach;?>
           
                        </select>
                    </div>

                    
                    
                    <div class="form-group">
                      <label>满意度</label>
                      <div class="input-group">
                      <?php foreach (appraiseApi::getAppraiseMeta() as $i => $meta):?>
                      <label>
                      <input type="radio" name="lv" value="<?php print $i?>"<?php if($def["lv"] == $i):?> checked<?php endif;?>><?php print $meta?>
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
					<?php endforeach;?>
						</div>
                   </div>
                    <div class="form-group">
                      <label>内容</label>
                      <textarea name="txt" required class="form-control" rows="3" placeholder="内容"><?php print $def["txt"]?></textarea>
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
	                    <button type="submit" class="btn btn-primary">提交</button>
	                  </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



</section>

<script>
$(function(){


	 
});
</script>