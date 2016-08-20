<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月19日
 * @Desc: 登陆后修改密码
 * 依赖:
 */


$userinfo = AppUser::getInstance()->auth->getInfo();
?>
<div class="public_width">
<?php $user_header_title = "修改密码";?>
<?php include dirname(__FILE__)."/common/header.tpl.php"?>

<!--head end-->
<div class="mzy30">
	<div class="blank30"></div>
    
            <div><?php print $info?></div>
            <form method="post" action="<?php print AppUrl::userModifypwd()?>" onsubmit="return chk(this)">
            <div class="memer_box6 clr color6 fz13">
            	<div class="login_warp bor_rad borddd clr">
                <input type="password" required name="op" class="modfiy clr" placeholder="原密码"/>
                <div class="hd_hsx"></div>
                <input type="password" required name="np" class="modfiy clr" placeholder="新密码"/>
                <div class="hd_hsx"></div>
                <input type="password" required name="npp" class="modfiy clr" placeholder="确认密码"/>
                </div>
                
                <p class="blank25"></p>
                <p><label></label><button class="login_dl bor_rad yellow_bg" type="submit">修改</button></p>
            </div>
   </form>
   <div class="blank30"></div>
</div>
  <script>
	function chk(f)
	{
		return f.np.value === f.npp.value ? true : (alert('两次密码不一样'),false);
	}
  </script>