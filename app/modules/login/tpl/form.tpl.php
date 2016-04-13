<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
?>


<div class="m-login-form">
	<div class="m-form">
	    <form action="<?php print $submit_url?>" method="get">
	        <fieldset>
	            <legend>登陆</legend>
	            <div id="info" class="f-text-white f-tac f-bg-red f-m5 f-p3">test</div>
	            <div class="formitm">
	                <label class="lab">账号：</label>
	                <div class="ipt">
	                    <input type="text" name="usr" class="u-ipt" autofocus/>
	                </div>
	            </div>
	            <div class="formitm">
	                <label class="lab">密码：</label>
	                <div class="ipt">
	                    <input type="password" class="u-ipt" name="pwd"/>
	                </div>
	            </div>
	
	            <div class="formitm formitm-1"><button class="u-btn" type="submit">提交</button></div>
	        </fieldset>
	    </form>
	</div>

</div>
<script>
setTimeout(function(){
	$("#info").fadeOut("slow");

},2500);


</script>







