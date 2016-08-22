<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link href="<?php print AppUrl::getMediaPath()?>/css/style.css"
	rel="stylesheet" />
<script src="<?php print AppUrl::getMediaPath()?>/js/jquery.js"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/jtClite.js"></script>
</head>

<body>
	<script>
	function getvc()
	{
		
		$.post(
			'<?php print AppUrl::userRegPhoneSendSms()?>',
					{
						't':$("#phone_no").val(),
						'v':$("#img_vc").val()
						
						
					},
					function(data,status)
					{
						alert(data.info);
						if(data.result==0){
							sendMessage();
							reImg();
							}else{
								reImg();
								}
						
					},
					'json'

				);
	}




	var InterValObj; //timer变量，控制时间
	var count = 60; //间隔函数，1秒执行
	var curCount;//当前剩余秒数

	function sendMessage() {
		
	  　curCount = count;
	　　//设置button效果，开始计时
	     $("#btnSendCode").attr("disabled", "true");
	     $("#btnSendCode").val("请在" + curCount + "秒内输入验证码");
	     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
	　
	}

	//timer处理函数
	function SetRemainTime() {
	            if (curCount == 0) {                
	                window.clearInterval(InterValObj);//停止计时器
	                $("#btnSendCode").removeAttr("disabled");//启用按钮
	                $("#btnSendCode").val("重新获取验证码");
	            }
	            else {
	                curCount--;
	                $("#btnSendCode").val(+ curCount + "秒内输入验证码");
	            }
	        }

	</script>
	<div class="wid1000 loginlogo clearfix">
		<a <?php if(TARGET_BLANK_OPEN):?> target="_blank" <?php endif?>
			href="<?php print AppUrl::navHome()?>"><img class="fl"
			src="<?php print AppUrl::getMediaPath()?>/images/loginlogo.jpg"
			width="284" height="47" /></a><span class="fl black fz24">注册帐号</span>
	</div>

		<div class="wid1000">
			<div class="registerboxnr clearfix">

				<div class="registerboxnrl fl">
					<div class="blank20"></div>
					<div class="registerform fz13">
						<div class="registercon regway selected">
								<?php print $info?>
							<form action="<?php print AppUrl::userRegister()."?t=m"?>"
								method="post">
								<input id='phone_no' name="phone" class="reginp1 gray border2" placeholder='请输入手机号码' type="text" />
								<div class="blank20"></div>
								
								<div class="regyzm clearfix gray">
								<input id='img_vc' name="vc" class="regyzminp fl border2 gray" placeholder='请输入验证码'/>
								
								<img id="Img" src="<?php print AppUrl::Captcha()?>" onclick = "this.src='<?php print AppUrl::Captcha()?>?'+Math.random()"  /> 
							
								</div>
								
								<div class="blank20"></div>
						     <script type="text/javascript">  
			        function reImg(){  
			            var img = document.getElementById("Img"); 
			         
			            img.src = "/captcha?" + Math.random();  
			          
			        }  
			    </script>  		
								<div class="regyzm clearfix gray">
									<input name="code" class="regyzminp fl border2 gray" placeholder='短信验证码'/>
									
								
									<input class="getyzm fl tc" id="btnSendCode" type="button" value="点击获取验证码" onclick='getvc()' />
								</div>
								<div class="blank20"></div>
								<input name="pwd" class="reginp1 gray border2" placeholder='密码'/>
								<div class="blank20"></div>
								<input name="pwd" class="reginp1 gray border2" placeholder='确认密码'/>


								<div class="blank30"></div>
								<div class="regxy1 gray">
									<input type="checkbox" checked/>我已看过并同意 <a
										<?php if(TARGET_BLANK_OPEN):?> target="_blank" <?php endif?>
										class="blue">注册协议</a>
								</div>
								<div class="blank30"></div>
								<button class="regsub1" type="submit">
									<img
										src="<?php print AppUrl::getMediaPath()?>/images/regbtn.jpg"
										width="162" height="40" />
								</button>
							</form>
						</div>
					</div>






				</div>

				<div class="registerboxnrr fr">
					<p class="pwz">
						已有账号,请 <a <?php if(TARGET_BLANK_OPEN):?> target="_blank"
							<?php endif?> href="<?php print AppUrl::userLogin()?>"
							class="blue">登录</a>
					</p>

				</div>
			</div>
		</div>







		<div class="blank20"></div>
		<div class="blank10"></div>
		<div class="loginfooter dgray fz13 wid1000">
			<div class="loginfooternav tc">
				<a <?php if(TARGET_BLANK_OPEN):?> target="_blank" <?php endif?>
					href="">关于我们</a><a <?php if(TARGET_BLANK_OPEN):?> target="_blank"
					<?php endif?> href="">友情链接</a><a <?php if(TARGET_BLANK_OPEN):?>
					target="_blank" <?php endif?> href="">找大夫咨询</a><a
					<?php if(TARGET_BLANK_OPEN):?> target="_blank" <?php endif?>
					href="">预约挂号</a><a <?php if(TARGET_BLANK_OPEN):?> target="_blank"
					<?php endif?> href="">版权声明</a><a <?php if(TARGET_BLANK_OPEN):?>
					target="_blank" <?php endif?> class="nobor" href="">联系我们</a>
			</div>
			<div class="blank15"></div>
			<div class="loginfooterloc tc">地址：上海市长宁区中山西路333号（近中山公园）
				沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号 网站统计</div>
		</div>

</body>
</html>
