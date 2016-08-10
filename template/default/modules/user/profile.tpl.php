<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月19日
 * @Desc: 
 * 依赖:
 */
$userinfo = AppUser::getInstance ()->auth->getInfo ();
// var_dump($userinfo);exit;
?>
<div class="blank15"></div>


<div class="clr">


	<?php include dirname(__FILE__)."/common/left.tpl.php";?>

	<div class="fr border2 wid738 memer_box2">

		<dl class="clr">
			<dt class="fl">
				<img src="<?php print AppUrl::getMediaPath()?>/images/hyfr_img4.png" />
			</dt>
			<dd class="fl">
				<p class="fz24">帐号设置</p>
				<p class="blank10"></p>
				<p class="fz13">修改个人信息</p>
			</dd>
		</dl>
		<div class="memer_box4">

			<?php include dirname(__FILE__)."/common/setting_links.php"?>

			<?php print $info?>
			<div class="memer_box5 clr color6 fz13">
				<form method="post" action="<?php print AppUrl::userProfile()?>">
					<p>
						<label>昵称：</label> 
						<input value="<?php print $userinfo["name"]?>" name="name" type="text" /> 
						<span>4~14字符英文、汉字、数字等组成</span>
					</p>
					<p class="blank25"></p>
					<p>
						<label>Email:</label> 
						<input value="<?php print $userinfo["email"]?>" name="email" type="email" /> 
					</p>
					<p class="blank25"></p>
					<p>
						<label>手机:</label> 
						<input value="<?php print $userinfo["phone"]?>" name="phone" type="text" />
					</p>
					<p class="blank25"></p>
					<p>
						<label>安全问题:</label> 
						<input value="<?php print $userinfo["rpq"]?>" name="rpq" type="text" />
					</p>
					<p class="blank25"></p>
					<p>
						<label>安全答案：</label>
						<input value="<?php print $userinfo["rpa"]?>" name="rpa" type="text" />
					</p>
					<p class="blank25"></p>
					<p>
						<button class="tc gd1s" type="submit">保存</button>
					</p>
				</form>
			</div>

		</div>

	</div>

</div>

<div class="blank40"></div>
