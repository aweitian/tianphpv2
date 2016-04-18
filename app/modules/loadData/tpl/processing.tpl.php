<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 */
?>
<script>
var t = 0,s = 0,f = 0;
function u(i,r){
	if(r){
		s++
	}else{
		f++
	}
	document.getElementById("counting").innerHTML = i;
	document.getElementById("succ").innerHTML = s;
	document.getElementById("fail").innerHTML = f;
}
</script>
<br>
<div class="f-tac">正在处理:<span id="counting">1</span>/<?php print $total?></div>
<br><br>
<div class="f-tac">成功:<span id="succ">0</span> 失败:<span id="fail">0</span></div>