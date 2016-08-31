<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月19日
 * @Desc: 
 * 依赖:
 */
$userinfo = AppUser::getInstance()->auth->getInfo();
?>
  <div class="blank15"></div>
  
  
  <div class="clr">
  	<?php include dirname(__FILE__)."/common/left.tpl.php";?>
    
    <div class="fr border2 wid738 memer_box2">

        <dl class="clr">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/hyfr_img4.png" /></dt>
            <dd class="fl">
                <p class="fz24">帐号设置</p>
                <p class="blank10"></p>
                <p class="fz13">修改个人信息</p>
            </dd>
        </dl>
        <div class="memer_box4">
        
           <?php include dirname(__FILE__)."/common/setting_links.php"?>
            
            <div class="clr color6 fz13">
            	<div class="blank30"></div>
                <div class="memer_box7 fl">
                	
                    <p class="fz16 color3">选择头像</p>
                    <p class="blank20"></p>
                    <ul id="avatar" class="clr">
                    <?php $avatarMeta = avatarMeta::getAllAvatar()?>
                   		<?php foreach ($avatarMeta as $avatar):?>
                    	<li data-ds="<?php print pathinfo($avatar,PATHINFO_BASENAME) ?>">
                    		<img src="<?php print HTTP_ENTRY?>/static/avatar/<?php print pathinfo($avatar,PATHINFO_BASENAME) ?>" />
                    		<?php if ($avatar == $userinfo["avatar"]):?>
                    		<div class="tx_dq"></div>
                    		<?php endif;?>	
                    	</li>
                    	<?php endforeach;?>
                    </ul>
                    <p class="blank40"></p>
                    
                    
                    <form action="<?php print AppUrl::userAvatar()?>" method="post">
                    <input type="hidden" name="i" id="form_ava_index">
                    <p>
                    <button class="tc gd1s" type="submit">保存头像</button>
                    </p>
                    </form>
                    <br><br>
                    <div style="color:#999"><?php print $info?></div>
                    
                </div>
                <div class="memer_box8 fl">
                	<p class="fz16 color3">头像预览</p>
                    <p class="blank30"></p>
                    <img id="avatar_preview" src="<?php print HTTP_ENTRY?>/static/avatar/<?php print $userinfo["avatar"] ?>" />
                    <p class="blank10"></p>
                    <p class="color9 tc">100*100</p>
                </div>
            </div>
            
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>
  <!--sybox end-->
  <script>
	$("#avatar li").click(function(){
		$("#avatar>li>div.tx_dq").remove();
		$(this).append('<div class="tx_dq"></div>');
		$("#avatar_preview").attr("src",$(this).find("img").attr("src"));
		$("#form_ava_index").val(this.getAttribute("data-ds"));
	});


  </script>