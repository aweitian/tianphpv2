<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月19日
 * @Desc: 登陆后修改密码
 * 依赖:
 */

$userinfo = AppUser::getInstance()->auth->getInfo();
?>
  <div class="blank15"></div>
  
  
  <div class="clr">
  	<?php include dirname(__FILE__)."/common/left.tpl.php";?>
    
    <div class="fr border2 wid738 memer_box2">

        <dl class="clr">
            <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/hyfr_img4.png" /></dt>
            <dd class="fl">
                <p class="fz24">帐号设置</p>
                <p class="blank10"></p>
                <p class="fz13">修改个人信息</p>
            </dd>
        </dl>
        <div class="memer_box4">
        
            <?php include dirname(__FILE__)."/common/setting_links.php"?>
            <div><?php print $info?></div>
            <form method="post" action="<?php print AppUrl::userModifypwd()?>" onsubmit="return chk(this)">
            <div class="memer_box6 clr color6 fz13">
            	
                <p>
                	<label><b class="red">*</b>原密码：</label>
                    <input type="password" required name="op"/>
                </p>
                <p class="blank25"></p>
                <p>
                	<label><b class="red">*</b>新密码：</label>
                    <input type="password" required name="np"/>
                </p>
                <p class="blank25"></p>
                <p>
                	<label><b class="red">*</b>确认密码：</label>
                    <input type="password" required name="npp"/>
                </p>
                <p class="blank25"></p>
                <p><label></label><button class="tc gd1s" type="submit">修改</button></p>
            </div>
            </form>
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>
  <!--sybox end-->
  <script>
	function chk(f)
	{
		return f.np.value === f.npp.value ? true : (alert('两次密码不一样'),false);
	}
  </script>