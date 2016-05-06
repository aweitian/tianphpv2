<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 */
?>
<script>
function u(p,a,u){
	document.getElementById("counting").innerHTML = p;
	document.getElementById("succ").innerHTML = a;
	document.getElementById("merge").innerHTML = u;
}
function s(){
	var t = document.getElementById("csvt").value;
	
	if(t == "pub" || t == "priv"){
		document.getElementById("form-show").className = "f-tac";
	}else{
		document.getElementById("form-show").className = "f-tac";
		document.getElementById("form-show").innerHTML = "<font color=green>完成</font>";
	}
}
</script>
<br>
<div class="f-tac">正在处理:<span id="counting">1</span>/<?php print $total?></div>
<br><br>
<div class="f-tac">新增:<span id="succ">0</span> 合并:<span id="merge">0</span></div>

<br><br>
<div class="f-tac f-dn" id="form-show">
<form method="post" action="<?php print HTTP_ENTRY?>/loadData/save">
	<input id="csvt" name="type" value="<?php print $sp?>" type="hidden">
	<div class="formitm formitm-1">
			<input type="submit" name="submit" value="保存到数据库" class="u-btn">
		</div>
</form>
</div>