<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月2日
 * @Desc: 
 * 依赖:
 */
$model = $data["model"];
$msg   = $data["msg"];


// var_dump($model->getDataDomainLikestr());exit();

?>
<style>
<!--
table.demo{

}
table.demo td{
	padding:8px;
}
-->
</style>
<script>
function showSub(id,m)
{
	$(".sub_cond"+m).hide();
	$("#sub_cond_"+id).show();
}

</script>
<section class="content">

		<div class="box">
		
		<div class="box-body">
		
		<form action="<?php print HTTP_ENTRY?>/priv/hosipital_filter" method="post">
		
		<?php $meta = $model->getAvailableMeta()?>
		<table border="1" class="demo">
		<?php foreach ($meta->return as $m):?>
		<?php if($m["type"] == "set"):?>
		<tr>
			<?php $t = explode(",", $m["data"])?>
			<td>
				<?php print $t[0]?>
			</td>
			<td>
				<?php foreach ($model->getChildren(0,$m["sid"])->return as $cond):?>
				<a href="#" onclick="showSub(<?php print $cond["sid"]?>,<?php print $m["sid"]?>)" style="padding-left:25px;"><?php print $cond["name"]?></a>
				<input onclick="showSub(<?php print $cond["sid"]?>,<?php print $m["sid"]?>)" name="m[<?php print $m["sid"]?>]" value="<?php print $cond["sid"]?>" type="radio">
				<?php endforeach;?>
			
				<hr>
			
				<?php foreach ($model->getChildren(0,$m["sid"])->return as $cond):?>
				<div class="sub_cond<?php print $m["sid"]?>" id="sub_cond_<?php print $cond["sid"]?>" style="display:none">
					<?php foreach ($model->getChildren($cond["sid"],$m["sid"])->return as $sub_cond):?>
					
					<a href="" style="padding-left:25px;"><?php print $sub_cond["name"]?></a>
					<input name="m[<?php print $m["sid"]?>]" value="<?php print $sub_cond["sid"]?>" type="radio">
					
					
					<?php endforeach;?>
				</div>
				<?php endforeach;?>
				
			</td>
		</tr>
		<?php elseif($m["type"] == "range"):?>
		<tr>
			<td><?php print $m["data"]?></td>
			<td><input type="text"> - <input type="text"></td>
		</tr>
		<?php else:?>
		<tr>
			<td>搜索条件</td>
			<td><input type="text" placeholder="<?php print "输入".join(",",$model->getDataDomainLikestr())?>"></td>
		</tr>
		<?php endif?>
		<?php endforeach;?>
		</table>
		
		<input type="submit" value="search">
		</form>
		</div>
		</div>
</section>