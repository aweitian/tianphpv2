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
</script>
<br>
<div class="f-tac">正在处理:<span id="counting">1</span>/<?php print $total?></div>
<br><br>
<div class="f-tac">新增:<span id="succ">0</span> 合并:<span id="merge">0</span></div>